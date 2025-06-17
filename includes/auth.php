<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if (!isset($_SESSION['user_id'], $_SESSION['session_token'])) {
  header("Location: login.php");
  exit;
}

// Pobierz token z bazy
require_once __DIR__ . '/db.php';
$stmt = $pdo->prepare("SELECT id, email, name, session_token FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
  session_destroy();
  header("Location: login.php");
  exit;
}

// Sprawdź token (czy zgadza się z tym w sesji)
if ($user['session_token'] !== $_SESSION['session_token']) {
  session_destroy();
  header("Location: login.php?multiple_login=1");
  exit;
}
