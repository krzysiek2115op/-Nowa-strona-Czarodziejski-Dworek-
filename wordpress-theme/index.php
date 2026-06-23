<?php
/**
 * Fallback / archiwum (kategoria, tag, wyniki wyszukiwania, data).
 * Schludna lista kart wpisów — spójna z page-blog.php.
 *
 * @package czarodziejski-dworek
 */

get_header();
$t = get_template_directory_uri();
$arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>';

if ( is_category() )      { $arch_h = single_cat_title( '', false ); $arch_eyebrow = 'Kategoria'; }
elseif ( is_tag() )       { $arch_h = single_tag_title( '', false ); $arch_eyebrow = 'Tag'; }
elseif ( is_search() )    { $arch_h = 'Wyniki wyszukiwania'; $arch_eyebrow = get_search_query() ? '„' . esc_html( get_search_query() ) . '”' : 'Szukaj'; }
elseif ( is_date() )      { $arch_h = 'Archiwum'; $arch_eyebrow = 'Wpisy'; }
else                      { $arch_h = 'Wpisy'; $arch_eyebrow = 'Blog'; }
?>
<main id="main-content">

<!-- Hero archiwum -->
<section class="page-hero" aria-labelledby="arch-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page"><?php echo esc_html( $arch_h ); ?></li></ol></nav>
    <div class="reveal" style="max-width:55ch">
      <p class="eyebrow"><?php echo esc_html( $arch_eyebrow ); ?></p>
      <h1 id="arch-title"><?php echo esc_html( $arch_h ); ?></h1>
    </div>
  </div>
</section>

<!-- Lista wpisów -->
<section class="section" aria-labelledby="arch-list-h">
  <div class="container">
    <h2 id="arch-list-h" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">Lista wpisów</h2>
    <?php if ( have_posts() ) : ?>
    <div class="grid cols-3 stagger">
      <?php while ( have_posts() ) : the_post();
        $pid = get_the_ID();
        $pcat = get_the_category( $pid ); $pc = $pcat ? $pcat[0] : null; ?>
      <a href="<?php the_permalink(); ?>" class="blog-card" data-cat="<?php echo $pc ? esc_attr( $pc->slug ) : ''; ?>">
        <div class="blog-card-img"><img src="<?php echo esc_url( cd_img_url( $pid, 'large' ) ); ?>" width="500" height="500" loading="lazy" alt="<?php echo esc_attr( get_the_title() ); ?>"></div>
        <div class="blog-card-body"><?php if ( $pc ) : ?><span class="blog-cat"><?php echo esc_html( $pc->name ); ?></span><?php endif; ?><h3><?php echo esc_html( get_the_title() ); ?></h3><span class="link-arrow">Czytaj więcej<?php echo $arrow; ?></span></div>
      </a>
      <?php endwhile; ?>
    </div>
    <?php else : ?>
    <p class="text-center reveal" style="color:var(--ink-soft)">Brak wpisów w tej kategorii.</p>
    <?php endif; ?>
    <p class="text-center reveal" style="margin-top:34px"><a href="<?php echo esc_url( home_url('/blog/') ); ?>">← Wszystkie wpisy</a></p>
  </div>
</section>

</main>
<?php
get_footer();
