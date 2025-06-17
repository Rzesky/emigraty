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
  <style>
    :root {
      --primary-navy: #1a2340;
      --primary-white: #f9fafe;
      --primary-blue: #3a88fd;
      --primary-blue-dark: #1253b4;
      --primary-grey: #e5e9f2;
      --primary-green: #53c882;
      --primary-yellow: #ffd166;
    }

    body {
      min-height: 100vh;
      font-family: "Segoe UI", "Roboto", Arial, sans-serif;
      background: var(--primary-white);
      color: var(--primary-navy);
    }

    /* PANEL GŁÓWNY */
    .section-panel {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 28px 0 #1a234020;
      border: 1.5px solid var(--primary-grey);
      padding: 2.3rem 1.5rem;
      margin-bottom: 2.1rem;
      animation: fadein 0.9s cubic-bezier(0.66, 0.02, 0.47, 0.97);
    }

    @keyframes fadein {
      0% {
        opacity: 0;
        transform: translateY(24px);
      }

      100% {
        opacity: 1;
        transform: none;
      }
    }

    .info-banner {
      background: var(--primary-blue);
      color: #fff;
      border-radius: 11px;
      padding: 1rem 1.2rem;
      font-size: 1.06rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: 0 2px 18px #3a88fd22;
      margin-top: 18px;
      animation: fadein 1.2s cubic-bezier(0.52, 0.01, 0.32, 0.96);
    }

    .card.course-card {
      background: #fff !important;
      border: 1.8px solid var(--primary-grey) !important;
      border-radius: 14px !important;
      box-shadow: 0 8px 38px 0 #1a234014, 0 1.5px 7px #3a88fd17;
      overflow: visible;
      position: relative;
      margin-top: 18px;
      transition: box-shadow 0.22s, border-color 0.21s, transform 0.14s;
    }

    .card.course-card:hover {
      box-shadow: 0 16px 54px 0 #3a88fd35, 0 1.5px 7px #3a88fd14;
      border-color: var(--primary-blue) !important;
      transform: translateY(-4px) scale(1.025);
    }

    .glass-btn,
    .catalog-btn,
    .btn-primary {
      background: var(--primary-blue) !important;
      color: #fff !important;
      border-radius: 9px;
      font-weight: 700;
      font-size: 1.01em;
      box-shadow: 0 2px 14px #3a88fd1c;
      transition: background .14s, box-shadow .17s, color .13s;
      padding-top: 0.5em;
      padding-bottom: 0.5em;
      border: none;
    }

    .glass-btn:hover,
    .glass-btn:focus,
    .catalog-btn:hover,
    .catalog-btn:focus {
      background: var(--primary-blue-dark) !important;
      color: #fff !important;
      box-shadow: 0 2px 20px #1253b43a;
      transform: scale(1.03);
    }

    .badge.bg-primary {
      background: var(--primary-blue) !important;
      color: #fff;
      font-weight: 600;
      font-size: 1em;
      box-shadow: 0 2px 6px #3a88fd1a;
      border-radius: 8px;
      padding: 0.42em 1em;
      letter-spacing: .01em;
    }

    .badge.bg-success {
      background: var(--primary-green) !important;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 0.42em 1em;
    }

    .badge.bg-warning {
      background: var(--primary-yellow) !important;
      color: #735500;
      font-weight: 600;
      border-radius: 8px;
      padding: 0.42em 1em;
    }

    .no-data-icon {
      font-size: 2.7rem;
      color: var(--primary-blue);
      opacity: 0.78;
      filter: drop-shadow(0 2px 12px #3a88fd3a);
    }

    .section-panel h4,
    .section-panel h5,
    .card-title,
    .course-title-accent,
    label,
    .settings-label {
      color: var(--primary-navy) !important;
    }

    footer.bg-dark {
      background: var(--primary-navy) !important;
      color: #fff !important;
    }

    a,
    a:visited {
      color: var(--primary-blue);
    }

    input,
    select,
    textarea {
      border-radius: 10px !important;
      border: 1.3px solid var(--primary-grey);
      background: #f9fafe;
      color: var(--primary-navy);
      transition: border 0.13s;
    }

    input:focus,
    select:focus,
    textarea:focus {
      border-color: var(--primary-blue);
      background: #fff;
      outline: none;
    }

    ::-webkit-input-placeholder {
      color: #6c7590;
    }

    ::-moz-placeholder {
      color: #6c7590;
    }

    :-ms-input-placeholder {
      color: #6c7590;
    }

    ::placeholder {
      color: #6c7590;
    }

    .badge {
      letter-spacing: 0.01em;
      font-size: 1em;
    }
  </style>

</head>

<body>
  <!-- Topbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-4" style="background:rgba(255,255,255,0.98)!important;">
    <div class="container">
      <a class="navbar-brand fw-bold" href="dashboard.php">
        <img src="assets/img/logo.png" alt="Emigraty" style="height:36px;">
      </a>
      <div class="ms-auto d-flex align-items-center gap-3">
        <span class="fw-semibold text-secondary" style="font-size:1.1rem">
          <i class="bi bi-person-circle me-1"></i>
          <?php echo htmlspecialchars($user['name'] ?: $user['email']); ?>
        </span>
        <a href="logout.php" class="glass-btn btn btn-sm px-3 py-2">
          <i class="bi bi-box-arrow-right"></i> Wyloguj
        </a>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Powitanie i progres -->
    <div class="section-panel text-center mb-4 shadow-inset">
      <h2 class="fw-bold mb-1" style="font-size:2.2rem; letter-spacing:-1px;">Witaj, <?php echo htmlspecialchars($user['name'] ?: $user['email']); ?>!</h2>
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
      <h4 class="mb-4" style="color: #3e62c2;">Aktywne kursy</h4>
      <div id="user-courses-list">
        <!-- Tu będą ładowane kursy JS-em -->
        <div class="text-center py-4"><span class="spinner-border"></span> Ładuję kursy...</div>
      </div>
    </div>


    <!-- Zwroty do powtórki i certyfikaty w dwóch kolumnach -->
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="section-panel mb-4">
          <h5 class="mb-3"><i class="bi bi-exclamation-circle"></i> Zwroty do powtórki</h5>
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
          <h5 class="mb-3"><i class="bi bi-award"></i> Certyfikaty</h5>
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
      <h5 class="mb-3 egzamin-tytul"><i class="bi bi-patch-question"></i> Egzamin końcowy</h5>
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
      <h5 class="mb-3"><i class="bi bi-gear"></i> Ustawienia konta</h5>
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
