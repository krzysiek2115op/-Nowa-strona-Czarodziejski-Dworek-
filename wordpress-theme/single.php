<?php
/* Pojedynczy wpis bloga (1:1 ze statycznymi wpis-*.html) */
get_header();
$t = get_template_directory_uri();
while ( have_posts() ) : the_post();
  $id     = get_the_ID();
  $kicker = get_post_meta( $id, '_cd_kicker', true );
  if ( ! $kicker ) {
    $cats = get_the_category();
    $kicker = $cats ? $cats[0]->name : 'Aktualności';
  }
  $lead = get_post_meta( $id, '_cd_lead', true );
  if ( ! $lead ) { $lead = get_the_excerpt(); }
  $img = cd_img_url( $id, 'large' );
?>
<main id="main-content">

<section class="page-hero tint-gold" aria-labelledby="post-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page"><?php echo esc_html( get_the_title() ); ?></li></ol></nav>
    <div class="reveal" style="max-width:60ch">
      <?php $scat = get_the_category(); if ( $scat ) : ?><a class="blog-cat" href="<?php echo esc_url( get_category_link( $scat[0]->term_id ) ); ?>"><?php echo esc_html( $scat[0]->name ); ?></a><?php endif; ?>
      <p class="eyebrow"><?php echo esc_html( $kicker ); ?> · <?php echo esc_html( cd_pl_date( $id ) ); ?></p>
      <h1 id="post-title"><?php echo esc_html( get_the_title() ); ?></h1>
      <?php if ( $lead ) : ?><p class="lead"><?php echo esc_html( $lead ); ?></p><?php endif; ?>
    </div>
  </div>
</section>

<section class="section" aria-labelledby="post-body-h">
  <div class="container">
    <h2 id="post-body-h" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">Treść wpisu</h2>
    <article style="max-width:74ch;margin-inline:auto">
      <?php if ( $img ) : ?><div class="arch-editorial reveal" style="margin-bottom:34px"><img src="<?php echo esc_url( $img ); ?>" width="800" height="800" loading="eager" alt="<?php echo esc_attr( get_the_title() ); ?>"></div><?php endif; ?>
      <?php the_content(); ?>
      <p class="reveal" style="margin-top:32px"><a href="<?php echo esc_url( home_url('/blog/') ); ?>">← Wróć do bloga</a></p>
    </article>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-post-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-post-h">Chcesz nas odwiedzić?</h2>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Umów wizytę</a><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>" class="btn btn-light">Zadzwoń: <?php echo esc_html( cd_opt('cd_tel1') ); ?></a></div>
  </div>
</section>

</main>
<?php endwhile; get_footer();
