<?php
require_once __DIR__ . '/functions.php';
?>
<header>
  <div class="wrap nav-wrap">
    <a class="brand" href="<?= url('/') ?>">Emigraty</a>
    <nav class="menu" aria-label="Nawigacja główna">
      <a href="<?= url('/urzedy/') ?>">Urzędy</a>
      <a href="<?= url('/praca/') ?>">Praca</a>
      <a href="<?= url('/finanse/') ?>">Finanse</a>
      <a href="<?= url('/mieszkanie/') ?>">Mieszkanie</a>
      <a href="<?= url('/zycie/') ?>">Życie</a>
      <a href="<?= url('/poradniki/') ?>">Wszystkie poradniki</a>
      <a href="<?= url('/kontakt/') ?>">Kontakt</a>
    </nav>
    <button class="theme-toggle" type="button" data-theme-toggle aria-label="Przełącz tryb jasny i ciemny">🌓</button>
  </div>
</header>
