<?php
$host = 'localhost';
$db   = 'fotosandiri_studio';
$user = 'root';  
$pass = '';     

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$user_id = 2;

$sql = "SELECT total_price, dp FROM pembayaran WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPrice = $row['total_price'];
    $dp = $row['dp'];
} else {
    $totalPrice = 0;
    $dp = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['file'])) {
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $upload_dir = 'uploads/'; 
        move_uploaded_file($file_tmp, $upload_dir . $file_name);

        $update_sql = "UPDATE pembayaran SET bukti_transfer = ? WHERE user_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("si", $file_name, $user_id);
        $stmt->execute();

        header("Location: ringkasan_pesanan.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Selfphoto Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #3C47AF;
            color: #FFFFFF;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .card-body {
            background-color: #FFFFFF;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 2rem;
        }
        .form-control, .form-control-file {
            border-radius: 0px;
        }
        .btn-primary {
            background-color: #3C47AF;
            border: none;
            border-radius: 10px;
            padding: 0.5rem 1.5rem;
        }
        .btn-primary:hover {
            background-color: #2B359A;
        }
        @media (max-width: 768px) {
            .card-header h3 {
                font-size: 1.5rem;
            }
            .btn-primary {
                width: 100%;
                padding: 0.75rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Selesaikan Pembayaran Anda</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="transfer-to">Transfer To</label>
                                <div id="transfer-to" class="p-3 border rounded">
                                    1241250914 SITI NADIYAH TUENO // BNI<br>
                                    082196417567 NAULA MODJO // DANA
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" value="Rp. <?php echo number_format($totalPrice, 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dp">DP</label>
                                <input type="text" class="form-control" id="dp" name="dp" value="Rp. <?php echo number_format($dp, 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Bukti Transfer</label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>
                            <div class="form-text text-danger">
                                Uang yang dibayarkan di awal adalah Uang DP sebagai reservasi. Sisanya bisa dibayar setelah sesi foto.<br>
                                Pastikan untuk melakukan transfer sesuai nominal!
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
