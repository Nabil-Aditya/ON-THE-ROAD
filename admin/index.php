<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

date_default_timezone_set('Asia/Jakarta'); // Sesuaikan timezone jika diperlukan

// Mengambil nama hari dalam Bahasa Indonesia
function getIndonesianDayName($dayName)
{
    $dayNames = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    return $dayNames[$dayName];
}

// Get current hour
$currentHour = date('H');

$greeting = "Selamat Pagi";

if ($currentHour >= 0 && $currentHour < 12) {
    $greeting = "Selamat Pagi";
} elseif ($currentHour >= 12 && $currentHour < 18) {
    $greeting = "Selamat Siang";
} else {
    $greeting = "Selamat Malam";
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
    <title>ADMIN</title>
    <link rel="stylesheet" href="../style/style_admin.css" />
</head>

<style>
    .profile-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
    }

    .profile-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 12px;
    }

    .card {
        background-color: #28a745;
        color: white;
        cursor: pointer;
    }

    .card:hover {
        background-color: #218838;
    }

    .card i {
        color: white;
    }

    .navbar-logo {
        display: flex;
        align-items: center;
    }

    .navbar-logo img {
        border-radius: 10px;
        margin-right: 10px;
    }

    .navbar-logo span {
        font-weight: bold;
    }

    .navbar-logo .digision {
        color: #007bff;
    }

    .navbar-logo .dev {
        color: #28a745;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        padding: 10px;
    }

    .sidebar-logo img {
        max-height: 40px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .sidebar-logo span {
        font-weight: bold;
    }

    .sidebar-logo .digision {
        color: #007bff;
    }

    .sidebar-logo .dev {
        color: #28a745;
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-end bg-light" id="sidebar-wrapper">
            <div class="sidebar-logo">
                <img src="../assets/hd.png" alt="CLUB MOROT Logo" class="img-fluid">
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Home</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Anggota.php">Anggota</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="signup.php">Add Account</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="edit_account.php">Edit Account</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php" style="color: red;"><b>Logout<i class="fa fa-power-off" aria-hidden="true"></i></b></a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                </div>
            </nav>
            <!-- about section -->
            <div class="container-fluid">
                <div class="profile-container">
                    <img src="../assets/ppadmin.png" alt="Profile Picture" class="profile-img">
                    <div>
                        <h2><?php echo $greeting; ?>, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                        <p id="timeDisplay"><?php echo getIndonesianDayName(date('l')) . ', ' . date('j F Y') . ', ' . date('H:i:s'); ?></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card" onclick="location.href='anggota.php'">
                            <div class="card-body text-center">
                                <i class="bi bi-person" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">Data Anggota</h5>
                                <p class="card-text">Manage your Anggota.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" onclick="location.href='signup.php'">
                            <div class="card-body text-center">
                                <i class="bi bi-person-plus" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">Add Account</h5>
                                <p class="card-text">Add a new account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" onclick="location.href='edit_account.php'">
                            <div class="card-body text-center">
                                <i class="bi bi-pencil-square" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">Edit Account</h5>
                                <p class="card-text">Edit account.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });

        function updateTime() {
            const now = new Date();
            const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const dayName = dayNames[now.getDay()];
            const day = now.getDate();
            const month = monthNames[now.getMonth()];
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            const formattedTime = `${dayName}, ${day} ${month} ${year}, ${hours}:${minutes}:${seconds}`;
            document.getElementById('timeDisplay').textContent = formattedTime;
        }

        setInterval(updateTime, 1000);
        updateTime(); // initial call to set the time immediately
    </script>
</body>

</html>
