<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #99A0E2;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar-custom {
            background-color: #3C47AF;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color: #ddd;
        }
        .navbar-custom .nav-link {
            color: #fff !important;
        }
        .logo-navbar {
            width: 50px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
            flex: 1;
            margin-bottom: 20px;
        }
        .header {
            background-color: #3C47AF;
            color: #FFFFFF;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .map {
            width: 100%;
            height: 300px;
            border: 0;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .contact-info {
            background-color: #f1f5ff;
            padding: 20px;
            border-radius: 10px;
        }
        .contact-info h5 {
            color: #3C47AF;
            margin-bottom: 10px;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 15px;
            background-color: #3C47AF;
            color: #FFFFFF;
            border-radius: 0;
        }
        .footer a {
            color: #FFFFFF;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO" class="logo-navbar">
        </a>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#">FOTOSANDIRI STUDIO</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lokasi.php">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ringkasan_pesanan.php">Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.480517224343!2d124.84666999999999!3d1.4837793000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328775e899005551%3A0xb955666574c0bd16!2sSoondays%20coffee!5e0!3m2!1sid!2sid!4v1723030889174!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    loading="lazy"></iframe>
        </div>
        <div class="contact-info mt-4">
            <h5>Contact Us:</h5>
            <p><strong>Address:</strong> Jl. Tikala Ares No.108, Tikala Ares, Kec. Tikala, Kota Manado</p>
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/6285399581627" target="_blank">+6285399581627</a></p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com/fotosandiri.studio" target="_blank">@fotosandiri.studio</a></p>
            <p><strong>TikTok:</strong> <a href="https://www.tiktok.com/@fotosandiri.studio" target="_blank">@fotosandiri.studio</a></p>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2022 FOTOSANDIRI STUDIO. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
