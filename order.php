<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Studio - Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .container-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .details {
            text-align: center;
        }
        .details p {
            margin: 5px 0;
        }
        .additional {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            color: white;
        }
        .counter {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .counter button {
            background-color: #FFD700;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
        .counter span.box {
            margin: 0 10px;
            font-size: 20px;
            min-width: 40px;
            display: inline-block;
            text-align: center;
        }
        .counter .description {
            font-size: 16px;
            margin-left: 10px;
        }
        .btn-continue {
            background-color: #3C47AF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            display: block;
            margin: 20px auto 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand">
        <img src="images/Logo Fosan.png" alt="Logo FOTOSANDIRI.STUDIO" style="height: 30px;">
    </a>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto">FOTOSANDIRI.STUDIO</a>
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
        </ul>
    </div>
</nav>

<div class="container">
    <div id="package-container" class="container-box">
        <div class="header">
            <p>Paket</p>
            <p id="package-name">Selfphoto Background Putih</p>
        </div>
        <div class="details">
            <p id="package-details-left">Maks 2 Orang</p>
            <p id="package-details-middle">Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)</p>
            <p id="package-details-right">Free 1 Print Foto (Ukuran 4R)</p>
            <p id="package-price">Rp. 75.000</p>
        </div>
    </div>

    <div class="additional">
        <p>Additional</p>
        <div class="counter">
            <button onclick="updateCount('extra_people', -1)">-</button>
            <span id="extra_people" class="box">0</span>
            <button onclick="updateCount('extra_people', 1)">+</button>
            <span class="description">Extra Orang Rp. 15.000</span>
        </div>
        <div class="counter">
            <button onclick="updateCount('extra_prints', -1)">-</button>
            <span id="extra_prints" class="box">0</span>
            <button onclick="updateCount('extra_prints', 1)">+</button>
            <span class="description">Extra Cetak Rp. 20.000</span>
        </div>
        <form action="booking.php" method="post" onsubmit="return submitForm()">
            <input type="hidden" name="selected_date" id="selected_date_input" value="2023-07-21">
            <input type="hidden" name="selected_time" id="selected_time_input" value="10:00">
            <input type="hidden" name="package_id" id="package_id_input" value="1">
            <input type="hidden" name="extra_people" id="extra_people_input" value="0">
            <input type="hidden" name="extra_prints" id="extra_prints_input" value="0">
            <input type="hidden" name="total_price" id="total_price_input" value="75000">
            <input type="hidden" name="package_name" id="package_name_input" value="Selfphoto Background Putih"> 
            <input type="hidden" name="package_price" id="package_price_input" value="75000">
            <button type="submit" class="btn-continue">Lanjutkan</button>
        </form>
    </div>
</div>

<footer class="footer mt-5">
    <div class="container">
        <p>&copy; 2022 FOTOSANDIRI.STUDIO. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const packageName = urlParams.get('package');
        const packagePrice = urlParams.get('price');

        const packageDetails = {
            "Selfphoto Background Putih": {
                left: "Maks 2 Orang",
                middle: "Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)",
                right: "Free 1 Print Foto (Ukuran 4R)",
                price: "Rp. 75.000"
            },
            "Selfphoto Background Coklat": {
                left: "Maks 2 Orang",
                middle: "Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)",
                right: "Free 1 Print Foto (Ukuran 4R)",
                price: "Rp. 75.000"
            },
            "Selfphoto Background Polos": {
                left: "Maks 2 Orang",
                middle: "Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)",
                right: "Free 1 Print Foto (Ukuran 4R)",
                price: "Rp. 70.000"
            },
            "Sebox Light": {
                left: "Maks 2 Orang",
                middle: "Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)",
                right: "Free 1 Print Foto (Ukuran 4R)",
                price: "Rp. 45.000"
            },
            "Sebox Lines": {
                left: "Maks 2 Orang",
                middle: "Durasi 20 Menit (10 Menit Photoshoot, 10 menit Photo Selection)",
                right: "Free 1 Print Foto (Ukuran 4R)",
                price: "Rp. 50.000"
            }
        };

        if (packageName && packageDetails[packageName]) {
            document.getElementById('package-name').textContent = packageName;
            document.getElementById('package-details-left').textContent = packageDetails[packageName].left;
            document.getElementById('package-details-middle').textContent = packageDetails[packageName].middle;
            document.getElementById('package-details-right').textContent = packageDetails[packageName].right;
            document.getElementById('package-price').textContent = packageDetails[packageName].price;
            document.getElementById('total_price_input').value = packageDetails[packageName].price.replace(/\D/g, ''); // Hanya angka
            document.getElementById('package_name_input').value = packageName;
            document.getElementById('package_price_input').value = packageDetails[packageName].price.replace(/\D/g, ''); // Hanya angka
        } else {
            console.error("Package not found in packageDetails");
        }
    });

    function updateCount(id, delta) {
        const element = document.getElementById(id);
        let count = parseInt(element.textContent);
        count += delta;
        if (count < 0) {
            count = 0;
        }
        element.textContent = count;
    }

    function submitForm() {
        document.getElementById('extra_people_input').value = document.getElementById('extra_people').textContent;
        document.getElementById('extra_prints_input').value = document.getElementById('extra_prints').textContent;

        const basePrice = parseInt(document.getElementById('total_price_input').value);
        const extraPeople = parseInt(document.getElementById('extra_people').textContent);
        const extraPrints = parseInt(document.getElementById('extra_prints').textContent);
        const totalPrice = basePrice + (extraPeople * 15000) + (extraPrints * 20000);
        document.getElementById('total_price_input').value = totalPrice;


        document.getElementById('package_name_input').value = document.getElementById('package-name').textContent;

        console.log("Form submitted with values:");
        console.log("Selected Date:", document.getElementById('selected_date_input').value);
        console.log("Selected Time:", document.getElementById('selected_time_input').value);
        console.log("Package ID:", document.getElementById('package_id').value);
        console.log("Extra People:", document.getElementById('extra_people_input').value);
        console.log("Extra Prints:", document.getElementById('extra_prints_input').value);
        console.log("Total Price:", document.getElementById('total_price_input').value);
        console.log("Package Name:", document.getElementById('package_name_input').value);
        console.log("Package Price:", document.getElementById('package_price_input').value);

        return true; 
    }
</script>
</body>
</html>
