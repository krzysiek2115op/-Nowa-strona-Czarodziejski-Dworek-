/* Galeria — licznik i podpis w lightboksie.
   Nie ruszamy app.js (on obsługuje otwieranie/strzałki/ESC) —
   tu tylko obserwujemy zmianę zdjęcia i aktualizujemy meta. */
(function () {
  var lb = document.querySelector('.lightbox');
  if (!lb) return;
  var img = lb.querySelector('img');
  var tiles = Array.prototype.slice.call(document.querySelectorAll('.gtile img'));
  if (!img || !tiles.length) return;

  var meta = document.createElement('div');
  meta.className = 'lightbox-meta';
  var cap = document.createElement('span'); cap.className = 'lightbox-cap';
  var cnt = document.createElement('span'); cnt.className = 'lightbox-count';
  meta.appendChild(cap); meta.appendChild(cnt);
  lb.appendChild(meta);

  function isVisible(el) {
    var cl = el.closest ? el.closest('.gal-cluster') : null;
    return !cl || !cl.classList.contains('is-hidden');
  }
  function update() {
    var src = img.getAttribute('src');
    if (!src) { cap.textContent = ''; cnt.textContent = ''; return; }
    var current = null;
    for (var i = 0; i < tiles.length; i++) {
      if (tiles[i].src === img.src || tiles[i].getAttribute('src') === src) { current = tiles[i]; break; }
    }
    if (!current) { cap.textContent = ''; cnt.textContent = ''; return; }
    var vis = tiles.filter(isVisible);
    var pos = vis.indexOf(current);
    cap.textContent = current.getAttribute('alt') || '';
    cnt.textContent = ((pos >= 0 ? pos : 0) + 1) + ' / ' + (vis.length || tiles.length);
  }

  new MutationObserver(update).observe(img, { attributes: true, attributeFilter: ['src'] });
})();

/* Filtr kategorii galerii — pokazuje/ukrywa klastry bez przeładowania strony */
(function () {
  var bar = document.querySelector('.gal-filter');
  if (!bar) return;
  var clusters = Array.prototype.slice.call(document.querySelectorAll('.gal-cluster'));
  var featured = document.querySelector('.gal-featured');
  var btns = Array.prototype.slice.call(bar.querySelectorAll('[data-filter]'));
  bar.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-filter]');
    if (!btn) return;
    var f = btn.getAttribute('data-filter');
    btns.forEach(function (b) {
      var on = (b === btn);
      b.classList.toggle('is-active', on);
      b.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
    clusters.forEach(function (c) {
      var show = (f === 'all') || (c.getAttribute('data-cat') === f);
      c.classList.toggle('is-hidden', !show);
      if (show) { c.classList.remove('gal-anim'); void c.offsetWidth; c.classList.add('gal-anim'); }
    });
    if (featured) featured.classList.toggle('is-hidden', f !== 'all');
  });
})();
