<?php
session_start();

$host = 'localhost';
$db   = 'fotosandiri_studio';
$user = 'root';  
$pass = '';      

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = (isset($_POST['package_price']) ? $_POST['package_price'] : 0) +
             (isset($_POST['extra_people']) ? $_POST['extra_people'] * 15000 : 0) +
             (isset($_POST['extra_prints']) ? $_POST['extra_prints'] * 20000 : 0);


    $packageName = isset($_POST['package_name']) ? $_POST['package_name'] : '';
    $dp = 0;
    if (in_array($packageName, ['Selfphoto Background Putih', 'Selfphoto Background Coklat', 'Selfphoto Polos'])) {
        $dp = 30000;
    } elseif (in_array($packageName, ['Sebox Lines', 'Sebox Light'])) {
        $dp = 15000;
    }

 
    $_SESSION['total_price'] = $total;
    $_SESSION['dp'] = $dp;
    $_SESSION['package_name'] = $packageName;
    $_SESSION['extra_people'] = isset($_POST['extra_people']) ? $_POST['extra_people'] : 0;
    $_SESSION['extra_prints'] = isset($_POST['extra_prints']) ? $_POST['extra_prints'] : 0;
    $_SESSION['reservation_date'] = isset($_POST['selected_date']) ? $_POST['selected_date'] : 'Data tidak tersedia';
    $_SESSION['reservation_time'] = isset($_POST['selected_time']) ? $_POST['selected_time'] : 'Data tidak tersedia';


    $userId = $_SESSION['user_id']; 
    $sql = "INSERT INTO pembayaran (user_id, package_name, reservation_date, reservation_time, extra_people, extra_prints, total_price, dp)
            VALUES ('$userId', '$packageName', '{$_SESSION['reservation_date']}', '{$_SESSION['reservation_time']}', '{$_SESSION['extra_people']}', '{$_SESSION['extra_prints']}', '$total', '$dp')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: konfirmasi_pesanan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #99A0E2;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #3C47AF;
            padding: 0.5rem 1rem;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .card {
            background-color: #3C47AF;
            border: none;
            border-radius: 10px;
            color: #FFFFFF;
            text-align: left;
            padding: 20px;
        }
        .card-title {
            color: #FFE500;
            font-weight: bold;
            text-align: center;
        }
        .btn-primary {
            background-color: #FFE500;
            border: 2px solid #3C47AF;
            color: #3C47AF;
        }
        .footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #3C47AF;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO" style="height: 30px;">
    </a>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto">FOTOSANDIRI.STUDIO</a>
    </div>
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

<div class="text-center mt-5">
    <img src="images/package.jpg" id="package-image" alt="Package Image" class="img-fluid" style="width: 50%; max-width: 300px; height: auto;">
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pesanan</h5>
                    <p class="card-text"><strong>Tanggal: </strong><?php echo $_SESSION['reservation_date']; ?></p>
                    <p class="card-text"><strong>Waktu: </strong><?php echo $_SESSION['reservation_time']; ?></p>
                    <h6>Detail Paket:</h6>
                    <p class="card-text"><?php echo $_SESSION['package_name']; ?></p>
                    <p class="card-text">10 Menit foto sepuasnya</p>
                    <p class="card-text">10 Menit pilih foto yang mau di cetak</p>
                    <p class="card-text">Free All Soft File</p>
                    <p class="card-text">Free Cetak Ukuran 4R</p>
                    <h6>Additional:</h6>
                    <p class="card-text">Extra Orang: <?php echo $_SESSION['extra_people']; ?></p>
                    <p class="card-text">Extra Cetak: <?php echo $_SESSION['extra_prints']; ?></p>
                    <div class="separator"></div>
                    <div class="price">
                        <h5 class="card-text">Total:</h5>
                        <h5 class="card-text">Rp. <?php echo number_format($_SESSION['total_price']); ?></h5>
                    </div>
                    <div class="text-center mt-3">
                        <form method="POST" action="pembayaran.php">
                            <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2022 FOTOSANDIRI.STUDIO. All rights reserved.</p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const packageName = "<?php echo isset($_SESSION['package_name']) ? htmlspecialchars($_SESSION['package_name']) : ''; ?>";

        const packageImages = {
            "Selfphoto Background Putih": "images/selfphoto_background_putih.jpg",
            "Selfphoto Background Coklat": "images/selfphoto_background_coklat.jpg",
            "Selfphoto Polos": "images/selfphoto_background_polos.jpg",
            "Sebox Lines": "images/sebox_lines.jpg",
            "Sebox Light": "images/sebox_light.jpg"
        };

        const packageImage = document.getElementById('package-image');

        if (packageName && packageImages[packageName]) {
            packageImage.src = packageImages[packageName];
            packageImage.alt = packageName;
        } else {
            packageImage.src = "images/package.jpg";
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
