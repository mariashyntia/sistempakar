<<<<<<< HEAD
<?php
include("db/koneksi.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar! Gunakan username lain.');</script>";
    } else {
        // Simpan user baru
        $query = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login_user.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Coba lagi.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
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

        /* BOX REGISTRASI */
        .register-box {
            position: relative;
            z-index: 2;
            background: rgba(25, 55, 85, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            text-align: center;
            width: 380px;
            animation: fadeIn 1s ease;
        }

        h2 {
            margin-bottom: 25px;
            letter-spacing: 1px;
            color: #aef7d0;
            text-shadow: 0 3px 8px rgba(0,0,0,0.4);
        }

        label {
            display: block;
            text-align: left;
            font-size: 0.9em;
            margin-top: 10px;
            color: #e0e0e0;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: none;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        button {
            margin-top: 25px;
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
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,255,160,0.4);
        }

        .link {
            margin-top: 25px;
            font-size: 0.9em;
        }

        .link a {
            color: #aef7d0;
            text-decoration: underline;
            transition: 0.3s;
        }

        .link a:hover {
            color: #d0f9ff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .register-box {
                width: 90%;
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="register-box">
        <h2>📝 Daftar Akun Baru</h2>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="submit">Register</button>
        </form>

        <div class="link">
            Sudah punya akun? <a href="login_user.php">Login di sini</a><br>
            <a href="index.php">⬅ Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>
=======
<?php
include("db/koneksi.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar! Gunakan username lain.');</script>";
    } else {
        // Simpan user baru
        $query = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login_user.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Coba lagi.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
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

        /* BOX REGISTRASI */
        .register-box {
            position: relative;
            z-index: 2;
            background: rgba(25, 55, 85, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            text-align: center;
            width: 380px;
            animation: fadeIn 1s ease;
        }

        h2 {
            margin-bottom: 25px;
            letter-spacing: 1px;
            color: #aef7d0;
            text-shadow: 0 3px 8px rgba(0,0,0,0.4);
        }

        label {
            display: block;
            text-align: left;
            font-size: 0.9em;
            margin-top: 10px;
            color: #e0e0e0;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: none;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        button {
            margin-top: 25px;
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
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,255,160,0.4);
        }

        .link {
            margin-top: 25px;
            font-size: 0.9em;
        }

        .link a {
            color: #aef7d0;
            text-decoration: underline;
            transition: 0.3s;
        }

        .link a:hover {
            color: #d0f9ff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .register-box {
                width: 90%;
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="register-box">
        <h2>📝 Daftar Akun Baru</h2>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="submit">Register</button>
        </form>

        <div class="link">
            Sudah punya akun? <a href="login_user.php">Login di sini</a><br>
            <a href="index.php">⬅ Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
