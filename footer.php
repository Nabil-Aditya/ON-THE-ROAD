<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Footer</title>
    <style>
        .footer {
            position: relative;
            color: #fff;
            padding: 40px 0;
            background: url('./assets/grafik.png') no-repeat center center;
            background-size: cover;
            overflow: hidden;
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7); /* Mengatur opacity lebih gelap */
            z-index: 1;
        }

        .footer .container {
            position: relative;
            z-index: 2;
        }

        .footer .footer-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .footer .footer-link,
        .footer p {
            font-weight: bold;
        }

        .footer .footer-link {
            color: #ddd;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .footer .footer-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        .footer .social-icons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .footer .social-icons a {
            color: #fff;
            font-size: 1rem; /* Ukuran font ikon */
            margin-right: 30px;
            transition: color 0.3s;
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;
            text-decoration: none;
        }

        .footer .social-icons a img {
            width: 20px; /* Ukuran gambar ikon */
            height: 20px;
            margin-bottom: 5px;
        }

        .footer .social-icons a:hover {
            color: #007bff;
        }

        .footer .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .footer .map {
            border: 0;
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="footer-title">Navigasi</h5>
                    <a href="index.php" class="footer-link">Home</a>
                    <a href="about.php" class="footer-link">Buat Pengajuan</a>
                    <a href="price.php" class="footer-link">Statistik</a>
                    <a href="contact.php" class="footer-link">Kontak Kami</a>
                    <a href="login.php" class="footer-link">Profile</a>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Media Sosial</h5>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/yourchannel" target="_blank">     
                            <i class="fab fa-instagram"></i>
                            Instagram
                        </a>
                        <a href="https://www.facebook.com/yourpage" target="_blank">          
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a href="https://www.youtube.com/c/yourchannel" target="_blank">                         
                            <i class="fab fa-youtube"></i>
                            YouTube
                        </a>
                        <a href="https://twitter.com/yourhandle" target="_blank">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Tentang Kami</h5>
                    <p>Perumahan Sekawan Pemko, Kelurahan, Belian, Kec. Batam Kota, Kota Batam, Prov. Kepulauan Riau Kode Pos : 29463</p>
                    <p>07784805790</p>
                    <p>Sipelita.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.670590327897!2d104.01042961539288!3d1.109729899212498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da422a5eebd067%3A0xc12c6de4a85cf18a!2sSMK%20Negeri%207%20Batam!5e0!3m2!1sen!2sid!4v1594802469941!5m2!1sen!2sid" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy;2024 Hak Cipta, PT SiPelita.</p>
            </div>
        </div>
    </footer>
</body>

</html>
