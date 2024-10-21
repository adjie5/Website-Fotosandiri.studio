<?php
session_start();

$host = 'localhost';
$db   = 'fotosandiri_studio';
$user = 'root';  
$pass = '';     

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 2; 

if (isset($_POST['cancel_reservation'])) {
    $sql = "DELETE FROM pembayaran WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT package_name, extra_people, extra_prints, reservation_date, reservation_time, total_price, bukti_transfer, status FROM pembayaran WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$nama_paket = $additional = $tanggal_reservasi = $waktu_reservasi = $total = $payment_proof = $status = 'Data belum diisi';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_paket = $row['package_name'];
    
    $extra_people = intval($row['extra_people']);
    $extra_prints = intval($row['extra_prints']);
    
    $additional_items = [];
    
    if ($extra_people > 0) {
        $additional_items[] = "$extra_people Extra Orang";
    }
    
    if ($extra_prints > 0) {
        $additional_items[] = "$extra_prints Extra Cetak";
    }
    
    if (!empty($additional_items)) {
        $additional = implode(', ', $additional_items);
    } else {
        $additional = 'Tidak ada tambahan';
    }
    
    $tanggal_reservasi = $row['reservation_date'];
    $waktu_reservasi = $row['reservation_time'];
    $total = $row['total_price'];
    $payment_proof = $row['bukti_transfer'] ? '<a href="uploads/' . htmlspecialchars($row['bukti_transfer']) . '" target="_blank">Lihat Bukti Pembayaran</a>' : 'Belum Diupload';
    $status = $row['status']; 
}

$sql_user = "SELECT nickname, phone FROM users WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user_row = $result_user->fetch_assoc();
    $nickname = $user_row['nickname'];
    $phone = $user_row['phone'];
} else {
    $nickname = $phone = 'Data belum diisi';
}

$conn->close();

$total_formatted = is_numeric($total) ? number_format((float)$total, 0, ',', '.') : $total;
?>`

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pesanan - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .text-center img {
            width: 150px;
            margin-bottom: -25px;
        }
        .card {
            border-radius: 20px;
            background-color: #ffffff;
        }
        .card-header {
            background-color: #000000;
            color: #FFFFFF;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 1rem;
            text-align: center;
        }
        .card-body {
            padding: 2rem;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .separator {
            border-bottom: 1px solid #ddd;
            margin: 1rem 0;
        }
        .card-footer {
            background-color: #ffffff;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 1rem;
            text-align: center;
        }
        .btn-primary, .btn-danger {
            border-radius: 10px;
            padding: 0.5rem 1.5rem;
            margin: 0.5rem;
        }
        .btn-primary {
            background-color: #3C47AF;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2B359A;
        }
        .btn-danger {
            background-color: #E74C3C;
            border: none;
        }
        .btn-danger:hover {
            background-color: #C0392B;
        }
        .note {
            font-size: 0.9rem;
            color: #666666;
            margin-top: 1rem;
        }
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }
            .btn-primary, .btn-danger {
                width: 100%;
                padding: 0.75rem 0;
            }
            .row {
                flex-direction: column;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="text-center">
        <img src="images/Logo Fosan hitam.png" alt="Fotosandiri Studio">
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ringkasan Pesanan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <strong>Nama:</strong>
                    <span><?php echo htmlspecialchars($nickname); ?></span>
                </div>
                <div class="row">
                    <strong>No. Handphone:</strong>
                    <span><?php echo htmlspecialchars($phone); ?></span>
                </div>
                <div class="row">
                    <strong>Nama Paket:</strong>
                    <span><?php echo htmlspecialchars($nama_paket); ?></span>
                </div>
                <div class="row">
                    <strong>Additional:</strong>
                    <span><?php echo htmlspecialchars($additional); ?></span>
                </div>
                <div class="row">
                    <strong>Tanggal Reservasi:</strong>
                    <span><?php echo htmlspecialchars($tanggal_reservasi); ?></span>
                </div>
                <div class="row">
                    <strong>Waktu Reservasi:</strong>
                    <span><?php echo htmlspecialchars($waktu_reservasi); ?></span>
                </div>
                <div class="row">
                    <strong>Status:</strong>
                    <span><?php echo htmlspecialchars($status); ?></span>
                </div>
                <div class="row">
                    <strong>Bukti Pembayaran:</strong>
                    <span><?php echo $payment_proof; ?></span>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <strong>TOTAL:</strong>
                    <span><strong>Rp. <?php echo $total_formatted; ?></strong></span>
                </div>
                <div class="note">
                    Note: Tunggu status pesananmu di konfirmasi admin dulu yah. Jika sudah di konfirmasi kamu bisa screenshot halaman ini dan tunjukkan ke karyawan kami pada saat di studio. Untuk yang ingin mengganti jam harap memberi kabar ke admin 2 jam sebelum jam yang sudah di booking (Via Whatsapp), jika lewat dari itu maka sudah tidak bisa diubah lagi. Kami memberikan waktu 5 menit untuk customer yang terlambat. Mohon tepat waktu agar reservasinya (DP) tidak hangus.
                </div>
            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-primary">Kembali Ke Halaman Utama</a>
                <form method="POST" action="">
                    <button type="submit" name="cancel_reservation" class="btn btn-danger">Cancel Reservasi</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
