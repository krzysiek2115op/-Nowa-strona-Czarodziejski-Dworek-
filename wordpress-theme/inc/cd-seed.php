<?php
/**
 * Dane startowe (seed) — Faza 3. Wywoływane z blueprint.json przy --reset.
 * Wygenerowane ze statycznych szablonów; obrazy jako pliki motywu (meta _cd_foto),
 * klient nadpisuje je „Obrazkiem wyróżniającym".
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function cd_seed_term( $tax, $slug, $name ) {
	$t = term_exists( $slug, $tax );
	if ( ! $t ) { $t = wp_insert_term( $name, $tax, array( 'slug' => $slug ) ); }
	return ( is_wp_error( $t ) || ! $t ) ? 0 : (int) $t['term_id'];
}

function cd_seed_item( $type, $title, $args = array() ) {
	$found = get_posts( array( 'post_type' => $type, 'title' => $title, 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $found ) { return (int) $found[0]; }
	$post = array( 'post_type' => $type, 'post_status' => 'publish', 'post_title' => $title );
	foreach ( array( 'content' => 'post_content', 'name' => 'post_name', 'order' => 'menu_order', 'date' => 'post_date' ) as $a => $f ) {
		if ( isset( $args[ $a ] ) ) { $post[ $f ] = $args[ $a ]; }
	}
	$id = wp_insert_post( $post );
	if ( is_wp_error( $id ) || ! $id ) { return 0; }
	if ( ! empty( $args['meta'] ) ) { foreach ( $args['meta'] as $k => $v ) { update_post_meta( $id, $k, $v ); } }
	if ( ! empty( $args['terms'] ) ) { foreach ( $args['terms'] as $tx => $sl ) { wp_set_object_terms( $id, $sl, $tx, false ); } }
	return $id;
}

function cd_seed_all() {
	if ( get_option( 'cd_seeded' ) ) { return; }

	/* Usuń domyślne treści instalatora WP (Hello world!, Przykładowa strona) */
	foreach ( get_posts( array( 'post_type' => array( 'post', 'page' ), 'post_name__in' => array( 'hello-world', 'sample-page' ), 'post_status' => 'any', 'numberposts' => -1 ) ) as $d ) { wp_delete_post( $d->ID, true ); }

	/* Ładne adresy + utworzenie podstron (motyw samoinstalujący się na świeżym WP) */
	update_option( 'permalink_structure', '/%postname%/' );
	$cd_pages = array( 'o-nas' => 'O nas', 'program' => 'Program', 'wczesne-wspomaganie-rozwoju' => 'WWR', 'nauczyciele' => 'Nauczyciele', 'blog' => 'Blog', 'galeria' => 'Galeria', 'kontakt' => 'Kontakt', 'adaptacja' => 'Adaptacja' );
	foreach ( $cd_pages as $slug => $title ) {
		if ( ! get_page_by_path( $slug ) ) {
			wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => $slug, 'post_content' => '' ) );
		}
	}

	/* Grupy kadry */
	cd_seed_term( 'kadra_grupa', 'dyrekcja', 'Dyrekcja' );
	cd_seed_term( 'kadra_grupa', 'edukacja', 'Zespół pedagogiczny' );
	cd_seed_term( 'kadra_grupa', 'terapia', 'Zespół terapeutyczny' );
	cd_seed_term( 'kadra_grupa', 'specjalisci', 'Specjaliści i lektorzy' );

	/* Nauczyciele */
	cd_seed_item( 'kadra', 'Agnieszka Mering', array( 'content' => 'Założycielka i dyrektorka „Czarodziejskiego Dworku" od 2003 roku. Absolwentka Edukacji Przedszkolnej oraz Polityki i zarządzania oświatą na UW, a także pedagogiki (WSH Pułtusk) i edukacji dla bezpieczeństwa (WSNS). Prywatnie mama dwóch nastolatek — uwielbia taniec i podróże.', 'order' => 1, 'terms' => array( 'kadra_grupa' => 'dyrekcja' ), 'meta' => array( '_cd_rola' => 'Dyrektor, pedagog, nauczyciel wychowania przedszkolnego', '_cd_foto' => 'kadra-mering.webp' ) ) );
	cd_seed_item( 'kadra', 'Małgorzata Bartoszewska', array( 'content' => 'Magister pedagogiki przedszkolnej z terapią pedagogiczną; ukończyła roczny kurs Marii Montessori i kurs dramy. Ma wieloletnie doświadczenie z dziećmi w wieku przedszkolnym i szkolnym. Bliska jej myśl Konfucjusza: „Pozwól mi działać — a zrozumiem".', 'order' => 1, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'pedagog, terapeuta', '_cd_foto' => 'kadra-bartoszewska.webp' ) ) );
	cd_seed_item( 'kadra', 'Paulina Chłap', array( 'content' => 'Ukończyła integracyjne wychowanie przedszkolne i wczesną interwencję (APS). Pracowała z dziećmi z autyzmem w Fundacji Synapsis; szkolona w komunikacji wspomagającej (PECS, Makaton). W Dworku od 2013 roku prowadzi zajęcia grupowe i indywidualne.', 'order' => 2, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'pedagog specjalny, nauczyciel', '_cd_foto' => 'kadra-chlap.webp' ) ) );
	cd_seed_item( 'kadra', 'Ewelina Gomoła Bieniek', array( 'content' => 'Absolwentka APS i UŚ, w Dworku od 2013 roku. Prowadzi zajęcia pedagogiczne, TUS-y i jogę dla dzieci; doświadczona w pracy z dziećmi z ASD. Stale się szkoli (Jogopedia, NVC, Kids\' Skills). W pracy stawia na empatię i mocne strony dziecka.', 'order' => 3, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'nauczyciel, pedagog specjalny', '_cd_foto' => 'kadra-gomola.webp' ) ) );
	cd_seed_item( 'kadra', 'Olga Jakuć', array( 'content' => 'Pedagog specjalny z dużym doświadczeniem w pracy z dziećmi ze spektrum autyzmu. Prowadzi integrację sensoryczną, terapię ręki, TUS i zajęcia taneczne. Bliska jej Pozytywna Dyscyplina — zamiast kar i nagród buduje z dziećmi relację opartą na zaufaniu.', 'order' => 4, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'pedagog specjalny, terapeuta', '_cd_initials' => 'OJ' ) ) );
	cd_seed_item( 'kadra', 'Anna Jurska', array( 'content' => 'Terapeutka integracji sensorycznej; ukończyła kurs „Autyzm: małe dziecko — duża sprawa" (Synapsis), PECS, TUS i metodę Weroniki Sherborne. Pracowała w przedszkolu terapeutycznym Synapsis, w Dworku od 2015 roku. Prywatnie mama Tadzia.', 'order' => 5, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'pedagog, oligofrenopedagog', '_cd_foto' => 'kadra-jurska.webp' ) ) );
	cd_seed_item( 'kadra', 'Elwira Kucharczyk', array( 'content' => 'Psycholog z przygotowaniem pedagogicznym (SWPS). Od 2009 roku pracuje z dziećmi ze spektrum autyzmu jako terapeuta indywidualny i grupowy. Uczestniczka licznych szkoleń z zachowań trudnych, komunikacji wspomagającej (PECS) i treningu kompetencji społecznych.', 'order' => 6, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'psycholog, terapeuta', '_cd_initials' => 'EK' ) ) );
	cd_seed_item( 'kadra', 'Agnieszka Mazur', array( 'content' => 'Pedagog specjalny i terapeutka SI (APS), z pedagogiką korekcyjną i przedszkolną. W Dworku od 2007 roku. Wierzy, że ruch jest motorem rozwoju — stąd nacisk na aktywność: terapia ręki i stopy, korektywa, integracja bilateralna.', 'order' => 7, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'nauczyciel, pedagog specjalny, terapeuta', '_cd_initials' => 'AM' ) ) );
	cd_seed_item( 'kadra', 'Monika Sawczuk', array( 'content' => 'Absolwentka WSP ZNP (wychowanie wczesnoszkolne z językiem angielskim). W Dworku od 2015 roku. Ceni w dzieciach spontaniczność i ciekawość; najważniejsze jest dla niej, by każde czuło się bezpieczne i szczęśliwe.', 'order' => 8, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'nauczyciel wychowania przedszkolnego', '_cd_foto' => 'kadra-sawczuk.webp' ) ) );
	cd_seed_item( 'kadra', 'Natalia Łucka', array( 'content' => 'Magister pedagogiki specjalnej (APS). Doświadczenie zdobywała w klasach 1–3, wspierając dzieci ze spektrum autyzmu. Ukończyła terapię ręki, AAC i pracę z dzieckiem z ADHD. Tworzy atmosferę spokoju i akceptacji — wierzy, że każde dziecko ma niepowtarzalny potencjał.', 'order' => 9, 'terms' => array( 'kadra_grupa' => 'edukacja' ), 'meta' => array( '_cd_rola' => 'pedagog specjalny', '_cd_foto' => 'kadra-lucka.webp' ) ) );
	cd_seed_item( 'kadra', 'Joanna Golec', array( 'content' => 'Psycholog kliniczny (UMCS). Od ponad 10 lat pracuje z dziećmi w spektrum autyzmu — m.in. w Przedszkolu Terapeutycznym Synapsis i Centrum Terapii Simuli, prowadząc terapię indywidualną i Treningi Umiejętności Społecznych. W pracy stawia na empatię, otwartość i ciekawość wobec dziecka.', 'order' => 1, 'terms' => array( 'kadra_grupa' => 'terapia' ), 'meta' => array( '_cd_rola' => 'nauczyciel, psycholog', '_cd_foto' => 'kadra-golec.webp' ) ) );
	cd_seed_item( 'kadra', 'Ewa Linowska', array( 'content' => 'Absolwentka psychologii UW, certyfikowana psychoterapeutka Instytutu Psychoanalizy i Psychoterapii. Pracuje z dziećmi, młodzieżą, dorosłymi, parami i rodzinami; swoją pracę poddaje regularnej superwizji. Studentka seksuologii klinicznej (WUM).', 'order' => 2, 'terms' => array( 'kadra_grupa' => 'terapia' ), 'meta' => array( '_cd_rola' => 'psycholog, psychoterapeuta', '_cd_initials' => 'EL' ) ) );
	cd_seed_item( 'kadra', 'Marta Byszko', array( 'content' => 'Absolwentka APS i SWPS. W Dworku od 2011 roku — diagnoza i indywidualna terapia logopedyczna, autorskie programy terapeutyczne, wspieranie komunikacji dzieci ze spektrum autyzmu (PECS). Szkolona m.in. w zaburzeniach połykania i metodzie werbotonalnej.', 'order' => 3, 'terms' => array( 'kadra_grupa' => 'terapia' ), 'meta' => array( '_cd_rola' => 'neurologopeda, pedagog specjalny', '_cd_initials' => 'MB' ) ) );
	cd_seed_item( 'kadra', 'Małgorzata Kunat', array( 'content' => 'Absolwentka Logopedii Ogólnej i Klinicznej (UW/WUM) oraz neurologopedii z wczesną interwencją. Odbyła staże neurologopedyczne w warszawskich szpitalach. Neurologopedia to jej pasja — stale się dokształca, by terapia była skuteczna i atrakcyjna dla dziecka.', 'order' => 4, 'terms' => array( 'kadra_grupa' => 'terapia' ), 'meta' => array( '_cd_rola' => 'neurologopeda, logopeda ogólny i kliniczny', '_cd_initials' => 'MK' ) ) );
	cd_seed_item( 'kadra', 'Anna Sławikowska', array( 'content' => 'Absolwentka Akademii Wychowania Fizycznego w Warszawie, fizjoterapeutka i terapeutka integracji sensorycznej. Od wielu lat z pasją pracuje z dziećmi, stale poszerzając wiedzę o rozwoju ruchowym na kursach, szkoleniach i konferencjach.', 'order' => 1, 'terms' => array( 'kadra_grupa' => 'specjalisci' ), 'meta' => array( '_cd_rola' => 'fizjoterapeutka', '_cd_initials' => 'AS' ) ) );
	cd_seed_item( 'kadra', 'Monika Szymańska Klimowicz', array( 'content' => 'Absolwentka polonistyki i romanistyki UW, z certyfikatem C1 z języka angielskiego. Wyspecjalizowana w pracy z uczniami o specjalnych potrzebach edukacyjnych; łączy kreatywność animatorki z metodyką, by przełamywać stereotypowe podejście do nauki języków.', 'order' => 2, 'terms' => array( 'kadra_grupa' => 'specjalisci' ), 'meta' => array( '_cd_rola' => 'nauczyciel języków', '_cd_foto' => 'kadra-szymanska.webp' ) ) );
	cd_seed_item( 'kadra', 'Olga Czarnecka', array( 'content' => 'Nauczycielka francuskiego od 2004 roku, absolwentka filologii romańskiej UW i egzaminatorka DELF. Francuski zna od dziecka — chodziła do szkoły francuskiej. Najmłodszych uczy przez gry, zabawy ruchowe i piosenki.', 'order' => 3, 'terms' => array( 'kadra_grupa' => 'specjalisci' ), 'meta' => array( '_cd_rola' => 'nauczyciel j. francuskiego', '_cd_foto' => 'kadra-czarnecka.webp' ) ) );
	cd_seed_item( 'kadra', 'Anna Maliga-Poprawska', array( 'content' => 'Absolwentka Akademii Muzycznej w Warszawie (Rytmika) i Studium Carla Orffa; uczestniczka międzynarodowych kursów Orffa (Salzburg, Nitra, Pilzno) oraz metody Gordona. Łączy metody Orffa, Dalcroze\'a i Gordona z pasją — gra, śpiewa, tańczy i komponuje piosenki dla dzieci.', 'order' => 4, 'terms' => array( 'kadra_grupa' => 'specjalisci' ), 'meta' => array( '_cd_rola' => 'rytmika i umuzykalnienie', '_cd_initials' => 'AP' ) ) );

	/* Klastry galerii */
	cd_seed_term( 'galeria_grupa', 'sale', 'Sale i przestrzenie edukacyjne' );
	cd_seed_term( 'galeria_grupa', 'kaciki', 'Kąciki i pracownie' );
	cd_seed_term( 'galeria_grupa', 'lazienki', 'Łazienki i szatnie' );
	cd_seed_term( 'galeria_grupa', 'plac', 'Plac zabaw i ogród' );

	/* Zdjęcia galerii */
	cd_seed_item( 'galeria', 'Sala z kącikiem dywanowym', array( 'order' => 1, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2147.webp', '_cd_alt' => 'Sala przedszkolna z kącikiem dywanowym', '_cd_rozmiar' => 'big' ) ) );
	cd_seed_item( 'galeria', 'Sala zajęciowa', array( 'order' => 2, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2149.webp', '_cd_alt' => 'Sala zajęciowa w przedszkolu Czarodziejski Dworek' ) ) );
	cd_seed_item( 'galeria', 'Sala przy oknie', array( 'order' => 3, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2152.webp', '_cd_alt' => 'Jasna sala przedszkolna przy dużym oknie' ) ) );
	cd_seed_item( 'galeria', 'Miejsce do zajęć', array( 'order' => 4, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2156.webp', '_cd_alt' => 'Stoliki do zajęć w sali przedszkolnej' ) ) );
	cd_seed_item( 'galeria', 'Półki na pomoce', array( 'order' => 5, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2158.webp', '_cd_alt' => 'Sala z półkami na pomoce dydaktyczne', '_cd_rozmiar' => 'tall' ) ) );
	cd_seed_item( 'galeria', 'Jasna sala edukacyjna', array( 'order' => 6, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2164.webp', '_cd_alt' => 'Jasna sala edukacyjna w przedszkolu' ) ) );
	cd_seed_item( 'galeria', 'Sala do zajęć grupowych', array( 'order' => 7, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2165.webp', '_cd_alt' => 'Sala do zajęć grupowych z zielonymi meblami', '_cd_rozmiar' => 'wide' ) ) );
	cd_seed_item( 'galeria', 'Sala z zielonym dywanem', array( 'order' => 8, 'terms' => array( 'galeria_grupa' => 'sale' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2172.webp', '_cd_alt' => 'Sala zajęciowa z zielonym dywanem' ) ) );
	cd_seed_item( 'galeria', 'Kącik z pomocami', array( 'order' => 1, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2148.webp', '_cd_alt' => 'Kącik z pomocami dydaktycznymi i półkami' ) ) );
	cd_seed_item( 'galeria', 'Miejsce do pracy', array( 'order' => 2, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2151.webp', '_cd_alt' => 'Kącik do pracy indywidualnej przy oknie', '_cd_rozmiar' => 'tall' ) ) );
	cd_seed_item( 'galeria', 'Kącik z zabawkami', array( 'order' => 3, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2155.webp', '_cd_alt' => 'Kącik z zabawkami i zielonymi szafkami' ) ) );
	cd_seed_item( 'galeria', 'Sala w zieleni', array( 'order' => 4, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2157.webp', '_cd_alt' => 'Sala przedszkolna utrzymana w zieleni' ) ) );
	cd_seed_item( 'galeria', 'Kameralna sala', array( 'order' => 5, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2166.webp', '_cd_alt' => 'Kameralna sala w odcieniach różu' ) ) );
	cd_seed_item( 'galeria', 'Kącik przy oknie', array( 'order' => 6, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2169.webp', '_cd_alt' => 'Kącik do zajęć przy oknie' ) ) );
	cd_seed_item( 'galeria', 'Kącik kuchenny', array( 'order' => 7, 'terms' => array( 'galeria_grupa' => 'kaciki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2173.webp', '_cd_alt' => 'Kącik kuchenny dla dzieci', '_cd_rozmiar' => 'wide' ) ) );
	cd_seed_item( 'galeria', 'Korytarz', array( 'order' => 1, 'terms' => array( 'galeria_grupa' => 'lazienki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2170.webp', '_cd_alt' => 'Korytarz prowadzący do sal w przedszkolu', '_cd_rozmiar' => 'wide' ) ) );
	cd_seed_item( 'galeria', 'Łazienka dla dzieci', array( 'order' => 2, 'terms' => array( 'galeria_grupa' => 'lazienki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2175.webp', '_cd_alt' => 'Łazienka z umywalkami dla dzieci', '_cd_rozmiar' => 'tall' ) ) );
	cd_seed_item( 'galeria', 'Umywalki i wieszaki', array( 'order' => 3, 'terms' => array( 'galeria_grupa' => 'lazienki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2176.webp', '_cd_alt' => 'Umywalki i wieszaki dla dzieci' ) ) );
	cd_seed_item( 'galeria', 'Szatnia', array( 'order' => 4, 'terms' => array( 'galeria_grupa' => 'lazienki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN2178.webp', '_cd_alt' => 'Szatnia z wieszakami dla dzieci' ) ) );
	cd_seed_item( 'galeria', 'Szatnia z półkami', array( 'order' => 5, 'terms' => array( 'galeria_grupa' => 'lazienki' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8693.webp', '_cd_alt' => 'Szatnia przedszkolna z półkami i wieszakami' ) ) );
	cd_seed_item( 'galeria', 'Ogród wśród drzew', array( 'order' => 1, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8674.webp', '_cd_alt' => 'Ogród przedszkola wśród drzew', '_cd_rozmiar' => 'big' ) ) );
	cd_seed_item( 'galeria', 'Urządzenia na placu', array( 'order' => 2, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8677.webp', '_cd_alt' => 'Plac zabaw z kolorowymi urządzeniami' ) ) );
	cd_seed_item( 'galeria', 'Wspinaczki i piaskownica', array( 'order' => 3, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8678.webp', '_cd_alt' => 'Plac zabaw — wspinaczki i piaskownica' ) ) );
	cd_seed_item( 'galeria', 'Zjeżdżalnie', array( 'order' => 4, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8680.webp', '_cd_alt' => 'Zjeżdżalnie na placu zabaw wśród zieleni' ) ) );
	cd_seed_item( 'galeria', 'Ogród z iglakami', array( 'order' => 5, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8681.webp', '_cd_alt' => 'Ogród z iglakami i placem zabaw' ) ) );
	cd_seed_item( 'galeria', 'Rozległy ogród', array( 'order' => 6, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8684.webp', '_cd_alt' => 'Rozległy, zielony ogród przedszkola', '_cd_rozmiar' => 'wide' ) ) );
	cd_seed_item( 'galeria', 'Piaskownica w cieniu', array( 'order' => 7, 'terms' => array( 'galeria_grupa' => 'plac' ), 'meta' => array( '_cd_foto' => 'gal-DSCN8690.webp', '_cd_alt' => 'Piaskownica w cieniu drzewa' ) ) );

	/* Kategorie bloga */
	cd_seed_term( 'category', 'aktualnosci', 'Aktualności' );
	cd_seed_term( 'category', 'wydarzenia', 'Wydarzenia' );
	cd_seed_term( 'category', 'porady', 'Porady dla rodziców' );
	cd_seed_term( 'category', 'adaptacja', 'Adaptacja' );
	cd_seed_term( 'category', 'rozwoj-dziecka', 'Rozwój dziecka' );
	cd_seed_term( 'category', 'zajecia-jezykowe', 'Zajęcia językowe' );
	cd_seed_term( 'category', 'wwr-terapia', 'WWR i terapia' );
	cd_seed_term( 'category', 'zycie-przedszkola', 'Życie przedszkola' );

	/* Wpisy bloga (natywne posty) */
	$body_wpis_dzien_otwarty = <<<'CDBODY'
<div class="highlight-box reveal" style="margin-bottom:28px">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <span><strong>Sobota, 28 lutego 2026, godz. 10:00–12:30.</strong> ul. Górczewska 89, Warszawa (Wola) — ok. 400 m od stacji metra Księcia Janusza, naprzeciw parku Moczydło.</span>
      </div>
      <p class="reveal">Szukasz dobrego przedszkola na warszawskiej Woli? Odwiedź nas osobiście podczas Dnia Otwartego. To czas, w którym bez pośpiechu pokażemy Wam nasze sale, plac zabaw i salę do zajęć, opowiemy o programie i odpowiemy na wszystkie pytania.</p>
      <p class="reveal">Dysponujemy wolnymi miejscami dla dzieci z <strong>rocznika 2023</strong>. Podczas spotkania poznacie naszą kadrę, dowiecie się, jak wygląda rytm dnia, jak prowadzimy zajęcia językowe i muzyczne oraz jak wspieramy dzieci dzięki zespołowi specjalistów na miejscu.</p>
      <p class="reveal">Zapraszamy całe rodziny — dzieci będą mogły swobodnie pobawić się w salach, a Wy spokojnie poczuć atmosferę naszego przedszkola. Nie trzeba wcześniej się zapisywać, ale jeśli chcecie mieć pewność miejsca lub nie możecie dotrzeć w tym terminie, chętnie umówimy indywidualne spotkanie.</p>
CDBODY;
	cd_seed_item( 'post', 'Dzień otwarty! 28.02.2026 r.', array( 'name' => 'wpis-dzien-otwarty', 'terms' => array( 'category' => 'wydarzenia' ), 'date' => '2025-01-08 09:00:00', 'content' => $body_wpis_dzien_otwarty, 'meta' => array( '_cd_foto' => 'blog-dzien-otwarty.webp', '_cd_kicker' => 'Zaproszenie', '_cd_lead' => 'Zapraszamy na Dzień Otwarty w Czarodziejskim Dworku — to najlepsza okazja, by poznać nasze przedszkole od środka, zanim podejmiesz decyzję.' ) ) );
	$body_wpis_zajecia_francuski = <<<'CDBODY'
<p class="lead reveal">Języka francuskiego uczymy od 4. roku życia, dwa razy w tygodniu, metodą bezpośrednią — przez gry, piosenki, zabawy ruchowe i prace manualne. Dzięki temu dzieci przyswajają język naturalnie, w formie zabawy, i z radością poszerzają spojrzenie na świat.</p>
      <p class="reveal">W grudniu wkraczamy w wyjątkowy, świąteczny klimat — a najlepiej uczy się wtedy, gdy towarzyszą temu emocje i radość. Dlatego sięgamy po materiały, które dzieci pokochały:</p>
      <ul class="reveal" style="display:flex;flex-direction:column;gap:14px;margin:20px 0">
        <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg><span><strong>Piosenka dla Mikołaja</strong> — „L'as-tu vu ce petit bonhomme?", przy której świetnie ćwiczymy melodię języka i wymowę.</span></li>
        <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg><span><strong>Bajka o rękawiczce</strong> — „La moufle" w wykonaniu Florence Desnouveaux: powtarzalne zwroty pomagają dzieciom zapamiętać słownictwo.</span></li>
        <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><path d="M10 5.172C10 3.782 8.423 2.679 6.5 3.5 4.577 4.32 4 6.5 4 8c0 3 2.5 5.5 8 9 5.5-3.5 8-6 8-9 0-1.5-.577-3.68-2.5-4.5C15.577 2.679 14 3.782 14 5.172"/></svg><span><strong>Bajka o piesku</strong> — „Aboie, Georges!": zabawna historia, dzięki której dzieci osłuchują się z naturalnym francuskim.</span></li>
      </ul>
      <p class="reveal">Zajęcia prowadzi magistra filologii romańskiej i egzaminatorka DELF. Nauka języka w tak młodym wieku rozwija słuch, pamięć i otwartość na inne kultury — a przede wszystkim daje dzieciom mnóstwo frajdy.</p>
CDBODY;
	cd_seed_item( 'post', 'Co teraz robimy na zajęciach z języka francuskiego?', array( 'name' => 'wpis-zajecia-francuski', 'terms' => array( 'category' => 'zajecia-jezykowe' ), 'date' => '2023-11-30 09:00:00', 'content' => $body_wpis_zajecia_francuski, 'meta' => array( '_cd_seo_title' => 'Język francuski w przedszkolu', '_cd_foto' => 'francuski-mapa.webp', '_cd_kicker' => 'Języki', '_cd_lead' => 'U nas język francuski to zabawa, piosenka i bajka — a nie wkuwanie słówek. Zaglądamy na nasze zajęcia i pokazujemy, co dzieje się w grudniu.' ) ) );
	$body_wpis_szkola_myslenia_pozytywnego = <<<'CDBODY'
<blockquote class="reveal" style="font-family:var(--font-display);font-style:italic;font-size:clamp(1.15rem,2.5vw,1.4rem);color:var(--brand);border-left:3px solid var(--gold);padding-left:22px;margin:0 0 28px">„Szkoła Myślenia Pozytywnego to roczna przygoda pełna wrażeń, empatii, zrozumienia i pracy nad otwartością, holistycznym dbaniem o zdrowie, o siebie i otoczenie."</blockquote>
      <p class="reveal">W trakcie realizacji programu wspólnie eksplorujemy różnorodne zagadnienia związane ze zdrowiem psychicznym — dzieci, młodzieży, a także dorosłych z ich otoczenia. Głównym celem jest nauka wzajemnego wsparcia oraz dbałości o samopoczucie własne i innych.</p>
      <p class="reveal">Uczymy się, jak modyfikować swoją rzeczywistość tak, aby wspierała psychiczny dobrostan, motywowała do nauki, promowała pozytywną komunikację i pomagała skutecznie radzić sobie ze stresem oraz lękami.</p>
      <div class="highlight-box reveal" style="margin:28px 0">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
        <span>To autorski program certyfikacyjny, realizowany od 2016 roku przez Fundację „Instytut Edukacji Pozytywnej". Przedszkolny koordynator: <strong>Ewelina Gomoła‑Bieniek</strong>.</span>
      </div>
      <p class="reveal">Więcej o programie przeczytasz na stronie <a href="https://programsmp.pl/" target="_blank" rel="noopener">programsmp.pl</a>.</p>
CDBODY;
	cd_seed_item( 'post', 'Szkoła Myślenia Pozytywnego!', array( 'name' => 'wpis-szkola-myslenia-pozytywnego', 'terms' => array( 'category' => 'rozwoj-dziecka' ), 'date' => '2024-09-26 09:00:00', 'content' => $body_wpis_szkola_myslenia_pozytywnego, 'meta' => array( '_cd_foto' => 'blog-smp.webp', '_cd_kicker' => 'Programy', '_cd_lead' => 'W roku szkolnym 2024/2025 bierzemy udział w programie „Szkoła Myślenia Pozytywnego" — bo dbanie o dobrostan psychiczny dzieci jest dla nas równie ważne, co nauka.' ) ) );

	/* Przykładowy pasek aktualności (klient może wyłączyć w Dostosowywanie) */
	set_theme_mod( 'cd_announce_on', true );
	set_theme_mod( 'cd_announce_text', 'Zapisy na rok 2026/2027 otwarte — zapraszamy na Dzień Otwarty 28.02.2026.' );
	set_theme_mod( 'cd_announce_link_text', 'Napisz do nas' );
	set_theme_mod( 'cd_announce_link_url', home_url( '/kontakt/' ) );

	/* Przeładuj reguły adresów, by podstrony i wpisy od razu działały */
	flush_rewrite_rules( false );

	update_option( 'cd_seeded', 1 );
}
