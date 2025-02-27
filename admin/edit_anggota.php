<?php
session_start(); // Memulai sesi PHP

// Mengecek apakah sesi 'username' ada. Jika tidak ada, pengguna akan diarahkan ke halaman login.
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login
    exit(); // Menghentikan eksekusi kode lebih lanjut
}

// Menghubungkan ke database
include 'koneksi.php'; // Menyertakan file koneksi ke database

// Inisialisasi variabel
$id = $nama = $email = $no_telp = $waktu = '';

// Mengecek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mendapatkan 'id' dari URL

    // Mengambil data anggota berdasarkan 'id' yang diterima
    $query = "SELECT * FROM tb_anggota WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        // Mengisi variabel dengan data anggota yang ada
        $nama = $row['nama'];
        $email = $row['email'];
        $no_telp = $row['no_telp'];
        $waktu = $row['waktu']; // Mengambil data waktu yang ada
    } else {
        // Jika anggota tidak ditemukan, tampilkan pesan error
        echo '<div class="alert alert-danger">Anggota tidak ditemukan!</div>';
        exit; // Menghentikan eksekusi kode lebih lanjut
    }
}

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari input formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $waktu = $_POST['waktu']; // Mendapatkan input waktu dari formulir

    // Query untuk memperbarui data anggota
    $update_query = "UPDATE tb_anggota SET nama = '$nama', email = '$email', no_telp = '$no_telp', waktu = '$waktu' WHERE id = $id";
    if (mysqli_query($koneksi, $update_query)) {
        // Jika berhasil, tampilkan pesan sukses dan arahkan ke halaman anggota
        echo '<div class="alert alert-success">Anggota berhasil diperbarui!</div>';
        header('Location: anggota.php');
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo '<div class="alert alert-danger">Error: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Edit Member</h2>
        <div class="mb-3">
            <a href="anggota.php" class="btn btn-danger">Back</a> <!-- Tombol untuk kembali ke halaman anggota -->
        </div>
        <form action="" method="POST"> <!-- Form untuk mengedit anggota -->
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars($nama); ?>" required> <!-- Input nama -->
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required> <!-- Input email -->
            </div>
            <div class="form-group">
                <label for="no_telp">Phone Number</label>
                <input type="text" id="no_telp" name="no_telp" class="form-control" value="<?php echo htmlspecialchars($no_telp); ?>" required> <!-- Input nomor telepon -->
            </div>
            <input type="submit" value="Update Member" class="btn btn-primary"> <!-- Tombol untuk memperbarui anggota -->
            <a href="anggota.php" class="btn btn-secondary">Cancel</a> <!-- Tombol untuk membatalkan edit -->
        </form>
    </div>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
