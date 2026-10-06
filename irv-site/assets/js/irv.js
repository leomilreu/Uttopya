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
