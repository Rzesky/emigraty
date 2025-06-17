<?php
session_start();
header('Content-Type: application/json');
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'message' => 'Nieprawidłowa metoda żądania.']);
  exit;
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['success' => false, 'message' => 'Nieprawidłowy email.']);
  exit;
}
if (strlen($password) < 6) {
  echo json_encode(['success' => false, 'message' => 'Hasło musi mieć co najmniej 6 znaków.']);
  exit;
}

$stmt = $pdo->prepare("SELECT id, password, name FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
  echo json_encode(['success' => false, 'message' => 'Nieprawidłowy email lub hasło.']);
  exit;
}

// Generowanie losowego tokena
$token = bin2hex(random_bytes(32));

// Aktualizuj token w bazie
$stmt = $pdo->prepare("UPDATE users SET session_token = ? WHERE id = ?");
$stmt->execute([$token, $user['id']]);

// Zapisz token w sesji
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'] ?? '';
$_SESSION['session_token'] = $token;

echo json_encode(['success' => true]);
