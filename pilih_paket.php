<?php
session_start();

$host = 'localhost';
$db = 'fotosandiri_studio';
$user = 'root';  
$pass = '';     

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_SESSION['user_id']; 
    $package_name = $_POST['package'];
    $total_price = $_POST['price'];
    $dp = $total_price * 0.5; 
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];

    $sql = "INSERT INTO pembayaran (user_id, package_name, total_price, dp, reservation_date, reservation_time) 
            VALUES ('$user_id', '$package_name', '$total_price', '$dp', '$reservation_date', '$reservation_time')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Paket $package_name berhasil dipilih!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Studio - Pilih Paket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #99A0E2;
        }
        .navbar {
            background-color: #3C47AF;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white !important;
        }
        .navbar-brand {
            color: white;
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
        .footer-space {
            height: 20px;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .card {
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .card {
            flex: 1 0 18%;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .card-img-top {
            border-bottom: 1px solid #ddd;
        }
        @media (max-width: 1200px) {
            .card {
                flex: 1 0 30%;
            }
        }
        @media (max-width: 768px) {
            .card {
                flex: 1 0 45%;
            }
        }
        @media (max-width: 576px) {
            .card {
                flex: 1 0 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand">
            <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO">
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

    <h2 class="text-center mt-4" style="color: white;">Silahkan Pilih Paket Foto</h2>

    <div class="container mt-4">
        <div class="card-container">
            <div class="card">
                <img src="images/selfphoto_background_putih.jpg" class="card-img-top" alt="Selfphoto dengan latar belakang putih">
                <div class="card-body">
                    <h5 class="card-title">Selfphoto Background</h5>
                    <h6 class="card-title">Background Putih</h6>
                    <p class="card-text">4R</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalGallery1" aria-label="Lihat Cetakan Selfphoto Background Putih">Lihat Cetakan</button>
                    <form method="get" action="order.php">
                        <input type="hidden" name="package" value="Selfphoto Background Putih">
                        <input type="hidden" name="price" value="50000">
                        <input type="hidden" name="image" value="images/selfphoto_background_putih.jpg">
                        <button type="submit" class="btn btn-primary mt-2">Pilih Paket</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="images/selfphoto_background_coklat.jpg" class="card-img-top" alt="Selfphoto dengan latar belakang coklat">
                <div class="card-body">
                    <h5 class="card-title">Selfphoto Background</h5>
                    <h6 class="card-title">Background Coklat</h6>
                    <p class="card-text">4R</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalGallery2" aria-label="Lihat Cetakan Selfphoto Background Coklat">Lihat Cetakan</button>
                    <form method="get" action="order.php">
                        <input type="hidden" name="package" value="Selfphoto Background Coklat">
                        <input type="hidden" name="price" value="50000">
                        <input type="hidden" name="image" value="images/selfphoto_background_coklat.jpg">
                        <button type="submit" class="btn btn-primary mt-2">Pilih Paket</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="images/selfphoto_background_polos.jpg" class="card-img-top" alt="Selfphoto dengan latar belakang dinding polos">
                <div class="card-body">
                    <h5 class="card-title">Selfphoto Background</h5>
                    <h6 class="card-title">Background Dinding</h6>
                    <p class="card-text">4R</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalGallery3" aria-label="Lihat Cetakan Selfphoto Polos">Lihat Cetakan</button>
                    <form method="get" action="order.php">
                        <input type="hidden" name="package" value="Selfphoto Background Polos">
                        <input type="hidden" name="price" value="50000">
                        <input type="hidden" name="image" value="images/selfphoto_background_polos.jpg">
                        <button type="submit" class="btn btn-primary mt-2">Pilih Paket</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="images/sebox_lines.jpg" class="card-img-top" alt="Sebox Lines dengan latar belakang ultrawide">
                <div class="card-body">
                    <h5 class="card-title">Sebox Lines</h5>
                    <h6 class="card-title">Ultrawide</h6>
                    <p class="card-text">4R</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalGallery4" aria-label="Lihat Cetakan Sebox Lines">Lihat Cetakan</button>
                    <form method="get" action="order.php">
                        <input type="hidden" name="package" value="Sebox Lines">
                        <input type="hidden" name="price" value="50000">
                        <input type="hidden" name="image" value="images/sebox_lines.jpg">
                        <button type="submit" class="btn btn-primary mt-2">Pilih Paket</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="images/sebox_light.jpg" class="card-img-top" alt="Sebox Light dengan latar belakang light">
                <div class="card-body">
                    <h5 class="card-title">Sebox Light</h5>
                    <h6 class="card-title">Latar Belakang Light</h6>
                    <p class="card-text">4R</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalGallery5" aria-label="Lihat Cetakan Sebox Light">Lihat Cetakan</button>
                    <form method="get" action="order.php">
                        <input type="hidden" name="package" value="Sebox Light">
                        <input type="hidden" name="price" value="50000">
                        <input type="hidden" name="image" value="images/sebox_light.jpg">
                        <button type="submit" class="btn btn-primary mt-2">Pilih Paket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="modalGallery1" tabindex="-1" role="dialog" aria-labelledby="modalGallery1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGallery1Label">Lihat Cetakan - Selfphoto Background Putih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/putih 1.png" class="img-fluid" alt="Example 1">
                    </div>
                    <div class="col-md-4">
                        <img src="images/putih 2.png" class="img-fluid" alt="Example 2">
                    </div>
                    <div class="col-md-4">
                        <img src="images/putih 3.png" class="img-fluid" alt="Example 3">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/putih 4.png" class="img-fluid" alt="Example 4">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/putih 5.png" class="img-fluid" alt="Example 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGallery2" tabindex="-1" role="dialog" aria-labelledby="modalGallery2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGallery2Label">Lihat Cetakan - Selfphoto Background Coklat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/coklat 1.png" class="img-fluid" alt="Example 1">
                    </div>
                    <div class="col-md-4">
                        <img src="images/coklat 2.png" class="img-fluid" alt="Example 2">
                    </div>
                    <div class="col-md-4">
                        <img src="images/coklat 3.png" class="img-fluid" alt="Example 3">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/coklat 4.png" class="img-fluid" alt="Example 4">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/coklat 5.png" class="img-fluid" alt="Example 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGallery3" tabindex="-1" role="dialog" aria-labelledby="modalGallery3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGallery3Label">Lihat Cetakan - Selfphoto Polos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/polos 1.png" class="img-fluid" alt="Example 1">
                    </div>
                    <div class="col-md-4">
                        <img src="images/polos 2.png" class="img-fluid" alt="Example 2">
                    </div>
                    <div class="col-md-4">
                        <img src="images/polos 3.png" class="img-fluid" alt="Example 3">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/polos 4.png" class="img-fluid" alt="Example 4">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/polos 5.png" class="img-fluid" alt="Example 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGallery4" tabindex="-1" role="dialog" aria-labelledby="modalGallery4Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGallery4Label">Lihat Cetakan - Sebox Lines</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/lines 1.png" class="img-fluid" alt="Example 1">
                    </div>
                    <div class="col-md-4">
                        <img src="images/lines 2.png" class="img-fluid" alt="Example 2">
                    </div>
                    <div class="col-md-4">
                        <img src="images/lines 3.png" class="img-fluid" alt="Example 3">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/lines 4.png" class="img-fluid" alt="Example 4">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/lines 5.png" class="img-fluid" alt="Example 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGallery5" tabindex="-1" role="dialog" aria-labelledby="modalGallery5Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGallery5Label">Lihat Cetakan - Sebox Light</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/light 1.png" class="img-fluid" alt="Example 1">
                    </div>
                    <div class="col-md-4">
                        <img src="images/light 2.png" class="img-fluid" alt="Example 2">
                    </div>
                    <div class="col-md-4">
                        <img src="images/light 3.png" class="img-fluid" alt="Example 3">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/light 4.png" class="img-fluid" alt="Example 4">
                    </div>
                    <div class="col-md-4 mt-3">
                        <img src="images/light 5.png" class="img-fluid" alt="Example 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="footer mt-5">
    <div class="container">
        <p>&copy; 2022 FOTOSANDIRI.STUDIO. All rights reserved.</p>
    </div>
</footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
