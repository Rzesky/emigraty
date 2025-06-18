<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
$module_id = isset($_GET['module_id']) ? intval($_GET['module_id']) : 0;

if (!$course_id) {
    header('Location: dashboard.php');
    exit;
}

$stmt = $pdo->prepare("SELECT id, title FROM courses WHERE id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch();
if (!$course) {
    die('Kurs nie istnieje');
}

$stmt = $pdo->prepare("SELECT id, title, module_order FROM modules WHERE course_id = ? ORDER BY module_order ASC");
$stmt->execute([$course_id]);
$modules = $stmt->fetchAll();

$lessons = [];
if ($module_id) {
    $stmt = $pdo->prepare("SELECT title, german_text, phonetic_text, polish_text FROM lessons WHERE module_id = ? ORDER BY lesson_order ASC");
    $stmt->execute([$module_id]);
    $lessons = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Nauka - <?php echo htmlspecialchars($course['title']); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
  <div class="container py-4">
    <h1 class="mb-4"><?php echo htmlspecialchars($course['title']); ?></h1>
    <?php if (!$module_id): ?>
      <h2 class="h4 mb-3">Wybierz moduł</h2>
      <ol class="list-group list-group-numbered">
        <?php foreach ($modules as $m): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span><?php echo htmlspecialchars($m['title']); ?></span>
            <a href="learn.php?course_id=<?php echo $course_id; ?>&module_id=<?php echo $m['id']; ?>" class="btn btn-sm btn-primary">
              Start
            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    <?php else: ?>
      <p><a href="learn.php?course_id=<?php echo $course_id; ?>" class="btn btn-link">&laquo; Wszystkie moduły</a></p>
      <h2 class="h5 mb-3">Lekcje</h2>
      <?php if ($lessons): ?>
        <ul class="list-group mb-4">
          <?php foreach ($lessons as $l): ?>
            <li class="list-group-item">
              <b><?php echo htmlspecialchars($l['title']); ?></b><br>
              <span class="badge bg-secondary">DE</span> <?php echo htmlspecialchars($l['german_text']); ?><br>
              <span class="badge bg-info text-dark">Czyt.</span> <?php echo htmlspecialchars($l['phonetic_text']); ?><br>
              <span class="badge bg-light text-dark">PL</span> <?php echo htmlspecialchars($l['polish_text']); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <div class="alert alert-warning">Brak lekcji w tym module.</div>
      <?php endif; ?>
    <?php endif; ?>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Powrót do panelu</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

