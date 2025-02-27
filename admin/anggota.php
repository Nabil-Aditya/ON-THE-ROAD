<?php
session_start(); // Memulai sesi PHP

// Mengecek apakah pengguna telah login, jika belum diarahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login
    exit(); // Menghentikan eksekusi script
}

// Menyertakan file koneksi ke database
include 'koneksi.php';

// Menetapkan tahun default ke tahun saat ini atau mendapatkan tahun yang dipilih dari permintaan GET
$selectedYear = isset($_GET['year']) ? $_GET['year'] : date("Y");

// Mengambil data dari tabel anggota, disaring berdasarkan tahun yang dipilih, diurutkan berdasarkan 'waktu' secara menurun
$query = "SELECT * FROM tb_anggota WHERE YEAR(waktu) = '$selectedYear' ORDER BY waktu DESC";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah ada data yang ditemukan
$members = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row; // Menyimpan setiap baris data ke dalam array
    }
}

// Menangani permintaan penghapusan data anggota
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id']; // Mendapatkan ID anggota yang akan dihapus
    $delete_query = "DELETE FROM tb_anggota WHERE id = $delete_id"; // Membuat query untuk menghapus data anggota
    if (mysqli_query($koneksi, $delete_query)) {
        echo '<div class="alert alert-success">Anggota berhasil dihapus!</div>'; // Menampilkan pesan sukses
        header('Location: anggota.php'); // Mengarahkan kembali ke halaman anggota
        exit;
    } else {
        echo '<div class="alert alert-danger">Error: ' . mysqli_error($koneksi) . '</div>'; // Menampilkan pesan error
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .btn-icon {
            padding: 0.5rem;
            font-size: 1.2rem;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        .hidden-id {
            display: none;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
        }

        /* Custom CSS untuk posisi tombol "Tambah Anggota" */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="top-bar">
            <h2>All Members</h2>
            <a href="tambah_anggota.php" class="btn btn-info"><i class="fas fa-plus"></i> Add Member</a> <!-- Tombol "Add Member" di sebelah kanan atas -->
        </div>
        
        <div class="mb-3">
            <a href="index.php" class="btn btn-danger">Back</a> <!-- Tombol untuk kembali ke halaman utama -->
        </div>

        <!-- Dropdown untuk memilih tahun -->
        <div class="mb-4">
            <label for="yearSelect">Pilih Tahun:</label>
            <select id="yearSelect" class="form-control" onchange="updateComments()"> <!-- Ketika tahun dipilih, fungsi updateComments() akan dijalankan -->
                <?php
                $currentYear = date("Y"); // Mendapatkan tahun saat ini
                for ($year = $currentYear; $year >= $currentYear - 5; $year--) { // Loop untuk menampilkan 5 tahun terakhir dalam dropdown
                    $selected = ($year == $selectedYear) ? "selected" : ""; // Menandai tahun yang dipilih
                    echo "<option value=\"$year\" $selected>$year</option>";
                }
                ?>
            </select>
        </div>

        <!-- Input pencarian -->
        <div class="search-container">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for members..."> <!-- Kolom input untuk mencari anggota -->
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No.</th>
                        <th class="hidden-id">ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Waktu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    <?php $counter = 1; ?>
                    <?php foreach ($members as $member) : ?> <!-- Loop untuk menampilkan setiap anggota dalam tabel -->
                        <tr>
                            <td><?php echo $counter++; ?></td> <!-- Menampilkan nomor urut -->
                            <td class="hidden-id"><?php echo htmlspecialchars($member['id']); ?></td> <!-- Menampilkan ID anggota (disembunyikan) -->
                            <td><?php echo htmlspecialchars($member['nama']); ?></td> <!-- Menampilkan nama anggota -->
                            <td><?php echo htmlspecialchars($member['email']); ?></td> <!-- Menampilkan email anggota -->
                            <td><?php echo htmlspecialchars($member['no_telp']); ?></td> <!-- Menampilkan nomor telepon anggota -->
                            <td><?php echo htmlspecialchars($member['waktu']); ?></td> <!-- Menampilkan waktu anggota dikirim -->
                            <td>
                                <div class="action-btns">
                                    <a href="edit_anggota.php?id=<?php echo $member['id']; ?>" class="btn btn-warning btn-icon">
                                        <i class="fas fa-edit"></i> <!-- Tombol untuk mengedit anggota -->
                                    </a>
                                    <a href="?delete_id=<?php echo $member['id']; ?>" class="btn btn-danger btn-icon" onclick="return confirm('Are you sure you want to delete this member?');">
                                        <i class="fas fa-trash-alt"></i> <!-- Tombol untuk menghapus anggota -->
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk memuat ulang halaman dengan tahun yang dipilih
        function updateComments() {
            var selectedYear = document.getElementById('yearSelect').value;
            window.location.href = 'anggota.php?year=' + selectedYear; // Mengubah URL untuk memuat anggota berdasarkan tahun yang dipilih
        }

        // JavaScript untuk pencarian dalam tabel
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var searchValue = this.value.toLowerCase(); // Mengambil nilai pencarian dan mengubahnya menjadi huruf kecil
            var rows = document.querySelectorAll('#orderTableBody tr'); // Mengambil semua baris dalam tabel

            rows.forEach(function(row) {
                var cells = row.getElementsByTagName('td'); // Mengambil semua sel dalam baris
                var match = false;

                for (var i = 1; i < cells.length; i++) { // Mulai dari indeks 1 untuk melewati kolom nomor
                    var cellValue = cells[i].textContent.toLowerCase();
                    if (cellValue.includes(searchValue)) { // Memeriksa apakah nilai sel mengandung nilai pencarian
                        match = true;
                        break;
                    }
                }

                if (match) {
                    row.style.display = ''; // Menampilkan baris jika cocok dengan pencarian
                } else {
                    row.style.display = 'none'; // Menyembunyikan baris jika tidak cocok dengan pencarian
                }
            });
        });
    </script>
</body>

</html>
