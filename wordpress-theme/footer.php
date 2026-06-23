<?php $t = get_template_directory_uri(); ?>
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo-text">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="10" r="4"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 14c0 2.2 1.8 4 4 4s4-1.8 4-4"/></svg>
          Czarodziejski Dworek
        </div>
        <p>Przedszkole integracyjne na warszawskiej Woli. Od 2003 roku wspieramy wszechstronny rozwój dzieci.</p>
        <div class="footer-social">
          <a href="https://www.facebook.com/czarodziejskidworek/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
          <a href="https://www.instagram.com/czarodziejski_dworek/" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
          <a href="<?php echo esc_url( home_url('/blog/') ); ?>" aria-label="Blog"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></a>
        </div>
      </div>
      <div>
        <h2>Nawigacja</h2>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url( home_url('/') ); ?>">Start</a></li>
          <li><a href="<?php echo esc_url( home_url('/o-nas/') ); ?>">O nas</a></li>
          <li><a href="<?php echo esc_url( home_url('/nauczyciele/') ); ?>">Nauczyciele</a></li>
          <li><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url( home_url('/galeria/') ); ?>">Galeria</a></li>
          <li><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>">Kontakt</a></li>
        </ul>
      </div>
      <div>
        <h2>Oferta</h2>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url( home_url('/program/') ); ?>">Program</a></li>
          <li><a href="<?php echo esc_url( home_url('/program/') ); ?>#zajecia">Basen</a></li>
          <li><a href="<?php echo esc_url( home_url('/program/') ); ?>#zajecia">Angielski</a></li>
          <li><a href="<?php echo esc_url( home_url('/program/') ); ?>#zajecia">Francuski</a></li>
          <li><a href="<?php echo esc_url( home_url('/program/') ); ?>#zajecia">Muzyka</a></li>
          <li><a href="<?php echo esc_url( home_url('/wczesne-wspomaganie-rozwoju/') ); ?>">WWR</a></li><li><a href="<?php echo esc_url( home_url('/adaptacja/') ); ?>">Adaptacja</a></li>
        </ul>
      </div>
      <div>
        <h2>Kontakt</h2>
        <ul class="footer-links">
          <li><?php echo esc_html( cd_opt('cd_adres') ); ?></li>
          <li><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel1') ) ); ?>"><?php echo esc_html( cd_opt('cd_tel1') ); ?></a></li>
          <li><a href="<?php echo esc_attr( cd_tel_href( cd_opt('cd_tel2') ) ); ?>"><?php echo esc_html( cd_opt('cd_tel2') ); ?></a></li>
          <li><a href="mailto:<?php echo esc_attr( cd_opt('cd_email') ); ?>"><?php echo esc_html( cd_opt('cd_email') ); ?></a></li>
          <li><?php echo esc_html( cd_opt('cd_godziny') ); ?></li>
          <li>NIP: <?php echo esc_html( cd_opt('cd_nip') ); ?></li>
          <li>Konto (ING): <?php echo esc_html( cd_opt('cd_konto') ); ?></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; 2026 Integracyjne Przedszkole Niepubliczne Językowo - Muzyczne Czarodziejski Dworek</span>
      <span><a href="<?php echo esc_url( home_url('/kontakt/') ); ?>#dokumenty">Polityka prywatności</a> | <a href="<?php echo esc_url( home_url('/kontakt/') ); ?>#dokumenty">RODO</a></span>
    </div>
  </div>
</footer>

<!-- Cookie banner -->
<div class="cookie-banner" role="alert">
  <p>Serwis wykorzystuje pliki cookies. Korzystając ze strony wyrażasz zgodę na wykorzystywanie plików cookies.</p>
  <button>Rozumiem</button>
</div>

<?php wp_footer(); ?>
</body>
</html>
