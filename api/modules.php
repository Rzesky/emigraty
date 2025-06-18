<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
if (!$course_id) {
  echo json_encode([]);
  exit;
}

$stmt = $pdo->prepare("SELECT id, title, module_order FROM modules WHERE course_id = ? ORDER BY module_order ASC");
$stmt->execute([$course_id]);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($modules);
