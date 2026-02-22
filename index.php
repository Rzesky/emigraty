<?php
require_once __DIR__ . '/inc/functions.php';
$title = 'Emigraty – portal poradnikowy o emigracji do Niemiec';
$description = 'Eksperckie poradniki o urzędach, pracy, finansach, mieszkaniu i życiu w Niemczech.';
$canonical = fullUrl('/');
$all = getArticles();
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/inc/head.php'; ?></head>
<body>
<?php require __DIR__ . '/inc/header.php'; ?>
<main class="wrap">
  <section class="card hero">
    <h1>Emigraty: portal poradnikowy o emigracji do Niemiec</h1>
    <p>Praktyczne, aktualizowane poradniki stworzone dla osób, które chcą przejść przez formalności i codzienne decyzje bez kosztownych błędów.</p>
  </section>

  <section class="grid grid-3" style="margin-top:1rem">
    <?php foreach (CATEGORIES as $slug => $cat): ?>
      <a class="card article-card" href="<?= categoryUrl($slug) ?>">
        <strong><?= htmlspecialchars($cat['name']) ?></strong>
        <p><?= htmlspecialchars($cat['description']) ?></p>
        <small><?= count(articlesByCategory($slug)) ?> artykułów</small>
      </a>
    <?php endforeach; ?>
  </section>

  <section class="card" style="margin-top:1rem">
    <h2>Najnowsze poradniki</h2>
    <div class="grid grid-2">
      <?php foreach (array_slice(array_values($all), 0, 6) as $article): ?>
        <a class="article-card" href="<?= articleUrl($article) ?>"><strong><?= htmlspecialchars($article['title']) ?></strong></a>
      <?php endforeach; ?>
    </div>
  </section>
</main>
<?php require __DIR__ . '/inc/footer.php'; ?>
</body>
</html>
