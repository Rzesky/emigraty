<?php

$title = "Emigraty – życie i praca w Niemczech (poradniki)";
$description = "Urzędy, praca, finanse i życie w Niemczech. Poradniki krok po kroku, bez lania wody.";
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/config.php';
?>
<!doctype html>
<html lang="pl">

<head>
  <?php require __DIR__ . '/inc/head.php'; ?>
</head>

<body>
  <?php require __DIR__ . '/inc/header.php'; ?>

  <main class="wrap">
    <section class="card">
      <div class="pill">🇩🇪 Poradnikowo • konkretnie • evergreen</div>
      <h1 class="h1">Życie i praca w Niemczech — krok po kroku</h1>
      <p class="lead">Urzędy, finanse, praca, mieszkanie. Strona pisana pod praktykę emigranta i SEO.</p>
      <a class="btn" href="<?= url('/poradniki/') ?>">Zobacz poradniki</a>
    </section>

    <section style="margin-top:18px" class="grid cols-3">
      <a class="card" href="<?= url('/urzedy/') ?>">
        <strong>Urzędy</strong>
        <div class="lead" style="margin:6px 0 0">
          Anmeldung, Steuer-ID, Krankenkasse…
        </div>
      </a>

      <a class="card" href="<?= url('/praca/') ?>">
        <strong>Praca</strong>
        <div class="lead" style="margin:6px 0 0">
          CV/Bewerbung, umowy, zmiana pracy…
        </div>
      </a>

      <a class="card" href="<?= url('/finanse/') ?>">
        <strong>Finanse</strong>
        <div class="lead" style="margin:6px 0 0">
          Steuerklasse, Kindergeld, budżet…
        </div>
      </a>
    </section>
  </main>

  <?php require __DIR__ . '/inc/footer.php'; ?>
</body>

</html>
