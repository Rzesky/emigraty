<?php
require_once 'includes/auth.php';

// Demo dane (podmień na PDO!)
$active_courses = [
  ['id' => 1, 'title' => 'Operator CNC', 'progress' => 85, 'completed' => false],
  ['id' => 3, 'title' => 'Spawacz', 'progress' => 100, 'completed' => true]
];
$user_mistakes = [
  ['lesson' => 'Powitanie', 'german' => 'Guten Morgen', 'phonetic' => 'guten morgen', 'pl' => 'Dzień dobry']
];
$certificates = [
  ['course' => 'Spawacz', 'date' => '2025-05-31', 'code' => 'CERT-XYZ-2025']
];
$final_exams = [];
foreach ($active_courses as $course) {
  if ($course['progress'] == 100) {
    $final_exams[] = [
      'course_id' => $course['id'],
      'course' => $course['title'],
      'passed' => false
    ];
  }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Panel kursanta – Emigraty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/home.css">

</head>

<body>
  <header class="hero">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php"><img src="assets/img/logo.png" alt="Emigraty" style="height:40px;"></a>
        <div class="ms-auto d-flex align-items-center gap-3">
          <span class="fw-semibold text-white" style="font-size:1.1rem">
            <i class="bi bi-person-circle me-1"></i>
            <?php echo htmlspecialchars($user['name'] ?: $user['email']); ?>
          </span>
          <a href="logout.php" class="btn btn-outline-light text-white btn-sm px-3 py-2">
            <i class="bi bi-box-arrow-right"></i> Wyloguj
          </a>
        </div>
      </div>
    </nav>
    <div class="hero-content">
      <h1>Panel kursanta</h1>
      <p>Zarządzaj swoimi kursami i postępami.</p>
    </div>
  </header>

  <div class="container">

  <div class="container">
    <!-- Powitanie i progres -->
    <div class="dashboard-hero mb-4">
      <h2 class="fw-bold mb-1">Witaj, <?php echo htmlspecialchars($user['name'] ?: $user['email']); ?>!</h2>
      <?php if (!empty($active_courses)): ?>
        <p class="lead text-secondary mt-3 mb-1">
          Twój progres:
          <?php
          foreach ($active_courses as $c) {
            echo '<span class="badge bg-primary mx-1 px-3 py-2">' . $c['title'] . ' ' . $c['progress'] . '%</span>';
          }
          ?>
        </p>
      <?php else: ?>
        <p class="lead text-secondary mt-3 mb-1">Nie jesteś jeszcze zapisany na żaden kurs.</p>
      <?php endif; ?>
      <div class="info-banner justify-content-center mt-4 shadow-sm">
        <i class="bi bi-stars fs-3"></i>
        Dziś też możesz zrobić kolejny krok do spełnienia swoich marzeń!
      </div>
    </div>

    <!-- Aktywne kursy -->
    <div class="section-panel mb-4">
      <h4 class="mb-4 gradient-title">Aktywne kursy</h4>
      <div id="user-courses-list">
        <!-- Tu będą ładowane kursy JS-em -->
        <div class="text-center py-4"><span class="spinner-border"></span> Ładuję kursy...</div>
      </div>
    </div>


    <!-- Zwroty do powtórki i certyfikaty w dwóch kolumnach -->
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="section-panel mb-4">
          <h5 class="mb-3 gradient-title"><i class="bi bi-exclamation-circle"></i> Zwroty do powtórki</h5>
          <?php foreach ($user_mistakes as $mistake): ?>
            <div class="mb-2 pb-2 border-bottom">
              <b class="text-danger"><?php echo htmlspecialchars($mistake['german']); ?></b>
              <small class="text-muted">(<?php echo htmlspecialchars($mistake['phonetic']); ?>)</small>
              <span class="text-dark">&ndash; <?php echo htmlspecialchars($mistake['pl']); ?></span>
            </div>
          <?php endforeach; ?>
          <?php if (empty($user_mistakes)): ?>
            <div class="alert alert-success mb-0 shadow-sm">Brawo! Nie masz trudnych zwrotów do powtórki.</div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="section-panel mb-4">
          <h5 class="mb-3 gradient-title"><i class="bi bi-award"></i> Certyfikaty</h5>
          <?php foreach ($certificates as $cert): ?>
            <div class="mb-2 pb-2 border-bottom">
              <b><?php echo htmlspecialchars($cert['course']); ?></b> &ndash; <?php echo htmlspecialchars($cert['date']); ?>
              <a href="certificate.php?code=<?php echo urlencode($cert['code']); ?>" class="glass-btn btn btn-sm ms-2">Pobierz</a>
            </div>
          <?php endforeach; ?>
          <?php if (empty($certificates)): ?>
            <div class="alert alert-warning mb-0 shadow-sm">Brak certyfikatów.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Egzamin końcowy -->
    <div class="section-panel mb-4">
      <h5 class="mb-3 gradient-title"><i class="bi bi-patch-question"></i> Egzamin końcowy</h5>
      <?php if (!empty($final_exams)): ?>
        <ul class="list-group list-group-flush">
          <?php foreach ($final_exams as $exam): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center" style="background:rgba(255,255,255,0.94);">
              <span>
                <b><?php echo htmlspecialchars($exam['course']); ?></b>
                <?php if ($exam['passed']): ?>
                  <span class="badge bg-success ms-2 px-2">Zdany</span>
                <?php else: ?>
                  <span class="badge bg-warning ms-2 px-4">Dostępny</span>

                <?php endif; ?>
              </span>
              <?php if (!$exam['passed']): ?>
                <a href="final_exam.php?course_id=<?php echo $exam['course_id']; ?>" class="glass-btn btn btn-sm">
                  <i class="bi bi-check2-square"></i> Rozpocznij egzamin
                </a>
              <?php else: ?>
                <a href="certificate.php?course_id=<?php echo $exam['course_id']; ?>" class="glass-btn btn btn-sm">
                  <i class="bi bi-award"></i> Pobierz certyfikat
                </a>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <div class="alert alert-info mb-0 shadow-sm">
          Ukończ kurs w 100%, aby podejść do egzaminu końcowego.
        </div>
      <?php endif; ?>
    </div>

    <!-- Ustawienia -->
    <div class="section-panel mb-5 shadow-inset">
      <h5 class="mb-3 gradient-title"><i class="bi bi-gear"></i> Ustawienia konta</h5>
      <form method="post" action="settings.php" class="row g-3">
        <div class="col-md-6">
          <label class="form-label settings-label" for="name">Imię</label>
          <input type="text" class="form-control" id="name" name="name" maxlength="50"
            value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label settings-label" for="email">E-mail</label>
          <input type="email" class="form-control" id="email" name="email"
            value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
        </div>
        <div class="col-12">
          <label class="form-label settings-label" for="password">Nowe hasło</label>
          <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Zostaw puste, jeśli nie chcesz zmieniać">
        </div>
        <div class="col-12">
          <button type="submit" class="glass-btn btn mt-2 px-4 py-2">Zapisz zmiany</button>
        </div>
      </form>
    </div>

    <div class="text-center mb-5">
      <div class="info-banner d-inline-block px-4 py-3 shadow-sm" style="font-size:1.13rem;">
        <i class="bi bi-rocket-takeoff"></i>
        Rozwijaj się, a my pomożemy Ci znaleźć dobrą pracę w Niemczech!
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white text-center py-4 mt-5" style="background:linear-gradient(90deg,#b721ff 0,#21d4fd 100%)!important;">
    Emigraty &copy; 2025 – Twój rozwój w zasięgu ręki!
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
