<?php
require_once __DIR__ . '/../inc/functions.php';
$title = 'Wszystkie poradniki | Emigraty';
$description = 'Lista wszystkich poradników Emigraty z wyszukiwarką artykułów.';
$canonical = fullUrl('/poradniki/');
$articles = array_values(getArticles());
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/../inc/head.php'; ?></head>
<body>
<?php require __DIR__ . '/../inc/header.php'; ?>
<main class="wrap">
  <?= breadcrumbs([
    ['label' => 'Start', 'url' => url('/')],
    ['label' => 'Poradniki']
  ]) ?>
  <section class="card">
    <h1>Wszystkie poradniki Emigraty</h1>
    <input class="search-input" type="search" placeholder="Szukaj po tytule, kategorii lub słowach kluczowych" data-search-input>
  </section>
  <section class="grid grid-2" style="margin-top:1rem">
    <?php foreach ($articles as $article): ?>
      <a class="card article-card" data-article-card data-search="<?= htmlspecialchars($article['title'] . ' ' . $article['description'] . ' ' . $article['category']) ?>" href="<?= articleUrl($article) ?>">
        <small><?= htmlspecialchars(CATEGORIES[$article['category']]['name']) ?></small>
        <strong><?= htmlspecialchars($article['title']) ?></strong>
        <p><?= htmlspecialchars($article['description']) ?></p>
      </a>
    <?php endforeach; ?>
  </section>
</main>
<?php require __DIR__ . '/../inc/footer.php'; ?>
</body>
</html>
