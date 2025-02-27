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

        <!-- Section for Members -->
        <section>
            <h2 class="mb-5">Our Klien & partner</h2>

            <marquee behavior="scroll" direction="left" scrollamount="5">
                <img src="./assets/logo_harley.png" alt="Klien 1" style="width: 150px; height: 100px; margin-right: 20px;">
                <img src="./assets/pertamina.png" alt="Klien 2" style="width: 150px; height: 100px; margin-right: 20px;">
                <img src="./assets/brembo.jpeg" alt="Klien 3" style="width: 150px; height: 100px; margin-right: 20px;">
                <img src="./assets/kyt.jpg" alt="Klien 4" style="width: 150px; height: 100px; margin-right: 20px;">
                <img src="./assets/yuasa.png" alt="Klien 5" style="width: 150px; height: 100px; margin-right: 20px;">
                <img src="./assets/motul.jpg" alt="Klien 6" style="width: 150px; height: 100px;">
            </marquee>

            <br>
            <br>
            <div class="row">
                <!-- Product 1 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/logo_harley.png" alt="Hoodie On The Road">
                        <div class="caption">
                            <h3>HARLEY DAVIDSON Corporation</h3>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/pertamina.png" alt="pertamina">
                        <div class="caption">
                            <h3>Pt Pertamina</h3>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/brembo.jpeg" alt="Brembo">
                        <div class="caption">
                            <h3>Brembo Corporation</h3>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/kyt.jpg" alt="kyt">
                        <div class="caption">
                            <h3>Pt KYT Racing</h3>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/yuasa.png" alt="yuasa">
                        <div class="caption">
                            <h3>Pt Yuasa Sumber Jaya</h3>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="col-sm-4 text-center">
                    <div class="product-card">
                        <img src="./assets/motul.jpg" alt="motul">
                        <div class="caption">
                            <h3>Pt Motul Oil Group</h3>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <br>
    <br>
    <br>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <!-- External JS -->
    <script src="script.js"></script>
</body>

</html>