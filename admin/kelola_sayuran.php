<?php 
include '../db/koneksi.php'; 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin.php");
    exit;
}
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Sayuran - Sistem Pakar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* ===== BODY ===== */
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
            max-width: 900px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            text-align: center;
            font-size: 2.2em;
            margin-bottom: 20px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        /* ===== FORM ===== */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
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

        /* ===== TABEL ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background: rgba(0,0,0,0.25);
        }

        table tr:nth-child(even) {
            background: rgba(255,255,255,0.05);
        }

        /* ===== TOMBOL AKSI DI TABEL ===== */
        .action-btns {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .action-btns a {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .action-btns a.edit {
            background: rgba(255,193,7,0.85);
            color: #000;
        }

        .action-btns a.edit:hover {
            background: rgba(255,193,7,1);
        }

        .action-btns a.delete {
            background: rgba(244,67,54,0.85);
            color: #fff;
        }

        .action-btns a.delete:hover {
            background: rgba(244,67,54,1);
        }

        /* ===== TOMBOL KEMBALI ===== */
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
            table th, table td { padding: 10px; }
            .action-btns a { margin-bottom: 5px; display: inline-block; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>🌿 Kelola Sayuran</h1>

        <!-- Form Tambah Sayuran -->
        <form method="POST">
            <input type="text" name="nama_jenis" placeholder="Nama Sayuran" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>

        <?php
        // TAMBAH DATA SAYURAN
        if(isset($_POST['tambah'])){
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama_jenis']);
            mysqli_query($koneksi, "INSERT INTO jenis_sayuran (nama_jenis) VALUES ('$nama')");
            echo "<p style='text-align:center;color:#0f0;'>Data berhasil ditambahkan!</p>";
        }

        // HAPUS DATA SAYURAN
        if(isset($_GET['hapus'])){
            $id = $_GET['hapus'];
            mysqli_query($koneksi, "DELETE FROM jenis_sayuran WHERE id_jenis=$id");
            echo "<p style='text-align:center;color:#f44;'>Data berhasil dihapus!</p>";
        }
        ?>

        <!-- Tabel Sayuran -->
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Sayuran</th>
                <th>Aksi</th>
            </tr>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM jenis_sayuran ORDER BY id_jenis ASC");
            while($row = mysqli_fetch_assoc($data)){
                echo "<tr>
                        <td>{$row['id_jenis']}</td>
                        <td>{$row['nama_jenis']}</td>
                        <td>
                            <div class='action-btns'>
                                <a href='edit_sayuran.php?id={$row['id_jenis']}' class='edit'>Edit</a>
                                <a href='?hapus={$row['id_jenis']}' class='delete' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                            </div>
                        </td>
                    </tr>";
            }
            ?>
        </table>

        <a href="dashboard.php" class="back-btn">🏠 Kembali ke Dashboard</a>
    </div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
