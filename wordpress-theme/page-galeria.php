<?php
/* Szablon podstrony: galeria — zdjęcia z CPT „Galeria” (edytowalne w panelu) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero" aria-labelledby="gal-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Galeria</li></ol></nav>
    <div class="reveal" style="max-width:55ch">
      <h1 id="gal-title">Galeria</h1>
      <p class="lead">Zajrzyj do naszego przedszkola — sale, plac zabaw, codzienność i radość dzieci</p>
    </div>
  </div>
</section>

<!-- S2: Gallery grid -->
<section class="section" aria-labelledby="grid-h">
  <div class="container">
    <h2 id="grid-h" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">Zdjęcia z przedszkola</h2>
    <!-- Zdjęcie-bohater -->
    <figure class="gal-featured reveal">
      <img src="<?php echo $t; ?>/assets/img/gal-DSCN8672.webp" width="800" height="600" loading="eager" fetchpriority="high" alt="Zielony, ogrodzony plac zabaw przedszkola Czarodziejski Dworek wśród drzew">
      <div class="gal-featured-scrim" aria-hidden="true"></div>
      <figcaption class="gal-featured-cap"><p class="eyebrow">Zajrzyj do nas</p><h3>Zielony, bezpieczny teren tuż przy parku Moczydło</h3></figcaption>
    </figure>

    <!-- Filtr kategorii -->
    <div class="gal-filter" role="group" aria-label="Filtruj galerię według kategorii">
      <button type="button" class="gal-filter-btn is-active" data-filter="all" aria-pressed="true">Wszystko</button>
      <button type="button" class="gal-filter-btn" data-filter="sale" aria-pressed="false">Sale</button>
      <button type="button" class="gal-filter-btn" data-filter="kaciki" aria-pressed="false">Kąciki</button>
      <button type="button" class="gal-filter-btn" data-filter="lazienki" aria-pressed="false">Łazienki</button>
      <button type="button" class="gal-filter-btn" data-filter="plac" aria-pressed="false">Plac zabaw</button>
    </div>

    <?php
    $clusters = array(
      'sale'     => 'Sale i przestrzenie edukacyjne',
      'kaciki'   => 'Kąciki i pracownie',
      'lazienki' => 'Łazienki i szatnie',
      'plac'     => 'Plac zabaw i ogród',
    );
    foreach ( $clusters as $slug => $title ) :
      $q = cd_galeria_query( $slug );
      if ( ! $q->have_posts() ) { wp_reset_postdata(); continue; }
    ?>
    <!-- Klaster: <?php echo esc_html( $title ); ?> -->
    <div class="gal-cluster reveal" data-cat="<?php echo esc_attr( $slug ); ?>">
      <div class="gal-cluster-head"><h3><?php echo esc_html( $title ); ?></h3></div>
      <div class="gallery-grid stagger">
        <?php
        while ( $q->have_posts() ) {
          $q->the_post();
          $id   = get_the_ID();
          $cap  = get_the_title();
          $alt  = get_post_meta( $id, '_cd_alt', true );
          if ( ! $alt ) { $alt = $cap; }
          $size = get_post_meta( $id, '_cd_rozmiar', true );
          $url  = cd_img_url( $id, 'large' );
          echo '<div class="gtile' . ( $size ? ' ' . esc_attr( $size ) : '' ) . '" tabindex="0" role="button" aria-label="Powiększ: ' . esc_attr( $cap ) . '"><img src="' . esc_url( $url ) . '" width="800" height="600" loading="lazy" alt="' . esc_attr( $alt ) . '"><span class="gcap">' . esc_html( $cap ) . '</span></div>';
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Lightbox -->
<div class="lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Podgląd zdjęcia">
  <button class="lightbox-close" aria-label="Zamknij podgląd"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
  <button class="lightbox-prev" aria-label="Poprzednie zdjęcie"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg></button>
  <button class="lightbox-next" aria-label="Następne zdjęcie"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></button>
  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Powiększone zdjęcie z galerii">
</div>

<!-- S3: Certificates -->
<section class="section deep" aria-labelledby="cert-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Wyróżnienia</p>
      <h2 id="cert-h">Certyfikaty i wyróżnienia</h2>
    </div>
    <div class="grid cols-2 stagger" style="max-width:700px;margin-inline:auto">
      <div class="card text-center">
        <img src="<?php echo $t; ?>/assets/img/karta-duzej-rodziny.webp" width="200" height="200" loading="lazy" alt="Logo Karty Dużej Rodziny" style="margin:0 auto 16px;width:120px;height:auto;border-radius:var(--radius-md)">
        <h3>Karta Dużej Rodziny</h3>
        <p style="color:var(--ink-soft);margin-top:6px">Honorujemy Kartę Dużej Rodziny</p>
      </div>
      <div class="card text-center">
        <img src="<?php echo $t; ?>/assets/img/certyfikat-nvc.webp" width="200" height="200" loading="lazy" alt="Certyfikat NVC — Porozumienie bez Przemocy" style="margin:0 auto 16px;width:120px;height:auto;border-radius:var(--radius-md)">
        <h3>Certyfikat NVC</h3>
        <p style="color:var(--ink-soft);margin-top:6px">Certyfikat Porozumienia bez Przemocy</p>
      </div>
    </div>
  </div>
</section>

<!-- S4: CTA -->
<section class="cta-band" aria-labelledby="cta-gal-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-gal-h">Umów wizytę</h2>
    <p class="cta-info">Przekonaj się na własne oczy — zapraszamy do odwiedzenia Czarodziejskiego Dworku.</p>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Umów wizytę</a><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>" class="btn btn-light">Zadzwoń: <?php echo esc_html( cd_opt('cd_tel1') ); ?></a></div>
  </div>
</section>


</main>
<?php get_footer();
