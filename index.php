<?php
session_start();
if (isset($_SESSION['user_id'], $_SESSION['session_token'])) {
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Emigraty – Szybka nauka praktycznego niemieckiego do pracy w Niemczech. Tylko potrzebne zwroty i proste kursy.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emigraty – Szybka nauka niemieckiego do pracy</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Ikony Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Twój własny CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- Nowy styl strony głównej -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
  <header class="hero">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt="Emigraty" style="height:40px;"></a>
        <div class="ms-auto">
          <a href="login.php" class="btn btn-outline-light text-white me-2">Logowanie</a>
          <a href="register.php" class="btn btn-primary">Rejestracja</a>
        </div>
      </div>
    </nav>
    <div class="hero-content">
      <h1>Nowy start w Niemczech</h1>
      <p>Ucz się zawodowego niemieckiego i rozwijaj karierę.</p>
      <div>
        <a href="#courses" class="btn btn-primary btn-lg me-3">Zobacz kursy</a>
        <a href="register.php" class="btn btn-outline-light btn-lg">Dołącz teraz</a>
      </div>
    </div>
  </header>

  <main>
    <section id="courses" class="courses-section">
      <div class="container">
        <h2 class="text-center">Dostępne kursy</h2>
        <div class="course-catalog-list" id="courses-list"></div>
        <div class="text-center mt-4">
          <a href="register.php" class="btn btn-primary btn-lg">Rozpocznij naukę</a>
        </div>
      </div>
    </section>

    <section class="mission-section text-center py-5">
      <div class="container">
        <h3 class="mb-3">Zwiększ swoje szanse na rynku pracy w Niemczech</h3>
        <p class="lead">Skupiamy się na praktycznych zwrotach, które wykorzystasz w pracy.</p>
      </div>
    </section>
  </main>

  <footer class="text-center py-4">
    Emigraty &copy; 2025 – Nauka niemieckiego do pracy.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
