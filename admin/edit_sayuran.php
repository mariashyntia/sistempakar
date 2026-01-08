<?php
include '../db/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin.php");
    exit;
}
include 'includes/header.php';
include 'includes/sidebar.php';

// Ambil ID sayuran dari URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID sayuran tidak ditemukan');window.location='kelola_sayuran.php';</script>";
    exit;
}
$id = $_GET['id'];

// Ambil data sayuran dari DB
$result = mysqli_query($koneksi, "SELECT * FROM jenis_sayuran WHERE id_jenis=$id");
if(mysqli_num_rows($result) == 0){
    echo "<script>alert('Data tidak ditemukan');window.location='kelola_sayuran.php';</script>";
    exit;
}
$sayuran = mysqli_fetch_assoc($result);

// Update data
if(isset($_POST['update'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_jenis']);
    mysqli_query($koneksi, "UPDATE jenis_sayuran SET nama_jenis='$nama' WHERE id_jenis=$id");
    echo "<script>alert('Data berhasil diperbarui');window.location='kelola_sayuran.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sayuran - Sistem Pakar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            background: url('../assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(6px);
            border-radius: 20px;
            padding: 40px 35px;
            max-width: 600px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h1 {
            text-align: center;
            font-size: 2.2em;
            margin-bottom: 25px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"] {
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-size: 1em;
            width: 100%;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: rgba(0,123,255,0.85);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: rgba(0,123,255,1);
            transform: translateY(-2px);
        }

        .back-btn {
            display: inline-block;
            margin: 20px auto 0;
            padding: 10px 25px;
            border-radius: 25px;
            background: rgba(0, 200, 83, 0.85);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(0, 200, 83, 1);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            input[type="text"], button { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>✏️ Edit Sayuran</h1>

        <form method="POST">
            <input type="text" name="nama_jenis" value="<?= htmlspecialchars($sayuran['nama_jenis']); ?>" required>
            <button type="submit" name="update">Perbarui</button>
        </form>

        <a href="kelola_sayuran.php" class="back-btn">⬅️ Kembali ke Kelola Sayuran</a>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
