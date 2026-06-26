<?php $t = get_template_directory_uri(); ?>
<!DOCTYPE html>
<html lang="pl" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-language" content="pl-PL">
  <meta name="geo.region" content="PL-14">
  <meta name="geo.placename" content="Warszawa, Wola">
  <meta name="geo.position" content="52.2318;20.9435">
  <meta name="ICBM" content="52.2318, 20.9435">
  <?php
    $cd_desc  = cd_meta_desc();
    $cd_title = wp_get_document_title();
    $cd_url   = cd_current_url();
    $cd_img   = cd_og_image();
    $cd_img_default = ( false !== strpos( $cd_img, 'og-image.jpg' ) );
  ?>
  <meta name="description" content="<?php echo esc_attr( $cd_desc ); ?>">
  <meta name="robots" content="index, follow">

  <!-- Open Graph (dynamiczne per strona) -->
  <meta property="og:type" content="<?php echo is_singular( 'post' ) ? 'article' : 'website'; ?>">
  <meta property="og:locale" content="pl_PL">
  <meta property="og:site_name" content="Czarodziejski Dworek">
  <meta property="og:title" content="<?php echo esc_attr( $cd_title ); ?>">
  <meta property="og:description" content="<?php echo esc_attr( $cd_desc ); ?>">
  <meta property="og:url" content="<?php echo esc_url( $cd_url ); ?>">
  <meta property="og:image" content="<?php echo esc_url( $cd_img ); ?>">
  <?php if ( $cd_img_default ) : ?>
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <?php endif; ?>
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr( $cd_title ); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr( $cd_desc ); ?>">
  <meta name="twitter:image" content="<?php echo esc_url( $cd_img ); ?>">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo $t; ?>/favicon.ico?v=3" sizes="32x32">
  <link rel="apple-touch-icon" href="<?php echo $t; ?>/assets/icons/apple-touch-icon.png?v=3">

  <!-- Fonts -->
  <link rel="preload" href="<?php echo $t; ?>/assets/fonts/inter-400-normal-latin.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo $t; ?>/assets/fonts/cormorant-garamond-600-normal-latin.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Preload hero -->
  <link rel="preload" as="image" href="<?php echo $t; ?>/assets/img/dzieci-zabawa.webp" type="image/webp">

  <!-- Styles -->

  <!-- Critical inline styles for FOUC prevention -->
  <style>
    html{background:#FBF6EE;color:#2E2420}
    .no-js .reveal,.no-js .stagger>*,.no-js .hero-anim,.no-js .trust-badge{opacity:1!important;transform:none!important;animation:none!important}
  </style>

  <noscript><style>
    [class*="hero-anim"]{opacity:1!important;transform:none!important;animation:none!important}
    .magic-orb{opacity:.10!important;animation:none!important}
    .reveal,.stagger>*,.trust-badge{opacity:1!important;transform:none!important}
    #intro{display:none!important}
  </style></noscript>

  <?php if ( is_front_page() ) : // Dane strukturalne tylko na stronie głównej (nie wyciekają na podstrony). ?>
  <!-- Schema: Preschool -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Preschool",
    "name": "Integracyjne Przedszkole Niepubliczne Językowo–Muzyczne „Czarodziejski Dworek”",
    "alternateName": "Czarodziejski Dworek",
    "description": "Językowo-muzyczne przedszkole integracyjne na warszawskiej Woli. Małe grupy do 14 dzieci, basen, angielski, francuski, 18 specjalistów na miejscu, bezpłatne WWR. Działamy od 2003 roku.",
    "url": "https://czarodziejski-dworek.pl/",
    "logo": "https://czarodziejski-dworek.pl/assets/img/cropped-android-chrome-512x512-1.png",
    "image": "https://czarodziejski-dworek.pl/assets/img/hero-main.webp",
    "telephone": ["+48 690 629 501", "+48 510 318 948"],
    "email": "kontakt@czarodziejski-dworek.pl",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "ul. Górczewska 89",
      "addressLocality": "Warszawa",
      "addressRegion": "mazowieckie",
      "postalCode": "01-401",
      "addressCountry": "PL"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 52.2318,
      "longitude": 20.9460
    },
    "areaServed": [
      {"@type": "City", "name": "Warszawa"},
      {"@type": "AdministrativeArea", "name": "Wola, Warszawa"}
    ],
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
      "opens": "07:00",
      "closes": "18:00"
    },
    "foundingDate": "2003-09",
    "hasMap": "https://www.google.com/maps/place/G%C3%B3rczewska+89,+01-401+Warszawa",
    "isAccessibleForFree": false,
    "currenciesAccepted": "PLN",
    "paymentAccepted": "Przelew bankowy"
  }
  </script>

  <!-- Schema: FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Jakie są godziny pracy przedszkola?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Przedszkole Czarodziejski Dworek jest czynne od poniedziałku do piątku w godzinach 7:00–18:00. Godziny pracy dostosowujemy do potrzeb rodziców."
        }
      },
      {
        "@type": "Question",
        "name": "Jak zapisać dziecko do przedszkola Czarodziejski Dworek?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Najszybszy sposób to kontakt telefoniczny: 690 629 501 lub 510 318 948. Można też wysłać zapytanie przez formularz na stronie lub napisać na kontakt@czarodziejski-dworek.pl. Dla najmłodszych roczników organizujemy bezpłatne sobotnie zajęcia adaptacyjne, które pomagają dziecku i rodzicom oswoić się z przedszkolem przed rozpoczęciem nauki."
        }
      },
      {
        "@type": "Question",
        "name": "Ile kosztuje czesne i co zawiera?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "W ramach czesnego dziecko korzysta z zajęć edukacyjnych w małych grupach (do 14 dzieci), nauki pływania na basenie, języka angielskiego, języka francuskiego, zajęć muzycznych (rytmika metodą Carla Orffa), gimnastyki, jogi, zajęć tanecznych (szkoła PRO-DANCE) oraz wsparcia terapeutycznego — logopedii, terapii psychologicznej, integracji sensorycznej, fizjoterapii, terapii pedagogicznej i Treningu Umiejętności Społecznych (TUS). Zapewniamy również zdrowe jedzenie z uwzględnieniem wszystkich diet."
        }
      },
      {
        "@type": "Question",
        "name": "Czy przedszkole przyjmuje dzieci z orzeczeniem o potrzebie kształcenia specjalnego?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Tak. Czarodziejski Dworek to przedszkole integracyjne — przyjmujemy dzieci z orzeczeniami i opiniami o specjalnych potrzebach edukacyjnych. Na miejscu pracuje 18 specjalistów: neurologopedzi, psycholodzy kliniczni, terapeuci integracji sensorycznej, fizjoterapeutka, pedagodzy specjalni i psychoterapeuci. Grupy liczą do 14 dzieci z 2 nauczycielami w każdej, co pozwala na indywidualne podejście."
        }
      },
      {
        "@type": "Question",
        "name": "Czym są zajęcia WWR i kto może z nich korzystać?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Wczesne Wspomaganie Rozwoju (WWR) to bezpłatne, indywidualne sesje terapeutyczne prowadzone przez naszych specjalistów: psychologa, logopedę, pedagoga, terapeutę integracji sensorycznej, fizjoterapeutę oraz trenera TUS. Z zajęć WWR mogą korzystać dzieci uczęszczające do naszego przedszkola, a także dzieci spoza placówki — wystarczy opinia o wczesnym wspomaganiu rozwoju wydana przez poradnię psychologiczno-pedagogiczną."
        }
      },
      {
        "@type": "Question",
        "name": "Ile dzieci jest w grupie?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "W każdej grupie jest maksymalnie 14 dzieci, a opiekę sprawuje 2 nauczycieli. Małe grupy pozwalają na indywidualne podejście do każdego dziecka i zapewniają komfort pracy zarówno dzieciom, jak i kadrze."
        }
      }
    ]
  }
  </script>
  <?php endif; // is_front_page ?>

  <?php
  // Dane strukturalne podstron: breadcrumb (poza home), FAQ (WWR/Adaptacja), BlogPosting (wpisy)
  echo cd_breadcrumb_jsonld();
  echo cd_faq_jsonld();
  echo cd_blogposting_jsonld();
  ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<a href="#main-content" class="skip-link">Przejdź do treści</a>
<div class="scroll-progress" aria-hidden="true"></div>
<?php cd_render_announce(); ?>
<?php if ( get_theme_mod( 'cd_announce_on', false ) ) : ?>
<script>(function(){var a=document.querySelector('.announce-bar');if(!a)return;function s(){document.documentElement.style.setProperty('--cd-announce-h',a.offsetHeight+'px');}s();addEventListener('resize',s);})();</script>
<?php endif; ?>

<!-- ==================== INTRO (logo → pasek) ==================== -->
<?php if ( is_front_page() ) : ?>
<div id="intro" class="intro">
  <div class="intro-inner">
    <img src="<?php echo $t; ?>/assets/img/logo.png?v=3" alt="Czarodziejski Dworek" class="intro-mark" width="190" height="124">
    <span class="intro-hint">przewiń, aby wejść ↓</span>
  </div>
</div>
<?php endif; ?>

<!-- ==================== NAV ==================== -->
<nav class="nav" aria-label="Nawigacja główna">
  <div class="nav-inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-logo" aria-label="Czarodziejski Dworek — strona główna">
      <img src="<?php echo $t; ?>/assets/img/logo.png?v=3" alt="Czarodziejski Dworek" width="71" height="46" class="nav-logo-mark">
    </a>
    <div class="nav-links">
      <a href="<?php echo esc_url( home_url('/') ); ?>"<?php echo cd_cur( is_front_page() ); ?>>Start</a>
      <a href="<?php echo esc_url( home_url('/o-nas/') ); ?>"<?php echo cd_cur( is_page('o-nas') ); ?>>O nas</a>
      <a href="<?php echo esc_url( home_url('/program/') ); ?>"<?php echo cd_cur( is_page('program') ); ?>>Program</a>
      <a href="<?php echo esc_url( home_url('/wczesne-wspomaganie-rozwoju/') ); ?>"<?php echo cd_cur( is_page('wczesne-wspomaganie-rozwoju') ); ?>>WWR</a>
      <a href="<?php echo esc_url( home_url('/nauczyciele/') ); ?>"<?php echo cd_cur( is_page('nauczyciele') ); ?>>Nauczyciele</a>
      <a href="<?php echo esc_url( home_url('/blog/') ); ?>"<?php echo cd_cur( is_page('blog') || is_singular('post') || is_page( array('wpis-dzien-otwarty','wpis-zajecia-francuski','wpis-szkola-myslenia-pozytywnego') ) ); ?>>Blog</a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>"<?php echo cd_cur( is_page('galeria') ); ?>>Galeria</a>
      <a href="<?php echo esc_url( admin_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="Zdalne — logowanie i edycja strony (otwiera się w nowej karcie)">Zdalne<svg class="ext-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>"<?php echo cd_cur( is_page('kontakt') ); ?>>Kontakt</a>
    </div>
    <div class="nav-actions">
      <a href="tel:+48690629501" class="nav-tel" aria-label="Zadzwoń: 690 629 501">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </a>
      <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="nav-cta">Zapisz się</a>
    </div>
    <button class="nav-burger" aria-label="Otwórz menu" aria-expanded="false">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
  </div>
</nav>

<!-- Mobile Drawer -->
<div class="drawer-backdrop" aria-hidden="true"></div>
<aside class="drawer" aria-label="Menu mobilne">
  <div class="drawer-header">
    <span style="font-family:var(--font-display);font-weight:600;font-size:1.4rem">Menu</span>
    <button class="drawer-close" aria-label="Zamknij menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>
  <nav class="drawer-nav">
    <a href="<?php echo esc_url( home_url('/') ); ?>"<?php echo cd_cur( is_front_page() ); ?>>Start</a>
    <a href="<?php echo esc_url( home_url('/o-nas/') ); ?>"<?php echo cd_cur( is_page('o-nas') ); ?>>O nas</a>
    <a href="<?php echo esc_url( home_url('/program/') ); ?>"<?php echo cd_cur( is_page('program') ); ?>>Program</a>
    <a href="<?php echo esc_url( home_url('/wczesne-wspomaganie-rozwoju/') ); ?>"<?php echo cd_cur( is_page('wczesne-wspomaganie-rozwoju') ); ?>>WWR</a>
    <a href="<?php echo esc_url( home_url('/nauczyciele/') ); ?>"<?php echo cd_cur( is_page('nauczyciele') ); ?>>Nauczyciele</a>
    <a href="<?php echo esc_url( home_url('/blog/') ); ?>"<?php echo cd_cur( is_page('blog') || is_singular('post') || is_page( array('wpis-dzien-otwarty','wpis-zajecia-francuski','wpis-szkola-myslenia-pozytywnego') ) ); ?>>Blog</a>
    <a href="<?php echo esc_url( home_url('/galeria/') ); ?>"<?php echo cd_cur( is_page('galeria') ); ?>>Galeria</a>
    <a href="<?php echo esc_url( admin_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="Zdalne — logowanie i edycja strony">Zdalne ↗</a>
    <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>"<?php echo cd_cur( is_page('kontakt') ); ?>>Kontakt</a>
  </nav>
  <div class="drawer-foot">
    <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-primary btn-full">Zapisz się</a>
    <a href="tel:+48690629501" class="btn btn-light btn-full">Zadzwoń: 690 629 501</a>
  </div>
</aside>

<div class="intro-runway" aria-hidden="true"></div>
