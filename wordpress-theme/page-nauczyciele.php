<?php
/* Szablon podstrony: nauczyciele — kadra z CPT „Nauczyciele” (edytowalne w panelu) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero tint-plum" aria-labelledby="page-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Nauczyciele</li></ol></nav>
    <div class="page-hero-grid">
      <div class="reveal">
        <h1 id="page-title">Stała, zgrana drużyna</h1>
        <p class="lead">Wykwalifikowana, zgrana kadra — wszyscy specjaliści „na miejscu", codziennie do dyspozycji dzieci i rodziców.</p>
        <div class="hero-stats">
          <div><span class="hs-num">18</span><span class="hs-lab">specjalistów</span></div>
          <div><span class="hs-num">22+</span><span class="hs-lab">lata doświadczenia</span></div>
          <div><span class="hs-num">100%</span><span class="hs-lab">na miejscu</span></div>
        </div>
      </div>
      <div class="page-hero-media reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/codziennosc.webp" width="800" height="533" loading="eager" fetchpriority="high" alt="Nauczycielka pracująca indywidualnie z dzieckiem w Czarodziejskim Dworku">
      </div>
    </div>
  </div>
</section>

<!-- S2: Intro -->
<section class="section" aria-labelledby="team-intro">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Nasz zespół</p>
      <h2 id="team-intro">Poznaj naszych nauczycieli</h2>
      <p class="lead">Bardzo dobrze wykwalifikowana kadra, wszyscy specjaliści "na miejscu" i do dyspozycji dzieci i rodziców.</p>
    </div>
  </div>
</section>

<!-- S3: Dyrekcja -->
<section class="section tint-gold" aria-labelledby="dir-h">
  <div class="container">
    <div class="section-head center reveal"><p class="eyebrow">Dyrekcja</p><h2 id="dir-h">Dyrektor przedszkola</h2></div>
    <div class="stagger" style="max-width:720px;margin-inline:auto">
      <?php $q = cd_kadra_query( 'dyrekcja' ); while ( $q->have_posts() ) { $q->the_post(); cd_kadra_card( get_the_ID(), true ); } wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!-- S4: Edukacja -->
<section class="section" aria-labelledby="edu-h">
  <div class="container">
    <div class="section-head center reveal"><p class="eyebrow">Edukacja</p><h2 id="edu-h">Zespół pedagogiczny</h2></div>
    <div class="grid cols-3 stagger">
      <?php $q = cd_kadra_query( 'edukacja' ); while ( $q->have_posts() ) { $q->the_post(); cd_kadra_card( get_the_ID() ); } wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!-- S5: Zespół terapeutyczny -->
<section class="section deep" aria-labelledby="ter-h">
  <div class="container">
    <div class="section-head center reveal"><p class="eyebrow">Terapia i wsparcie</p><h2 id="ter-h">Zespół terapeutyczny</h2></div>
    <div class="grid cols-4 stagger">
      <?php $q = cd_kadra_query( 'terapia' ); while ( $q->have_posts() ) { $q->the_post(); cd_kadra_card( get_the_ID() ); } wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!-- S6: Specjaliści i lektorzy -->
<section class="section tint-plum" aria-labelledby="spec-h">
  <div class="container">
    <div class="section-head center reveal"><p class="eyebrow">Języki, ruch i muzyka</p><h2 id="spec-h">Specjaliści i lektorzy</h2></div>
    <div class="grid cols-4 stagger">
      <?php $q = cd_kadra_query( 'specjalisci' ); while ( $q->have_posts() ) { $q->the_post(); cd_kadra_card( get_the_ID() ); } wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!-- S11: CTA -->
<section class="cta-band" aria-labelledby="cta-team-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-team-h">Cała kadra na miejscu</h2>
    <p class="cta-info">Wszyscy specjaliści dostępni codziennie — nie musisz wozić dziecka na dodatkowe terapie.</p>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Umów wizytę</a><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>" class="btn btn-light">Zadzwoń: <?php echo esc_html( cd_opt('cd_tel1') ); ?></a></div>
  </div>
</section>


</main>
<?php get_footer();
