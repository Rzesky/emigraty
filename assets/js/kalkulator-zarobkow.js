(() => {
  const root = document.querySelector('#earnings-calculator');
  if (!root) return;

  const stateKey = 'emigraty_calc_state_v1';
  const el = (id) => document.getElementById(id);
  const format = new Intl.NumberFormat('pl-PL', { maximumFractionDigits: 0 });

  const refs = {
    country: el('country'), profession: el('profession'), jobSearch: el('jobSearch'),
    mode: el('mode'), overtime: el('overtime'), sundays: el('sundays'), manualIncome: el('manualIncome'),
    fxRate: el('fxRate'), rent: el('costRent'), food: el('costFood'), car: el('costCar'), other: el('costOther'),
    goal: el('goalValue'), incomeOut: el('incomeOut'), leftOut: el('leftOut'), monthsOut: el('monthsOut'),
    deCompare: el('deCompare'), plCompare: el('plCompare'), diffOut: el('diffOut'), chart: el('goalChart')
  };

  let records = [];

  const parseNum = (v) => Number(v || 0);
  const eurToPln = (amountEur, fx) => amountEur * fx;
  const toMoney = (value, currency = 'EUR') => `${format.format(Math.round(value))} ${currency}`;

  const fillJobs = () => {
    const country = refs.country.value;
    const q = refs.jobSearch.value.trim().toLowerCase();
    const options = records.filter((r) => r.country === country && r.name.toLowerCase().includes(q));
    refs.profession.innerHTML = options.map((o) => `<option value="${o.name}">${o.name}</option>`).join('');
  };

  const getIncome = (country) => {
    const selected = records.find((r) => r.country === country && r.name === refs.profession.value);
    let income = selected ? selected.median_monthly_net : 0;
    if (parseNum(refs.manualIncome.value) > 0) income = parseNum(refs.manualIncome.value);
    if (refs.mode.value === 'night') income *= 1.15;
    income += parseNum(refs.overtime.value) * 12;
    income += parseNum(refs.sundays.value) * 45;
    return income;
  };

  const drawChart = (months) => {
    const c = refs.chart; const ctx = c.getContext('2d');
    ctx.clearRect(0, 0, c.width, c.height);
    ctx.fillStyle = '#e2e8f0'; ctx.fillRect(20, 80, c.width - 40, 28);
    const progress = Math.min(1, 1 / Math.max(months, 1));
    ctx.fillStyle = '#2563eb'; ctx.fillRect(20, 80, (c.width - 40) * progress, 28);
    ctx.fillStyle = '#0f172a'; ctx.font = '16px Arial';
    ctx.fillText(`Postęp po 1 miesiącu: ${Math.round(progress * 100)}% celu`, 20, 135);
  };

  const compare = () => {
    const fx = parseNum(refs.fxRate.value) || 4.35;
    const costs = parseNum(refs.rent.value) + parseNum(refs.food.value) + parseNum(refs.car.value) + parseNum(refs.other.value);
    const income = getIncome(refs.country.value);
    const left = income - costs;
    const goal = Math.max(parseNum(refs.goal.value), 1);
    const months = left > 0 ? Math.ceil(goal / left) : Infinity;

    refs.incomeOut.textContent = toMoney(income, 'EUR') + ` / ${toMoney(eurToPln(income, fx), 'PLN')}`;
    refs.leftOut.textContent = left > 0 ? toMoney(left, 'EUR') : 'Brak nadwyżki';
    refs.monthsOut.textContent = Number.isFinite(months) ? `${months}` : 'nigdy (przy tych kosztach)';

    const deRec = records.find((r) => r.country === 'DE' && r.name === refs.profession.value);
    const plRec = records.find((r) => r.country === 'PL' && r.name === refs.profession.value);
    const de = deRec ? deRec.median_monthly_net : 0;
    const pl = plRec ? plRec.median_monthly_net : 0;
    refs.deCompare.textContent = toMoney(de, 'EUR');
    refs.plCompare.textContent = toMoney(pl / fx, 'EUR') + ` (${toMoney(pl, 'PLN')})`;
    refs.diffOut.textContent = toMoney(de - (pl / fx), 'EUR');

    drawChart(Number.isFinite(months) ? months : 120);
    localStorage.setItem(stateKey, JSON.stringify(Object.fromEntries(Object.entries(refs).filter(([k, v]) => v?.value !== undefined).map(([k, v]) => [k, v.value]))));
  };

  document.querySelectorAll('[data-goal]').forEach((btn) => btn.addEventListener('click', () => { refs.goal.value = btn.dataset.goal; compare(); }));
  Object.values(refs).forEach((node) => {
    if (node && ['INPUT', 'SELECT'].includes(node.tagName)) node.addEventListener('input', () => { if (node === refs.country || node === refs.jobSearch) fillJobs(); compare(); });
  });

  const restore = () => {
    try {
      const raw = localStorage.getItem(stateKey);
      if (!raw) return;
      const saved = JSON.parse(raw);
      Object.entries(saved).forEach(([k, v]) => { if (refs[k] && refs[k].value !== undefined) refs[k].value = v; });
    } catch (e) { /* ignore */ }
  };

  const salariesUrl = root.dataset.salariesUrl;
  if (!salariesUrl) {
    console.error('[Emigraty Kalkulator] Brak data-salaries-url na #earnings-calculator. Ustaw poprawny URL do salaries.json.');
    return;
  }

  fetch(salariesUrl)
    .then((r) => r.json())
    .then((data) => {
      records = data.records || [];
      restore();
      fillJobs();
      compare();
    });
})();
