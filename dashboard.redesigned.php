<?php
require_once 'includes/auth.php';

// Demo dane (do zamiany na bazę danych)
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
  <title>Panel użytkownika</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'includes/header.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 fw-bold text-center">Twój Panel</h2>

  <div class="row g-4">
    <!-- Kursy -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="px-3 py-2 text-white" style="background-color: #305779; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
          <h5 class="mb-0">Twoje kursy</h5>
        </div>
        <div class="card-body">
          <?php foreach ($active_courses as $course): ?>
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <strong><?= $course['title'] ?></strong>
                <span><?= $course['progress'] ?>%</span>
              </div>
              <div class="progress" style="height: 10px;">
                <div class="progress-bar" style="width: <?= $course['progress'] ?>%"></div>
              </div>
              <?php if ($course['progress'] == 100): ?>
                <a href="certificate.php?course_id=<?= $course['id'] ?>" class="btn btn-sm btn-outline-success mt-2 rounded-pill">
                  <i class="bi bi-award"></i> Pobierz certyfikat
                </a>
              <?php else: ?>
                <a href="learn.php?course_id=<?= $course['id'] ?>" class="btn btn-sm btn-outline-primary mt-2 rounded-pill">
                  <i class="bi bi-play-circle"></i> Kontynuuj naukę
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Ustawienia -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="px-3 py-2 text-white" style="background-color: #305779; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
          <h5 class="mb-0">Ustawienia konta</h5>
        </div>
        <div class="card-body">
          <form action="update_settings.php" method="post" class="row g-3">
            <div class="col-12">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Nowe hasło</label>
              <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Zostaw puste, jeśli nie chcesz zmieniać">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary rounded-pill">Zapisz zmiany</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Info banner -->
  <div class="text-center mt-5">
    <div class="d-inline-block px-4 py-3 shadow-sm bg-white rounded-3 text-dark">
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