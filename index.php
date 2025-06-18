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
  <!-- Ikony Bootstrap (opcjonalnie) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Twój własny CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" alt="Emigraty" style="height:40px;">
        </a>
        <div class="ms-auto">
          <a href="login.php" class="btn btn-outline-primary me-2">Logowanie</a>
          <a href="register.php" class="btn btn-primary">Rejestracja</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- HERO section -->
    <section class="courses-hero mb-0">
      <div class="container">
        <h1 class="display-4 fw-bold">Niemiecki do pracy w Niemczech</h1>
        <p class="lead mt-3">Tylko praktyczne zwroty. Tylko to, czego naprawdę potrzebujesz, by znaleźć i utrzymać pracę w Niemczech.</p>
        <a href="#courses" class="btn btn-light btn-lg me-3">Zobacz kursy</a>
        <a href="register.php" class="btn btn-outline-light btn-lg">Rozpocznij za darmo</a>
      </div>
    </section>

    <!-- Kursy -->
    <section id="courses" class="container py-5">
      <h2 class="mb-4 text-center">Dostępne kursy</h2>
      <div class="course-catalog-list" id="courses-list">
      </div>
      <div class="text-center mt-4">
        <a href="register.php" class="btn btn-success btn-lg">Rozpocznij naukę za darmo</a>
      </div>
    </section>

    <!-- Misja -->
    <section class="bg-light py-5">
      <div class="container text-center">
        <h3 class="mb-3">Zwiększ swoje szanse na rynku pracy w Niemczech</h3>
        <p class="lead">Nie musisz znać całej gramatyki – wystarczy praktyczny język, który naprawdę wykorzystasz. Każdy kurs to gotowe zwroty, wsparcie i realne możliwości!</p>
      </div>
    </section>
  </main>

  <footer class="bg-dark text-white text-center py-4 mt-5">
    Emigraty &copy; 2025 – Nauka niemieckiego do pracy. Wszelkie prawa zastrzeżone.
  </footer>

  <!-- Bootstrap JS CDN + Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery CDN (jeśli chcesz AJAX w jQuery) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- Twój JS -->
  <script src="assets/js/main.js"></script>
  <!-- Przykładowy AJAX do pobierania kursów (do rozbudowy w main.js) -->
  <script>
    // Przykład AJAX (do późniejszego rozbudowania)
    /*
    $(document).ready(function() {
        $.getJSON('api/courses.php', function(data) {
            // Wstawianie kafelków kursów na żywo
        });
    });
    */
  </script>
</body>

</html>
