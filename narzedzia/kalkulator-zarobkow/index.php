<?php
require_once __DIR__ . '/../../inc/functions.php';
$title = 'Kalkulator zarobków i celów: Niemcy vs Polska | Emigraty';
$description = 'Porównaj szacunkowe zarobki netto i czas do realizacji celu finansowego w Niemczech i Polsce.';
$canonical = fullUrl('/narzedzia/kalkulator-zarobkow/');
$faqSchema = [
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => [
    ['@type' => 'Question', 'name' => 'Czy to oficjalny kalkulator podatkowy?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Nie. To narzędzie daje szacunek netto i nie zastępuje porady podatkowej.']],
    ['@type' => 'Question', 'name' => 'Czy mogę nadpisać stawkę?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Tak, wpisz własną miesięczną stawkę netto i kalkulator użyje jej do obliczeń.']],
    ['@type' => 'Question', 'name' => 'Skąd pochodzą dane zawodów?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Z lokalnej bazy data/salaries.json, którą możesz dowolnie edytować.']],
  ]
];
$structuredDataJson = json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/../../inc/head.php'; ?></head>
<body>
<?php require __DIR__ . '/../../inc/header.php'; ?>
<main class="wrap section-space calculator-page">
  <?= breadcrumbs([['label' => 'Start', 'url' => url('/')], ['label' => 'Narzędzia'], ['label' => 'Kalkulator zarobków']]) ?>
  <section class="page-intro">
    <span class="tag">Narzędzia</span>
    <h1>Kalkulator zarobków i celów: DE vs PL</h1>
    <p>Symulator netto, kosztów życia i czasu odkładania do celu. Wyniki mają charakter orientacyjny.</p>
  </section>

  <section class="calculator-grid" id="earnings-calculator" data-salaries-url="<?= url('/data/salaries.json') ?>">
    <form class="calculator-form" autocomplete="off">
      <div class="calc-fields">
        <label>Kraj
          <select id="country"><option value="DE">Niemcy</option><option value="PL">Polska</option></select>
        </label>
        <label>Wyszukaj zawód
          <input id="jobSearch" type="search" placeholder="np. spawacz">
        </label>
        <label>Zawód
          <select id="profession"></select>
        </label>
        <label>Region
          <input id="region" type="text" placeholder="np. Berlin / Mazowieckie">
        </label>
        <label>Typ umowy
          <select id="contract"><option>Dowolny</option><option>UoP</option><option>B2B</option><option>Zlecenie</option></select>
        </label>
        <label>Tryb pracy
          <select id="mode"><option value="day">Dzienna</option><option value="night">Nocna (+15%)</option></select>
        </label>
        <label>Nadgodziny (h/mies.)<input id="overtime" type="number" min="0" value="0"></label>
        <label>Niedziele (dni/mies.)<input id="sundays" type="number" min="0" value="0"></label>
        <label>Nadpisz miesięczne netto<input id="manualIncome" type="number" min="0" placeholder="opcjonalnie"></label>
        <label>Kurs EUR→PLN<input id="fxRate" type="number" min="1" step="0.01" value="4.35"></label>
        <label>Czynsz<input id="costRent" type="number" min="0" value="900"></label>
        <label>Jedzenie<input id="costFood" type="number" min="0" value="350"></label>
        <label>Auto/transport<input id="costCar" type="number" min="0" value="220"></label>
        <label>Inne koszty<input id="costOther" type="number" min="0" value="180"></label>
        <label>Cel finansowy<input id="goalValue" type="number" min="0" value="15000"></label>
      </div>
      <div class="preset-buttons">
        <button type="button" data-goal="1500">iPhone 1500€</button>
        <button type="button" data-goal="15000">Auto 15000€</button>
        <button type="button" data-goal="30000">Wkład własny 30000€</button>
      </div>
    </form>

    <section class="calculator-results">
      <p><strong>Szacowane netto miesięcznie:</strong> <span id="incomeOut">-</span></p>
      <p><strong>Zostaje po kosztach:</strong> <span id="leftOut">-</span></p>
      <p><strong>Miesięcy do celu:</strong> <span id="monthsOut">-</span></p>
      <canvas id="goalChart" width="640" height="220"></canvas>
      <div class="comparison">
        <div class="col"><h3>DE</h3><p id="deCompare">-</p></div>
        <div class="col"><h3>PL</h3><p id="plCompare">-</p></div>
      </div>
      <p><strong>Różnica DE-PL:</strong> <span id="diffOut">-</span></p>
      <small>Disclaimer: kalkulator pokazuje wartości orientacyjne na podstawie median i prostych dodatków za tryb pracy.</small>
    </section>
  </section>

  <section class="faq-box">
    <h2>FAQ</h2>
    <h3>Czy to oficjalny kalkulator podatkowy?</h3>
    <p>Nie. To narzędzie daje jedynie szacunek netto i nie zastępuje porady doradcy.</p>
    <h3>Czy mogę wpisać własną stawkę?</h3>
    <p>Tak. Pole nadpisania netto pozwala użyć Twojej realnej wypłaty.</p>
    <h3>Jak dodać nowy zawód?</h3>
    <p>Dodaj rekord do pliku <code>/data/salaries.json</code> i odśwież stronę.</p>
  </section>
</main>
<?php require __DIR__ . '/../../inc/footer.php'; ?>
<script defer src="<?= url('/assets/js/kalkulator-zarobkow.js') ?>"></script>
</body>
</html>
