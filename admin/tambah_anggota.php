<?php
session_start(); // Memulai sesi

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Mengarahkan ke halaman login jika belum login
    exit();
}

// Sertakan file koneksi database
include 'koneksi.php';

// Inisialisasi variabel untuk pesan sukses atau error
$message = "";

// Memproses form saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

    // Query untuk menambahkan anggota ke database dengan waktu otomatis
    $query = "INSERT INTO tb_anggota (nama, email, no_telp) VALUES ('$nama', '$email', '$no_telp')";

    if (mysqli_query($koneksi, $query)) {
        $message = '<div class="alert alert-success">Anggota berhasil ditambahkan!</div>';
    } else {
        $message = '<div class="alert alert-danger">Error: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Add Member</h2>
        <div class="mb-3">
            <a href="anggota.php" class="btn btn-danger">Back</a> <!-- Tombol untuk kembali ke halaman anggota -->
        </div>

        <?php echo $message; ?> <!-- Menampilkan pesan sukses atau error -->

        <form method="POST" action="tambah_anggota.php">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No. Telp (harus 12 angka):</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required
                    minlength="12" maxlength="12" pattern="\d{12}"
                    title="Nomor telepon harus terdiri dari 12 angka">
            </div>

            <!-- Tombol untuk submit form -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="anggota.php" class="btn btn-danger">Cancel</a> <!-- Tombol untuk kembali ke halaman anggota -->
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>