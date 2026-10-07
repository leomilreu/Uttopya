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
    'main .impact-row', 'main .voice-card', 'main .jn-way', 'main .jn-tile', 'main .jn-donate__photo', 'main .jn-form',
    'main .jn-story', 'main .nw-feature', 'main .nw-card', 'main .team-grid article',
    'main .documents article', 'main .partner-grid li', 'main .achievements__grid article',
    'main .timeline article', 'main .history-years article', 'main .irv-triad article',
    'main .believe p', 'main .believe .button', 
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

/* ==========================================================================
   Faça parte: valor da doação e visualizador de foto e vídeo
   ========================================================================== */
(function () {
  const form = document.querySelector('[data-donate]');
  if (form) {
    const btn = form.querySelector('[data-donate-btn]');
    const other = form.querySelector('.jn-other');
    const otherInput = other && other.querySelector('input');
    const mail = 'mailto:atendimento@institutoraphaelveiga.org.br';
    const feeBox = form.querySelector('[name=fee]');
    const feeOut = form.querySelector('[data-fee]');
    const money = function (n) { return 'R$ ' + n.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }); };
    const update = function () {
      const freq = form.querySelector('[name=frequency]:checked');
      const amt = form.querySelector('[name=amount]:checked');
      const isOther = amt && amt.value === 'other';
      if (other) other.hidden = !isOther;
      const base = isOther ? parseInt(otherInput && otherInput.value, 10) : parseInt(amt && amt.value, 10);
      const ok = base > 0;
      const fee = ok ? Math.round(base * 0.029 * 100) / 100 : 0;
      if (feeOut) feeOut.textContent = money(ok ? fee : 0);
      const total = ok ? base + (feeBox && feeBox.checked ? fee : 0) : 0;
      const monthly = freq && freq.value === 'mensal';
      btn.textContent = ok ? 'Doar ' + money(total) + (monthly ? ' por mês' : '') : 'Doar';
      const subject = ok ? 'Quero doar ' + money(total) + ' (' + (freq ? freq.value : '1 vez') + (feeBox && feeBox.checked ? ', cobrindo a taxa de transação' : '') + ')' : 'Quero doar';
      btn.setAttribute('href', mail + '?subject=' + encodeURIComponent(subject));
    };
    form.addEventListener('change', update);
    form.addEventListener('input', update);
    form.addEventListener('submit', function (e) { e.preventDefault(); });
    update();
  }

  const viewer = document.getElementById('jn-viewer');
  if (!viewer || typeof viewer.showModal !== 'function') return;
  const stage = viewer.querySelector('.jn-viewer__stage');
  const close = function () { viewer.close(); };
  document.querySelectorAll('[data-viewer]').forEach(function (el) {
    el.addEventListener('click', function () {
      const type = el.getAttribute('data-type');
      const src = el.getAttribute('data-src');
      stage.innerHTML = '';
      let node;
      if (type === 'video') {
        node = document.createElement('video');
        node.controls = true; node.autoplay = true; node.playsInline = true;
        node.src = src;
      } else {
        node = document.createElement('img');
        node.src = src; node.alt = el.getAttribute('aria-label') || '';
      }
      stage.appendChild(node);
      document.body.classList.add('has-viewer');
      viewer.showModal();
    });
  });
  viewer.querySelector('[data-viewer-close]').addEventListener('click', close);
  viewer.addEventListener('click', function (e) { if (e.target === viewer) close(); });
  viewer.addEventListener('close', function () {
    stage.innerHTML = '';
    document.body.classList.remove('has-viewer');
  });
})();


/* Depoimentos: o vídeo toca dentro do próprio card, no lugar da foto. */
(function () {
  const cards = document.querySelectorAll('[data-inline-video]');
  if (!cards.length) return;
  const stop = function (card) {
    const v = card.querySelector('video');
    if (!v) return;
    v.pause();
    v.remove();
    card.classList.remove('is-playing');
    card.disabled = false;
  };
  cards.forEach(function (card) {
    card.addEventListener('click', function () {
      cards.forEach(function (other) { if (other !== card) stop(other); });
      if (card.classList.contains('is-playing')) return;
      const v = document.createElement('video');
      const srcs = (card.getAttribute('data-srcs') || '').split(' ').filter(Boolean);
      v.controls = true; v.autoplay = true; v.playsInline = true; v.preload = 'auto';
      let tried = 0;
      v.src = srcs[0];
      v.addEventListener('error', function () { tried += 1; if (tried < srcs.length) { v.src = srcs[tried]; v.play().catch(function () {}); } });
      v.setAttribute('aria-label', card.getAttribute('data-caption') || 'Vídeo');
      card.appendChild(v);
      card.classList.add('is-playing');
      v.addEventListener('ended', function () { stop(card); });
    });
  });
})();
