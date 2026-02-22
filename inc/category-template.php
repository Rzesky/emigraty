<?php
require_once __DIR__ . '/functions.php';
$categorySlug = $categorySlug ?? '';
if (!isset(CATEGORIES[$categorySlug])) {
  http_response_code(404);
  exit('Kategoria nie istnieje');
}
$category = CATEGORIES[$categorySlug];
$title = $category['name'] . ' | Emigraty';
$description = $category['description'];
$canonical = fullUrl('/' . $categorySlug . '/');
$articles = articlesByCategory($categorySlug);
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/head.php'; ?></head>
<body>
<?php require __DIR__ . '/header.php'; ?>
<main class="wrap">
  <?= breadcrumbs([
    ['label' => 'Start', 'url' => url('/')],
    ['label' => $category['name']]
  ]) ?>
  <section class="card"><h1><?= htmlspecialchars($category['name']) ?></h1><p><?= htmlspecialchars($category['description']) ?></p></section>
  <section class="grid grid-2" style="margin-top:1rem">
    <?php foreach ($articles as $article): ?>
      <a class="card article-card" href="<?= articleUrl($article) ?>">
        <strong><?= htmlspecialchars($article['title']) ?></strong>
        <p><?= htmlspecialchars($article['description']) ?></p>
      </a>
    <?php endforeach; ?>
  </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>
</body>
</html>
