<?php
include 'koneksi.php';
session_start(); // Mulai sesi

// Cek apakah admin sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data akun berdasarkan username yang login
$username = $_SESSION['username'];
$sql = "SELECT * FROM tb_admin WHERE username='$username'";
$result = mysqli_query($koneksi, $sql);
$userData = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? md5($_POST['password']) : $userData['password'];

    // Validasi email harus berakhiran @gmail.com
    if (strpos($email, '@gmail.com') === false) {
        $_SESSION['message'] = "Email harus menggunakan @gmail.com";
        header("Location: edit_account.php");
        exit();
    } else {
        // Cek apakah username baru sudah digunakan
        if ($newUsername != $username) {
            $checkUserSql = "SELECT * FROM tb_admin WHERE username='$newUsername'";
            $result = mysqli_query($koneksi, $checkUserSql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['message'] = "Username sudah digunakan. Silakan pilih username lain.";
                header("Location: edit_account.php");
                exit();
            }
        }

        // Update data akun di database
        $sql = "UPDATE tb_admin SET username='$newUsername', email='$email', password='$password' WHERE username='$username'";
        
        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['username'] = $newUsername; // Update sesi username
            $_SESSION['message'] = "Akun berhasil diperbarui.";
        } else {
            $_SESSION['message'] = "Gagal memperbarui akun. Error: " . mysqli_error($koneksi);
        }

        mysqli_close($koneksi);
        header("Location: edit_account.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style_edit_account.css">
    <title>Edit Account</title>
    <script>
        function validateEmail() {
            var email = document.forms["editAccountForm"]["email"].value;
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
</head>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        background: url('../assets/data.gif') no-repeat center center fixed;
        background-size: cover;
    }
</style>

<body>
    <div class="signup-container">
        <div class="signup-card">
            <div class="card-body">
                <h2 class="signup-title">Edit Account</h2>

                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
                }
                ?>

                <form name="editAccountForm" method="post" action="edit_account.php" onsubmit="return validateEmail()" class="signup-form">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Buat username baru" required value="<?php echo htmlspecialchars($userData['username']); ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email anda" required value="<?php echo htmlspecialchars($userData['email']); ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Buat password baru (Kosongkan jika tidak ingin mengubah)" minlength="6">
                            <span class="input-group-text" id="password-toggle" onclick="togglePassword()">
                                <i id="password-toggle-icon" class="bi bi-eye"></i>
                            </span>
                        </div>
                        <div class="form-text">Password minimal 6 karakter</div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">UPDATE ACCOUNT</button>
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
