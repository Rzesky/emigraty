<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
if (!$course_id) {
  header('Location: dashboard.php');
  exit;
}

// Sprawdź czy kurs istnieje
$stmt = $pdo->prepare("SELECT id FROM courses WHERE id = ?");
$stmt->execute([$course_id]);
if (!$stmt->fetch()) {
  header('Location: dashboard.php');
  exit;
}

// Sprawdź czy użytkownik już ma ten kurs
$stmt = $pdo->prepare("SELECT 1 FROM user_courses WHERE user_id = ? AND course_id = ?");
$stmt->execute([$_SESSION['user_id'], $course_id]);
if (!$stmt->fetchColumn()) {
  $stmt = $pdo->prepare("INSERT INTO user_courses (user_id, course_id) VALUES (?, ?)");
  $stmt->execute([$_SESSION['user_id'], $course_id]);
}

header('Location: dashboard.php');
exit;
