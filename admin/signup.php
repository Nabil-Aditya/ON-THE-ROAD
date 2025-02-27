<?php
include 'koneksi.php';
session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Validasi email harus berakhiran @gmail.com
    if (strpos($email, '@gmail.com') === false) {
        $_SESSION['message'] = "Email harus menggunakan @gmail.com";
        header("Location: signup.php");
        exit();
    } else {
        // Cek apakah email atau username sudah ada
        $checkUserSql = "SELECT * FROM tb_admin WHERE username='$username' OR email='$email'";
        $result = mysqli_query($koneksi, $checkUserSql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] == $username) {
                $_SESSION['message'] = "Username sudah digunakan. Silakan pilih username lain.";
            } else if ($row['email'] == $email) {
                $_SESSION['message'] = "Email sudah terdaftar. Silakan gunakan email lain.";
            }

            header("Location: signup.php");
            exit();
        } else {
            // Jika username dan email tidak ada, masukkan data ke database
            $sql = "INSERT INTO tb_admin (username, email, password) VALUES ('$username', '$email', '$password')";

            if (mysqli_query($koneksi, $sql)) {
                $_SESSION['message'] = "Pendaftaran berhasil! Anda berhasil menambahkan akun. <a href='../login.php'>Silakan login</a>.";
            } else {
                $_SESSION['message'] = "Gagal menambahkan akun. Error: " . mysqli_error($koneksi);
            }

            mysqli_close($koneksi);
            header("Location: signup.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style_signup.css" />
    <title>Sign Up</title>
    <script>
        function validateEmail() {
            var email = document.forms["signupForm"]["email"].value;
            if (!email.endsWith("@gmail.com")) {
                alert("Email harus menggunakan @gmail.com");
                return false;
            }
            return true;
        }

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

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-card {
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
    <div class="signup-container">
        <div class="signup-card">
            <div class="card-body">
                <h2 class="signup-title">Sign Up</h2>

                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
                }
                ?>

                <form name="signupForm" method="post" action="signup.php" onsubmit="return validateEmail()" class="signup-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email anda" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Buat username baru" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Buat password baru" required minlength="6">
                            <span class="input-group-text" id="password-toggle" onclick="togglePassword()">
                                <i id="password-toggle-icon" class="bi bi-eye"></i>
                            </span>
                        </div>
                        <div class="form-text">Password minimal 6 karakter</div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">SIGN UP NOW</button>
                    </div>
                </form>
                <div class="signup-footer">
                    <a href="index.php">Back!</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
