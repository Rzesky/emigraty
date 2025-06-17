<?php
header('Content-Type: application/json');
require_once '../includes/db.php'; // ścieżka dopasowana do Twojej struktury

$stmt = $pdo->query("SELECT id, title, description, price, featured FROM courses ORDER BY featured DESC, id ASC");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($courses);
