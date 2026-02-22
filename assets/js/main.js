(() => {
  const root = document.documentElement;
  const saved = localStorage.getItem('emigraty-theme');
  if (saved) root.setAttribute('data-theme', saved);

  const btn = document.querySelector('[data-theme-toggle]');
  if (btn) {
    btn.addEventListener('click', () => {
      const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
      root.setAttribute('data-theme', next);
      localStorage.setItem('emigraty-theme', next);
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
