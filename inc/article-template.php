<?php
require_once __DIR__ . '/functions.php';
$article = getArticle($articleSlug ?? '');
if (!$article) {
  http_response_code(404);
  echo 'Artykuł nie istnieje';
  exit;
}
$category = CATEGORIES[$article['category']];
$title = $article['title'] . ' | Emigraty';
$description = $article['description'];
$canonical = fullUrl('/' . $article['category'] . '/' . $article['slug'] . '/');

$articleSchema = [
  '@context' => 'https://schema.org',
  '@type' => 'Article',
  'headline' => $article['title'],
  'description' => $article['description'],
  'author' => ['@type' => 'Organization', 'name' => 'Emigraty'],
  'publisher' => ['@type' => 'Organization', 'name' => 'Emigraty'],
  'dateModified' => $article['updated_at'],
  'mainEntityOfPage' => $canonical,
];
$faqSchema = [
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => array_map(fn($f) => [
    '@type' => 'Question',
    'name' => $f['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]
  ], $article['faq'])
];
$structuredDataJson = json_encode([$articleSchema, $faqSchema], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
$related = relatedArticles($article['slug']);
?>
<!doctype html>
<html lang="pl">
<head><?php require __DIR__ . '/head.php'; ?></head>
<body>
<?php require __DIR__ . '/header.php'; ?>
<main class="wrap article">
  <?= breadcrumbs([
    ['label' => 'Start', 'url' => url('/')],
    ['label' => $category['name'], 'url' => categoryUrl($article['category'])],
    ['label' => $article['title']]
  ]) ?>

  <article class="card">
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <p><?= htmlspecialchars($article['description']) ?></p>

    <section class="toc card">
      <strong>Spis treści</strong>
      <?php foreach ($article['sections'] as $idx => $section): ?>
        <a href="#sekcja-<?= $idx + 1 ?>"><?= $idx + 1 ?>. <?= htmlspecialchars($section['title']) ?></a>
      <?php endforeach; ?>
      <a href="#faq">FAQ</a>
    </section>

    <?php foreach ($article['sections'] as $idx => $section): ?>
      <h2 id="sekcja-<?= $idx + 1 ?>"><?= htmlspecialchars($section['title']) ?></h2>
      <?php foreach ($section['content'] as $paragraph): ?>
        <p><?= htmlspecialchars($paragraph) ?></p>
      <?php endforeach; ?>
    <?php endforeach; ?>

    <h2 id="faq">FAQ</h2>
    <?php foreach ($article['faq'] as $faq): ?>
      <h3><?= htmlspecialchars($faq['q']) ?></h3>
      <p><?= htmlspecialchars($faq['a']) ?></p>
    <?php endforeach; ?>

    <div class="cta">
      <strong>Potrzebujesz kolejnego kroku?</strong>
      <p>Przejdź do powiązanych poradników i zbuduj własny plan działania na najbliższe 30 dni.</p>
    </div>
  </article>

  <section class="grid grid-3" style="margin-top:1rem">
    <?php foreach ($related as $item): ?>
      <a class="card article-card" href="<?= articleUrl($item) ?>">
        <strong><?= htmlspecialchars($item['title']) ?></strong>
        <p><?= htmlspecialchars($item['description']) ?></p>
      </a>
    <?php endforeach; ?>
  </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>
</body>
</html>
