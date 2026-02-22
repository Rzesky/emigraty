(() => {
  const menuButton = document.querySelector('[data-menu-toggle]');
  const menu = document.querySelector('#site-menu');

  if (menuButton && menu) {
    menuButton.addEventListener('click', () => {
      const expanded = menuButton.getAttribute('aria-expanded') === 'true';
      menuButton.setAttribute('aria-expanded', String(!expanded));
      menu.classList.toggle('is-open');
    });
  }

  const input = document.querySelector('[data-search-input]');
  if (input) {
    const cards = [...document.querySelectorAll('[data-article-card]')];
    input.addEventListener('input', () => {
      const q = input.value.trim().toLowerCase();
      cards.forEach((card) => {
        const text = (card.dataset.search || '').toLowerCase();
        card.style.display = text.includes(q) ? '' : 'none';
      });
    });
  }
})();
