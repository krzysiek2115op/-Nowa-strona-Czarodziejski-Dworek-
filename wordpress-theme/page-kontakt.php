<?php
/* Szablon podstrony: kontakt (port 1:1 ze statycznej) */
get_header();
$t = get_template_directory_uri();
?>
<main id="main-content">


<!-- S1: Hero -->
<section class="page-hero tint-plum" aria-labelledby="contact-title">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Ścieżka"><ol><li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li><li class="sep" aria-hidden="true">›</li><li class="current" aria-current="page">Kontakt</li></ol></nav>
    <div class="reveal" style="max-width:55ch">
      <h1 id="contact-title">Kontakt</h1>
      <p class="lead">Zapraszamy — odezwij się do nas telefonicznie, mailowo lub przez formularz</p>
    </div>
  </div>
</section>

<!-- S2: Dane (złote kafle) + uniesiony panel formularza -->
<section class="section" aria-labelledby="nap-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Dane kontaktowe</p>
      <h2 id="nap-h" style="font-size:clamp(1.6rem,3.2vw,2.2rem)">Integracyjne Przedszkole „Czarodziejski Dworek"</h2>
    </div>

    <!-- Złote kafle -->
    <div class="contact-tiles stagger">
      <div class="contact-tile">
        <span class="contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
        <p class="contact-tile-label">Adres</p>
        <p class="contact-tile-val">ul. Górczewska 89<br>01-401 Warszawa, Wola</p>
      </div>
      <div class="contact-tile">
        <span class="contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
        <p class="contact-tile-label">Telefon</p>
        <p class="contact-tile-val"><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>"><?php echo esc_html( cd_opt('cd_tel1') ); ?></a><br><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel2') ) ); ?>"><?php echo esc_html( cd_opt('cd_tel2') ); ?></a></p>
      </div>
      <div class="contact-tile">
        <span class="contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
        <p class="contact-tile-label">E-mail</p>
        <p class="contact-tile-val"><a href="mailto:<?php echo esc_attr( cd_opt('cd_email') ); ?>"><?php echo str_replace( '@', '@<wbr>', esc_html( cd_opt('cd_email') ) ); ?></a></p>
      </div>
      <div class="contact-tile">
        <span class="contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
        <p class="contact-tile-label">Godziny</p>
        <p class="contact-tile-val">Pon.–Pt.<br><?php echo esc_html( cd_opt('cd_godziny') ); ?></p>
      </div>
    </div>

    <p class="contact-fine reveal"><strong>NIP</strong> <?php echo esc_html( cd_opt('cd_nip') ); ?><span class="dot" aria-hidden="true">•</span><strong>Konto (ING Bank Śląski)</strong> <?php echo esc_html( cd_opt('cd_konto') ); ?></p>

    <!-- Uniesiony panel formularza -->
    <div class="contact-panel reveal">
      <div class="section-head center">
        <p class="eyebrow">Napisz do nas</p>
        <h2 id="form-heading" style="font-size:clamp(1.4rem,2.8vw,1.9rem)">Formularz kontaktowy</h2>
        <p class="lead" style="margin-bottom:0">Wypełnij formularz — odezwiemy się najszybciej, jak to możliwe.</p>
      </div>

      <!--
        Dział 4 / backend-integracje — Web3Forms
        Klucz Web3Forms ustawia sie w panelu: Wyglad → Dostosuj → Formularze kontaktowe.
        (instrukcja: 3-FORMULARZE-KONTAKTOWE).
      -->
      <form id="contact-form" action="https://api.web3forms.com/submit" method="POST" novalidate>
        <input type="hidden" name="access_key" value="<?php echo esc_attr( get_theme_mod( 'cd_web3forms_key', '' ) ); ?>">
        <input type="hidden" name="subject" value="Nowe zgłoszenie ze strony — Czarodziejski Dworek">
        <input type="hidden" name="from_name" value="Formularz kontaktowy — Czarodziejski Dworek">
        <input type="hidden" name="replyto" value="">
        <!-- Honeypot (Web3Forms native) -->
        <input type="checkbox" name="botcheck" class="hidden" style="display:none!important" tabindex="-1">
        <!-- Honeypot (dodatkowy, CSS-ukryty) -->
        <div class="hp-field" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;overflow:hidden"><input type="text" name="url" tabindex="-1" autocomplete="off"></div>

        <div class="contact-form-grid">
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
          <div class="form-group full">
            <select id="topic" name="topic" required aria-describedby="topic-err">
              <option value="" disabled selected>— wybierz temat —</option>
              <option value="Adaptacja">Adaptacja</option>
              <option value="WWR">WWR</option>
              <option value="Zapis">Zapis</option>
              <option value="Inne">Inne</option>
            </select>
            <label for="topic">Temat <span aria-hidden="true">*</span></label>
            <span class="field-error" id="topic-err">Wybierz temat</span>
          </div>
          <div class="form-group full">
            <textarea id="message" name="message" rows="4" placeholder=" "></textarea>
            <label for="message">Wiadomość</label>
          </div>
        </div>
        <div class="form-consent">
          <label>
            <input type="checkbox" name="consent" required aria-describedby="consent-err">
            <span>Wyrażam zgodę na przetwarzanie danych osobowych w celu obsługi zapytania, zgodnie z <a href="#dokumenty">Polityką prywatności</a>. <span aria-hidden="true">*</span></span>
          </label>
          <span class="field-error" id="consent-err">Zgoda jest wymagana</span>
        </div>
        <button type="submit" class="btn btn-primary btn-full" style="margin-top:12px">Wyślij wiadomość<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg></button>
        <div id="form-status" class="form-status" style="display:none" role="alert" aria-live="polite"></div>
      </form>
    </div>
  </div>
</section>

<!-- S4: Mapa dojazdu (układ jak na stronie głównej — split + łuk) -->
<section class="section tint-gold" aria-labelledby="map-h">
  <div class="container">
    <div class="split">
      <div class="reveal">
        <p class="eyebrow">Jak dojechać</p>
        <h2 id="map-h">Znajdziesz nas na Woli</h2>
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

<!-- S5: Documents -->
<section id="dokumenty" class="section" aria-labelledby="docs-h">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">Dokumenty</p>
      <h2 id="docs-h">Do pobrania</h2>
    </div>
    <div class="grid cols-2 stagger" style="max-width:800px;margin-inline:auto">
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/karta-informacyjna-o-dziecku.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Karta informacyjna o dziecku</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/wniosek-i-oswiadczenie-wwr.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Wniosek i oświadczenie — WWR</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/regulamin-przedszkola.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Regulamin przedszkola</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/statut-przedszkola.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Statut przedszkola</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/klauzula-informacyjna-rodo.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Klauzula informacyjna RODO</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/polityka-prywatnosci.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Polityka prywatności</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
      <a class="document-card" href="<?php echo $t; ?>/assets/docs/polityka-ochrony-dzieci-przed-krzywdzeniem.pdf" download><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg><div><h3>Polityka ochrony dzieci przed krzywdzeniem</h3><span class="link-arrow">Pobierz (PDF)</span></div></a>
    </div>
    <p class="docs-note">Pliki PDF otwierają się w nowej karcie.</p>
  </div>
</section>

<!-- S6: Social -->
<section class="section deep" aria-labelledby="social-contact-h">
  <div class="container text-center">
    <p class="eyebrow reveal" style="justify-content:center">Znajdź nas</p>
    <h2 id="social-contact-h" class="reveal">Nasze media</h2>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;margin-top:24px" class="reveal">
      <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" class="btn btn-ghost">Facebook<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      <a href="<?php echo esc_url( home_url('/blog/') ); ?>" class="btn btn-ghost">Blog<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      <a href="https://www.instagram.com/czarodziejski_dworek/" target="_blank" rel="noopener" class="btn btn-ghost">Instagram<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
    </div>
  </div>
</section>

<!-- S7: CTA telephone -->
<section class="cta-band" aria-labelledby="cta-phone-h">
  <div class="container" style="position:relative;z-index:2">
    <h2 id="cta-phone-h">Zadzwoń do nas</h2>
    <div class="cta-actions mt-lg">
      <a href="tel:+48690629501" class="btn btn-accent" style="font-size:1.15rem"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width:20px;height:20px"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>690 629 501</a>
      <a href="tel:+48510318948" class="btn btn-light">510 318 948</a>
    </div>
  </div>
</section>


</main>
<?php get_footer();
