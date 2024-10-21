<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fotosandiri Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Logo Fosan hitam.png" type="image/png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(180deg, #3C47AF 0%, #ABB1E4 100%);
            color: white;
            text-align: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            background: #3C47AF;
            border: none;
            margin-bottom: 15px;
            height: 50px;
            border-radius: 10px;
            color: white;
        }

        .form-control::placeholder {
            color: white;
        }

        .btn-primary {
            background: #3C47AF;
            border: none;
            border-radius: 10px;
            height: 50px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .header {
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
        }

        .input-group-text {
            background: #3C47AF;
            border: none;
        }

        .input-group-prepend {
            border-radius: 10px 0 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/Logo Fosan.png" alt="Fotosandiri Studio">
            <h2>Selamat Datang<br>Sobat Fosan</h2>
        </div>

        <?php
        $host = 'localhost';
        $db   = 'fotosandiri_studio';
        $user = 'root';
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nickname = $_POST['nickname'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $pernah_ke = $_POST['pernah_ke'];
            $tau_dari = $_POST['tau_dari'];

            if ($password !== $confirm_password) {
                echo "<div class='alert alert-danger'>Password dan Konfirmasi Password tidak cocok!</div>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $conn->prepare("INSERT INTO users (nickname, phone, password, pernah_ke, tau_dari) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $nickname, $phone, $hashed_password, $pernah_ke, $tau_dari);

                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            }
        }

        $conn->close();
        ?>
        
        <form action="register.php" method="POST">
            <input type="text" name="nickname" class="form-control" placeholder="Masukan Nickname" required>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="images/27131.jpg" width="20" height="20"></span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="+62" required>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
            <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
            <select name="pernah_ke" class="form-control" required>
                <option value="" disabled selected>Pernah Ke Fotosandiri.studio</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
            <select name="tau_dari" class="form-control" required>
                <option value="" disabled selected>Tau Fosan dari mana</option>
                <option value="Teman">Teman</option>
                <option value="Sosial Media">Sosial Media</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
    </div>
</body>
</html>
