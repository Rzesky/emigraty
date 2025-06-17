<?php
// Ustawienia bazy danych (zmień na swoje dane)
$DB_HOST = 'localhost';
$DB_NAME = 'emigraty';
$DB_USER = 'root';
$DB_PASS = '';

// Opcjonalne ustawienia PDO
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
];

try {
  $pdo = new PDO(
    "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
    $DB_USER,
    $DB_PASS,
    $options
  );
} catch (PDOException $e) {
  // Bezpieczny komunikat, nie wyświetlaj hasła!
  die("Błąd połączenia z bazą danych.");
}
