/* ============================================================
   Czarodziejski Dworek — Main JS
   No frameworks, no jQuery. Transform-only animations.
   Guards: prefers-reduced-motion, pointer:fine, no-JS fallback.
   ============================================================ */

(function () {
  'use strict';

  // Mark JS enabled
  document.documentElement.classList.remove('no-js');
  document.documentElement.classList.add('js');

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isFinePonter = window.matchMedia('(pointer: fine)').matches;

  // --- Nav scroll state ---
  const nav = document.querySelector('.nav');
  if (nav) {
    let ticking = false;
    const onScroll = () => {
      if (!ticking) {
        requestAnimationFrame(() => {
          nav.classList.toggle('scrolled', window.scrollY > 60);
          ticking = false;
        });
        ticking = true;
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // --- Scroll progress ---
  const progressBar = document.querySelector('.scroll-progress');
  if (progressBar && !prefersReducedMotion) {
    let progTick = false;
    window.addEventListener('scroll', () => {
      if (!progTick) {
        requestAnimationFrame(() => {
          const h = document.documentElement.scrollHeight - window.innerHeight;
          progressBar.style.transform = 'scaleX(' + (h > 0 ? window.scrollY / h : 0) + ')';
          progTick = false;
        });
        progTick = true;
      }
    }, { passive: true });
  }

  // --- Mobile drawer ---
  const burger = document.querySelector('.nav-burger');
  const drawer = document.querySelector('.drawer');
  const backdrop = document.querySelector('.drawer-backdrop');
  const drawerClose = document.querySelector('.drawer-close');

  function openDrawer() {
    drawer && drawer.classList.add('open');
    backdrop && backdrop.classList.add('open');
    document.body.classList.add('no-scroll');
    burger && burger.setAttribute('aria-expanded', 'true');
    // Focus na PANEL szuflady (nie na przycisk X): przenosi focus do menu dla
    // dostępności, ale BEZ pierścienia focusa — iOS pokazywał „kółko” na X.
    if (drawer) { drawer.setAttribute('tabindex', '-1'); drawer.focus(); }
  }
  function closeDrawer() {
    drawer && drawer.classList.remove('open');
    backdrop && backdrop.classList.remove('open');
    document.body.classList.remove('no-scroll');
    burger && burger.setAttribute('aria-expanded', 'false');
    burger && burger.focus();
  }

  burger && burger.addEventListener('click', openDrawer);
  drawerClose && drawerClose.addEventListener('click', closeDrawer);
  backdrop && backdrop.addEventListener('click', closeDrawer);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('open')) closeDrawer();
  });

  // Close drawer on link click
  if (drawer) {
    drawer.querySelectorAll('a').forEach(a => a.addEventListener('click', closeDrawer));
  }

  // --- Scroll Reveal (IntersectionObserver) ---
  if (!prefersReducedMotion) {
    const revealEls = document.querySelectorAll('.reveal, .stagger, .trust-bar');
    if (revealEls.length && 'IntersectionObserver' in window) {
      const obs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-in');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0, rootMargin: '0px 0px -40px 0px' });
      revealEls.forEach(el => obs.observe(el));
      // Siatka bezpieczeństwa: po pełnym załadowaniu ujawnij elementy już w viewporcie
      // (zabezpieczenie, gdyby obserwator pominął bardzo wysokie kontenery na mobile).
      window.addEventListener('load', () => {
        revealEls.forEach(el => {
          if (el.classList.contains('is-in')) return;
          const r = el.getBoundingClientRect();
          if (r.top < window.innerHeight && r.bottom > 0) { el.classList.add('is-in'); obs.unobserve(el); }
        });
      });
    }
  }

  // --- Count-up animation ---
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length && 'IntersectionObserver' in window) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const target = parseInt(el.getAttribute('data-count'), 10);
          const suffix = el.getAttribute('data-suffix') || '';
          if (prefersReducedMotion) {
            el.textContent = target + suffix;
          } else {
            animateCount(el, target, suffix);
          }
          countObs.unobserve(el);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(c => countObs.observe(c));
  }

  function animateCount(el, target, suffix) {
    const duration = 2000;
    const start = performance.now();
    function step(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
      el.textContent = Math.round(eased * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  // --- Card cursor glow ---
  if (isFinePonter && !prefersReducedMotion) {
    document.querySelectorAll('.card, .activity-tile').forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        card.style.setProperty('--mx', ((e.clientX - rect.left) / rect.width * 100) + '%');
        card.style.setProperty('--my', ((e.clientY - rect.top) / rect.height * 100) + '%');
      });
    });
  }

  // --- Lightbox ---
  const lightbox = document.querySelector('.lightbox');
  const lightboxImg = lightbox && lightbox.querySelector('img');
  const tiles = document.querySelectorAll('.gtile');
  let lightboxSrcs = [];
  let lightboxIdx = 0;

  tiles.forEach((tile, i) => {
    const img = tile.querySelector('img');
    if (img) lightboxSrcs.push(img.src);
    tile.addEventListener('click', () => {
      lightboxIdx = i;
      openLightbox(lightboxSrcs[i]);
    });
    tile.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        lightboxIdx = i;
        openLightbox(lightboxSrcs[i]);
      }
    });
  });

  function openLightbox(src) {
    if (!lightbox || !lightboxImg) return;
    lightboxImg.src = src;
    lightbox.classList.add('open');
    lightbox.setAttribute('aria-hidden', 'false');
    document.body.classList.add('no-scroll');
    lightbox.querySelector('.lightbox-close').focus();
  }

  function closeLightbox() {
    if (!lightbox) return;
    lightbox.classList.remove('open');
    lightbox.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('no-scroll');
    if (tiles[lightboxIdx]) tiles[lightboxIdx].focus();
  }

  function isTileVisible(i) {
    var cl = (tiles[i] && tiles[i].closest) ? tiles[i].closest('.gal-cluster') : null;
    return !cl || !cl.classList.contains('is-hidden');
  }
  function nextLightbox() {
    if (!lightboxSrcs.length) return;
    var i = lightboxIdx;
    do { i = (i + 1) % lightboxSrcs.length; } while (i !== lightboxIdx && !isTileVisible(i));
    lightboxIdx = i;
    if (lightboxImg) lightboxImg.src = lightboxSrcs[lightboxIdx];
  }
  function prevLightbox() {
    if (!lightboxSrcs.length) return;
    var i = lightboxIdx;
    do { i = (i - 1 + lightboxSrcs.length) % lightboxSrcs.length; } while (i !== lightboxIdx && !isTileVisible(i));
    lightboxIdx = i;
    if (lightboxImg) lightboxImg.src = lightboxSrcs[lightboxIdx];
  }

  // Focus trap inside lightbox (P6 a11y)
  function trapFocusInLightbox(e) {
    if (!lightbox || !lightbox.classList.contains('open')) return;
    if (e.key !== 'Tab') return;
    var focusable = lightbox.querySelectorAll('button:not([disabled]), [tabindex]:not([tabindex="-1"])');
    if (!focusable.length) return;
    var first = focusable[0];
    var last = focusable[focusable.length - 1];
    if (e.shiftKey) {
      if (document.activeElement === first) { e.preventDefault(); last.focus(); }
    } else {
      if (document.activeElement === last) { e.preventDefault(); first.focus(); }
    }
  }

  if (lightbox) {
    lightbox.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    lightbox.querySelector('.lightbox-prev') && lightbox.querySelector('.lightbox-prev').addEventListener('click', prevLightbox);
    lightbox.querySelector('.lightbox-next') && lightbox.querySelector('.lightbox-next').addEventListener('click', nextLightbox);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', (e) => {
      if (!lightbox.classList.contains('open')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight') nextLightbox();
      if (e.key === 'ArrowLeft') prevLightbox();
      trapFocusInLightbox(e);
    });
  }

  // --- Form: Web3Forms integration ---
  const form = document.getElementById('contact-form');
  if (form) {
    const statusEl = document.getElementById('form-status');
    const submitBtn = form.querySelector('button[type="submit"]');
    const btnOriginalHTML = submitBtn ? submitBtn.innerHTML : '';
    let isSubmitting = false;

    // Mark error on a field group with optional shake and per-field message
    function markError(field, shake, message) {
      const group = field.closest('.form-group') || field.closest('.form-consent');
      if (!group) return;
      group.classList.add('has-error');
      // Set per-field error message if provided
      var errSpan = group.querySelector('.field-error');
      if (errSpan && message) errSpan.textContent = message;
      if (shake) {
        group.classList.add('shake');
        setTimeout(function () { group.classList.remove('shake'); }, 400);
      }
    }

    // Show status message
    function showStatus(type, html) {
      if (!statusEl) return;
      statusEl.className = 'form-status ' + type;
      statusEl.innerHTML = html;
      statusEl.style.display = 'block';
      statusEl.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'nearest' });
    }

    form.addEventListener('submit', async function (e) {
      e.preventDefault();

      // Block double-submit
      if (isSubmitting) return;

      // Honeypot checks (CSS-hidden field + Web3Forms botcheck)
      var hpField = form.querySelector('.hp-field input');
      if (hpField && hpField.value) return;

      // Clear previous errors
      form.querySelectorAll('.form-group, .form-consent').forEach(function (g) {
        g.classList.remove('has-error', 'shake');
      });
      if (statusEl) { statusEl.className = 'form-status'; statusEl.style.display = 'none'; }

      // --- Validation ---
      var valid = true;
      var firstInvalid = null;

      var requiredFields = form.querySelectorAll('[required]');
      requiredFields.forEach(function (field) {
        // Empty text/select
        if (field.type !== 'checkbox' && !field.value.trim()) {
          markError(field, true, 'To pole jest wymagane');
          valid = false;
          if (!firstInvalid) firstInvalid = field;
          return;
        }
        // Unchecked checkbox
        if (field.type === 'checkbox' && !field.checked) {
          markError(field, false, 'Zgoda jest wymagana');
          valid = false;
          if (!firstInvalid) firstInvalid = field;
          return;
        }
        // E-mail format
        if (field.type === 'email' && field.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value.trim())) {
          markError(field, true, 'Podaj poprawny adres e-mail');
          valid = false;
          if (!firstInvalid) firstInvalid = field;
          return;
        }
        // Phone format (7+ digits, may include +, spaces, dashes, parens)
        if (field.type === 'tel' && field.value && !/^[\d\s\-+()]{7,}$/.test(field.value.trim())) {
          markError(field, true, 'Podaj numer telefonu');
          valid = false;
          if (!firstInvalid) firstInvalid = field;
          return;
        }
      });

      if (!valid) {
        if (firstInvalid) firstInvalid.focus();
        return;
      }

      // --- Prepare submission ---
      isSubmitting = true;
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span class="spinner" aria-hidden="true"></span> Wysyłanie…';

      // Dynamically set replyto = user's email
      var emailField = form.querySelector('#email');
      var replytoField = form.querySelector('input[name="replyto"]');
      if (emailField && replytoField) {
        replytoField.value = emailField.value.trim();
      }

      // Dynamically set from_name = parent's name
      var nameField = form.querySelector('#name');
      var fromNameField = form.querySelector('input[name="from_name"]');
      if (nameField && fromNameField) {
        fromNameField.value = nameField.value.trim() + ' — Czarodziejski Dworek';
      }

      // Dynamic subject with selected topic
      var topicField = form.querySelector('#topic');
      var subjectField = form.querySelector('input[name="subject"]');
      if (topicField && topicField.value && subjectField) {
        subjectField.value = topicField.value + ' — nowe zgłoszenie ze strony Czarodziejski Dworek';
      }

      // Build JSON payload (Web3Forms recommended approach)
      var formData = new FormData(form);
      var jsonData = {};
      formData.forEach(function (value, key) {
        // Skip consent from payload (privacy — not needed in e-mail)
        if (key === 'consent') return;
        jsonData[key] = value;
      });

      try {
        var response = await fetch('https://api.web3forms.com/submit', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(jsonData)
        });

        var result = await response.json();

        if (response.ok && result.success) {
          showStatus('success',
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">' +
            '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>' +
            '<p>Dziękujemy za wiadomość! Odezwiemy się najszybciej jak to możliwe — ' +
            'najpóźniej w ciągu 1 dnia roboczego.</p>');
          form.reset();
          // Reset select label state
          form.querySelectorAll('.form-group select').forEach(function (sel) {
            sel.classList.remove('has-value');
          });
        } else {
          var errMsg = (result && result.message) ? result.message : 'Nieznany błąd serwera';
          throw new Error(errMsg);
        }
      } catch (err) {
        // Eskejpowanie komunikatu z API przed wstawieniem do DOM (defense-in-depth, anty-XSS)
        var detail = (err && err.message ? String(err.message) : '')
          .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        showStatus('error',
          '<p>Nie udało się wysłać wiadomości. ' +
          'Spróbuj ponownie lub zadzwoń: ' +
          '<a href="tel:+48690629501">690&nbsp;629&nbsp;501</a>.</p>' +
          (detail ? '<p class="form-status-detail">' + detail + '</p>' : ''));
      } finally {
        isSubmitting = false;
        submitBtn.disabled = false;
        submitBtn.innerHTML = btnOriginalHTML;
      }
    });
  }

  // --- Cookie banner ---
  const cookie = document.querySelector('.cookie-banner');
  if (cookie) {
    if (localStorage.getItem('cd-cookies') === 'accepted') {
      cookie.classList.add('hidden');
    }
    const btn = cookie.querySelector('button');
    if (btn) {
      btn.addEventListener('click', () => {
        localStorage.setItem('cd-cookies', 'accepted');
        cookie.classList.add('hidden');
      });
    }
  }

  // --- Smooth scroll for anchor links ---
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'start' });
      }
    });
  });

  // --- Select floating label fix ---
  document.querySelectorAll('.form-group select').forEach(sel => {
    const updateLabel = () => {
      if (sel.value) sel.classList.add('has-value');
      else sel.classList.remove('has-value');
    };
    sel.addEventListener('change', updateLabel);
    updateLabel();
  });

  // --- Intro: logo na białym tle. Przy przewijaniu (natywnym!) strona główna wyłania się
  //     pod spodem, a logo dokuje na pasku. 100vh "rozbiegu" daje miejsce na scroll. ---
  const intro = document.getElementById('intro');
  if (intro) {
    const root = document.documentElement;
    const navLogoEl = document.querySelector('.nav-logo');
    const introInner = intro.querySelector('.intro-inner');
    const introMark = intro.querySelector('.intro-mark');
    const navMark = document.querySelector('.nav-logo .nav-logo-mark');

    if (prefersReducedMotion || !introInner || !navMark) {
      intro.classList.add('done');
      if (navLogoEl) navLogoEl.style.opacity = '';
    } else {
      root.classList.add('intro-armed'); // aktywuje .intro-runway (100vh nad treścią)
      if (navLogoEl) navLogoEl.style.opacity = '0';

      let dx = 0, dy = 0, scale = 0.25, runway = 1, ticking = false;
      const draw = () => {
        const p = Math.min(Math.max(window.scrollY / runway, 0), 1);
        introInner.style.transform =
          'translate(' + (dx * p) + 'px,' + (dy * p) + 'px) scale(' + (1 + (scale - 1) * p) + ')';
        intro.style.opacity = String(1 - p);
        intro.style.pointerEvents = (p < 0.08) ? 'auto' : 'none';
        if (navLogoEl) navLogoEl.style.opacity = String(p);
      };
      const measure = () => {
        introInner.style.transform = '';
        const s = introMark.getBoundingClientRect();
        const t = navMark.getBoundingClientRect();
        scale = (s.height > 0) ? t.height / s.height : 0.25;
        if (!isFinite(scale) || scale <= 0) scale = 0.25;
        dx = (t.left + t.width / 2) - (s.left + s.width / 2);
        dy = (t.top + t.height / 2) - (s.top + s.height / 2);
        runway = Math.max(window.innerHeight, 1);
        draw();
      };
      const onScroll = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => { draw(); ticking = false; });
      };
      intro.addEventListener('click', () => {
        window.scrollTo({ top: Math.ceil(runway) + 2, behavior: 'smooth' });
      });
      measure();
      window.addEventListener('scroll', onScroll, { passive: true });
      window.addEventListener('resize', measure, { passive: true });
    }
  }

  /* ---- Dekoracja: magiczne konstelacje na jasnych sekcjach ----
     Iskry połączone cienkimi złotymi liniami, rozsiane przy
     krawędziach (z dala od treści). Subtelne, premium, w klimacie
     "magicznego dworku". Animacje gasi prefers-reduced-motion (CSS). */
  (function magicConstellations() {
    const sections = document.querySelectorAll('.section:not(.dark)');
    if (!sections.length) return;

    const rand = (min, max) => min + Math.random() * (max - min);
    const f1 = (n) => n.toFixed(1);

    // 4-ramienna iskra (wklęsła gwiazdka) o środku (cx,cy) i promieniu R
    function starPath(cx, cy, R) {
      const i = R * 0.30;
      return 'M' + f1(cx) + ' ' + f1(cy - R) +
             'L' + f1(cx + i) + ' ' + f1(cy - i) +
             'L' + f1(cx + R) + ' ' + f1(cy) +
             'L' + f1(cx + i) + ' ' + f1(cy + i) +
             'L' + f1(cx) + ' ' + f1(cy + R) +
             'L' + f1(cx - i) + ' ' + f1(cy + i) +
             'L' + f1(cx - R) + ' ' + f1(cy) +
             'L' + f1(cx - i) + ' ' + f1(cy - i) + 'Z';
    }

    // pojedyncza konstelacja jako <svg> (linia + iskry)
    function constellation(bw, bh, n, left, top) {
      const pad = 14;
      const pts = [];
      for (let k = 0; k < n; k++) pts.push([rand(pad, bw - pad), rand(pad, bh - pad)]);
      pts.sort((a, b) => a[0] - b[0]); // łagodny przebieg lewa→prawa, mniej krzyżowań
      const poly = pts.map((q) => f1(q[0]) + ',' + f1(q[1])).join(' ');
      let stars = '';
      pts.forEach((q) => {
        const r = rand(4.2, 7.6);
        let st = '--t:' + rand(3.6, 7.6).toFixed(2) + 's;animation-delay:-' + rand(0, 6).toFixed(2) + 's';
        if (Math.random() < 0.18) st += ';fill:var(--magic)'; // gdzieniegdzie magiczny akcent
        stars += '<path class="deco-star" d="' + starPath(q[0], q[1], r) + '" style="' + st + '"></path>';
      });
      const style = 'position:absolute;left:' + Math.round(left) + 'px;top:' + Math.round(top) + 'px;' +
                    '--d:' + rand(13, 23).toFixed(1) + 's;--delay:-' + rand(0, 8).toFixed(1) + 's;' +
                    '--rot:' + rand(-4, 4).toFixed(1) + 'deg';
      return '<svg class="deco-con" viewBox="0 0 ' + Math.round(bw) + ' ' + Math.round(bh) + '"' +
             ' width="' + Math.round(bw) + '" height="' + Math.round(bh) + '"' +
             ' style="' + style + '" aria-hidden="true">' +
             '<polyline class="deco-line" points="' + poly + '"></polyline>' + stars + '</svg>';
    }

    function buildField(section) {
      const w = section.offsetWidth, h = section.offsetHeight;
      if (w < 300 || h < 220) return null;
      const small = w < 560;

      const slots = ['tr', 'bl'];                 // przekątna — zawsze
      if (!small) slots.push('tl', 'br');         // pełne narożniki na większych ekranach
      if (h > 640) slots.push(small ? 'mr' : 'ml', small ? '' : 'mr'); // boki przy wysokich sekcjach
      if (h > 1200 && !small) slots.push('ml');
      const uniq = Array.from(new Set(slots)).filter(Boolean);

      let html = '';
      uniq.forEach((slot) => {
        const bw = small ? rand(60, 96) : rand(118, 184);
        const bh = small ? rand(58, 90) : rand(104, 162);
        const n = small ? (Math.random() < 0.5 ? 3 : 4) : (3 + Math.floor(Math.random() * 3));
        const em = small ? 8 : 16;
        const isRight = slot.indexOf('r') !== -1;
        const isBottom = slot === 'bl' || slot === 'br';
        const isMid = slot === 'ml' || slot === 'mr';
        let left = isRight ? (w - bw - rand(em, em + 28)) : rand(em, em + 28);
        let top;
        if (isMid) top = (h - bh) / 2 + rand(-60, 60);
        else if (isBottom) top = h - bh - rand(em + 6, em + 90);
        else top = rand(em + 42, em + 104);
        top = Math.max(8, Math.min(top, h - bh - 8));
        left = Math.max(6, Math.min(left, w - bw - 6));
        html += constellation(bw, bh, n, left, top);
      });

      const field = document.createElement('div');
      field.className = 'deco-field';
      field.setAttribute('aria-hidden', 'true');
      field.dataset.depth = (0.45 + Math.random() * 0.65).toFixed(2);
      field.innerHTML = html;
      return field;
    }

    const list = Array.prototype.filter.call(sections, (sec) => {
      const field = buildField(sec);
      if (!field) return false;
      sec.insertBefore(field, sec.firstChild);
      return true;
    });

    // intro (białe tło z logo) też dostaje konstelacje
    const introEl = document.getElementById('intro');
    if (introEl && !introEl.classList.contains('done')) {
      const introField = buildField(introEl);
      if (introField) introEl.insertBefore(introField, introEl.firstChild);
    }

    // przelicz pozycje po istotnej zmianie szerokości okna
    let lastW = window.innerWidth, rt;
    window.addEventListener('resize', () => {
      clearTimeout(rt);
      rt = setTimeout(() => {
        if (Math.abs(window.innerWidth - lastW) < 100) return;
        lastW = window.innerWidth;
        list.forEach((sec) => {
          const old = sec.querySelector(':scope > .deco-field');
          if (old) old.remove();
          const field = buildField(sec);
          if (field) sec.insertBefore(field, sec.firstChild);
        });
      }, 280);
    }, { passive: true });
  })();

  /* ---- Tło podążające za kursorem: ciepła poświata w warstwie
     dekoracji (POD treścią → nie psuje czytelności) + delikatny
     parallax konstelacji wg głębi (data-depth) ---- */
  (function cursorAmbient() {
    if (!isFinePonter) return;
    let tx = window.innerWidth / 2, ty = window.innerHeight / 2, raf = 0;
    function update() {
      raf = 0;
      const vh = window.innerHeight, vw = window.innerWidth;
      const fields = document.querySelectorAll('.deco-field');
      for (let i = 0; i < fields.length; i++) {
        const f = fields[i];
        const r = f.getBoundingClientRect();
        if (r.width === 0 || r.bottom < -60 || r.top > vh + 60) continue;
        const ax = Math.max(0, Math.min(100, (tx - r.left) / r.width * 100));
        const ay = Math.max(0, Math.min(100, (ty - r.top) / r.height * 100));
        f.style.setProperty('--ax', ax.toFixed(1) + '%');
        f.style.setProperty('--ay', ay.toFixed(1) + '%');
        if (!prefersReducedMotion) {
          const depth = parseFloat(f.dataset.depth) || 0.6;
          const px = ((tx - vw / 2) / vw) * 10 * depth;
          const py = ((ty - vh / 2) / vh) * 10 * depth;
          f.style.transform = 'translate3d(' + px.toFixed(1) + 'px,' + py.toFixed(1) + 'px,0)';
        }
      }
    }
    window.addEventListener('pointermove', (e) => {
      tx = e.clientX; ty = e.clientY;
      if (!raf) raf = requestAnimationFrame(update);
    }, { passive: true });
    window.addEventListener('scroll', () => { if (!raf) raf = requestAnimationFrame(update); }, { passive: true });
    update();
  })();

  /* ---- Magnetyczne CTA: główne przyciski lekko „lgną" do kursora ---- */
  if (isFinePonter && !prefersReducedMotion) {
    document.querySelectorAll('.btn-primary, .btn-accent').forEach((btn) => {
      btn.addEventListener('pointermove', (e) => {
        const r = btn.getBoundingClientRect();
        const mx = (e.clientX - (r.left + r.width / 2)) / (r.width / 2);
        const my = (e.clientY - (r.top + r.height / 2)) / (r.height / 2);
        btn.style.transform = 'translate(' + (mx * 6).toFixed(1) + 'px,' + (my * 4 - 2).toFixed(1) + 'px)';
      });
      btn.addEventListener('pointerleave', () => { btn.style.transform = ''; });
    });
  }

})();

/* Zdjęcia w tle ciemnych sekcji — wstrzykiwane jako realny <img>
   (ścieżka względna do dokumentu = działa na każdej podstronie,
   bez problemu z url() w custom property). */
(function sectionBackgrounds() {
  var base = (function () {
    var sc = document.querySelector('script[src*="assets/js/app.js"]');
    return (sc && sc.src) ? sc.src.replace(/assets\/js\/app\.js.*$/, 'assets/') : 'assets/';
  })();
  function addBg(el, src) {
    if (!src || el.querySelector(':scope > .section-bg')) return;
    el.classList.add('has-photo');
    const img = document.createElement('img');
    img.className = 'section-bg';
    img.src = src; img.alt = '';
    img.setAttribute('aria-hidden', 'true');
    img.setAttribute('decoding', 'async');
    el.insertBefore(img, el.firstChild);
  }
  document.querySelectorAll('.cta-band').forEach(function (el) { addBg(el, base + 'img/gal-DSCN2155.webp'); });
  document.querySelectorAll('[data-bg]').forEach(function (el) { addBg(el, el.getAttribute('data-bg')); });
})();

/* Akordeon „Poznaj szczegóły" w kafelkach programu */
(function activityAccordion() {
  document.querySelectorAll('.activity-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const tile = btn.closest('.activity-tile');
      if (!tile) return;
      const open = tile.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });
})();
