<?php
require_once __DIR__ . '/inc/functions.php';
$title = 'Emigraty | Premium portal o życiu i pracy w Niemczech';
$description = 'Eksperckie poradniki o urzędach, pracy, finansach, mieszkaniu i życiu w Niemczech.';
$canonical = fullUrl('/');
$all = array_values(getArticles());
$featured = $all[0] ?? null;
$latest = array_slice($all, 1, 6);
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/inc/head.php'; ?></head>
<body>
<?php require __DIR__ . '/inc/header.php'; ?>
<main>
  <section class="hero">
    <div class="wrap hero-grid">
      <div>
        <p class="eyebrow">Portal redakcyjny dla emigrantów</p>
        <h1>Praktyczna wiedza o Niemczech podana jak nowoczesny magazyn premium.</h1>
        <p>Sprawdzone poradniki tworzone z myślą o realnych decyzjach: urzędy, praca, finanse, mieszkanie i codzienne życie.</p>
      </div>
    </div>
  </section>

  <section class="wrap section-space">
    <div class="section-head">
      <h2>Featured article</h2>
    </div>
    <?php if ($featured): ?>
      <a class="featured-tile" href="<?= articleUrl($featured) ?>">
        <?= renderArticleThumb($featured) ?>
        <div class="featured-content">
          <span class="tag"><?= htmlspecialchars(CATEGORIES[$featured['category']]['name']) ?></span>
          <h3><?= htmlspecialchars($featured['title']) ?></h3>
          <p><?= htmlspecialchars($featured['description']) ?></p>
          <small><?= htmlspecialchars($featured['updated_at']) ?></small>
        </div>
      </a>
    <?php endif; ?>
  </section>

  <section class="wrap section-space">
    <div class="section-head">
      <h2>Najnowsze artykuły</h2>
    </div>
    <div class="article-grid">
      <?php foreach ($latest as $article): ?>
        <a class="article-card" href="<?= articleUrl($article) ?>">
          <?= renderArticleThumb($article) ?>
          <span class="tag"><?= htmlspecialchars(CATEGORIES[$article['category']]['name']) ?></span>
          <strong><?= htmlspecialchars($article['title']) ?></strong>
          <p><?= htmlspecialchars($article['description']) ?></p>
          <small><?= htmlspecialchars($article['updated_at']) ?></small>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="wrap section-space">
    <div class="section-head">
      <h2>Kategorie</h2>
    </div>
    <div class="category-grid">
      <?php foreach (CATEGORIES as $slug => $cat): ?>
        <a class="category-box" href="<?= categoryUrl($slug) ?>">
          <strong><?= htmlspecialchars($cat['name']) ?></strong>
          <p><?= htmlspecialchars($cat['description']) ?></p>
          <small><?= count(articlesByCategory($slug)) ?> artykułów</small>
        </a>
      <?php endforeach; ?>
    </div>
  </section>
</main>
<?php require __DIR__ . '/inc/footer.php'; ?>
</body>
</html>
