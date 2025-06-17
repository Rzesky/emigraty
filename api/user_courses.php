<?php
session_start();
header('Content-Type: application/json');
require_once '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['success' => false, 'error' => 'Brak zalogowania.']);
  exit;
}
$user_id = $_SESSION['user_id'];

// Pobierz kursy kupione przez użytkownika + przykładowy progress
$stmt = $pdo->prepare("
    SELECT c.id, c.title, IFNULL(up.progress,0) as progress
    FROM user_courses uc
    JOIN courses c ON uc.course_id = c.id
    LEFT JOIN (
      SELECT course_id, ROUND(AVG(completed)*100) AS progress
      FROM user_progress
      WHERE user_id = ?
      GROUP BY course_id
    ) up ON up.course_id = c.id
    WHERE uc.user_id = ?
    ORDER BY c.title ASC
");
$stmt->execute([$user_id, $user_id]);
$data = $stmt->fetchAll();

echo json_encode(['success' => true, 'courses' => $data]);
