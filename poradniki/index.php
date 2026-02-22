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
<main class="wrap section-space">
  <?= breadcrumbs([
    ['label' => 'Start', 'url' => url('/')],
    ['label' => 'Poradniki']
  ]) ?>
  <section class="page-intro">
    <h1>Wszystkie poradniki Emigraty</h1>
    <p>Znajdź właściwy artykuł po kategorii, temacie i słowach kluczowych.</p>
    <input class="search-input" type="search" placeholder="Szukaj po tytule, kategorii lub słowach kluczowych" data-search-input>
  </section>
  <section class="article-grid">
    <?php foreach ($articles as $article): ?>
      <a class="article-card" data-article-card data-search="<?= htmlspecialchars($article['title'] . ' ' . $article['description'] . ' ' . $article['category']) ?>" href="<?= articleUrl($article) ?>">
        <div class="article-thumb" aria-hidden="true"></div>
        <span class="tag"><?= htmlspecialchars(CATEGORIES[$article['category']]['name']) ?></span>
        <strong><?= htmlspecialchars($article['title']) ?></strong>
        <p><?= htmlspecialchars($article['description']) ?></p>
        <small><?= htmlspecialchars($article['updated_at']) ?></small>
      </a>
    <?php endforeach; ?>
  </section>
</main>
<?php require __DIR__ . '/../inc/footer.php'; ?>
</body>
</html>
