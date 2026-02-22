<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
?>

<header>
  <div class="wrap">
    <nav>
      <a class="brand" href="<?= url('/') ?>">Emigraty</a>

      <div class="menu">
        <a href="<?= url('/poradniki/') ?>">Poradniki</a>
        <a href="<?= url('/praca/') ?>">Praca</a>
        <a href="<?= url('/finanse/') ?>">Finanse</a>
        <a href="<?= url('/urzedy/') ?>">Urzędy</a>
        <a href="<?= url('/mieszkanie/') ?>">Mieszkanie</a>
        <a href="<?= url('/zycie/') ?>">Życie</a>
        <a href="<?= url('/kontakt/') ?>">Kontakt</a>
      </div>
    </nav>
  </div>
</header>
