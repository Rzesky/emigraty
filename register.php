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
  <title>Rejestracja – Emigraty</title>
  <meta name="description" content="Zarejestruj się, aby rozpocząć praktyczną naukę niemieckiego do pracy.">
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
            <h1 class="mb-4 text-center">Rejestracja</h1>
            <form id="register-form" autocomplete="off">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="6" autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="password2" class="form-label">Powtórz hasło</label>
                <input type="password" class="form-control" id="password2" name="password2" required minlength="6" autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Imię (opcjonalnie)</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="50" autocomplete="off">
              </div>
              <button type="submit" class="btn btn-success w-100">Załóż konto</button>
            </form>
            <div id="register-message" class="mt-3"></div>
            <div class="mt-4 text-center">
              Masz już konto? <a href="login.php">Zaloguj się</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="bg-dark text-white text-center py-4 mt-5">
    Emigraty &copy; 2025
  </footer>
  <!-- ZAWSZE najpierw jQuery! -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $('#register-form').on('submit', function(e) {
      e.preventDefault();
      // Sprawdź czy hasła są takie same
      const pwd = $('#password').val();
      const pwd2 = $('#password2').val();
      if (pwd !== pwd2) {
        $('#register-message').html('<div class="alert alert-danger">Hasła nie są takie same.</div>');
        return;
      }
      $('#register-message').html('<div class="text-center text-info">Rejestracja...</div>');
      $.ajax({
        url: 'api/register.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(resp) {
          if (resp.success) {
            $('#register-message').html('<div class="alert alert-success">Rejestracja zakończona sukcesem! <a href="login.php">Zaloguj się</a></div>');
            $('#register-form')[0].reset();
          } else {
            $('#register-message').html('<div class="alert alert-danger">' + resp.message + '</div>');
          }
        },
        error: function() {
          $('#register-message').html('<div class="alert alert-danger">Błąd połączenia z serwerem.</div>');
        }
      });
    });
  </script>
</body>

</html>
