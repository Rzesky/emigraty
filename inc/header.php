<?php
require_once __DIR__ . '/functions.php';
?>
<header class="site-header">
  <div class="wrap nav-wrap">
    <a class="brand" href="<?= url('/') ?>" aria-label="Emigraty – strona główna">Emigraty</a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-menu" data-menu-toggle>
      Menu
    </button>
    <nav class="menu" id="site-menu" aria-label="Nawigacja główna">
      <a href="<?= url('/urzedy/') ?>">Urzędy</a>
      <a href="<?= url('/praca/') ?>">Praca</a>
      <a href="<?= url('/finanse/') ?>">Finanse</a>
      <a href="<?= url('/mieszkanie/') ?>">Mieszkanie</a>
      <a href="<?= url('/zycie/') ?>">Życie</a>
      <a href="<?= url('/poradniki/') ?>">Wszystkie poradniki</a>
      <a href="<?= url('/kontakt/') ?>">Kontakt</a>
    </nav>
  </div>
</header>
