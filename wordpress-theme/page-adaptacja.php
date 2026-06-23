<?php
/* Szablon podstrony: adaptacja (port 1:1 ze statycznej) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero tint-gold" aria-labelledby="adapt-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Adaptacja</li></ol></nav>
    <div class="page-hero-grid">
      <div class="reveal">
        <p class="eyebrow">Pierwsze kroki</p>
        <h1 id="adapt-title">Adaptacja w przedszkolu</h1>
        <p class="lead" style="margin-top:18px">Pierwsze dni w przedszkolu to ważny moment dla całej rodziny. Organizujemy bezpłatne, sobotnie zajęcia adaptacyjne, dzięki którym dziecko spokojnie pozna sale, kadrę i rytm dnia — w bezpiecznym towarzystwie rodzica.</p>
        <div class="hero-facts">
          <span>Bezpłatne zajęcia</span><span>W soboty</span><span>Z rodzicem</span><span>Najmłodszy rocznik</span>
        </div>
        <div style="display:flex;flex-wrap:wrap;gap:14px;margin-top:26px">
          <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-primary">Zapisz się na adaptację<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
          <a href="tel:+48690629501" class="btn btn-light">Zadzwoń: 690 629 501</a>
        </div>
      </div>
      <div class="page-hero-media reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/codziennosc.webp" width="408" height="510" loading="eager" fetchpriority="high" alt="Nauczycielka z dzieckiem podczas zajęć w przedszkolu Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S2: Czym jest adaptacja -->
<section class="section" aria-labelledby="czym-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Łagodny start</p>
      <h2 id="czym-h">Spokojne wejście w przedszkolne życie</h2>
      <p class="lead">Adaptacja to czas, w którym dziecko stopniowo oswaja się z nowym miejscem, opiekunami i rówieśnikami. Robimy wszystko, by ten moment był łagodny — bez pośpiechu, z poszanowaniem tempa każdego malucha i w bliskiej współpracy z rodzicami.</p>
    </div>
    <div class="highlight-box reveal" style="max-width:560px;margin-inline:auto">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      Bezpłatne sobotnie zajęcia adaptacyjne — dziecko poznaje przedszkole w towarzystwie rodzica, jeszcze zanim zacznie do niego uczęszczać.
    </div>
  </div>
</section>

<!-- S3: Jak wygląda adaptacja -->
<section class="section tint-plum" aria-labelledby="jak-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Jak to wygląda</p>
        <h2 id="jak-h">Zajęcia adaptacyjne krok po kroku</h2>
        <ul style="display:flex;flex-direction:column;gap:14px;margin-top:18px">
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Dziecko poznaje sale, zabawki i kącik, w którym będzie spędzać czas</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Spotyka nauczycieli i specjalistów w spokojnej, kameralnej atmosferze</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Poznaje rytm dnia i pierwsze przedszkolne rytuały, bawiąc się z rówieśnikami</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Rodzic jest blisko — daje dziecku poczucie bezpieczeństwa</li>
        </ul>
      </div>
      <div class="arch-editorial reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/gal-DSCN2173.webp" width="800" height="600" loading="lazy" alt="Kolorowy kącik zabaw w sali przedszkola Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S4: Jak przygotować dziecko -->
<section class="section deep" aria-labelledby="przygot-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Dla rodziców</p>
      <h2 id="przygot-h">Jak przygotować dziecko do przedszkola</h2>
      <p class="lead">Kilka prostych kroków sprawi, że pierwsze dni będą spokojniejsze — dla dziecka i dla Was.</p>
    </div>
    <div class="grid cols-3 stagger">
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">1</span><h3 style="font-size:1.1rem">Mów pozytywnie</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Opowiadaj o przedszkolu z radością — buduj dobre skojarzenia z nowym miejscem.</p></div>
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">2</span><h3 style="font-size:1.1rem">Ćwiczcie samodzielność</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Jedzenie, ubieranie i korzystanie z toalety — drobne umiejętności dodają dziecku pewności.</p></div>
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">3</span><h3 style="font-size:1.1rem">Ustal rytuał pożegnania</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Krótkie, czułe i przewidywalne pożegnanie pomaga dziecku poczuć się bezpiecznie.</p></div>
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">4</span><h3 style="font-size:1.1rem">Trenujcie krótkie rozłąki</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Czas u babci czy znajomych oswaja z rozstaniem i powrotem rodzica.</p></div>
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">5</span><h3 style="font-size:1.1rem">Zadbajcie o rytm dnia</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Stałe pory snu i posiłków ułatwiają dziecku wejście w przedszkolny plan dnia.</p></div>
      <div class="reveal" style="background:var(--white);border:1px solid rgba(46,36,32,.08);border-radius:var(--radius-md);padding:28px 24px;box-shadow:0 22px 44px -30px rgba(94,45,64,.22)"><span aria-hidden="true" style="display:flex;width:46px;height:46px;border-radius:50%;background:var(--brand);color:#fff;font-family:var(--font-display);font-size:1.25rem;font-weight:600;align-items:center;justify-content:center;margin-bottom:16px">6</span><h3 style="font-size:1.1rem">Pozwól zabrać przytulankę</h3><p style="color:var(--ink-soft);font-size:.95rem;margin-top:8px">Ulubiona maskotka to kawałek domu, który daje poczucie bezpieczeństwa.</p></div>
    </div>
  </div>
</section>

<!-- S5: Wsparcie rodziców -->
<section class="section" aria-labelledby="wsparcie-h">
  <div class="container">
    <div class="split reverse">
      <div class="arch-editorial reveal reveal--left">
        <img src="<?php echo $t; ?>/assets/img/gal-DSCN8677.webp" width="800" height="600" loading="lazy" alt="Duży, ogrodzony plac zabaw przy przedszkolu Czarodziejski Dworek">
      </div>
      <div class="reveal">
        <p class="eyebrow">Jesteśmy z Wami</p>
        <h2 id="wsparcie-h">Jak wspieramy rodziców</h2>
        <ul style="display:flex;flex-direction:column;gap:14px;margin-top:18px">
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Stały kontakt z wychowawcą i bieżące informacje o dziecku</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Konsultacje z psychologiem i specjalistami dostępnymi na miejscu</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Stopniowe wydłużanie pobytu, dostosowane do tempa dziecka</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Bezpieczny, ogrodzony teren i duży plac zabaw, na którym dziecko czuje się swobodnie</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- S6: Terminy -->
<section class="section deep" aria-labelledby="terminy-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Terminy</p>
      <h2 id="terminy-h">Kiedy odbywają się zajęcia adaptacyjne</h2>
      <p class="lead">Bezpłatne zajęcia adaptacyjne organizujemy w soboty dla najmłodszego rocznika i rodziców. Terminy na nowy rok szkolny ogłaszamy na naszym profilu na Facebooku oraz na stronie. Skontaktuj się z nami, aby poznać najbliższy termin i zarezerwować miejsce.</p>
    </div>
    <div class="text-center reveal"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Zapytaj o najbliższy termin<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a></div>
  </div>
</section>

<!-- S7: FAQ -->
<section class="section" aria-labelledby="faq-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Pytania rodziców</p>
      <h2 id="faq-h">Najczęstsze pytania o adaptację</h2>
    </div>
    <div class="grid cols-2 stagger" style="align-items:start">
      <div class="activity-tile"><h3>Czy zajęcia adaptacyjne są płatne?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="afaq-1">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="afaq-1"><div><p>Nie. Sobotnie zajęcia adaptacyjne są bezpłatne — to nasz sposób na łagodne, spokojne wejście dziecka w życie przedszkola.</p></div></div></div>
      <div class="activity-tile"><h3>Kiedy odbywają się zajęcia?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="afaq-2">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="afaq-2"><div><p>W soboty. Terminy na nowy rok szkolny ogłaszamy na Facebooku i na stronie internetowej. Zadzwoń lub napisz, a podamy najbliższy termin.</p></div></div></div>
      <div class="activity-tile"><h3>Czy rodzic jest obecny podczas adaptacji?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="afaq-3">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="afaq-3"><div><p>Tak. Na zajęciach adaptacyjnych dziecko poznaje sale, kadrę i rytm dnia w bezpiecznym towarzystwie rodzica.</p></div></div></div>
      <div class="activity-tile"><h3>Dla jakiego wieku są zajęcia?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="afaq-4">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="afaq-4"><div><p>Kierujemy je do dzieci z najmłodszego rocznika, które rozpoczynają edukację przedszkolną, oraz ich rodziców.</p></div></div></div>
    </div>
  </div>
</section>

<!-- S8: CTA -->
<section class="cta-band" aria-labelledby="cta-adapt-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-adapt-h">Umów się na zajęcia adaptacyjne</h2>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Skontaktuj się z nami</a><a href="tel:+48690629501" class="btn btn-light">Zadzwoń: 690 629 501</a></div>
  </div>
</section>


</main>
<?php get_footer();
