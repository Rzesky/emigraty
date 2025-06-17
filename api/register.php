<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'message' => 'Nieprawidłowa metoda żądania.']);
  exit;
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$password2 = trim($_POST['password2'] ?? '');
$name = trim($_POST['name'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['success' => false, 'message' => 'Nieprawidłowy adres email.']);
  exit;
}
if (strlen($password) < 6) {
  echo json_encode(['success' => false, 'message' => 'Hasło musi mieć co najmniej 6 znaków.']);
  exit;
}
if ($password !== $password2) {
  echo json_encode(['success' => false, 'message' => 'Hasła nie są takie same.']);
  exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
  echo json_encode(['success' => false, 'message' => 'Ten email jest już zarejestrowany.']);
  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
try {
  $stmt->execute([$email, $hash, $name ?: null]);
  echo json_encode(['success' => true]);
} catch (PDOException $e) {
  echo json_encode(['success' => false, 'message' => 'Błąd serwera.']);
}
