<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$title = $title ?? SITE_NAME . ' – poradniki o życiu i pracy w Niemczech';
$description = $description ?? 'Urzędy, praca, finanse i życie w Niemczech. Poradniki krok po kroku, bez lania wody.';
$canonical = $canonical ?? (SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/'));
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="<?= htmlspecialchars($description) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?= htmlspecialchars($title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($description) ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<link rel="stylesheet" href="<?= rtrim(BASE_URL, '/') ?>/assets/css/style.css">
<script defer src="<?= rtrim(BASE_URL, '/') ?>/assets/js/main.js"></script>
<?php if (!empty($structuredDataJson)): ?>
<script type="application/ld+json"><?= $structuredDataJson ?></script>
<?php endif; ?>
