<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotosandiri Studio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #99A0E2;
            color: white;
        }

        .navbar-custom {
            background-color: #3C47AF;
        }
        
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white !important;
        }
        
        .navbar-custom .nav-link:hover {
            color: lightgray !important;
        }
        
        .navbar-custom .navbar-brand img {
            width: 50px; 
            height: auto;
        }
        
        .header-section img {
            width: 100%;
            height: auto;
        }

        .card-body {
            margin-bottom: 20px;
            color: #000;
        }

        .footer {
            background-color: #3C47AF;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .footer a {
            color: white;
        }

        .navbar-brand img {
            height: 40px; 
            margin-right: 10px; 
        }

        .btn-primary {
            background-color: #3C47AF;
            border-color: #3C47AF;
        }

        .btn-outline-primary {
            color: black;
            border-color: black;
        }

        .btn-outline-primary:hover {
            background-color: black;
            color: white;
            border-color: black;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand">
        <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO" class="logo-navbar">
    </a>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto">FOTOSANDIRI STUDIO</a>
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

<header class="container mt-4">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-4 mb-3">
            <img src="images/DSCF8886.jpg" class="img-fluid" alt="Photo 1">
        </div>
        <div class="col-lg-4 col-md-6 col-4 mb-3">
            <img src="images/sebox_lines.jpg" class="img-fluid" alt="Photo 2">
        </div>
        <div class="col-lg-4 col-md-6 col-4 mb-3">
            <img src="images/DSCF0493.jpg" class="img-fluid" alt="Photo 3">
        </div>
    </div>
</header>

<section class="container mt-5">
    <h2 class="text-center">Layanan Photo Terbaik Kami</h2>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card">
                <img src="images/sebox_lines.jpg" class="card-img-top" alt="Sebox Lines">
                <div class="card-body">
                    <h5 class="card-title">Sebox Lines</h5>
                    <p class="card-text">Start from idr 35.000</p>
                    <a href="login.php" class="btn btn-primary booking-btn">Booking Sekarang!</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card">
                <img src="images/sebox_light.jpg" class="card-img-top" alt="Sebox Light">
                <div class="card-body">
                    <h5 class="card-title">Sebox Light</h5>
                    <p class="card-text">Start from idr 30.000</p>
                    <a href="login.php" class="btn btn-primary booking-btn">Booking Sekarang!</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card">
                <img src="images/DSCF7503.jpg" class="card-img-top" alt="Selfphoto Background">
                <div class="card-body">
                    <h5 class="card-title">Selfphoto Background</h5>
                    <p class="card-text">Start from idr 75.000</p>
                    <a href="login.php" class="btn btn-primary booking-btn">Booking Sekarang!</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card">
                <img src="images/selfphoto_background_polos.jpg" class="card-img-top" alt="Selfphoto Polos">
                <div class="card-body">
                    <h5 class="card-title">Selfphoto Polos</h5>
                    <p class="card-text">Start from idr 70.000</p>
                    <a href="login.php" class="btn btn-primary booking-btn">Booking Sekarang!</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5">
    <h2 class="text-center">PRICELIST</h2>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <img src="images/1.png" class="img-fluid" alt="Pricelist Sebox Light">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <img src="images/a.png" class="img-fluid" alt="Pricelist Sebox Lines">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
            <img src="images/4.png" class="img-fluid" alt="Pricelist Selfphoto">
        </div>
    </div>
</section>

    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2022 FOTOSANDIRI STUDIO. All rights reserved.</p>
        </div>
    </footer>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.booking-btn').on('click', function (event) {
            event.preventDefault();
            window.location.href = 'login.php';
        });
    });
</script>
</body>
</html>
