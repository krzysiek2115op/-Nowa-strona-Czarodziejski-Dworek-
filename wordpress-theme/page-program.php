<?php
/* Szablon podstrony: program (port 1:1 ze statycznej) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero + Motto -->
<section class="page-hero tint-gold" aria-labelledby="prog-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Program</li></ol></nav>
    <div class="page-hero-grid">
      <div class="reveal">
        <h1 id="prog-title">Program</h1>
        <blockquote class="lead" style="font-family:var(--font-display);font-style:italic;font-size:clamp(1.1rem,2.5vw,1.35rem);margin-top:20px;color:var(--ink)">W „Czarodziejskim Dworku" każda zabawa jest nauką, a każda nauka — zabawą. Rozbudzamy ciekawość poznawczą oraz zdolności artystyczne, muzyczne i językowe każdego dziecka.</blockquote>
        <div class="hero-facts">
          <span>Basen w czesnym</span><span>2 języki obce</span><span>18 specjalistów</span><span>Bezpłatne WWR</span>
        </div>
      </div>
      <div class="page-hero-media reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/hero-program.webp?v=29" width="408" height="510" loading="eager" fetchpriority="high" alt="Dziecko z lupą odkrywa świat — zajęcia w przedszkolu Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S2: Introduction -->
<section class="section" aria-labelledby="offer-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Oferta edukacyjna</p>
      <h2 id="offer-h">Każda zabawa jest nauką</h2>
      <p class="lead">Nasz program łączy edukację, języki, muzykę, sport i wsparcie terapeutyczne — wszystko pod jednym dachem, bez konieczności wożenia dziecka na dodatkowe zajęcia.</p>
    </div>
  </div>
</section>

<!-- S3: Activities in tuition -->
<section id="zajecia" class="section deep" aria-labelledby="act-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Zajęcia w czesnym</p>
      <h2 id="act-h">Wliczone w czesne</h2>
    </div>
    <div class="grid cols-4 stagger">
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/sala-edukacyjna.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Edukacja</h3><p>Kompleksowa edukacja przedszkolna realizowana przez pedagogów i pedagogów specjalnych w małych grupach (do 14 dzieci).</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-edukacja">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-edukacja"><div><p>Realizujemy podstawę programową MEN w oparciu o program „Zanim będę uczniem”, wspierając indywidualny rozwój każdego dziecka. Nauczycielki pracują nowatorskimi metodami, odwołując się do doświadczeń i zainteresowań dzieci. Stałym elementem są zajęcia plastyczne — różne techniki i swobodny dostęp do materiałów rozwijają twórczość i wyobraźnię.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/angielski-mapa.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Język Angielski</h3><p>Codzienny kontakt z językiem prowadzony przez nauczycielkę z kwalifikacjami filologicznymi (C1) i doświadczeniem w pracy z dziećmi o specjalnych potrzebach.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-angielski">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-angielski"><div><p>Lekcje odbywają się cztery razy w tygodniu w każdej grupie wiekowej. Dzieci osłuchują się z modelowym językiem przez piosenki, rymowanki, opowiastki i metodę Total Physical Response (nauka słownictwa ruchem). Przy okazji poznają sztukę, przyrodę i kulturę innych narodów, ucząc się otwartości i tolerancji.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/francuski-mapa.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Język Francuski</h3><p>Nauka od najmłodszych lat z nauczycielką — magistrem filologii romańskiej i egzaminatorką DELF.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-francuski">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-francuski"><div><p>Zajęcia dla dzieci od 4. roku życia, dwa razy w tygodniu, prowadzone metodą bezpośrednią — przez gry, piosenki, zabawy ruchowe i prace manualne. Nauka języka w tak młodym wieku pozwala przyswajać go naturalnie, w formie zabawy, i poszerza spojrzenie dziecka na świat.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/basen.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Basen</h3><p>Nauka pływania w ramach czesnego — rozwój motoryki, koordynacji i pewności siebie w wodzie.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-basen">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-basen"><div><p>Coroczne kursy pływania dla dzieci od 5. roku życia na pływalni Nowa Fala (OSiR Wola). Pływanie hartuje, oswaja z wodą i uczy pływać, a przy tym wzmacnia mięśnie, zapobiega wadom postawy i poprawia wydolność oddechowo-krążeniową. Buduje też pewność siebie w nowych sytuacjach.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/muzyka-kubki.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Muzyka</h3><p>Rytmika i umuzykalnienie prowadzone metodą Carla Orffa przez absolwentkę Akademii Muzycznej.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-muzyka">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-muzyka"><div><p>Zajęcia trzy razy w tygodniu łączą słuchanie muzyki z grą na instrumentach, śpiewem i tańcem animacyjnym, w oparciu o metodę KLANZA. Rozwijają koncentrację, systematyczność i kreatywność, pozwalając dziecku wyrażać siebie i emocje. Organizujemy też sobotnie zajęcia muzyczne dla dzieci i rodziców.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/social-94355495.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Gimnastyka</h3><p>Zajęcia ruchowe wspierające rozwój fizyczny i koordynację.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-gimnastyka">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-gimnastyka"><div><p>Gimnastyka korekcyjna dla wszystkich grup wiekowych. U najmłodszych (2,5–3 lata) kształtujemy świadomość ciała i wzmacniamy mięśnie przez zabawy ze sprzętem; starsze dzieci realizują program profilaktyki prawidłowej postawy. Uczymy przy tym zasad fair play oraz radzenia sobie z sukcesem i porażką.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/social-95486100.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Joga</h3><p>Ćwiczenia relaksacyjne i oddechowe dostosowane do wieku przedszkolnego.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-joga">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-joga"><div><p>Ćwiczenia relaksacyjne i oddechowe dostosowane do wieku przedszkolnego. Pomagają dzieciom się wyciszyć, lepiej czuć własne ciało i radzić sobie z emocjami.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/taniec.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Zajęcia Taneczne</h3><p>Szkoła tańca PRO-DANCE — nauka ruchu, rytmu i ekspresji ciałem.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-taniec">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-taniec"><div><p>Prowadzone przez szkołę tańca PRO-DANCE. Nauka ruchu, rytmu i ekspresji ciałem rozwija koordynację, pamięć i pewność siebie — i daje mnóstwo radości.</p></div></div></div>
    </div>
  </div>
</section>

<!-- S4: Therapeutic support -->
<section class="section tint-plum" aria-labelledby="therapy-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Wsparcie terapeutyczne</p>
      <h2 id="therapy-h">Specjaliści na miejscu</h2>
    </div>
    <div class="grid cols-3 stagger">
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/logopedia.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Logopedia</h3><p>Prowadzona przez neurologopedów z doświadczeniem w zaburzeniach połykania i komunikacji wspomagającej (PECS).</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-logopedia">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-logopedia"><div><p>Zaczynamy od diagnozy — oceny budowy, sprawności i funkcji narządów mowy — a potem prowadzimy indywidualną terapię we współpracy z rodzicami i innymi specjalistami. Pracujemy nad prawidłową artykulacją, normalizacją funkcji mowy i rozwojem komunikacji. Rodzice mogą liczyć na konsultacje.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/portret-dziecka.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Psycholog</h3><p>Zajęcia indywidualne i grupowe. Psycholodzy kliniczni z certyfikatami psychoterapeutycznymi.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-psycholog">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-psycholog"><div><p>Psycholog uczestniczy w życiu grupy, będąc obecnym na wybranych zajęciach, oraz prowadzi indywidualne sesje z dziećmi. Podstawą jest przyjazna, bezpieczna relacja oraz wspieranie rozwoju emocjonalnego i umiejętności społecznych. Specjaliści wspierają również rodziców w sprawach rozwoju dziecka.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/integracja-si.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Integracja Sensoryczna</h3><p>Terapia SI prowadzona przez certyfikowanych terapeutów — pomaga dzieciom z trudnościami w przetwarzaniu bodźców.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-si">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-si"><div><p>Terapia SI prowadzona przez certyfikowanych terapeutów. Pomaga dzieciom z trudnościami w przetwarzaniu bodźców — poprawia koncentrację, koordynację i samoregulację.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/social-94574499.webp" width="84" height="84" alt="" loading="lazy"></div><h3>TUS</h3><p>Zajęcia grupowe rozwijające kompetencje społeczne, komunikację i regulację emocji.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-tus">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-tus"><div><p>Trening Umiejętności Społecznych w małych grupach. Dzieci uczą się współpracy, komunikacji, rozpoznawania emocji i radzenia sobie w relacjach z rówieśnikami.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/fizjoterapia.webp" width="56" height="56" alt="" loading="lazy"></div><h3>Fizjoterapia</h3><p>Indywidualne sesje z fizjoterapeutką (mgr AWF, terapeuta SI) — praca z postawą, napięciem mięśniowym, koordynacją.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-fizjoterapia">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-fizjoterapia"><div><p>Indywidualne sesje z fizjoterapeutką (mgr AWF, terapeuta SI). Praca nad postawą, napięciem mięśniowym i koordynacją, dobrana do potrzeb konkretnego dziecka.</p></div></div></div>
      <div class="activity-tile"><div class="tile-icon"><img src="<?php echo $t; ?>/assets/img/dzieci-zabawa.webp" width="84" height="84" alt="" loading="lazy"></div><h3>Terapia Pedagogiczna</h3><p>Wsparcie pedagogiczne dostosowane do indywidualnych potrzeb i możliwości dziecka.</p><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="det-terapia-ped">Poznaj szczegóły <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="det-terapia-ped"><div><p>Wsparcie dostosowane do indywidualnych potrzeb i możliwości dziecka. Rozwijamy funkcje poznawcze, koncentrację i gotowość szkolną w przyjaznej, bezpiecznej atmosferze.</p></div></div></div>
    </div>
  </div>
</section>

<!-- S5: WWR -->
<section id="wwr" class="section dark" aria-labelledby="wwr2-h" data-bg="<?php echo $t; ?>/assets/img/gal-DSCN8672.webp">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Wsparcie terapeutyczne</p>
      <h2 id="wwr2-h">Bezpłatne zajęcia WWR</h2>
      <p class="lead">Bezpłatne zajęcia terapeutyczne – również dla dzieci spoza przedszkola.</p>
    </div>
    <p class="reveal" style="text-align:center;color:rgba(255,255,255,.82);max-width:60ch;margin-inline:auto">Indywidualne sesje wczesnego wspomagania rozwoju — dla dzieci z przedszkola i spoza niego, które mają opinię o WWR. Zespół specjalistów (psycholog, logopeda, pedagog specjalny, terapeuta SI, fizjoterapeuta) opracowuje indywidualny program i wspiera całą rodzinę w opiece nad dzieckiem.</p>
    <div class="highlight-box reveal" style="max-width:500px;margin:24px auto 0"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>Również dla dzieci spoza przedszkola — wystarczy opinia o wczesnym wspomaganiu rozwoju.</div>
    <div class="grid cols-3 stagger mt-xl" style="max-width:900px;margin-inline:auto">
      <div class="card card-dark"><h3>Terapia psychologiczna</h3><p>Psycholodzy kliniczni wspierają rozwój emocjonalny i społeczny dziecka oraz całą rodzinę.</p></div>
      <div class="card card-dark"><h3>Terapia logopedyczna</h3><p>Neurologopedzi pracują nad artykulacją, funkcjami mowy i komunikacją — także metodą wspomagającą PECS.</p></div>
      <div class="card card-dark"><h3>Terapia pedagogiczna</h3><p>Rozwój funkcji poznawczych, koncentracji i gotowości szkolnej w bezpiecznej atmosferze.</p></div>
      <div class="card card-dark"><h3>Integracja sensoryczna</h3><p>Certyfikowani terapeuci pomagają w przetwarzaniu bodźców, koordynacji i samoregulacji.</p></div>
      <div class="card card-dark"><h3>Fizjoterapia</h3><p>Praca nad postawą, napięciem mięśniowym i motoryką, dobrana do potrzeb dziecka.</p></div>
      <div class="card card-dark"><h3>TUS</h3><p>Komunikacja, współpraca i rozpoznawanie emocji w małych grupach rówieśniczych.</p></div>
    </div>
    <div class="text-center mt-xl reveal"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Umów wizytę</a></div>
  </div>
</section>

<!-- S6: Daily life -->
<section class="section" aria-labelledby="daily-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Codzienność</p>
        <h2 id="daily-h">Jak wygląda dzień</h2>
        <ul style="display:flex;flex-direction:column;gap:14px;margin-top:16px">
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg>Zdrowe jedzenie — uwzględniamy wszystkie diety</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>„Zielone noce" i kilkudniowe wycieczki</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><circle cx="12" cy="12" r="10"/></svg>Zajęcia i zabawa na świeżym powietrzu (duży, ogrodzony plac zabaw)</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>Indywidualne podejście do każdego dziecka</li>
        </ul>
      </div>
      <div class="arch-editorial reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/interior-sala.webp" srcset="<?php echo $t; ?>/assets/img/interior-sala-600.webp 600w, <?php echo $t; ?>/assets/img/interior-sala.webp 1000w" width="1000" height="750" loading="lazy" alt="Sala z instrumentami muzycznymi w przedszkolu Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S7: CTA -->
<section class="cta-band" aria-labelledby="cta-prog-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-prog-h">Zapisz dziecko</h2>
    <div class="cta-actions mt-lg"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Zapisz się na adaptację</a><a href="tel:+48690629501" class="btn btn-light">Zadzwoń: 690 629 501</a></div>
  </div>
</section>


</main>
<?php get_footer();
