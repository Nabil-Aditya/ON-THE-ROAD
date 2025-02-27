<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On The Road Club Motor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <!-- Section for Club Activities -->
        <section>
            <h2>Kegiatan Club</h2>
            <ul>
                <li>Touring bersama ke berbagai daerah</li>
                <li>Gathering rutin setiap bulan</li>
                <li>Charity Ride untuk membantu masyarakat yang membutuhkan</li>
                <li>Pelatihan safety riding bagi anggota baru</li>
                <li>Partisipasi dalam event motor nasional</li>
            </ul>
        </section>

        <!-- Section for Locations with Icons -->
        <section class="mt-4">
            <h3>Lokasi Club</h3>
            <ul class="list-unstyled">
                <li><i class="fas fa-map-marker-alt"></i> Batam</li>
                <li><i class="fas fa-map-marker-alt"></i> Jakarta</li>
                <li><i class="fas fa-map-marker-alt"></i> Bali</li>
                <li><i class="fas fa-map-marker-alt"></i> Lombok</li>
            </ul>
        </section>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
