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
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <div class="container py-4">
    <?php if (!$module_id): ?>
      <div class="courses-hero mb-4 text-center">
        <h1 class="mb-2"><?php echo htmlspecialchars($course['title']); ?></h1>
        <p>Wybierz moduł i zacznij naukę:</p>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 module-grid">
        <?php foreach ($modules as $m): ?>
          <div class="col">
            <div class="card module-card h-100">
              <div class="module-accent card-header text-white d-flex justify-content-between">
                <span class="module-index">Moduł <?php echo (int)$m['module_order']; ?></span>
                <i class="bi bi-collection-play module-icon"></i>
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="module-title text-center mb-3"><?php echo htmlspecialchars($m['title']); ?></h5>
                <a href="learn.php?course_id=<?php echo $course_id; ?>&module_id=<?php echo $m['id']; ?>" class="glass-btn btn btn-sm mt-auto w-100">
                  <i class="bi bi-play-fill"></i> Start
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <h1 class="mb-4"><?php echo htmlspecialchars($course['title']); ?></h1>
      <p><a href="learn.php?course_id=<?php echo $course_id; ?>" class="btn btn-link">&laquo; Wszystkie moduły</a></p>
        <h2 class="h5 mb-3">Lekcje</h2>
        <?php if ($lessons): ?>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 lesson-grid mb-4">
            <?php foreach ($lessons as $l): ?>
              <div class="col">
                <div class="card lesson-card h-100">
                  <div class="card-body">
                    <h5 class="mb-2 text-center"><?php echo htmlspecialchars($l['title']); ?></h5>
                    <p><span class="badge bg-secondary me-1">DE</span> <?php echo htmlspecialchars($l['german_text']); ?></p>
                    <p><span class="badge bg-info text-dark me-1">Czyt.</span> <?php echo htmlspecialchars($l['phonetic_text']); ?></p>
                    <p><span class="badge bg-light text-dark me-1">PL</span> <?php echo htmlspecialchars($l['polish_text']); ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
        <div class="alert alert-warning">Brak lekcji w tym module.</div>
      <?php endif; ?>
    <?php endif; ?>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Powrót do panelu</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

