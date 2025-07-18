<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

$stmt = $pdo->query("SELECT id, title, description, price FROM courses ORDER BY featured DESC, id ASC");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Katalog kursów – Emigraty</title>
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
      <h1>Katalog kursów</h1>
      <p>Wybierz kurs dopasowany do Twojej kariery.</p>
    </div>
  </header>

  <div class="container">
    <div class="courses-hero">
      <h1>Katalog kursów</h1>
      <p>
        Wybierz kurs, który najlepiej odpowiada Twojej ścieżce zawodowej.<br>
        Wszystkie kursy są praktyczne, przystępne i skoncentrowane na niemieckim do pracy!
      </p>
    </div>
      <div class="course-catalog-list">
        <?php foreach ($courses as $course): ?>
          <div class="card course-card h-100">
            <div class="course-card-accent d-flex justify-content-between align-items-center">
              <span class="course-title-accent"><?php echo htmlspecialchars($course['title']); ?></span>
              <i class="bi bi-mortarboard fs-4"></i>
            </div>
            <div class="card-body d-flex flex-column">
              <span class="badge bg-success mb-2">Polecany</span>
              <p class="catalog-desc flex-grow-1 mb-3">
                <?php echo htmlspecialchars($course['description']); ?>
              </p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="catalog-price">
                  <?php echo number_format($course['price'], 0, ',', ' '); ?> zł
                </span>
                <a href="course.php?id=<?php echo $course['id']; ?>" class="catalog-btn btn btn-sm">
                  <i class="bi bi-search"></i> Szczegóły
                </a>
              </div>
            </div>
          </div>
        
        <?php endforeach; ?>
      <?php if (empty($courses)): ?>
        <div>
          <div class="alert alert-warning text-center">Brak dostępnych kursów.</div>
        </div>
      <?php endif; ?>
    </div>
    <div class="text-center mb-5 mt-5">
      <a href="dashboard.php" class="glass-btn btn" style="color:#fff;">
        <i class="bi bi-arrow-left"></i> Powrót do panelu
      </a>
    </div>
  </div>
  <footer class="bg-dark text-white text-center py-4 mt-5">
    Emigraty &copy; 2025 – Twój rozwój w zasięgu ręki!
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
