<?php
/* Template Name nie potrzebny — to front-page */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- ==================== S1: HERO ==================== -->
<section class="hero hero-photo" aria-labelledby="hero-title">
  <!-- Animowane tło: zdjęcia dzieci (Ken Burns + crossfade) -->
  <div class="hero-slides" aria-hidden="true">
    <div class="hero-slide" style="background-image:url('<?php echo $t; ?>/assets/img/dzieci-zabawa.webp')"></div>
    <div class="hero-slide" style="background-image:url('<?php echo $t; ?>/assets/img/gal-DSCN2164.webp')"></div>
    <div class="hero-slide" style="background-image:url('<?php echo $t; ?>/assets/img/gal-DSCN2147.webp')"></div>
    <div class="hero-slide" style="background-image:url('<?php echo $t; ?>/assets/img/gal-DSCN2172.webp')"></div>
  </div>
  <div class="hero-scrim" aria-hidden="true"></div>
  <div class="hero-sparkles" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span><span></span></div>

  <div class="container">
    <div class="hero-content">
      <p class="hero-badge hero-anim hero-anim-1"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.45 4 2.55 6.1 6 6.5-3.45.4-5.55 2.5-6 6.5-.45-4-2.55-6.1-6-6.5 3.45-.4 5.55-2.5 6-6.5z"/></svg>Przedszkole integracyjne językowo-muzyczne · Warszawa, Wola</p>
      <h1 id="hero-title" class="hero-title hero-anim hero-anim-2">Tu każda zabawa<br>jest <span class="hero-accent">nauką</span></h1>
      <p class="hero-brandline hero-anim hero-anim-2b">Czarodziejski Dworek · od 2003 roku</p>
      <p class="hero-lead hero-anim hero-anim-3">Odkrywamy i&nbsp;pielęgnujemy mocne strony Twojego dziecka — w&nbsp;małych grupach, z&nbsp;basenem, językami i&nbsp;18 specjalistami na&nbsp;miejscu.</p>
      <div class="hero-ctas hero-anim hero-anim-4">
        <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-primary">Zapisz się na adaptację<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
        <a href="tel:+48690629501" class="btn btn-light"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:18px;height:18px"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>Zadzwoń: 690 629 501</a>
      </div>
      <ul class="hero-proof hero-anim hero-anim-4b" aria-label="Dowody zaufania">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>od 2003</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>nr 111/PN</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>18 specjalistów</li>
      </ul>
    </div>
  </div>

  <div class="hero-overlay-card hero-anim hero-anim-6">
    <span class="value">7:00–18:00</span>
    <span class="label">codziennie dla Twojego dziecka</span>
    <div class="gold-line" aria-hidden="true"></div>
    <span class="value" style="font-size:.95rem">Małe grupy do 14 + 2</span>
    <span class="label">nauczycieli w każdej grupie</span>
  </div>

  <a class="hero-scrolldown" href="#about-place" aria-label="Przewiń do treści">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
  </a>
</section>

<!-- ==================== S2: TRUST BAR ==================== -->
<div class="trust-bar" role="region" aria-label="Fakty o przedszkolu">
  <div class="container">
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Od 2003 roku</div>
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>Nr ewidencji 111/PN</div>
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>18 specjalistów na miejscu</div>
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>Do 14 dzieci + 2 nauczycieli</div>
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M12 12h.01"/></svg>Karta Dużej Rodziny</div>
    <div class="trust-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>Certyfikat NVC</div>
  </div>
</div>

<!-- ==================== S3: INTRODUCTION ==================== -->
<section class="section" aria-labelledby="about-place">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">O miejscu</p>
        <h2 id="about-place">Wyjątkowe miejsce dla Twojego dziecka</h2>
        <p class="lead">Czarodziejski Dworek to przedszkole, w którym odkryte i docenione zostaną mocne strony Twojego dziecka. Naszym celem jest dbanie o&nbsp;jego wszechstronny rozwój, zaszczepienie w&nbsp;nim pasji twórczych, rozwijanie zdolności i&nbsp;wspomaganie harmonijnego rozwoju.</p>
        <a href="<?php echo esc_url( home_url('/o-nas/') ); ?>" class="btn btn-ghost mt-lg">Dowiedz się więcej<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
      </div>
      <div class="arch-editorial reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/interior-sala.webp"
             srcset="<?php echo $t; ?>/assets/img/interior-sala-600.webp 600w, <?php echo $t; ?>/assets/img/interior-sala.webp 1000w"
            
             width="1000" height="750" loading="lazy"
             alt="Przestronna sala edukacyjna w przedszkolu Czarodziejski Dworek przy Górczewskiej 89">
      </div>
    </div>
  </div>
</section>

<!-- ==================== S4: ACTIVITIES ==================== -->
<section class="section deep" aria-labelledby="activities-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">W ramach czesnego</p>
      <h2 id="activities-heading">Zajęcia wliczone w czesne</h2>
    </div>
    <div class="grid cols-4 stagger">
      <a class="activity-tile" href="<?php echo esc_url( home_url('/program/') ); ?>">
        <div class="activity-media"><img src="<?php echo $t; ?>/assets/img/basen.webp" alt="Dzieci na zajęciach na basenie" loading="lazy" width="800" height="600"></div>
        <h3>Basen</h3>
        <p>Nauka pływania w ramach czesnego — rozwój motoryki i pewności siebie w wodzie.</p>
        <span class="activity-link">Poznaj szczegóły<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span>
      </a>
      <a class="activity-tile" href="<?php echo esc_url( home_url('/program/') ); ?>">
        <div class="activity-media"><img src="<?php echo $t; ?>/assets/img/angielski-mapa.webp" alt="Język angielski w przedszkolu" loading="lazy" width="800" height="600"></div>
        <h3>Angielski</h3>
        <p>Codzienny kontakt z językiem angielskim prowadzony przez wykwalifikowaną nauczycielkę (C1).</p>
        <span class="activity-link">Poznaj szczegóły<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span>
      </a>
      <a class="activity-tile" href="<?php echo esc_url( home_url('/program/') ); ?>">
        <div class="activity-media"><img src="<?php echo $t; ?>/assets/img/francuski-mapa.webp" alt="Język francuski w przedszkolu" loading="lazy" width="800" height="600"></div>
        <h3>Francuski</h3>
        <p>Nauka języka francuskiego z egzaminatorką DELF — rzadkość wśród przedszkoli.</p>
        <span class="activity-link">Poznaj szczegóły<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span>
      </a>
      <a class="activity-tile" href="<?php echo esc_url( home_url('/program/') ); ?>">
        <div class="activity-media"><img src="<?php echo $t; ?>/assets/img/muzyka-kubki.webp" alt="Zajęcia muzyczne metodą Orffa" loading="lazy" width="800" height="600"></div>
        <h3>Muzyka</h3>
        <p>Rytmika i umuzykalnienie metodą Carla Orffa — rozbudzanie wrażliwości muzycznej.</p>
        <span class="activity-link">Poznaj szczegóły<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span>
      </a>
    </div>
  </div>
</section>

<!-- ==================== S5: WHAT MAKES US UNIQUE ==================== -->
<section class="section" aria-labelledby="unique-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Dlaczego my</p>
      <h2 id="unique-heading">Co nas wyróżnia</h2>
    </div>
    <div class="grid cols-2 stagger">
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>Małe grupy</h3><p>Do 14 dzieci, a w każdej 2 nauczycieli.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>Przestronne sale</h3><p>Przestronne sale edukacyjne z zapleczem sanitarnym.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>Wykwalifikowana kadra</h3><p>Bardzo dobrze wykwalifikowana kadra, wszyscy specjaliści „na miejscu" i do dyspozycji dzieci i rodziców.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>Zdrowe jedzenie</h3><p>Zdrowe jedzenie – uwzględniamy wszystkie diety.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>Plac zabaw</h3><p>Duży, ogrodzony plac zabaw.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Bezpieczny teren</h3><p>Bezpieczny, ogrodzony teren z własnym parkingiem.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>Zajęcia w czesnym</h3><p>Nieodpłatne zajęcia terapeutyczne, językowe, nauka pływania na basenie, warsztaty edukacyjne dla dzieci.</p></div>
      <div class="card"><h3><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:22px;height:22px;color:var(--brand);vertical-align:-4px;margin-right:8px"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>Wsparcie rodziców</h3><p>Wsparcie dla rodziców, konsultacje specjalistyczne, warsztaty i szkolenia.</p></div>
    </div>
    <div class="grid cols-2 mt-xl reveal">
      <div class="arch-editorial">
        <img src="<?php echo $t; ?>/assets/img/plac-zabaw.webp" srcset="<?php echo $t; ?>/assets/img/plac-zabaw-600.webp 600w, <?php echo $t; ?>/assets/img/plac-zabaw.webp 1000w" width="1000" height="750" loading="lazy" alt="Ogrodzony plac zabaw w przedszkolu Czarodziejski Dworek, Górczewska 89">
      </div>
      <div class="arch-editorial">
        <img src="<?php echo $t; ?>/assets/img/sala-edukacyjna.webp" width="800" height="544" loading="lazy" alt="Sala edukacyjna w przedszkolu integracyjnym na Woli">
      </div>
    </div>
  </div>
</section>

<!-- ==================== S6: SPECIALISTS ==================== -->
<section class="section tint-plum" aria-labelledby="specialists-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Nasz zespół</p>
      <h2 id="specialists-heading">Specjaliści na miejscu</h2>
      <p class="lead">Logopedzi, psycholodzy, terapeuci SI, fizjoterapeuta.</p>
    </div>
    <div class="grid cols-4 stagger">
      <div class="teacher-card">
        <div class="teacher-placeholder" role="img" aria-label="Olga Jakuć"><span class="mono">OJ</span></div>
        <div class="teacher-info"><h3>Olga Jakuć</h3><p class="role">terapeuta SI</p></div>
      </div>
      <div class="teacher-card">
        <div class="teacher-placeholder" role="img" aria-label="Joanna Golec">JG</div>
        <div class="teacher-info"><h3>Joanna Golec</h3><p class="role">psycholog</p></div>
      </div>
      <div class="teacher-card">
        <div class="teacher-placeholder" role="img" aria-label="Marta Byszko">MB</div>
        <div class="teacher-info"><h3>Marta Byszko</h3><p class="role">neurologopeda</p></div>
      </div>
      <div class="teacher-card">
        <div class="teacher-placeholder" role="img" aria-label="Anna Sławikowska">AS</div>
        <div class="teacher-info"><h3>Anna Sławikowska</h3><p class="role">fizjoterapeutka</p></div>
      </div>
    </div>
    <div class="text-center mt-xl reveal">
      <a href="<?php echo esc_url( home_url('/nauczyciele/') ); ?>" class="btn btn-ghost">Poznaj całą kadrę<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
    </div>
  </div>
</section>

<!-- ==================== S7: WWR ==================== -->
<section class="section dark" aria-labelledby="wwr-heading" data-bg="<?php echo $t; ?>/assets/img/gal-DSCN2147.webp">
  <div class="container">
    <div class="magic-orb lilac orb-cta-1" aria-hidden="true"></div>
    <div class="magic-orb warm orb-cta-2" aria-hidden="true"></div>
    <div class="section-head center reveal">
      <p class="eyebrow">Wsparcie terapeutyczne</p>
      <h2 id="wwr-heading">Bezpłatne zajęcia WWR</h2>
      <p class="lead">Indywidualne sesje terapeutyczne z wczesnego wspomagania rozwoju dla dzieci uczęszczających do przedszkola ORAZ spoza niego, mających opinię o wczesnym wspomaganiu.</p>
    </div>
    <div class="highlight-box reveal" style="max-width:500px;margin-inline:auto">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
      Również dla dzieci spoza przedszkola
    </div>
    <div class="grid cols-3 stagger mt-xl" style="max-width:900px;margin-inline:auto">
      <div class="card card-dark"><h3>Terapia psychologiczna</h3><p>Psycholodzy kliniczni wspierają rozwój emocjonalny i społeczny dziecka oraz całą rodzinę.</p></div>
      <div class="card card-dark"><h3>Terapia logopedyczna</h3><p>Neurologopedzi pracują nad artykulacją, funkcjami mowy i komunikacją — także metodą wspomagającą PECS.</p></div>
      <div class="card card-dark"><h3>Terapia pedagogiczna</h3><p>Rozwój funkcji poznawczych, koncentracji i gotowości szkolnej w bezpiecznej atmosferze.</p></div>
      <div class="card card-dark"><h3>Integracja sensoryczna</h3><p>Certyfikowani terapeuci pomagają w przetwarzaniu bodźców, koordynacji i samoregulacji.</p></div>
      <div class="card card-dark"><h3>Fizjoterapia</h3><p>Praca nad postawą, napięciem mięśniowym i motoryką, dobrana do potrzeb dziecka.</p></div>
      <div class="card card-dark"><h3>Trening Umiejętności Społecznych (TUS)</h3><p>Komunikacja, współpraca i rozpoznawanie emocji w małych grupach rówieśniczych.</p></div>
    </div>
    <div class="text-center mt-xl reveal">
      <a href="<?php echo esc_url( home_url('/wczesne-wspomaganie-rozwoju/') ); ?>" class="btn btn-accent">Poznaj zajęcia WWR<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
    </div>
  </div>
</section>

<!-- ==================== S8: ADAPTATION ==================== -->
<section class="section tint-gold" aria-labelledby="adaptation-heading">
  <div class="container">
    <div class="split reverse">
      <div class="arch-editorial reveal reveal--left">
        <img src="<?php echo $t; ?>/assets/img/dzieci-zabawa.webp" width="1200" height="606" loading="lazy" alt="Dzieci podczas zabawy adaptacyjnej w przedszkolu Czarodziejski Dworek">
      </div>
      <div class="reveal">
        <p class="eyebrow">Pierwsze kroki</p>
        <h2 id="adaptation-heading">Adaptacja</h2>
        <!-- Wariant B: po terminie (domyślny, bo data 14.03.2026 minęła) -->
        <p class="lead">Zapisy na nowy rok szkolny — bezpłatne sobotnie zajęcia adaptacyjne dla najnowszego rocznika i ich rodziców. Skontaktuj się z nami, aby poznać najbliższy termin.</p>
        <div style="display:flex;flex-wrap:wrap;gap:14px;margin-top:24px">
          <a href="<?php echo esc_url( home_url('/adaptacja/') ); ?>" class="btn btn-primary">Poznaj adaptację<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== S8b: GALLERY PREVIEW ==================== -->
<section class="section" aria-labelledby="gallery-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Galeria</p>
      <h2 id="gallery-heading">Zajrzyj do naszego przedszkola</h2>
      <p class="lead">Jasne, przytulne sale i duży, zielony plac zabaw — zobacz, gdzie Twoje dziecko spędzi dzień.</p>
    </div>
    <div class="grid cols-3 stagger" style="gap:18px">
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — sala przedszkolna"><img src="<?php echo $t; ?>/assets/img/gal-DSCN2149.webp" width="800" height="600" loading="lazy" alt="Sala przedszkolna w Czarodziejskim Dworku" style="width:100%;height:100%;object-fit:cover"></a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — sala zajęciowa"><img src="<?php echo $t; ?>/assets/img/gal-DSCN2155.webp" width="800" height="600" loading="lazy" alt="Sala zajęciowa z pomocami dydaktycznymi" style="width:100%;height:100%;object-fit:cover"></a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — kącik dziecięcy"><img src="<?php echo $t; ?>/assets/img/gal-DSCN2151.webp" width="800" height="1067" loading="lazy" alt="Przytulny kącik w sali przedszkolnej" style="width:100%;height:100%;object-fit:cover"></a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — ogród przedszkola"><img src="<?php echo $t; ?>/assets/img/gal-DSCN8681.webp" width="800" height="600" loading="lazy" alt="Zielony ogród przedszkola" style="width:100%;height:100%;object-fit:cover"></a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — plac zabaw"><img src="<?php echo $t; ?>/assets/img/gal-DSCN8693.webp" width="800" height="600" loading="lazy" alt="Drewniany domek na placu zabaw" style="width:100%;height:100%;object-fit:cover"></a>
      <a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="reveal" style="display:block;aspect-ratio:4/3;border-radius:var(--radius-md);overflow:hidden" aria-label="Galeria — zjeżdżalnia na placu zabaw"><img src="<?php echo $t; ?>/assets/img/gal-DSCN8680.webp" width="800" height="600" loading="lazy" alt="Plac zabaw ze zjeżdżalnią" style="width:100%;height:100%;object-fit:cover"></a>
    </div>
    <div class="text-center mt-xl reveal"><a href="<?php echo esc_url( home_url('/galeria/') ); ?>" class="btn btn-primary">Zobacz pełną galerię<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a></div>
  </div>
</section>

<!-- ==================== S9: STATS ==================== -->
<section class="section tight" aria-labelledby="stats-heading">
  <div class="container">
    <h2 id="stats-heading" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">Nasze liczby</h2>
    <div class="stats-panel reveal">
      <div class="stat"><div class="stat-number" data-count="22" data-suffix="+">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">lat doświadczenia</div></div>
      <div class="stat"><div class="stat-number" data-count="18">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">specjalistów na miejscu</div></div>
      <div class="stat"><div class="stat-number" data-count="14">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">dzieci max w grupie</div></div>
      <div class="stat"><div class="stat-number" data-count="8">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">zajęć w czesnym</div></div>
    </div>
  </div>
</section>

<!-- ==================== S10: REVIEWS ==================== -->
<section class="section deep" aria-labelledby="reviews-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Opinie rodziców</p>
      <h2 id="reviews-heading">Co mówią o nas rodzice</h2>
      <p class="reviews-rating">
        <span class="stars" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>
        <span><strong>4,9</strong> / 5 · 37 opinii w Google</span>
      </p>
    </div>
    <div class="grid cols-2 stagger">
      <div class="quote-card">
        <div class="quote-stars" role="img" aria-label="5 gwiazdek"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <p class="quote-text">Przedszkole z tradycjami. Od wielu lat celebrowane są wartości, które niezbędne są dla rozwoju każdego malucha, takie jak: potrzeba bliskości, szacunek, zrozumienie. […] Panuje tu bardzo przyjazna atmosfera, której nie spotkałam w innych obserwowanych wcześniej placówkach.</p>
        <p class="quote-author">— Ewelina Politowska</p>
      </div>
      <div class="quote-card">
        <div class="quote-stars" role="img" aria-label="5 gwiazdek"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <p class="quote-text">To przedszkole na długo zostanie w naszym sercu. […] Panuje tu ciepła, rodzinna atmosfera, a dzieci są traktowane z troską, cierpliwością i prawdziwą uważnością. Ogromnym plusem jest bardzo bogata oferta zajęć, a prawdziwym wyróżnikiem są wyjścia na basen.</p>
        <p class="quote-author">— Kasia Berkan</p>
      </div>
      <div class="quote-card">
        <div class="quote-stars" role="img" aria-label="5 gwiazdek"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <p class="quote-text">Bardzo polecamy przedszkole Czarodziejski Dworek. Córka chodzi tu z przyjemnością, a my mamy pełen spokój, bo wiemy, że jest w dobrych rękach. Panie są cudowne – ciepłe, cierpliwe i zawsze pomocne. […] Grupy są kameralne, dzieci mają własny plac zabaw.</p>
        <p class="quote-author">— Anita G</p>
      </div>
      <div class="quote-card">
        <div class="quote-stars" role="img" aria-label="5 gwiazdek"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <p class="quote-text">Bajeczne przedszkole, wspaniała kadra nauczycielska i najlepsza dyrektor pani Agnieszka. […] Panowała tam miła, bezpieczna atmosfera, a nauczyciele byli życzliwi, cierpliwi i zawsze zaangażowani w pracę z dziećmi. Bardzo polecam to przedszkole.</p>
        <p class="quote-author">— Oliwia</p>
      </div>
    </div>
    <div class="text-center mt-xl reveal">
      <a href="https://www.google.com/search?q=Czarodziejski+Dworek+G%C3%B3rczewska+89+Warszawa&amp;ludocid=13259505220174613099#lrd=0x471ecbfff87fd079:0xb80339bef1f20a6b,1" target="_blank" rel="noopener nofollow" class="btn btn-ghost">Czytaj więcej opinii w Google<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
    </div>
  </div>
</section>

<!-- ==================== S11: UNIVERSITY ==================== -->
<section class="section" aria-labelledby="uni-heading">
  <div class="container">
    <div class="split reverse">
      <div class="arch-editorial reveal reveal--left">
        <img src="<?php echo $t; ?>/assets/img/uniwersytet.webp" width="540" height="360" loading="lazy" alt="Materiały i zajęcia edukacyjne — Czarodziejski Uniwersytet">
      </div>
      <div class="reveal">
        <p class="eyebrow">Czarodziejski Uniwersytet</p>
        <h2 id="uni-heading">Szkolenia, porady, ciekawostki</h2>
        <p class="lead">Nasz Uniwersytet to przestrzeń wiedzy dla rodziców — warsztaty, konsultacje specjalistyczne i materiały wspierające rozwój Twojego dziecka.</p>
        <a href="<?php echo esc_url( home_url('/blog/') ); ?>" class="btn btn-ghost mt-lg">Odwiedź Uniwersytet<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
      </div>
    </div>
  </div>
</section>

<!-- ==================== S12: BLOG ==================== -->
<section class="section tight deep" aria-labelledby="blog-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Blog</p>
      <h2 id="blog-heading">Najnowsze wiadomości</h2>
    </div>
    <div class="grid cols-3 stagger">
      <a href="<?php echo esc_url( home_url('/wpis-zajecia-francuski/') ); ?>" class="blog-card">
        <div class="blog-card-img"><img src="<?php echo $t; ?>/assets/img/hero-main.webp" width="800" height="533" loading="lazy" alt="Zajęcia z języka francuskiego w przedszkolu Czarodziejski Dworek"></div>
        <div class="blog-card-body"><h3>Co teraz robimy na zajęciach z j. francuskiego?</h3><span class="link-arrow">Czytaj więcej<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span></div>
      </a>
      <a href="<?php echo esc_url( home_url('/wpis-dzien-otwarty/') ); ?>" class="blog-card">
        <div class="blog-card-img"><img src="<?php echo $t; ?>/assets/img/blog-dzien-otwarty.webp" width="800" height="800" loading="lazy" alt="Dzień otwarty w przedszkolu Czarodziejski Dworek"></div>
        <div class="blog-card-body"><h3>Dzień otwarty! 28.02.2026 r.</h3><span class="link-arrow">Czytaj więcej<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span></div>
      </a>
      <a href="<?php echo esc_url( home_url('/wpis-szkola-myslenia-pozytywnego/') ); ?>" class="blog-card">
        <div class="blog-card-img"><img src="<?php echo $t; ?>/assets/img/blog-smp.webp" width="800" height="450" loading="lazy" alt="Szkoła Myślenia Pozytywnego — program edukacyjny"></div>
        <div class="blog-card-body"><h3>Szkoła Myślenia Pozytywnego!</h3><span class="link-arrow">Czytaj więcej<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></span></div>
      </a>
    </div>
  </div>
</section>

<!-- ==================== S13: SOCIAL ==================== -->
<section class="section tight" aria-labelledby="social-heading">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Śledź nas</p>
      <h2 id="social-heading">Co u nas słychać</h2>
    </div>
    <div class="grid cols-4 stagger">
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="social-tile" aria-label="Zobacz na Facebooku"><img src="<?php echo $t; ?>/assets/img/social-94355495.webp" width="400" height="400" loading="lazy" alt="Dzieci podczas zajęć w przedszkolu Czarodziejski Dworek"></a>
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="social-tile" aria-label="Zobacz na Facebooku"><img src="<?php echo $t; ?>/assets/img/social-94574499.webp" width="400" height="400" loading="lazy" alt="Aktywności przedszkolaków w Czarodziejskim Dworku"></a>
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="social-tile" aria-label="Zobacz na Facebooku"><img src="<?php echo $t; ?>/assets/img/social-95486100.webp" width="400" height="400" loading="lazy" alt="Codzienność w przedszkolu integracyjnym na Woli"></a>
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="social-tile" aria-label="Zobacz na Facebooku"><img src="<?php echo $t; ?>/assets/img/gal-DSCN2147.webp" width="800" height="600" loading="lazy" alt="Przedszkolaki podczas zabawy w Czarodziejskim Dworku"></a>
    </div>
    <div class="text-center mt-lg reveal" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="btn btn-ghost">Facebook<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      <a href="https://www.instagram.com/czarodziejski_dworek/" target="_blank" rel="noopener" class="btn btn-ghost">Instagram<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
    </div>
  </div>
</section>

<!-- ==================== S13b: SZYBKIE ZAPYTANIE ==================== -->
<section class="section" aria-labelledby="qa-heading">
  <div class="container">
    <div class="quickask-card reveal">
      <div class="section-head center">
        <p class="eyebrow" style="justify-content:center">Szybkie zapytanie</p>
        <h2 id="qa-heading" style="font-size:clamp(1.4rem,2.8vw,1.9rem)">Masz pytanie? Oddzwonimy</h2>
        <p class="lead" style="margin-bottom:0">Zostaw imię i telefon — odezwiemy się najszybciej, jak to możliwe. Wolisz pełny formularz? <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>">Przejdź do kontaktu</a>.</p>
      </div>
      <form id="contact-form" action="https://api.web3forms.com/submit" method="POST" novalidate>
        <input type="hidden" name="access_key" value="<?php echo esc_attr( get_theme_mod( 'cd_web3forms_key', '' ) ); ?>">
        <input type="hidden" name="subject" value="Szybkie zapytanie ze strony — Czarodziejski Dworek">
        <input type="hidden" name="from_name" value="Szybkie zapytanie — Czarodziejski Dworek">
        <input type="hidden" name="replyto" value="">
        <input type="checkbox" name="botcheck" class="hidden" style="display:none!important" tabindex="-1">
        <div class="hp-field" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;overflow:hidden"><input type="text" name="url" tabindex="-1" autocomplete="off"></div>
        <div class="quickask-grid">
          <div class="form-group">
            <input type="text" id="name" name="name" required placeholder=" " autocomplete="name" aria-describedby="name-err">
            <label for="name">Imię rodzica <span aria-hidden="true">*</span></label>
            <span class="field-error" id="name-err">To pole jest wymagane</span>
          </div>
          <div class="form-group">
            <input type="tel" id="phone" name="phone" required placeholder=" " autocomplete="tel" aria-describedby="phone-err">
            <label for="phone">Telefon <span aria-hidden="true">*</span></label>
            <span class="field-error" id="phone-err">Podaj numer telefonu</span>
          </div>
          <div class="form-group full">
            <textarea id="message" name="message" rows="3" placeholder=" "></textarea>
            <label for="message">Wiadomość (opcjonalnie)</label>
          </div>
        </div>
        <div class="form-consent">
          <label>
            <input type="checkbox" name="consent" required aria-describedby="consent-err">
            <span>Wyrażam zgodę na przetwarzanie danych osobowych w celu obsługi zapytania, zgodnie z <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>#dokumenty">Polityką prywatności</a>. <span aria-hidden="true">*</span></span>
          </label>
          <span class="field-error" id="consent-err">Zgoda jest wymagana</span>
        </div>
        <button type="submit" class="btn btn-primary btn-full" style="margin-top:12px">Wyślij zapytanie<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></button>
        <div id="form-status" class="form-status" style="display:none" role="alert" aria-live="polite"></div>
      </form>
    </div>
  </div>
</section>

<!-- ==================== S13c: MAPA DOJAZDU ==================== -->
<section class="section tint-gold" aria-labelledby="map-home-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Jak dojechać</p>
        <h2 id="map-home-h">Znajdziesz nas na Woli</h2>
        <p>Jesteśmy w&nbsp;sercu warszawskiej Woli, przy ul. Górczewskiej 89 — z&nbsp;dogodnym dojazdem komunikacją miejską i&nbsp;miejscami parkingowymi w&nbsp;najbliższej okolicy.</p>
        <ul style="margin-top:24px;display:flex;flex-direction:column;gap:16px;list-style:none;padding:0">
          <li style="display:flex;gap:14px;align-items:flex-start">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="color:var(--gold-deep);flex-shrink:0;margin-top:2px"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span><strong>Adres</strong><br>ul. Górczewska 89, 01-401 Warszawa (Wola)</span>
          </li>
          <li style="display:flex;gap:14px;align-items:flex-start">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="color:var(--gold-deep);flex-shrink:0;margin-top:2px"><rect x="4" y="3" width="16" height="13" rx="2"/><path d="M4 11h16"/><path d="M7.5 20 9 16M16.5 20 15 16"/><circle cx="8" cy="13.3" r="1"/><circle cx="16" cy="13.3" r="1"/></svg>
            <span><strong>Komunikacja</strong><br>Przystanki tramwajowe i&nbsp;autobusowe w&nbsp;pobliżu</span>
          </li>
          <li style="display:flex;gap:14px;align-items:flex-start">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="color:var(--gold-deep);flex-shrink:0;margin-top:2px"><circle cx="12" cy="12" r="9"/><path d="M9.2 16.5V7.5h3.4a2.6 2.6 0 0 1 0 5.2H9.2"/></svg>
            <span><strong>Parking</strong><br>Miejsca postojowe w&nbsp;najbliższej okolicy</span>
          </li>
        </ul>
        <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:30px">
          <a class="btn btn-primary" href="https://www.google.com/maps/place/G%C3%B3rczewska+89,+01-401+Warszawa" target="_blank" rel="noopener">Otwórz w Google Maps<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
          <a class="btn btn-ghost" href="tel:+48690629501">Zadzwoń</a>
        </div>
      </div>
      <div class="reveal reveal--right" style="position:relative">
        <div class="arch-editorial map-arch">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.5!2d20.9435!3d52.2318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecb1c8e5e7ff1%3A0xb1c6b7e1b22f93d7!2sG%C3%B3rczewska%2089%2C%2001-401%20Warszawa!5e0!3m2!1spl!2spl!4v1718700000000!5m2!1spl!2spl"
            loading="lazy" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"
            title="Lokalizacja przedszkola Czarodziejski Dworek na mapie Google"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== S14: CTA BAND ==================== -->
<section class="cta-band" aria-labelledby="cta-heading">
  <div class="magic-orb lilac orb-cta-1" aria-hidden="true"></div>
  <div class="magic-orb warm orb-cta-2" aria-hidden="true"></div>
  <div class="container" style="position:relative;z-index:2">
    <p class="eyebrow" style="justify-content:center">Zapraszamy</p>
    <h2 id="cta-heading">Zapisz dziecko do Czarodziejskiego Dworku</h2>
    <p class="cta-info">ul. Górczewska 89, 01-401 Warszawa · 7:00–18:00<br><a href="tel:+48690629501">690 629 501</a> / <a href="tel:+48510318948">510 318 948</a></p>
    <div class="cta-actions">
      <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Zapisz się na adaptację<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
      <a href="tel:+48690629501" class="btn btn-light">Zadzwoń</a>
    </div>
  </div>
</section>


</main>
<?php get_footer();
