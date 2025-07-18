<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Pobranie ID kursu
$course_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pobranie danych kursu
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch();

if (!$course) {
  http_response_code(404);
  $not_found = true;
} else {
  // Pobierz przykładowe lekcje (opcjonalnie)
  $stmt2 = $pdo->prepare("SELECT title, german_text, phonetic_text, polish_text FROM lessons WHERE course_id = ? ORDER BY lesson_order ASC LIMIT 3");
  $stmt2->execute([$course_id]);
  $lessons = $stmt2->fetchAll();

  // Pobierz moduły kursu
  $stmtM = $pdo->prepare("SELECT id, title, module_order FROM modules WHERE course_id = ? ORDER BY module_order ASC");
  $stmtM->execute([$course_id]);
  $modules = $stmtM->fetchAll();
}

// Sprawdzenie czy użytkownik jest zalogowany
$is_logged = isset($_SESSION['user_id'], $_SESSION['session_token']);

// Czy użytkownik ma wykupiony kurs?
$has_course = false;
if ($is_logged) {
  // Przykład: tabele 'user_courses' (user_id, course_id, purchased_at)
  $stmt3 = $pdo->prepare("SELECT 1 FROM user_courses WHERE user_id = ? AND course_id = ?");
  $stmt3->execute([$_SESSION['user_id'], $course_id]);
  $has_course = $stmt3->fetchColumn() ? true : false;
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>
    <?php
    if (isset($not_found)) {
      echo "Kurs nie znaleziony – Emigraty";
    } else {
      echo htmlspecialchars($course['title']) . " – Kurs języka niemieckiego | Emigraty";
    }
    ?>
  </title>
  <meta name="description" content="<?php echo isset($not_found) ? 'Ten kurs nie istnieje.' : htmlspecialchars($course['description']); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Własny CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dark.css">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 mb-0">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" alt="Emigraty" style="height:40px;">
      </a>
      <div class="ms-auto">
        <a href="login.php" class="btn btn-outline-light text-white me-2">Logowanie</a>
        <a href="register.php" class="btn btn-primary text-white">Rejestracja</a>
      </div>
  </nav>
  <div class="hero-content">
    <h1><?php echo isset($not_found) ? 'Kurs nie znaleziony' : htmlspecialchars($course['title']); ?></h1>
    <?php if (!isset($not_found)): ?>
      <p><?php echo htmlspecialchars($course['description']); ?></p>
    <?php endif; ?>
  </div>
  </header>
  <main class="py-5">
    <div class="container">
      <?php if (isset($not_found)): ?>
        <div class="alert alert-danger text-center my-5">
          <h2 class="mb-3"><i class="bi bi-x-circle"></i> Kurs nie znaleziony</h2>
          <p>Wybrany kurs nie istnieje lub został usunięty.</p>
          <a href="index.php" class="btn btn-primary mt-3">Powrót do strony głównej</a>
        </div>
      <?php else: ?>
        <div class="row align-items-center mb-5">
          <div class="col-md-7">
            <h1 class="display-5 fw-bold mb-3"><?php echo htmlspecialchars($course['title']); ?></h1>
            <p class="lead"><?php echo htmlspecialchars($course['description']); ?></p>
            <?php if (!empty($course['requirements'])): ?>
              <p><i class="bi bi-check2-circle text-success"></i> <strong>Wymagania:</strong> <?php echo htmlspecialchars($course['requirements']); ?></p>
            <?php endif; ?>
            <ul class="list-group list-group-flush mb-4">
              <li class="list-group-item"><i class="bi bi-clock-history text-primary"></i> Czas trwania: <b><?php echo htmlspecialchars($course['duration']); ?></b></li>
              <li class="list-group-item"><i class="bi bi-cash-coin text-primary"></i> Zarobki w zawodzie: <b><?php echo htmlspecialchars($course['job_salary']); ?></b></li>
              <li class="list-group-item"><i class="bi bi-tag text-primary"></i> Cena kursu: <b><?php echo ($course['price'] > 0 ? number_format($course['price'], 2, ',', ' ') . ' zł' : 'Darmowy'); ?></b></li>
            </ul>
            <div class="mt-4">
              <?php if ($is_logged): ?>
                <?php if ($has_course): ?>
                  <a href="learn.php?course_id=<?php echo $course['id']; ?>" class="btn btn-success btn-lg me-2">
                    <i class="bi bi-play-circle"></i> Rozpocznij naukę
                  </a>
                <?php else: ?>
                  <a href="add_course.php?course_id=<?php echo $course['id']; ?>" class="btn btn-warning btn-lg me-2">
                    <i class="bi bi-cart"></i> Dodaj kurs
                  </a>
                <?php endif; ?>
              <?php else: ?>
                <a href="login.php" class="btn btn-primary btn-lg me-2">Zaloguj się</a>
                <a href="register.php" class="btn btn-outline-primary btn-lg">Załóż konto</a>
              <?php endif; ?>
            </div>

          </div>
          <div class="col-md-5 d-none d-md-block">
            <img src="assets/img/course_<?php echo $course['id']; ?>.jpg" class="img-fluid rounded shadow" alt="<?php echo htmlspecialchars($course['title']); ?>" onerror="this.src='assets/img/course_default.jpg'">
          </div>
        </div>
        <?php if (!empty($modules)): ?>
          <div class="section-panel mb-4">
            <h2 class="h4 mb-3"><i class="bi bi-list-ul text-primary"></i> Moduły kursu:</h2>
            <ol class="list-group list-group-numbered">
              <?php foreach ($modules as $m): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><?php echo htmlspecialchars($m['title']); ?></span>
                  <?php if ($has_course): ?>
                    <a href="learn.php?course_id=<?php echo $course['id']; ?>&module_id=<?php echo $m['id']; ?>" class="btn btn-sm btn-outline-success">
                      <i class="bi bi-play"></i> Start
                    </a>
                  <?php else: ?>
                    <span class="badge bg-secondary">Zarejestruj się</span>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>
        <?php endif; ?>
        <div class="section-panel mb-4">
          <h2 class="h4 mb-4"><i class="bi bi-journal-text text-primary"></i> Przykładowe lekcje z kursu:</h2>
          <?php if (!empty($lessons)): ?>
            <div class="row">
              <?php foreach ($lessons as $lesson): ?>
                <div class="col-md-4 mb-3">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                      <h5 class="card-title mb-2"><?php echo htmlspecialchars($lesson['title']); ?></h5>
                      <p><span class="badge bg-secondary">Niemiecki</span> <b><?php echo htmlspecialchars($lesson['german_text']); ?></b></p>
                      <p><span class="badge bg-info text-dark">Jak czytać</span> <i><?php echo htmlspecialchars($lesson['phonetic_text']); ?></i></p>
                      <p><span class="badge bg-secondary">PL</span> <?php echo htmlspecialchars($lesson['polish_text']); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <p class="text-muted">Brak przykładowych lekcji dla tego kursu.</p>
          <?php endif; ?>
        </div>
        <div class="alert alert-info text-center mt-4">
          <i class="bi bi-emoji-smile"></i>
          <b>W Emigraty uczysz się tylko praktycznego niemieckiego – bez nudnych reguł, tylko gotowe zwroty!</b>
        </div>
      <?php endif; ?>
    </div>
  </main>
  <footer class="bg-dark text-white text-center py-4 mt-5">
    Emigraty &copy; 2025 – Nauka niemieckiego do pracy. Wszelkie prawa zastrzeżone.
  </footer>
  <!-- Bootstrap 5 JS + Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
