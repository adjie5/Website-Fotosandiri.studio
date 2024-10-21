<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pesanan - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            background-color: #99A0E2;
            color: white;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #3C47AF;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Ringkasan Pesanan</h2>
    <p>Paket: <?php echo htmlspecialchars($package_name); ?></p>
    <p>Harga Paket: Rp. <?php echo number_format($package_price, 2); ?></p>
    <p>Extra Orang: <?php echo htmlspecialchars($extra_people); ?> (Rp. <?php echo number_format($extra_people * 15000, 2); ?>)</p>
    <p>Extra Cetak: <?php echo htmlspecialchars($extra_prints); ?> (Rp. <?php echo number_format($extra_prints * 20000, 2); ?>)</p>
    <p>Total Harga: Rp. <?php echo number_format($total_price, 2); ?></p>
    <a href="pilih_paket.php" class="btn btn-primary btn-block">Pesan Lagi</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
