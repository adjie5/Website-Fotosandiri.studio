<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fotosandiri Studio</title>
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
        
        .forgot-password {
            color: yellow;
            text-decoration: none;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .alert {
            color: red;
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $host = 'localhost';
            $db   = 'fotosandiri_studio';
            $user = 'root';
            $pass = ''; 

            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE phone = ?");
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['nickname'] = $user['nickname'];

                    header("Location: pilih_paket.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Password salah. Silakan coba lagi.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Nomor telepon tidak terdaftar. Silakan daftar terlebih dahulu.</div>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>

        <form action="login.php" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="images/27131.jpg" width="20" height="20"></span>
                </div>
                <input type="text" name="phone" class="form-control" placeholder="+62" required>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p>Belum memiliki akun? <a href="register.php" class="forgot-password">Daftar</a></p>
    </div>
</body>
</html>
