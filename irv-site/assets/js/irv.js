(function () {
  // Quebras de linha (<br>) são ocultadas no celular por algumas regras de CSS.
  // Garante um espaço antes de cada uma para as palavras não ficarem coladas.
  document.querySelectorAll('main br').forEach(function (br) {
    const prev = br.previousSibling;
    if (prev && prev.nodeType === 3 && !/\s$/.test(prev.textContent)) {
      prev.textContent += ' ';
    }
  });
})();
(function () {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('#menu-irv');
  if (!toggle || !nav) return;
  toggle.innerHTML = '<span></span><span></span><span></span><b class="sr-only">Abrir menu</b>';
  const closeMenu = function () {
    toggle.setAttribute('aria-expanded', 'false');
    nav.classList.remove('is-open');
    document.body.classList.remove('menu-open');
  };
  toggle.addEventListener('click', function () {
    const open = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!open));
    nav.classList.toggle('is-open', !open);
    document.body.classList.toggle('menu-open', !open);
  });
  nav.addEventListener('click', function (event) {
    if (event.target.closest('a')) {
      closeMenu();
    }
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.site-header')) closeMenu();
  });
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') closeMenu();
  });
})();

/* ==========================================================================
   Movimento das páginas internas (O que fazemos, Faça parte, Notícias etc.)
   Só roda com JavaScript e respeita "reduzir movimento".
   ========================================================================== */
(function () {
  const inner = document.body.classList.contains('irv-inner') || document.body.classList.contains('irv-post');
  if (!inner) return;
  const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // "Saiba mais" dos pilares (acordeão); abrir um fecha os outros.
  const pillars = document.querySelectorAll('[data-pillar]');
  pillars.forEach(function (card) {
    const btn = card.querySelector('.pillar-more');
    if (!btn) return;
    btn.addEventListener('click', function () {
      const open = btn.getAttribute('aria-expanded') === 'true';
      pillars.forEach(function (other) {
        const b = other.querySelector('.pillar-more');
        if (b) { b.setAttribute('aria-expanded', 'false'); b.firstElementChild.textContent = 'Saiba mais'; }
      });
      btn.setAttribute('aria-expanded', String(!open));
      btn.firstElementChild.textContent = open ? 'Saiba mais' : 'Fechar';
    });
  });

  if (reduce || !('IntersectionObserver' in window)) return;

  // Entrada suave ao rolar, com pequeno atraso entre irmãos (efeito cascata).
  const targets = document.querySelectorAll([
    'main .eyebrow', 'main section h2', 'main .methodology-copy p', 'main .pillar',
    'main .impact-row', 'main .voice-card', 'main .join-ways article',
    'main .video-stories article', 'main .news-list article', 'main .team-grid article',
    'main .documents article', 'main .partner-grid li', 'main .achievements__grid article',
    'main .timeline article', 'main .history-years article', 'main .irv-triad article',
    'main .believe p', 'main .believe .button', 'main .donation > .shell > *',
    'main .origin-card', 'main .origin-story', 'main .post-related article'
  ].join(','));
  const seen = new Map();
  targets.forEach(function (el) {
    const parent = el.parentElement;
    const i = seen.get(parent) || 0;
    seen.set(parent, i + 1);
    el.classList.add('reveal');
    el.style.setProperty('--d', Math.min(i, 5) * 80 + 'ms');
  });
  const io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
  targets.forEach(function (el) { io.observe(el); });

  // Números de impacto contam até o valor ao aparecer.
  document.querySelectorAll('.impact-numbers b').forEach(function (el) {
    const end = parseInt(el.textContent.replace(/\D/g, ''), 10);
    if (!end) return;
    el.dataset.end = String(end);
    el.textContent = '0';
    const co = new IntersectionObserver(function (entries) {
      if (!entries[0].isIntersecting) return;
      co.disconnect();
      const start = performance.now(), dur = 1400;
      (function tick(now) {
        const t = Math.min((now - start) / dur, 1);
        el.textContent = String(Math.round(end * (1 - Math.pow(1 - t, 3))));
        if (t < 1) requestAnimationFrame(tick);
      })(start);
    }, { threshold: 0.6 });
    co.observe(el);
  });
})();
