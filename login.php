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
  <title>Logowanie – Emigraty</title>
  <meta name="description" content="Zaloguj się i kontynuuj naukę praktycznego niemieckiego.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-light bg-light py-3">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" alt="Emigraty" style="height:40px;">
      </a>
    </div>
  </nav>
  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow">
          <div class="card-body p-4">
            <h1 class="mb-4 text-center">Logowanie</h1>
            <?php if (isset($_GET['multiple_login'])): ?>
              <div class="alert alert-warning">
                Zostałeś wylogowany, ponieważ zalogowano się na Twoje konto na innym urządzeniu.
              </div>
            <?php endif; ?>
            <form id="login-form" autocomplete="off">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
              </div>
              <button type="submit" class="btn btn-primary w-100">Zaloguj się</button>
            </form>
            <div id="login-message" class="mt-3"></div>
            <div class="mt-4 text-center">
              Nie masz konta? <a href="register.php">Zarejestruj się</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="bg-dark text-white text-center py-4 mt-5">
    Emigraty &copy; 2025
  </footer>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $('#login-form').on('submit', function(e) {
      e.preventDefault();
      $('#login-message').html('<div class="text-center text-info">Logowanie...</div>');
      $.ajax({
        url: 'api/login.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(resp) {
          if (resp.success) {
            $('#login-message').html('<div class="alert alert-success">Logowanie udane! Przekierowanie...</div>');
            setTimeout(function() {
              window.location.href = 'dashboard.php';
            }, 1200);
          } else {
            $('#login-message').html('<div class="alert alert-danger">' + resp.message + '</div>');
          }
        },
        error: function() {
          $('#login-message').html('<div class="alert alert-danger">Błąd połączenia z serwerem.</div>');
        }
      });
    });
  </script>
</body>

</html>
