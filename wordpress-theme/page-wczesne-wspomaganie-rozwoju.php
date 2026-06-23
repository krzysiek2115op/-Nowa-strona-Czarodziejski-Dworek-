<?php
/* Szablon podstrony: wczesne-wspomaganie-rozwoju (port 1:1 ze statycznej) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero tint-plum" aria-labelledby="wwr-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Wczesne wspomaganie rozwoju</li></ol></nav>
    <div class="page-hero-grid">
      <div class="reveal">
        <p class="eyebrow">Wsparcie terapeutyczne</p>
        <h1 id="wwr-title">Wczesne wspomaganie rozwoju</h1>
        <p class="lead" style="margin-top:18px">Bezpłatne, indywidualne zajęcia terapeutyczne dla dzieci z opinią o WWR — z naszego przedszkola i spoza niego. Zespół specjalistów na miejscu otacza opieką dziecko i wspiera całą rodzinę.</p>
        <div class="hero-facts">
          <span>Bezpłatne</span><span>Dla dzieci z opinią o WWR</span><span>Również spoza przedszkola</span><span>Specjaliści na miejscu</span>
        </div>
        <div style="display:flex;flex-wrap:wrap;gap:14px;margin-top:26px">
          <a href="#kontakt-wwr" class="btn btn-primary">Zapytaj o WWR<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a>
          <a href="tel:+48690629501" class="btn btn-light">Zadzwoń: 690 629 501</a>
        </div>
      </div>
      <div class="page-hero-media reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/integracja-si.webp" width="408" height="510" loading="eager" fetchpriority="high" alt="Zajęcia terapeutyczne — integracja sensoryczna w przedszkolu Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S2: Czym jest WWR -->
<section class="section" aria-labelledby="czym-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Na czym polega</p>
      <h2 id="czym-h">Czym jest WWR?</h2>
      <p class="lead">Wczesne wspomaganie rozwoju to bezpłatne, indywidualne sesje terapeutyczne prowadzone przez specjalistów: psychologa, logopedę, pedagoga specjalnego, terapeutę integracji sensorycznej i fizjoterapeutę. Celem jest jak najwcześniejsze pobudzanie rozwoju dziecka — od chwili wykrycia trudności aż do rozpoczęcia nauki w szkole.</p>
    </div>
    <div class="highlight-box reveal" style="max-width:560px;margin-inline:auto">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
      Również dla dzieci spoza przedszkola — wystarczy opinia o potrzebie wczesnego wspomagania rozwoju wydana przez poradnię psychologiczno‑pedagogiczną.
    </div>
  </div>
</section>

<!-- S3: Dla kogo -->
<section class="section tint-gold" aria-labelledby="dlakogo-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Dla kogo</p>
        <h2 id="dlakogo-h">Komu pomagają zajęcia WWR</h2>
        <ul style="display:flex;flex-direction:column;gap:14px;margin-top:18px">
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Dzieci posiadające opinię o potrzebie wczesnego wspomagania rozwoju z poradni</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Dzieci z naszego przedszkola <strong>oraz spoza placówki</strong></li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Dzieci z opóźnieniem lub zaburzeniami rozwoju, trudnościami w komunikacji, mowie, integracji sensorycznej lub motoryce</li>
          <li style="display:flex;align-items:flex-start;gap:10px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px;color:var(--brand);flex-shrink:0;margin-top:3px"><polyline points="20 6 9 17 4 12"/></svg>Rodziny — wsparciem i konsultacjami obejmujemy także rodziców</li>
        </ul>
      </div>
      <div class="arch-editorial reveal reveal--right">
        <img src="<?php echo $t; ?>/assets/img/fizjoterapia.webp" srcset="<?php echo $t; ?>/assets/img/fizjoterapia.webp 600w" width="600" height="400" loading="lazy" alt="Indywidualne zajęcia terapeutyczne z dzieckiem w przedszkolu Czarodziejski Dworek">
      </div>
    </div>
  </div>
</section>

<!-- S4: Rodzaje terapii -->
<section class="section dark" aria-labelledby="terapie-h" data-bg="<?php echo $t; ?>/assets/img/gal-DSCN8672.webp">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Zakres wsparcia</p>
      <h2 id="terapie-h">Terapie w ramach WWR</h2>
      <p class="lead">Zakres i intensywność zajęć dobieramy indywidualnie, na podstawie diagnozy i potrzeb dziecka.</p>
    </div>
    <div class="grid cols-3 stagger mt-xl">
      <div class="card card-dark"><h3>Terapia logopedyczna</h3><p>Neurologopedzi pracują nad artykulacją, funkcjami mowy i komunikacją — także metodą wspomagającą PECS.</p></div>
      <div class="card card-dark"><h3>Terapia psychologiczna</h3><p>Psycholodzy kliniczni wspierają rozwój emocjonalny i społeczny dziecka oraz całą rodzinę.</p></div>
      <div class="card card-dark"><h3>Terapia pedagogiczna</h3><p>Rozwój funkcji poznawczych, koncentracji i gotowości szkolnej w bezpiecznej atmosferze.</p></div>
      <div class="card card-dark"><h3>Integracja sensoryczna (SI)</h3><p>Certyfikowani terapeuci pomagają w przetwarzaniu bodźców, koordynacji i samoregulacji.</p></div>
      <div class="card card-dark"><h3>Fizjoterapia</h3><p>Praca nad postawą, napięciem mięśniowym i motoryką, dobrana do potrzeb dziecka.</p></div>
      <div class="card card-dark"><h3>Trening Umiejętności Społecznych (TUS)</h3><p>Komunikacja, współpraca i rozpoznawanie emocji w małych grupach rówieśniczych.</p></div>
    </div>
  </div>
</section>

<!-- S5: Kto prowadzi -->
<section class="section" aria-labelledby="kto-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Zespół</p>
      <h2 id="kto-h">Kto prowadzi zajęcia</h2>
      <p class="lead">Zajęcia prowadzą doświadczeni specjaliści zatrudnieni na miejscu — psycholodzy kliniczni z przygotowaniem psychoterapeutycznym, neurologopedzi, certyfikowani terapeuci SI, fizjoterapeuta (mgr AWF) i pedagodzy specjalni. Rodzice nie muszą wozić dziecka do zewnętrznych gabinetów: cały zespół współpracuje pod jednym dachem i wspólnie planuje terapię.</p>
    </div>
    <div class="text-center reveal"><a href="<?php echo esc_url( home_url('/nauczyciele/') ); ?>" class="btn btn-ghost">Poznaj naszą kadrę<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></a></div>
  </div>
</section>

<!-- S6: Jak dołączyć -->
<section class="section deep" aria-labelledby="proces-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Krok po kroku</p>
      <h2 id="proces-h">Jak zapisać dziecko na WWR</h2>
    </div>
    <ol class="wwr-steps">
      <li class="wwr-step reveal">
        <span class="wwr-step-num" aria-hidden="true">1</span>
        <h3>Opinia o WWR</h3>
        <p>Uzyskaj w poradni psychologiczno‑pedagogicznej opinię o potrzebie wczesnego wspomagania rozwoju.</p>
      </li>
      <li class="wwr-step reveal">
        <span class="wwr-step-num" aria-hidden="true">2</span>
        <h3>Kontakt</h3>
        <p>Zadzwoń lub wypełnij formularz — odpowiemy na pytania i umówimy spotkanie.</p>
      </li>
      <li class="wwr-step reveal">
        <span class="wwr-step-num" aria-hidden="true">3</span>
        <h3>Spotkanie i diagnoza</h3>
        <p>Poznajemy dziecko i jego potrzeby, omawiamy z rodzicami zakres wsparcia.</p>
      </li>
      <li class="wwr-step reveal">
        <span class="wwr-step-num" aria-hidden="true">4</span>
        <h3>Indywidualny program</h3>
        <p>Zespół opracowuje plan terapii i rozpoczyna regularne, indywidualne zajęcia.</p>
      </li>
    </ol>
    <p class="text-center reveal" style="margin-top:28px;color:var(--ink-soft)">Potrzebne dokumenty (wniosek i oświadczenie WWR) pobierzesz w sekcji <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>#dokumenty">Kontakt → Do pobrania</a>.</p>
  </div>
</section>

<!-- S7: FAQ -->
<section class="section" aria-labelledby="faq-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Pytania rodziców</p>
      <h2 id="faq-h">Najczęstsze pytania o WWR</h2>
    </div>
    <div class="grid cols-2 stagger" style="align-items:start">
      <div class="activity-tile"><h3>Czy zajęcia WWR są płatne?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-1">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-1"><div><p>Nie. Wczesne wspomaganie rozwoju jest bezpłatne — finansowane z subwencji oświatowej. Rodzice nie ponoszą kosztów zajęć ani diagnozy prowadzonej w ramach WWR.</p></div></div></div>
      <div class="activity-tile"><h3>Czy z WWR mogą korzystać dzieci spoza przedszkola?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-2">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-2"><div><p>Tak. Z zajęć WWR mogą korzystać zarówno dzieci uczęszczające do naszego przedszkola, jak i spoza placówki. Wystarczy opinia o potrzebie wczesnego wspomagania rozwoju wydana przez poradnię.</p></div></div></div>
      <div class="activity-tile"><h3>Jak uzyskać opinię o WWR?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-3">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-3"><div><p>Opinię wydaje bezpłatnie publiczna poradnia psychologiczno‑pedagogiczna właściwa dla miejsca zamieszkania dziecka. Chętnie pomożemy zorientować się w procedurze i potrzebnych dokumentach.</p></div></div></div>
      <div class="activity-tile"><h3>Jakie terapie obejmuje WWR?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-4">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-4"><div><p>Logopedyczną, psychologiczną, pedagogiczną, integrację sensoryczną (SI), fizjoterapię oraz TUS. Zakres dobieramy indywidualnie do potrzeb dziecka.</p></div></div></div>
      <div class="activity-tile"><h3>Od jakiego wieku można rozpocząć?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-5">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-5"><div><p>Od chwili wykrycia niepełnosprawności lub trudności rozwojowych, aż do rozpoczęcia nauki w szkole. Im wcześniej, tym lepsze efekty wspomagania.</p></div></div></div>
      <div class="activity-tile"><h3>Czy rodzic jest zaangażowany w terapię?</h3><button class="activity-toggle" type="button" aria-expanded="false" aria-controls="faq-6">Pokaż odpowiedź <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg></button><div class="activity-details" id="faq-6"><div><p>Tak. Wczesne wspomaganie obejmuje wsparciem całą rodzinę — udzielamy konsultacji, pokazujemy, jak pracować z dzieckiem w domu, i wspólnie monitorujemy postępy.</p></div></div></div>
    </div>
  </div>
</section>

<!-- S8: Kontakt / formularz -->
<section id="kontakt-wwr" class="section tint-plum wwr-contact" aria-labelledby="kontakt-wwr-h">
  <div class="wwr-orb" style="width:300px;height:300px;background:radial-gradient(circle,#e6c87e,transparent 70%);top:-90px;right:-70px" aria-hidden="true"></div>
  <div class="wwr-orb" style="width:340px;height:340px;background:radial-gradient(circle,#b98aa6,transparent 70%);bottom:-120px;left:-90px" aria-hidden="true"></div>
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Napisz do nas</p>
        <h2 id="kontakt-wwr-h">Zapytaj o WWR</h2>
        <p style="color:var(--ink-soft);margin:14px 0 24px;max-width:46ch">Masz pytania o wczesne wspomaganie rozwoju lub chcesz zapisać dziecko? Zostaw kontakt — oddzwonimy i wszystko wyjaśnimy.</p>
        <ul style="display:flex;flex-direction:column;gap:14px;list-style:none;padding:0">
          <li style="display:flex;align-items:center;gap:14px"><span class="wwr-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span><span><a href="tel:+48690629501">690 629 501</a> · <a href="tel:+48510318948">510 318 948</a></span></li>
          <li style="display:flex;align-items:center;gap:14px"><span class="wwr-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span><a href="mailto:kontakt@czarodziejski-dworek.pl">kontakt@czarodziejski-dworek.pl</a></li>
          <li style="display:flex;align-items:center;gap:14px"><span class="wwr-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>ul. Górczewska 89, 01‑401 Warszawa (Wola)</li>
        </ul>
      </div>
      <div class="reveal reveal--right">
        <div class="wwr-form-panel">
        <form id="contact-form" action="https://api.web3forms.com/submit" method="POST" novalidate>
          <input type="hidden" name="access_key" value="<?php echo esc_attr( get_theme_mod( 'cd_web3forms_key', '' ) ); ?>">
          <input type="hidden" name="subject" value="WWR — nowe zgłoszenie ze strony Czarodziejski Dworek">
          <input type="hidden" name="from_name" value="Formularz WWR — Czarodziejski Dworek">
          <input type="hidden" name="replyto" value="">
          <input type="checkbox" name="botcheck" class="hidden" style="display:none!important" tabindex="-1">
          <div class="hp-field" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;overflow:hidden"><input type="text" name="url" tabindex="-1" autocomplete="off"></div>
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
          <div class="form-group">
            <input type="email" id="email" name="email" required placeholder=" " autocomplete="email" aria-describedby="email-err">
            <label for="email">E-mail <span aria-hidden="true">*</span></label>
            <span class="field-error" id="email-err">Podaj poprawny adres e-mail</span>
          </div>
          <div class="form-group">
            <input type="text" id="year" name="child_year" placeholder=" ">
            <label for="year">Rocznik dziecka</label>
          </div>
          <div class="form-group">
            <select id="topic" name="topic" required aria-describedby="topic-err">
              <option value="" disabled>— wybierz —</option>
              <option value="WWR" selected>WWR</option>
              <option value="Adaptacja">Adaptacja</option>
              <option value="Zapis">Zapis</option>
              <option value="Inne">Inne</option>
            </select>
            <label for="topic">Temat <span aria-hidden="true">*</span></label>
            <span class="field-error" id="topic-err">Wybierz temat</span>
          </div>
          <div class="form-group">
            <textarea id="message" name="message" rows="4" placeholder=" "></textarea>
            <label for="message">Wiadomość</label>
          </div>
          <div class="form-consent">
            <label>
              <input type="checkbox" name="consent" required aria-describedby="consent-err">
              <span>Wyrażam zgodę na przetwarzanie danych osobowych w celu obsługi zapytania, zgodnie z <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>#dokumenty">Polityką prywatności</a>. <span aria-hidden="true">*</span></span>
            </label>
            <span class="field-error" id="consent-err">Zgoda jest wymagana</span>
          </div>
          <button type="submit" class="btn btn-primary btn-full" style="margin-top:12px">Wyślij wiadomość<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></button>
          <div id="form-status" class="form-status" style="display:none" role="alert" aria-live="polite"></div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- S9: CTA -->
<section class="cta-band" aria-labelledby="cta-wwr-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-wwr-h">Wesprzyj rozwój swojego dziecka</h2>
    <div class="cta-actions mt-lg"><a href="#kontakt-wwr" class="btn btn-accent">Napisz do nas</a><a href="tel:+48690629501" class="btn btn-light">Zadzwoń: 690 629 501</a></div>
  </div>
</section>


</main>
<?php get_footer();
