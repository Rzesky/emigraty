<?php
require_once __DIR__ . '/inc/functions.php';
header('Content-Type: application/xml; charset=utf-8');
$urls = [
  fullUrl('/'),
  fullUrl('/poradniki/'),
];
foreach (array_keys(CATEGORIES) as $cat) {
  $urls[] = fullUrl('/' . $cat . '/');
}
foreach (getArticles() as $article) {
  $urls[] = fullUrl('/' . $article['category'] . '/' . $article['slug'] . '/');
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $loc): ?>
  <url><loc><?= htmlspecialchars($loc, ENT_XML1) ?></loc></url>
<?php endforeach; ?>
</urlset>
