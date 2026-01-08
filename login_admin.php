<?php
include 'db/koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin/dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* BACKGROUND GAMBAR */
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        /* OVERLAY GELAP */
        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* BOX LOGIN */
        .login-box {
            position: relative;
            z-index: 2;
            background: rgba(25, 55, 85, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            text-align: center;
            width: 350px;
            animation: fadeIn 1s ease;
        }

        h2 {
            margin-bottom: 25px;
            letter-spacing: 1px;
            color: #aef7d0;
            text-shadow: 0 3px 8px rgba(0,0,0,0.4);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        button {
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,255,160,0.4);
        }

        p.error {
            color: #ffb3b3;
            margin-top: 15px;
            font-weight: 500;
        }

        a.back {
            display: inline-block;
            color: #aef7d0;
            margin-top: 20px;
            text-decoration: underline;
            font-size: 0.9em;
            transition: 0.3s;
        }

        a.back:hover {
            color: #d0f9ff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .login-box {
                width: 90%;
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="login-box">
        <h2>👨‍💼 Login Admin</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Masuk</button>
            <?php if (!empty($error)): ?>
                <p class="error"><?= $error; ?></p>
            <?php endif; ?>
        </form>
        <a href="index.php" class="back">⬅ Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
