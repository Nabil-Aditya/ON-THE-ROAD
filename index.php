<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On The Road Club Motor</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section with Image and Text -->
    <div class="hero-image text-center position-relative">
        <img src="./assets/heroxc.jpeg" class="img-fluid w-100" alt="Motor Ride">
        <div class="hero-text position-absolute top-50 start-50 translate-middle text-white">
            <h1>On The Road</h1>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Kata Pengantar -->
        <h1>Kata Pengantar</h1>
        <p>Selamat datang di website resmi <strong>On The Road Club Motor</strong>. Berdiri sejak tahun 2005, klub ini didirikan dengan semangat kebersamaan dan misi kemanusiaan. Kami berkomitmen untuk membantu satu sama lain, baik dalam kegiatan sehari-hari maupun dalam aktivitas sosial yang lebih luas. Melalui solidaritas, kami terus menguatkan persaudaraan antar anggota yang berasal dari berbagai latar belakang.</p>

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

        <!-- Section for Members -->
        <section>
            <h2 class="mb-5">Anggota Kami</h2>

            <div class="row">
                <!-- Member 1 -->
                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/ahmad.jpg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Ahmad Rizky</h3>
                            <p>"Selalu berbagi di jalan dan saling membantu satu sama lain bagian dari kehidupan kami, Motor adalah hobi kami namun tata krama adalah kewajiban setiap umat manusia sedari lahir"</p>
                        </div>
                    </div>
                </div>


                <!-- Member 2 -->
                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/syahroni.jpeg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Sonny Abdul</h3>
                            <p>"Saat raungan mesin berbunyi. Itulah tanda kehidupanmu dimulai, Ttekad dan solidaritas tanpa batas tanpa buluh dan tanpa pamrih itulah yang selalu ada pada jiwa kami Bikers Indonesia"</p>
                        </div>
                    </div>
                </div>


                <!-- Member 3 -->
                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/nanan.jpg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Nanan Soekarna</h3>
                            <p>"Saat di mana kita mengingat kembali bahwa sukses adalah tujuan kita. Maka terjatuh adalah bagian dari proses itu, sehingga tak akan membuat kita patah semangat dan terus berusaha!"</p>
                        </div>
                    </div>
                </div>



                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/sekar.jpg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Sekar Susanti</h3>
                            <p>"Bukan tentang seberapa jauh jarak yang sudah ditaklukkan, seberapa banyak tempat yang sudah ditaklukan, tapi diri kitalah yang mesti kita taklukkan. Touring mengajarkan banyak hal."</p>
                        </div>
                    </div>
                </div>


                <!-- Member 2 -->
                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/amel.jpg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Amelia Irawan</h3>
                            <p>"Bikers memang keras kepala kalau disuruh jual motornya karena sudah terlalu jauh untuk dilupakan. Namun, karena persaudaraan dan solidaritas yang mampu mempertahankan dan memperjuangkannya"</p>
                        </div>
                    </div>
                </div>


                <!-- Member 3 -->
                <div class="col-sm-4 text-center">
                    <div class="thumbnail">
                        <img src="./assets/gilang.jpg" alt="Anggota 1">
                        <div class="caption">
                            <h3>Gilang Jayadi</h3>
                            <p>"Bukan tentang seberapa jauh jarak yang telah kau tempuh. Atau berapa kilometer yang telah kau lalui apapun medan dan rintanganya. Tetapi, seberapa besar kamu telah menghargai orang lain."</p>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

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