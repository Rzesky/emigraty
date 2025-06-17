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
  <style>
    :root {
      --main-blue: rgb(58, 136, 253);
      --main-blue-dark: rgb(18, 83, 180);
      --main-grey: #f6f8fb;
      --main-border: #dbe6f3;
      --main-card: #fff;
      --main-dark: #152140;
      --main-success: #43e97b;
      --main-warning: #ffd166;
    }

    body {
      min-height: 100vh;
      font-family: "Segoe UI", "Roboto", Arial, sans-serif;
      background: var(--main-grey);
      color: var(--main-dark);
    }

    .courses-hero {
      background: var(--main-blue);
      border-radius: 14px;
      padding: 2.2rem 2rem 2rem 2rem;
      margin-bottom: 38px;
      text-align: center;
      box-shadow: 0 2px 24px #2566c51a;
    }

    .courses-hero h1 {
      font-weight: 800;
      font-size: 2.18rem;
      color: #fff;
      letter-spacing: -.5px;
      margin-bottom: .45em;
    }

    .courses-hero p {
      font-size: 1.12rem;
      color: #e7eef9;
      margin-bottom: 0;
      font-weight: 400;
    }

    .course-catalog-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 2rem;
    }

    .card.course-card {
      background: var(--main-card) !important;
      border: 1.6px solid var(--main-border) !important;
      border-radius: 14px !important;
      box-shadow: 0 6px 24px 0 #2566c515;
      overflow: hidden;
      position: relative;
      transition: box-shadow .19s, border-color .19s, transform .13s;
      display: flex;
      flex-direction: column;
      min-height: 310px;
    }

    .card.course-card:hover {
      box-shadow: 0 12px 34px #2566c532, 0 1.5px 7px #2566c513;
      border-color: var(--main-blue-dark) !important;
      transform: translateY(-2px) scale(1.025);
    }

    .course-card-bar {
      background: var(--main-blue);
      height: 46px;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding: 0 1.3em 0 1.2em;
      border-bottom: 1px solid var(--main-border);
    }

    .course-title-bar {
      color: #fff;
      font-size: 1.09em;
      font-weight: 700;
      letter-spacing: .01em;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      flex: 1;
      text-align: left;
    }

    .course-icon {
      font-size: 1.65rem;
      color: #fff;
      opacity: .93;
      margin-left: 0.7em;
      margin-top: 2px;
    }

    .card-body {
      padding: 1.5em 1.2em 1.1em 1.2em !important;
      flex: 1 1 auto;
      display: flex;
      flex-direction: column;
    }

    .catalog-desc {
      color: #244070;
      font-size: 1.03rem;
      margin-bottom: 1.05em;
      flex: 1 1 auto;
    }

    .catalog-price {
      width: fit-content;
      color: #fff;
      background: var(--main-blue-dark);
      display: inline-block;
      border-radius: 8px;
      font-size: 1.01rem;
      font-weight: 600;
      padding: 0.34em 1em;
      margin-bottom: 1.1rem;
    }

    .glass-btn,
    .catalog-btn {
      background: var(--main-blue) !important;
      color: #fff !important;
      border-radius: 9px;
      font-weight: 700;
      font-size: 1.01em;
      box-shadow: 0 2px 14px #2566c51c;
      transition: background .14s, box-shadow .17s, color .13s;
      padding-top: 0.5em;
      padding-bottom: 0.5em;
      border: none;
    }

    .glass-btn:hover,
    .glass-btn:focus,
    .catalog-btn:hover,
    .catalog-btn:focus {
      background: var(--main-blue-dark) !important;
      color: #fff !important;
      box-shadow: 0 2px 20px #2566c53a;
      transform: scale(1.03);
    }

    @media (max-width: 700px) {
      .courses-hero {
        padding: 1.1rem 0.6rem 1.2rem 0.6rem;
      }

      .course-catalog-list {
        grid-template-columns: 1fr;
        gap: 1.1rem;
      }

      .card-body {
        padding: 1.1em 1em 1em 1em !important;
      }
    }
  </style>
</head>

<body>
  <!-- Topbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-4">
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
    <div class="courses-hero">
      <h1>Katalog kursów</h1>
      <p>
        Wybierz kurs, który najlepiej odpowiada Twojej ścieżce zawodowej.<br>
        Wszystkie kursy są praktyczne, przystępne i skoncentrowane na niemieckim do pracy!
      </p>
    </div>
    <div class="course-catalog-list">
      <?php foreach ($courses as $course): ?>
        <div class="card course-card shadow-sm h-100">
          <div class="course-card-bar d-flex align-items-center">
            <span class="course-title-bar"><?php echo htmlspecialchars($course['title']); ?></span>
            <i class="bi bi-mortarboard course-icon"></i>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="catalog-desc"><?php echo htmlspecialchars($course['description']); ?></div>
            <span class="catalog-price">
              <?php echo number_format($course['price'], 0, ',', ' '); ?> zł
            </span>
            <a href="course.php?id=<?php echo $course['id']; ?>" class="glass-btn btn w-100 mt-auto">
              <i class="bi bi-search"></i> Szczegóły
            </a>
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
