<?php
/* Szablon podstrony: o-nas (port 1:1 ze statycznej) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero tint-plum" aria-labelledby="page-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">O nas</li></ol></nav>
    <div class="page-hero-grid">
      <div class="reveal">
        <h1 id="page-title">O nas</h1>
        <p class="lead">Poznaj naszą historię i filozofię — od 2003 roku tworzymy miejsce, w którym dzieci rozwijają się w atmosferze ciepła, bezpieczeństwa i profesjonalnej opieki.</p>
      </div>
      <div class="page-hero-media reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/interior-sala.webp" srcset="<?php echo $t; ?>/assets/img/interior-sala-600.webp 600w, <?php echo $t; ?>/assets/img/interior-sala.webp 1000w" width="1000" height="750" alt="Przestronna sala edukacyjna w przedszkolu Czarodziejski Dworek przy Górczewskiej 89" loading="eager" fetchpriority="high">
      </div>
    </div>
  </div>
</section>

<!-- S2: History -->
<section class="section" aria-labelledby="history-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Historia</p>
        <h2 id="history-h">Od 2003 roku</h2>
        <p>Przedszkole zostało założone we wrześniu 2003 r. Jesteśmy wpisani do ewidencji szkół i placówek niepublicznych pod nr 111/PN.</p>
        <p class="mt-lg">„Czarodziejski Dworek" to wyjątkowe przedszkole, w którym odkryte i docenione zostaną mocne strony Twojego dziecka. Naszym celem jest dbanie o&nbsp;jego wszechstronny rozwój, zaszczepienie w&nbsp;nim pasji twórczych, rozwijanie zdolności i&nbsp;wspomaganie harmonijnego rozwoju.</p>
        <p class="mt-lg">Jesteśmy przedszkolem integracyjnym — od ponad dwóch dekad łączymy edukację z&nbsp;terapią, otaczając każde dziecko opieką specjalistów w&nbsp;kameralnych grupach do 14 osób.</p>
      </div>
      <div class="reveal reveal--right" style="position:relative">
        <div class="arch-editorial">
          <img src="<?php echo $t; ?>/assets/img/hero-main.webp" srcset="<?php echo $t; ?>/assets/img/hero-main-800.webp 800w, <?php echo $t; ?>/assets/img/hero-main.webp 1200w" width="1200" height="800" loading="lazy" alt="Dzieci w przedszkolu Czarodziejski Dworek — od 2003 roku">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- S3: Philosophy -->
<section class="section tint-gold" aria-labelledby="philosophy-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Filozofia</p>
      <h2 id="philosophy-h">Wszechstronny rozwój</h2>
    </div>
    <blockquote class="big-quote reveal" style="color:var(--ink);max-width:70ch;margin-inline:auto;padding:0 0 0 40px">
      W „Czarodziejskim Dworku" każda zabawa jest nauką, a każda nauka jest zabawą. Rozbudzamy w naszych przedszkolakach ciekawość poznawczą, odkrywamy i rozwijamy ich zdolności artystyczne, muzyczne i językowe. Stwarzamy warunki do rozwoju wyobraźni, fantazji, ekspresji plastycznej i ruchowej. Wspomagamy indywidualny rozwój dzieci uwzględniając potrzeby i możliwości każdego z nich. Podwyższamy ich samoocenę i poczucie własnej wartości.
    </blockquote>
    <div class="grid cols-3 stagger mt-2xl">
      <div class="card text-center"><h3>Ciekawość poznawcza</h3><p style="color:var(--ink-soft);margin-top:8px">Rozbudzamy radość z odkrywania</p></div>
      <div class="card text-center"><h3>Zdolności artystyczne</h3><p style="color:var(--ink-soft);margin-top:8px">Muzyka, plastyka, ruch, ekspresja</p></div>
      <div class="card text-center"><h3>Indywidualny rozwój</h3><p style="color:var(--ink-soft);margin-top:8px">Uwzględniamy potrzeby każdego dziecka</p></div>
    </div>
  </div>
</section>

<!-- S4: Organization -->
<section class="section" aria-labelledby="org-h">
  <div class="container">
    <div class="split reverse">
      <div class="arch-editorial reveal reveal--left">
        <img src="<?php echo $t; ?>/assets/img/organizacja.webp" width="480" height="600" loading="lazy" alt="Bezpieczny, ogrodzony teren przedszkola Czarodziejski Dworek">
      </div>
      <div class="reveal">
        <p class="eyebrow">Organizacja</p>
        <h2 id="org-h">Jak pracujemy</h2>
        <p>Godziny pracy dostosowujemy do potrzeb rodziców. Pracujemy w godz. od 7:00 do 18:00.</p>
        <ul style="margin-top:20px;display:flex;flex-direction:column;gap:12px">
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Godziny: 7:00–18:00, poniedziałek–piątek</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>Małe grupy: do 14 dzieci, 2 nauczycieli w każdej</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg>Zdrowe jedzenie: uwzględniamy wszystkie diety</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:2px"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Bezpieczny teren: ogrodzony, z własnym parkingiem</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- S5: What makes us unique -->
<section class="section deep" aria-labelledby="uniq2-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Dlaczego my</p>
      <h2 id="uniq2-h">Co nas wyróżnia</h2>
    </div>
    <div class="grid cols-2 stagger">
      <div class="card"><h3>Małe grupy</h3><p style="color:var(--ink-soft);margin-top:6px">Do 14 dzieci, a w każdej 2 nauczycieli.</p></div>
      <div class="card"><h3>Przestronne sale</h3><p style="color:var(--ink-soft);margin-top:6px">Przestronne sale edukacyjne z zapleczem sanitarnym.</p></div>
      <div class="card"><h3>Wykwalifikowana kadra</h3><p style="color:var(--ink-soft);margin-top:6px">Wszyscy specjaliści „na miejscu" i do dyspozycji dzieci i rodziców.</p></div>
      <div class="card"><h3>Zdrowe jedzenie</h3><p style="color:var(--ink-soft);margin-top:6px">Uwzględniamy wszystkie diety.</p></div>
      <div class="card"><h3>Plac zabaw</h3><p style="color:var(--ink-soft);margin-top:6px">Duży, ogrodzony plac zabaw.</p></div>
      <div class="card"><h3>Bezpieczny teren</h3><p style="color:var(--ink-soft);margin-top:6px">Ogrodzony teren z własnym parkingiem.</p></div>
      <div class="card"><h3>Zajęcia w czesnym</h3><p style="color:var(--ink-soft);margin-top:6px">Nieodpłatne zajęcia terapeutyczne, językowe, nauka pływania, warsztaty.</p></div>
      <div class="card"><h3>Wsparcie rodziców</h3><p style="color:var(--ink-soft);margin-top:6px">Konsultacje specjalistyczne, warsztaty i szkolenia.</p></div>
    </div>
  </div>
</section>

<!-- S6: Stats -->
<section class="section tight" aria-labelledby="stats2-h">
  <div class="container">
    <h2 id="stats2-h" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">Nasze liczby</h2>
    <div class="stats-panel reveal">
      <div class="stat"><div class="stat-number" data-count="22" data-suffix="+">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">lat doświadczenia</div></div>
      <div class="stat"><div class="stat-number" data-count="18">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">specjalistów na miejscu</div></div>
      <div class="stat"><div class="stat-number" data-count="14">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">dzieci max w grupie</div></div>
      <div class="stat"><div class="stat-number" data-count="8">0</div><span class="stat-rule" aria-hidden="true"></span><div class="stat-label">zajęć w czesnym</div></div>
    </div>
  </div>
</section>

<!-- S7: Recommendation -->
<section class="section dark" aria-labelledby="reco-h" data-bg="<?php echo $t; ?>/assets/img/dzieci-zabawa.webp">
  <div class="container text-center">
    <div class="magic-orb lilac orb-cta-1" aria-hidden="true"></div>
    <div class="magic-orb warm orb-cta-2" aria-hidden="true"></div>
    <h2 id="reco-h" class="sr-only">Rekomendacje rodziców</h2>
    <blockquote class="big-quote reveal" style="position:relative;z-index:2">Przedszkole ze wspaniałą kadrą, wręcz rodzinną atmosferą i które mogę polecić każdemu. Nie wyobrażam sobie nawet lepszego miejsca.</blockquote>
    <p class="big-quote-author reveal">— Mariusz Linkiewicz</p>
    <div class="grid cols-3 stagger mt-2xl" style="position:relative;z-index:2">
      <div class="card card-dark"><p class="quote-text" style="color:rgba(255,255,255,.92)">Super przedszkole z indywidualnym podejściem do każdego dziecka.</p><p class="quote-author" style="color:var(--gold-soft)">— Agnieszka</p></div>
      <div class="card card-dark"><p class="quote-text" style="color:rgba(255,255,255,.92)">Zadowolenie z kadry, atmosfery, małych grup i różnorodnych zajęć.</p><p class="quote-author" style="color:var(--gold-soft)">— Anna Łucja</p></div>
      <div class="card card-dark"><p class="quote-text" style="color:rgba(255,255,255,.92)">Widoczna poprawa w rozwoju emocjonalnym i intelektualnym dziecka.</p><p class="quote-author" style="color:var(--gold-soft)">— Agnieszka Zawadzka</p></div>
    </div>
  </div>
</section>

<!-- S8: University -->
<section class="section" aria-labelledby="uni2-h">
  <div class="container">
    <div class="split reverse">
      <div class="arch-editorial reveal reveal--left"><img src="<?php echo $t; ?>/assets/img/sala-edukacyjna.webp" width="800" height="544" loading="lazy" alt="Zajęcia edukacyjne w małej grupie"></div>
      <div class="reveal">
        <p class="eyebrow">Czarodziejski Uniwersytet</p>
        <h2 id="uni2-h">Szkolenia, porady, ciekawostki</h2>
        <p class="lead">Nasz Uniwersytet to przestrzeń wiedzy dla rodziców — warsztaty, konsultacje specjalistyczne i materiały wspierające rozwój Twojego dziecka.</p>
        <a href="<?php echo esc_url( home_url('/blog/') ); ?>" class="btn btn-ghost mt-lg">Odwiedź Uniwersytet<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
      </div>
    </div>
  </div>
</section>

<!-- S9: CTA Band -->
<section class="cta-band" aria-labelledby="cta2-h">
  <div class="magic-orb lilac orb-cta-1" aria-hidden="true"></div><div class="magic-orb warm orb-cta-2" aria-hidden="true"></div>
  <div class="container" style="position:relative;z-index:2">
    <p class="eyebrow" style="justify-content:center">Zapraszamy</p>
    <h2 id="cta2-h">Zapisz dziecko do Czarodziejskiego Dworku</h2>
    <p class="cta-info">ul. Górczewska 89, 01-401 Warszawa · 7:00–18:00<br><a href="tel:+48690629501">690 629 501</a> / <a href="tel:+48510318948">510 318 948</a></p>
    <div class="cta-actions"><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>" class="btn btn-accent">Zapisz się na adaptację</a><a href="tel:+48690629501" class="btn btn-light">Zadzwoń</a></div>
  </div>
</section>


</main>
<?php get_footer();
