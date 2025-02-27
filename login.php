<?php
include 'inc/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Validasi password minimal 6 karakter
    if (strlen($password) < 6) {
        echo "<script>
                alert('Password minimal 6 karakter');
                window.location.href = 'login.php';
              </script>";
        exit();
    }

    $password = md5($password);

    $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              </head>
              <body>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: 'Anda berhasil login!',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function() {
                        window.location.href = 'admin/index.php';
                    });
                </script>
              </body>
              </html>";
        exit();
    } else {
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              </head>
              <body>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Username atau password salah!'
                    }).then(function() {
                        window.location.href = 'login.php';
                    });
                </script>
              </body>
              </html>";
    }

    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="style/style_login.css" />
    <script>
        function togglePassword() {
            var passwordField = document.getElementById('password');
            var toggleIcon = document.getElementById('password-toggle-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: #333; /* Background color changed to dark gray */
            color: #fff; /* Text color for better contrast */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            max-width: 400px;
            width: 100%;
            background-color: #444; /* Dark card background for contrast */
            padding: 20px;
            border-radius: 8px;
        }

        .nocopy {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Silahkan login</h1>
                <form method="post" action="login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Masukan username anda" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukan password anda" required minlength="6">
                            <span class="input-group-text" id="password-toggle" onclick="togglePassword()">
                                <i id="password-toggle-icon" class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                        <div class="form-text">Password minimal 6 karakter</div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                    <br>
                    <div class="signup-footer">
                    <a href="index.php">Back to Homepage!</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
