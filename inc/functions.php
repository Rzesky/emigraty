<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/content.php';

function url(string $path = '/'): string
{
  $path = '/' . ltrim($path, '/');
  return rtrim(BASE_URL, '/') . $path;
}

function fullUrl(string $path = '/'): string
{
  return rtrim(SITE_URL, '/') . url($path);
}

function categoryUrl(string $slug): string
{
  return url('/' . $slug . '/');
}

function articleUrl(array $article): string
{
  return url('/' . $article['category'] . '/' . $article['slug'] . '/');
}

function breadcrumbs(array $items): string
{
  $html = '<nav class="breadcrumbs" aria-label="Breadcrumbs">';
  $parts = [];
  foreach ($items as $item) {
    if (isset($item['url'])) {
      $parts[] = '<a href="' . htmlspecialchars($item['url']) . '">' . htmlspecialchars($item['label']) . '</a>';
    } else {
      $parts[] = '<span>' . htmlspecialchars($item['label']) . '</span>';
    }
  }
  $html .= implode('<span class="sep">/</span>', $parts) . '</nav>';
  return $html . "\n";
}

function articlesByCategory(string $category): array
{
  return array_values(array_filter(getArticles(), fn($a) => $a['category'] === $category));
}

function relatedArticles(string $slug, int $limit = 3): array
{
  $all = getArticles();
  if (!isset($all[$slug])) {
    return [];
  }
  $current = $all[$slug];
  $sameCategory = array_values(array_filter($all, fn($a) => $a['category'] === $current['category'] && $a['slug'] !== $slug));
  $other = array_values(array_filter($all, fn($a) => $a['category'] !== $current['category']));
  return array_slice(array_merge($sameCategory, $other), 0, $limit);
}
