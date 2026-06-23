<?php
/* 404 */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<section class="page-hero tint-plum" aria-labelledby="err-title" style="min-height:60vh;display:flex;align-items:center">
  <div class="container text-center">
    <p class="eyebrow" style="justify-content:center">Błąd 404</p>
    <h1 id="err-title">Nie znaleziono strony</h1>
    <p class="lead" style="max-width:50ch;margin-inline:auto;margin-top:16px">Strona, której szukasz, nie istnieje lub została przeniesiona. Wróć na stronę główną lub skontaktuj się z nami.</p>
    <div style="display:flex;flex-wrap:wrap;gap:14px;justify-content:center;margin-top:32px">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary">Strona główna<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
      <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-light">Kontakt</a>
    </div>
  </div>
</section>


</main>
<?php get_footer();
