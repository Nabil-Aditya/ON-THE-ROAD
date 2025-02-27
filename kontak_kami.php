<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - On The Road Club Motor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="style/style.css" />
    <style>
        .contact-section {
            padding: 40px 0;
            text-align: center;
        }

        .contact-section h2 {
            margin-bottom: 20px;
        }

        .contact-icons a {
            display: inline-block;
            margin: 0 10px;
            font-size: 2rem;
            color: #333;
            transition: color 0.3s ease;
        }

        .contact-icons a:hover {
            color: #ff6f00;
            /* Warna oranye untuk hover */
        }

        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            text-align: center;
            display: inline-flex;
            align-items: center;
            font-size: 1rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
        }

        .whatsapp-btn i {
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <!-- Section for Contact -->
        <section class="contact-section">
            <h2>Kontak Kami</h2>
            <p>
                Kami sangat senang untuk mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau hanya ingin berbagi cerita, jangan ragu untuk menghubungi kami. Kami selalu siap untuk membantu.
            </p>

            <!-- WhatsApp Button -->
            <a href="https://wa.me/6282385142233" class="whatsapp-btn">
                <i class="fab fa-whatsapp"></i> Hubungi Kami di WhatsApp
            </a>
        
            <!-- Social Media Icons -->
            <div class="contact-icons mt-4">
                <a href="https://www.facebook.com/groups/700125184855798/permalink/1003946724473641/?mibextid=oFDknk&rdid=lyWcuHXucpvw1GuJ&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2Fp%2FdUqsGMybTueMfY3K%2F%3Fmibextid%3DoFDknk" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://7b2265223a222f6861726c65796461766964736f6e3f743d3775677a645550564e45466c66546538634338756c4126733d3039222c2274223a313732363638343438367dd913872828a79a6bb512ac16fb956074https://x.com/harleydavidson?t=7ugzdUPVNEFlfTe8cC8ulA&s=09" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/harleydavidson/?igsh=aWdnbWJpNzV5cnRi" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://youtu.be/WZoMANhvA8s" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>
            </div>
            <br>
            <br>
            <h2>Alamat Kami</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.5264320128144!2d104.01537387349008!3d1.1317810622410633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d989b943cc9bfb%3A0xc76a1e6801dfeafd!2sSumatera%20Motor%20Harley%20Davidson%20of%20Batam!5e1!3m2!1sid!2sid!4v1726679736336!5m2!1sid!2sid"
                width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </section>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>