<?php
/**
 * Czarodziejski Dworek — funkcje motywu.
 *
 * @package czarodziejski-dworek
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CD_VERSION' ) ) {
	define( 'CD_VERSION', '1.0.0' );
}

// SEO per strona (mapa opisów + helpery OG).
require_once get_template_directory() . '/inc/cd-seo.php';

// Hardening bezpieczeństwa (nagłówki, XML-RPC, edytor plików, logowanie).
require_once get_template_directory() . '/inc/cd-security.php';

/**
 * Konfiguracja motywu.
 */
function cd_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_filter( 'pre_get_document_title', 'cd_doc_title' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Menu główne', 'czarodziejski-dworek' ),
			'footer'  => __( 'Menu stopki', 'czarodziejski-dworek' ),
		)
	);
}
add_action( 'after_setup_theme', 'cd_setup' );

/**
 * Zwraca atrybut aria-current dla aktywnego linku nawigacji.
 * (Nagłówek jest współdzielony, więc stan „aktywny” musi być dynamiczny.)
 *
 * @param bool $active Czy bieżąca strona odpowiada temu linkowi.
 * @return string ' aria-current="page"' albo ''.
 */
function cd_cur( $active ) {
	return $active ? ' aria-current="page"' : '';
}

/**
 * Body class zgodny z wersją statyczną (np. body.page-onas).
 * Statyczna strona stosuje selektory typu `.page-onas .arch-editorial`,
 * a domyślny body_class() WordPressa tych klas nie dodaje.
 */
function cd_body_class( $classes ) {
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( $slug ) {
			$classes[] = 'page-' . $slug;                          // page-o-nas
			$classes[] = 'page-' . str_replace( '-', '', $slug );  // page-onas (konwencja ze statyku)
		}
	}
	if ( get_theme_mod( 'cd_announce_on', false ) ) {
		$classes[] = 'has-announce';
	}
	return $classes;
}
add_filter( 'body_class', 'cd_body_class' );

/* =========================================================================
 *  FAZA 3 — EDYTOWALNE TREŚCI (bez wtyczek: natywny WordPress)
 * ====================================================================== */

/**
 * Typy treści: Nauczyciele (kadra) i Galeria.
 * public=false → brak osobnych URL-i front-end (renderujemy je w szablonach stron),
 * ale w pełni edytowalne w panelu i dostępne przez WP_Query.
 */
function cd_register_cpt() {
	register_post_type( 'kadra', array(
		'labels' => array(
			'name'          => 'Nauczyciele',
			'singular_name' => 'Nauczyciel',
			'add_new'       => 'Dodaj nauczyciela',
			'add_new_item'  => 'Dodaj nauczyciela',
			'edit_item'     => 'Edytuj nauczyciela',
			'all_items'     => 'Wszyscy nauczyciele',
			'menu_name'     => 'Nauczyciele',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-groups',
		'menu_position'=> 21,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'has_archive'  => false,
		'rewrite'      => false,
	) );

	register_post_type( 'galeria', array(
		'labels' => array(
			'name'          => 'Galeria',
			'singular_name' => 'Zdjęcie',
			'add_new'       => 'Dodaj zdjęcie',
			'add_new_item'  => 'Dodaj zdjęcie',
			'edit_item'     => 'Edytuj zdjęcie',
			'all_items'     => 'Wszystkie zdjęcia',
			'menu_name'     => 'Galeria',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-format-gallery',
		'menu_position'=> 22,
		'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
		'has_archive'  => false,
		'rewrite'      => false,
	) );
}
add_action( 'init', 'cd_register_cpt' );

/**
 * Taksonomie: grupa kadry i klaster galerii (do grupowania w sekcje).
 */
function cd_register_tax() {
	register_taxonomy( 'kadra_grupa', 'kadra', array(
		'labels'            => array( 'name' => 'Grupy kadry', 'singular_name' => 'Grupa', 'menu_name' => 'Grupy' ),
		'public'            => false,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => false,
	) );
	register_taxonomy( 'galeria_grupa', 'galeria', array(
		'labels'            => array( 'name' => 'Klastry galerii', 'singular_name' => 'Klaster', 'menu_name' => 'Klastry' ),
		'public'            => false,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => false,
	) );
}
add_action( 'init', 'cd_register_tax' );

/**
 * Jednorazowe zaszczepienie treści startowych (kadra, galeria, wpisy bloga).
 * Uruchamiane na 'init' (priorytet 99 — po rejestracji CPT/taksonomii),
 * przy aktywnym motywie. Strażnik 'cd_seeded' zapobiega ponownemu wykonaniu,
 * więc na żywej stronie klienta (treść już w bazie) nic nie robi.
 */
function cd_maybe_seed() {
	if ( get_option( 'cd_seeded' ) ) {
		return;
	}
	$seed = get_template_directory() . '/inc/cd-seed.php';
	if ( file_exists( $seed ) ) {
		require_once $seed;
		if ( function_exists( 'cd_seed_all' ) ) {
			cd_seed_all();
		}
	}
}
add_action( 'init', 'cd_maybe_seed', 99 );

/**
 * Meta boxy: rola (kadra) + rozmiar kafla (galeria).
 */
function cd_meta_boxes() {
	add_meta_box( 'cd_rola', 'Rola / specjalizacja', 'cd_box_rola', 'kadra', 'side', 'high' );
	add_meta_box( 'cd_rozmiar', 'Rozmiar kafla', 'cd_box_rozmiar', 'galeria', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'cd_meta_boxes' );

function cd_box_rola( $post ) {
	wp_nonce_field( 'cd_meta', 'cd_meta_nonce' );
	$v = esc_attr( get_post_meta( $post->ID, '_cd_rola', true ) );
	echo '<input type="text" name="cd_rola" value="' . $v . '" style="width:100%" placeholder="np. pedagog, terapeuta">';
	echo '<p style="color:#666;margin:6px 0 0">Podpis pod imieniem. Zdjęcie: ustaw „Obrazek wyróżniający" (bez zdjęcia pokażą się inicjały).</p>';
}

function cd_box_rozmiar( $post ) {
	wp_nonce_field( 'cd_meta', 'cd_meta_nonce' );
	$v = get_post_meta( $post->ID, '_cd_rozmiar', true );
	$opts = array( '' => 'Zwykły', 'big' => 'Duży', 'tall' => 'Wysoki', 'wide' => 'Szeroki' );
	echo '<select name="cd_rozmiar" style="width:100%">';
	foreach ( $opts as $k => $label ) {
		echo '<option value="' . esc_attr( $k ) . '"' . selected( $v, $k, false ) . '>' . esc_html( $label ) . '</option>';
	}
	echo '</select><p style="color:#666;margin:6px 0 0">Zdjęcie: ustaw „Obrazek wyróżniający".</p>';
}

function cd_save_meta( $post_id ) {
	if ( ! isset( $_POST['cd_meta_nonce'] ) || ! wp_verify_nonce( $_POST['cd_meta_nonce'], 'cd_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['cd_rola'] ) ) {
		update_post_meta( $post_id, '_cd_rola', sanitize_text_field( wp_unslash( $_POST['cd_rola'] ) ) );
	}
	if ( isset( $_POST['cd_rozmiar'] ) ) {
		update_post_meta( $post_id, '_cd_rozmiar', sanitize_text_field( wp_unslash( $_POST['cd_rozmiar'] ) ) );
	}
}
add_action( 'save_post', 'cd_save_meta' );

/* ---------- Customizer: dane kontaktowe + pasek aktualności ---------- */

/** Domyślne dane kontaktowe (zgodne ze stroną statyczną). */
function cd_contact_defaults() {
	return array(
		'cd_adres'   => 'ul. Górczewska 89, 01-401 Warszawa',
		'cd_tel1'    => '690 629 501',
		'cd_tel2'    => '510 318 948',
		'cd_email'   => 'kontakt@czarodziejski-dworek.pl',
		'cd_godziny' => '7:00–18:00',
		'cd_nip'     => '524-246-20-37',
		'cd_konto'   => '05 1050 1025 1000 0022 9076 5482',
	);
}

/** Pobiera wartość z Customizera z bezpiecznym fallbackiem. */
function cd_opt( $key, $default = '' ) {
	$defaults = cd_contact_defaults();
	$fallback = isset( $defaults[ $key ] ) ? $defaults[ $key ] : $default;
	return get_theme_mod( $key, $fallback );
}

/** Buduje atrybut tel: z numeru w formacie ludzkim (np. „690 629 501”). */
function cd_tel_href( $num ) {
	$digits = preg_replace( '/\D/', '', $num );
	if ( strlen( $digits ) === 9 ) {
		$digits = '48' . $digits;
	}
	return 'tel:+' . $digits;
}

function cd_customize( $wp ) {
	// Sekcja: Dane kontaktowe
	$wp->add_section( 'cd_kontakt', array( 'title' => 'Dane kontaktowe', 'priority' => 30 ) );
	$fields = array(
		'cd_adres'   => 'Adres',
		'cd_tel1'    => 'Telefon 1',
		'cd_tel2'    => 'Telefon 2',
		'cd_email'   => 'E-mail',
		'cd_godziny' => 'Godziny otwarcia',
		'cd_nip'     => 'NIP',
		'cd_konto'   => 'Numer konta',
	);
	$defaults = cd_contact_defaults();
	foreach ( $fields as $key => $label ) {
		$wp->add_setting( $key, array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp->add_control( $key, array( 'label' => $label, 'section' => 'cd_kontakt', 'type' => 'text' ) );
	}

	// Sekcja: Pasek aktualności
	$wp->add_section( 'cd_announce', array( 'title' => 'Pasek aktualności', 'priority' => 31 ) );
	$wp->add_setting( 'cd_announce_on', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
	$wp->add_control( 'cd_announce_on', array( 'label' => 'Pokaż pasek na górze', 'section' => 'cd_announce', 'type' => 'checkbox' ) );
	$wp->add_setting( 'cd_announce_text', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp->add_control( 'cd_announce_text', array( 'label' => 'Tekst', 'section' => 'cd_announce', 'type' => 'text' ) );
	$wp->add_setting( 'cd_announce_link_text', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp->add_control( 'cd_announce_link_text', array( 'label' => 'Tekst linku (opcjonalnie)', 'section' => 'cd_announce', 'type' => 'text' ) );
	$wp->add_setting( 'cd_announce_link_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp->add_control( 'cd_announce_link_url', array( 'label' => 'Adres linku', 'section' => 'cd_announce', 'type' => 'url' ) );

	// Sekcja: Formularze kontaktowe (klucz Web3Forms)
	$wp->add_section( 'cd_formularze', array( 'title' => 'Formularze kontaktowe', 'priority' => 32 ) );
	$wp->add_setting( 'cd_web3forms_key', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ) );
	$wp->add_control( 'cd_web3forms_key', array(
		'label'       => 'Klucz Web3Forms (Access Key)',
		'description' => 'Wklej darmowy klucz z web3forms.com — bez niego formularze nie wyślą wiadomości. Krok po kroku: patrz instrukcja „3-FORMULARZE-KONTAKTOWE”.',
		'section'     => 'cd_formularze',
		'type'        => 'text',
	) );
}
add_action( 'customize_register', 'cd_customize' );

/** Render paska aktualności (gdy włączony). */
function cd_render_announce() {
	if ( ! get_theme_mod( 'cd_announce_on', false ) ) {
		return;
	}
	$text = get_theme_mod( 'cd_announce_text', '' );
	if ( '' === trim( $text ) ) {
		return;
	}
	$lt = get_theme_mod( 'cd_announce_link_text', '' );
	$lu = get_theme_mod( 'cd_announce_link_url', '' );
	echo '<div class="announce-bar"><div class="container"><p>' . esc_html( $text );
	if ( '' !== trim( $lt ) && '' !== trim( $lu ) ) {
		echo ' <a href="' . esc_url( $lu ) . '">' . esc_html( $lt ) . ' →</a>';
	}
	echo '</p></div></div>';
}

/* ---------- Helpery treści ---------- */

/**
 * URL obrazka wpisu: najpierw „Obrazek wyróżniający”, w razie braku
 * plik domyślny z motywu (meta _cd_foto). Pozwala zaszczepić oryginalne
 * zdjęcia bez importu do biblioteki mediów; klient nadpisuje uploadem.
 */
function cd_img_url( $post_id, $size = 'large' ) {
	if ( has_post_thumbnail( $post_id ) ) {
		$u = get_the_post_thumbnail_url( $post_id, $size );
		if ( $u ) {
			return $u;
		}
	}
	$f = get_post_meta( $post_id, '_cd_foto', true );
	if ( $f ) {
		return get_template_directory_uri() . '/assets/img/' . ltrim( $f, '/' );
	}
	return '';
}

/** Inicjały do placeholdera kadry (meta _cd_initials nadpisuje auto). */
function cd_initials( $post_id, $name ) {
	$m = get_post_meta( $post_id, '_cd_initials', true );
	if ( $m ) {
		return $m;
	}
	$parts = preg_split( '/\s+/', trim( $name ) );
	$out = '';
	foreach ( array_slice( $parts, 0, 2 ) as $p ) {
		$out .= function_exists( 'mb_strtoupper' ) ? mb_strtoupper( mb_substr( $p, 0, 1 ) ) : strtoupper( substr( $p, 0, 1 ) );
	}
	return $out;
}

/** Zapytanie o kadrę z danej grupy (kolejność: menu_order). */
function cd_kadra_query( $slug ) {
	return new WP_Query( array(
		'post_type'      => 'kadra',
		'posts_per_page' => -1,
		'orderby'        => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
		'no_found_rows'  => true,
		'tax_query'      => array( array( 'taxonomy' => 'kadra_grupa', 'field' => 'slug', 'terms' => $slug ) ),
	) );
}

/** Render karty nauczyciela (1:1 ze statyczną). */
function cd_kadra_card( $id, $director = false ) {
	$name = get_the_title( $id );
	$role = get_post_meta( $id, '_cd_rola', true );
	$bio  = trim( wp_strip_all_tags( get_post_field( 'post_content', $id ) ) );
	$img  = cd_img_url( $id, 'large' );
	echo '<div class="teacher-card' . ( $director ? ' director' : '' ) . '">';
	if ( $img ) {
		$alt = $name . ( $role ? ' — ' . $role : '' );
		echo '<div class="teacher-portrait"><img src="' . esc_url( $img ) . '" width="400" height="400" loading="lazy" alt="' . esc_attr( $alt ) . '"></div>';
	} else {
		echo '<div class="teacher-placeholder" role="img" aria-label="' . esc_attr( $name ) . '"><span class="mono">' . esc_html( cd_initials( $id, $name ) ) . '</span></div>';
	}
	echo '<div class="teacher-info"><h3>' . esc_html( $name ) . '</h3>';
	if ( $role ) { echo '<p class="role">' . esc_html( $role ) . '</p>'; }
	if ( $bio )  { echo '<p class="bio">' . esc_html( $bio ) . '</p>'; }
	echo '</div></div>';
}

/** URL obrazka galerii + helpery galerii. */
function cd_galeria_query( $slug ) {
	return new WP_Query( array(
		'post_type'      => 'galeria',
		'posts_per_page' => -1,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'ASC' ),
		'no_found_rows'  => true,
		'tax_query'      => array( array( 'taxonomy' => 'galeria_grupa', 'field' => 'slug', 'terms' => $slug ) ),
	) );
}

/** Etykieta „kicker · data” dla wpisu (data po polsku, niezależnie od locale). */
function cd_pl_date( $id ) {
	static $miesiace = array( 1=>'stycznia',2=>'lutego',3=>'marca',4=>'kwietnia',5=>'maja',6=>'czerwca',7=>'lipca',8=>'sierpnia',9=>'września',10=>'października',11=>'listopada',12=>'grudnia' );
	$ts = get_post_time( 'U', false, $id );
	return (int) gmdate( 'j', $ts ) . ' ' . $miesiace[ (int) gmdate( 'n', $ts ) ] . ' ' . gmdate( 'Y', $ts );
}

/**
 * Style i skrypty (te same pliki co w wersji statycznej).
 */
function cd_assets() {
	$uri = get_template_directory_uri();
	$ver = '46';

	wp_enqueue_style( 'cd-fonts', $uri . '/assets/fonts/fonts.css', array(), $ver );
	wp_enqueue_style( 'cd-styles', $uri . '/assets/css/styles.css', array( 'cd-fonts' ), $ver );
	wp_enqueue_style( 'cd-magic', $uri . '/assets/css/magic.css', array( 'cd-styles' ), $ver );
	wp_enqueue_script( 'cd-app', $uri . '/assets/js/app.js', array(), $ver, true );

	// CSS/JS sekcyjne — tylko na właściwych podstronach.
	if ( is_page( 'wczesne-wspomaganie-rozwoju' ) ) {
		wp_enqueue_style( 'cd-wwr', $uri . '/assets/css/wwr.css', array( 'cd-styles' ), '2' );
	}
	if ( is_page( 'galeria' ) ) {
		wp_enqueue_style( 'cd-galeria', $uri . '/assets/css/galeria.css', array( 'cd-styles' ), '4' );
		wp_enqueue_script( 'cd-galeria-js', $uri . '/assets/js/galeria.js', array( 'cd-app' ), '2', true );
	}
	if ( is_page( 'kontakt' ) ) {
		wp_enqueue_style( 'cd-kontakt', $uri . '/assets/css/kontakt.css', array( 'cd-styles' ), '2' );
	}
}
add_action( 'wp_enqueue_scripts', 'cd_assets' );
