<?php
/* Szablon podstrony: blog — listing z natywnych Wpisów (edytowalne w panelu) */
get_header();
$t = get_template_directory_uri();
$arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>';
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero" aria-labelledby="blog-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Blog</li></ol></nav>
    <div class="reveal" style="max-width:55ch">
      <h1 id="blog-title">Blog</h1>
      <p class="lead">Aktualności, wydarzenia i ciekawostki z życia Czarodziejskiego Dworku</p>
    </div>
  </div>
</section>

<?php
$feat = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 1, 'no_found_rows' => true ) );
if ( $feat->have_posts() ) : $feat->the_post();
  $fid  = get_the_ID();
  $flead = get_post_meta( $fid, '_cd_lead', true );
  if ( ! $flead ) { $flead = get_the_excerpt(); }
?>
<!-- S2: Featured post -->
<section id="blog-featured" class="section tint-gold" aria-labelledby="feat-h">
  <div class="container">
    <div class="split">
      <div class="arch-editorial reveal reveal--left">
        <img src="<?php echo esc_url( cd_img_url( $fid, 'large' ) ); ?>" width="800" height="800" loading="lazy" alt="<?php echo esc_attr( get_the_title() ); ?>">
      </div>
      <div class="reveal">
        <?php $fcat = get_the_category( $fid ); if ( $fcat ) : ?><a class="blog-cat" href="<?php echo esc_url( get_category_link( $fcat[0]->term_id ) ); ?>"><?php echo esc_html( $fcat[0]->name ); ?></a><?php endif; ?>
        <p class="eyebrow">Najnowszy wpis</p>
        <h2 id="feat-h"><?php echo esc_html( get_the_title() ); ?></h2>
        <p class="lead"><?php echo esc_html( $flead ); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-lg">Czytaj więcej<?php echo $arrow; ?></a>
      </div>
    </div>
  </div>
</section>
<?php endif; wp_reset_postdata(); ?>

<!-- S3: Posts grid -->
<section class="section" aria-labelledby="posts-h">
  <div class="container">
    <div class="section-head center reveal">
      <h2 id="posts-h">Wszystkie wpisy</h2>
    </div>
    <?php
    $cd_blog_cats = get_categories( array( 'hide_empty' => true, 'orderby' => 'name' ) );
    if ( count( $cd_blog_cats ) > 1 ) : ?>
    <div class="blog-filter reveal" role="group" aria-label="Filtruj wpisy według kategorii">
      <button type="button" class="blog-filter-btn is-active" data-filter="all" aria-pressed="true">Wszystko</button>
      <?php foreach ( $cd_blog_cats as $cd_c ) : ?>
      <button type="button" class="blog-filter-btn" data-filter="<?php echo esc_attr( $cd_c->slug ); ?>" aria-pressed="false"><?php echo esc_html( $cd_c->name ); ?></button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="grid cols-3 stagger">
      <?php
      $all = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1, 'no_found_rows' => true ) );
      while ( $all->have_posts() ) : $all->the_post(); $pid = get_the_ID();
        $pcat = get_the_category( $pid ); $pc = $pcat ? $pcat[0] : null; ?>
      <a href="<?php the_permalink(); ?>" class="blog-card" data-cat="<?php echo $pc ? esc_attr( $pc->slug ) : ''; ?>">
        <div class="blog-card-img"><img src="<?php echo esc_url( cd_img_url( $pid, 'large' ) ); ?>" width="500" height="500" loading="lazy" alt="<?php echo esc_attr( get_the_title() ); ?>"></div>
        <div class="blog-card-body"><?php if ( $pc ) : ?><span class="blog-cat"><?php echo esc_html( $pc->name ); ?></span><?php endif; ?><h3><?php echo esc_html( get_the_title() ); ?></h3><span class="link-arrow">Czytaj więcej<?php echo $arrow; ?></span></div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!-- S4: Social -->
<section class="section deep" aria-labelledby="uni3-h">
  <div class="container text-center">
    <p class="eyebrow reveal" style="justify-content:center">Bądź na bieżąco</p>
    <h2 id="uni3-h" class="reveal">Śledź nas w social mediach</h2>
    <p class="lead reveal">Najświeższe chwile z życia przedszkola — zdjęcia, wydarzenia i ciekawostki — publikujemy na Facebooku i Instagramie.</p>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-top:28px" class="reveal">
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="btn btn-ghost">Facebook</a>
      <a href="https://www.instagram.com/czarodziejski_dworek/" target="_blank" rel="noopener" class="btn btn-ghost">Instagram</a>
    </div>
  </div>
</section>

<!-- S5: CTA -->
<section class="cta-band" aria-labelledby="cta-blog-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-blog-h">Chcesz wiedzieć więcej?</h2>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Umów wizytę</a><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>" class="btn btn-light">Zadzwoń: <?php echo esc_html( cd_opt('cd_tel1') ); ?></a></div>
  </div>
</section>


<script>
(function(){
  var bar=document.querySelector('.blog-filter'); if(!bar) return;
  var cards=Array.prototype.slice.call(document.querySelectorAll('.blog-card'));
  var feat=document.getElementById('blog-featured');
  var btns=Array.prototype.slice.call(bar.querySelectorAll('[data-filter]'));
  bar.addEventListener('click',function(e){
    var b=e.target.closest('[data-filter]'); if(!b) return;
    var f=b.getAttribute('data-filter');
    btns.forEach(function(x){var on=x===b;x.classList.toggle('is-active',on);x.setAttribute('aria-pressed',on?'true':'false');});
    cards.forEach(function(c){var show=(f==='all')||(c.getAttribute('data-cat')===f);c.classList.toggle('is-hidden',!show);if(show){c.classList.remove('cd-anim');void c.offsetWidth;c.classList.add('cd-anim');}});
    if(feat) feat.classList.toggle('is-hidden',f!=='all');
  });
})();
</script>

</main>
<?php get_footer();
