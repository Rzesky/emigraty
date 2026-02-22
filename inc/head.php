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

<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($description) ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<meta property="og:image" content="<?= SITE_URL ?>/og.png">

<style>
  :root {
    --bg: #0b0c0f;
    --card: #121522;
    --text: #e8eaf2;
    --muted: #a8afc7;
    --acc: #7c5cff;
    --b: #232844;
  }

  @media (prefers-color-scheme: light) {
    :root {
      --bg: #fff;
      --card: #f6f7fb;
      --text: #101321;
      --muted: #4b5568;
      --acc: #5b35ff;
      --b: #e6e8f2;
    }
  }

  body {
    margin: 0;
    font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
    background: var(--bg);
    color: var(--text);
    line-height: 1.55
  }

  a {
    color: inherit;
    text-decoration: none
  }

  .wrap {
    max-width: 1100px;
    margin: 0 auto;
    padding: 24px
  }

  header {
    position: sticky;
    top: 0;
    backdrop-filter: blur(10px);
    background: color-mix(in srgb, var(--bg) 85%, transparent);
    border-bottom: 1px solid var(--b);
    z-index: 10
  }

  nav {
    display: flex;
    gap: 14px;
    align-items: center;
    justify-content: space-between
  }

  .brand {
    font-weight: 800;
    letter-spacing: .2px
  }

  .menu {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    font-size: 14px;
    color: var(--muted)
  }

  .menu a {
    padding: 8px 10px;
    border-radius: 10px
  }

  .menu a:hover {
    background: var(--card);
    color: var(--text)
  }

  main {
    padding: 26px 0
  }

  footer {
    border-top: 1px solid var(--b);
    color: var(--muted);
    font-size: 13px;
    padding: 18px 0
  }

  .card {
    background: var(--card);
    border: 1px solid var(--b);
    border-radius: 16px;
    padding: 16px
  }

  .grid {
    display: grid;
    gap: 16px
  }

  .cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr))
  }

  @media (max-width:900px) {
    .cols-3 {
      grid-template-columns: 1fr
    }
  }

  .pill {
    display: inline-flex;
    gap: 8px;
    align-items: center;
    padding: 6px 10px;
    border: 1px solid var(--b);
    border-radius: 999px;
    font-size: 13px;
    color: var(--muted)
  }

  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 14px;
    border-radius: 12px;
    background: var(--acc);
    color: #fff;
    font-weight: 700
  }

  .btn:hover {
    filter: brightness(1.05)
  }

  .h1 {
    font-size: 42px;
    line-height: 1.1;
    margin: 0 0 10px
  }

  @media (max-width:900px) {
    .h1 {
      font-size: 34px
    }
  }

  .lead {
    font-size: 16px;
    color: var(--muted);
    margin: 0 0 18px
  }
</style>
