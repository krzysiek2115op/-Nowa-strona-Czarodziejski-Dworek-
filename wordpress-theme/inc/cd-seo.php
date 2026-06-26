<?php
/** SEO per strona — mapa opisów + helpery. Faza 5. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function cd_seo_desc_map() {
	return array(
		'index' => 'Prywatne przedszkole integracyjne w Warszawie (Wola, ul. Górczewska 89). Językowo-muzyczne: małe grupy, basen, angielski i francuski, 18 specjalistów. Od 2003.',
		'o-nas' => 'Poznaj historię Czarodziejskiego Dworku — integracyjnego przedszkola na Woli. 22+ lat doświadczenia, certyfikat NVC, 18 specjalistów, małe grupy.',
		'program' => 'Basen, angielski, francuski, muzyka w czesnym. Logopedia, SI, TUS, fizjoterapia i bezpłatne WWR. Przedszkole Czarodziejski Dworek, Wola.',
		'wczesne-wspomaganie-rozwoju' => 'Bezpłatne wczesne wspomaganie rozwoju (WWR) na Woli: terapia logopedyczna, psychologiczna, integracja sensoryczna, fizjoterapia i TUS. Także spoza przedszkola.',
		'nauczyciele' => '18 specjalistów: pedagodzy, logopedzi, psycholodzy, terapeuci SI, fizjoterapeutka. Poznaj kadrę przedszkola Czarodziejski Dworek na Woli.',
		'blog' => 'Aktualności, wydarzenia i ciekawostki z życia przedszkola Czarodziejski Dworek. Czarodziejski Uniwersytet, porady dla rodziców.',
		'galeria' => 'Galeria zdjęć z przedszkola Czarodziejski Dworek: sale, plac zabaw, zajęcia i codzienność. Zajrzyj do nas.',
		'kontakt' => 'Skontaktuj się z przedszkolem Czarodziejski Dworek: ul. Górczewska 89, Warszawa Wola. Telefon 690 629 501. Formularz kontaktowy. 7:00–18:00.',
		'adaptacja' => 'Bezpłatne zajęcia adaptacyjne w przedszkolu Czarodziejski Dworek na Woli. Jak przebiega adaptacja, jak przygotować dziecko i jak wspieramy rodziców.',
	);
}

/** Meta description zależny od kontekstu strony. */
function cd_meta_desc() {
	$map = cd_seo_desc_map();
	if ( is_front_page() ) { return $map['index']; }
	if ( is_singular( 'post' ) ) {
		$lead = get_post_meta( get_the_ID(), '_cd_lead', true );
		return $lead ? $lead : wp_strip_all_tags( get_the_excerpt() );
	}
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $map[ $slug ] ) ) { return $map[ $slug ]; }
	}
	return $map['index'];
}

/** Obraz do social/OG: obrazek wyróżniający wpisu (jeśli jest) lub karta 1200×630 motywu. */
function cd_og_image() {
	if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) ) {
		$u = get_the_post_thumbnail_url( get_queried_object_id(), 'large' );
		if ( $u ) { return $u; }
	}
	return get_template_directory_uri() . '/assets/img/og-image.jpg';
}

/** Bieżący URL kanoniczny do OG. */
function cd_current_url() {
	if ( is_front_page() ) { return home_url( '/' ); }
	$id = get_queried_object_id();
	return $id ? get_permalink( $id ) : home_url( add_query_arg( array() ) );
}

/** Mapa zoptymalizowanych tytułów stron (1:1 ze statykiem). */
function cd_seo_title_map() {
	return array(
		'o-nas'                        => 'O nas | Czarodziejski Dworek — przedszkole od 2003',
		'program'                      => 'Program zajęć | Czarodziejski Dworek — basen, języki',
		'wczesne-wspomaganie-rozwoju'  => 'Wczesne wspomaganie rozwoju WWR | Czarodziejski Dworek Wola',
		'nauczyciele'                  => 'Kadra i specjaliści | Czarodziejski Dworek',
		'blog'                         => 'Blog | Czarodziejski Dworek — aktualności',
		'galeria'                      => 'Galeria | Czarodziejski Dworek — zdjęcia przedszkola',
		'kontakt'                      => 'Kontakt | Czarodziejski Dworek — Górczewska 89',
		'adaptacja'                    => 'Adaptacja w przedszkolu | Czarodziejski Dworek Wola',
	);
}

/** Pełny <title> per kontekst (hak pre_get_document_title — pełna kontrola). */
function cd_doc_title( $title = '' ) {
	if ( is_front_page() ) { return 'Czarodziejski Dworek — prywatne przedszkole, Warszawa Wola'; }
	if ( is_singular( 'post' ) ) {
		$cd_pid = get_queried_object_id();
		$cd_seo = get_post_meta( $cd_pid, '_cd_seo_title', true );
		return ( $cd_seo ? $cd_seo : get_the_title() ) . ' | Blog — Czarodziejski Dworek';
	}
	if ( is_category() ) { return 'Kategoria: ' . single_cat_title( '', false ) . ' | Blog — Czarodziejski Dworek'; }
	if ( is_tag() ) { return 'Tag: ' . single_tag_title( '', false ) . ' | Blog — Czarodziejski Dworek'; }
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		$map  = cd_seo_title_map();
		if ( isset( $map[ $slug ] ) ) { return $map[ $slug ]; }
		return get_the_title() . ' | Czarodziejski Dworek';
	}
	if ( is_search() ) { return 'Wyniki wyszukiwania | Czarodziejski Dworek'; }
	if ( is_404() ) { return 'Nie znaleziono strony (404) | Czarodziejski Dworek'; }
	return 'Czarodziejski Dworek';
}

/** BreadcrumbList JSON-LD — wszędzie poza stroną główną. */
function cd_breadcrumb_jsonld() {
	if ( is_front_page() ) { return ''; }
	$items = array( array( 'Start', home_url( '/' ) ) );
	if ( is_singular( 'post' ) ) {
		$items[] = array( 'Blog', home_url( '/blog/' ) );
		$items[] = array( get_the_title(), get_permalink() );
	} elseif ( is_category() ) {
		$items[] = array( 'Blog', home_url( '/blog/' ) );
		$items[] = array( single_cat_title( '', false ), get_category_link( get_queried_object_id() ) );
	} elseif ( is_page() ) {
		$items[] = array( get_the_title(), get_permalink() );
	} else {
		return '';
	}
	$list = array();
	foreach ( $items as $i => $it ) {
		$list[] = array( '@type' => 'ListItem', 'position' => $i + 1, 'name' => $it[0], 'item' => $it[1] );
	}
	$data = array( '@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $list );
	return '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/** BlogPosting JSON-LD — pojedynczy wpis. */
function cd_blogposting_jsonld() {
	if ( ! is_singular( 'post' ) ) { return ''; }
	$id   = get_the_ID();
	$logo = get_template_directory_uri() . '/assets/img/cropped-android-chrome-512x512-1.png';
	$data = array(
		'@context'         => 'https://schema.org',
		'@type'            => 'BlogPosting',
		'headline'         => get_the_title(),
		'datePublished'    => get_the_date( 'c', $id ),
		'dateModified'     => get_the_modified_date( 'c', $id ),
		'author'           => array( '@type' => 'Organization', 'name' => 'Czarodziejski Dworek' ),
		'publisher'        => array( '@type' => 'Organization', 'name' => 'Czarodziejski Dworek', 'logo' => array( '@type' => 'ImageObject', 'url' => $logo ) ),
		'image'            => cd_og_image(),
		'mainEntityOfPage' => get_permalink( $id ),
		'description'      => cd_meta_desc(),
	);
	return '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/** FAQPage JSON-LD — WWR i Adaptacja (1:1 z widoczną treścią strony). */
function cd_faq_jsonld() {
	if ( ! is_page() ) { return ''; }
	$slug = get_post_field( 'post_name', get_queried_object_id() );
	if ( 'wczesne-wspomaganie-rozwoju' === $slug ) {
		$json = <<<'CDFAQ'
{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Czy zajęcia WWR są płatne?","acceptedAnswer":{"@type":"Answer","text":"Nie. Wczesne wspomaganie rozwoju jest bezpłatne — finansowane z subwencji oświatowej. Rodzice nie ponoszą kosztów zajęć ani diagnozy prowadzonej w ramach WWR."}},{"@type":"Question","name":"Czy z WWR mogą korzystać dzieci spoza przedszkola?","acceptedAnswer":{"@type":"Answer","text":"Tak. Z zajęć wczesnego wspomagania rozwoju mogą korzystać zarówno dzieci uczęszczające do naszego przedszkola, jak i dzieci spoza placówki. Wystarczy opinia o potrzebie wczesnego wspomagania rozwoju wydana przez poradnię psychologiczno-pedagogiczną."}},{"@type":"Question","name":"Jak uzyskać opinię o WWR?","acceptedAnswer":{"@type":"Answer","text":"Opinię o potrzebie wczesnego wspomagania rozwoju wydaje bezpłatnie publiczna poradnia psychologiczno-pedagogiczna właściwa dla miejsca zamieszkania dziecka. Chętnie pomożemy rodzicom zorientować się w procedurze i potrzebnych dokumentach."}},{"@type":"Question","name":"Jakie terapie obejmuje WWR w Czarodziejskim Dworku?","acceptedAnswer":{"@type":"Answer","text":"W ramach WWR prowadzimy terapię logopedyczną (neurologopedzi), psychologiczną, pedagogiczną, integrację sensoryczną (SI), fizjoterapię oraz Trening Umiejętności Społecznych (TUS). Zakres dobieramy indywidualnie do potrzeb dziecka."}},{"@type":"Question","name":"Od jakiego wieku można rozpocząć WWR?","acceptedAnswer":{"@type":"Answer","text":"Zajęcia można rozpocząć od chwili wykrycia niepełnosprawności lub trudności rozwojowych, aż do momentu rozpoczęcia przez dziecko nauki w szkole. Im wcześniej, tym lepsze efekty wspomagania."}},{"@type":"Question","name":"Czy rodzic jest zaangażowany w terapię?","acceptedAnswer":{"@type":"Answer","text":"Tak. Wczesne wspomaganie obejmuje wsparciem całą rodzinę — specjaliści udzielają rodzicom konsultacji, pokazują, jak pracować z dzieckiem w domu, i wspólnie monitorują postępy."}}]}
CDFAQ;
	} elseif ( 'adaptacja' === $slug ) {
		$json = <<<'CDFAQ'
{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Czy zajęcia adaptacyjne są płatne?","acceptedAnswer":{"@type":"Answer","text":"Nie. Sobotnie zajęcia adaptacyjne w Czarodziejskim Dworku są bezpłatne — to nasz sposób na spokojne, łagodne wejście dziecka w życie przedszkola."}},{"@type":"Question","name":"Kiedy odbywają się zajęcia adaptacyjne?","acceptedAnswer":{"@type":"Answer","text":"Organizujemy bezpłatne sobotnie zajęcia adaptacyjne dla najmłodszego rocznika i ich rodziców. Terminy na nowy rok szkolny ogłaszamy na naszym profilu na Facebooku oraz na stronie internetowej. Skontaktuj się z nami, aby poznać najbliższy termin."}},{"@type":"Question","name":"Czy rodzic jest obecny podczas adaptacji?","acceptedAnswer":{"@type":"Answer","text":"Tak. Na zajęciach adaptacyjnych dziecko poznaje sale, kadrę i rytm dnia w bezpiecznym towarzystwie rodzica. Dzięki temu pierwsze chwile w przedszkolu są spokojne i pełne poczucia bezpieczeństwa."}},{"@type":"Question","name":"Dla jakiego wieku są zajęcia adaptacyjne?","acceptedAnswer":{"@type":"Answer","text":"Zajęcia adaptacyjne kierujemy do dzieci z najmłodszego rocznika, które rozpoczynają edukację przedszkolną, oraz ich rodziców."}}]}
CDFAQ;
	} else {
		return '';
	}
	return '<script type="application/ld+json">' . $json . '</script>' . "\n";
}
