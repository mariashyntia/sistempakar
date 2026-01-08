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
    <title>Kelola Gejala - Sistem Pakar</title>
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
            padding: 50px 40px;
            max-width: 900px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h1 {
            text-align: center;
            font-size: 2.2em;
            margin-bottom: 10px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 200px;
            font-size: 1em;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
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

        table a {
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        table a.edit {
            background: rgba(255,193,7,0.85);
            color: #000;
        }

        table a.edit:hover {
            background: rgba(255,193,7,1);
        }

        table a.delete {
            background: rgba(244,67,54,0.85);
            color: #fff;
        }

        table a.delete:hover {
            background: rgba(244,67,54,1);
        }

        /* Tombol kembali bawah tabel */
        .back-btn {
            display: inline-block;
            margin: 20px auto 0;
            padding: 10px 25px;
            border-radius: 25px;
            background: rgba(0, 200, 83, 0.85); /* hijau soft */
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
            form { flex-direction: column; align-items: center; }
            input[type="text"] { width: 90%; }
            table th, table td { padding: 10px; }
            table a { margin-bottom: 5px; display: inline-block; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>🌾 Kelola Gejala</h1>

        <form method="POST">
            <input type="text" name="kode_gejala" placeholder="Kode Gejala" required>
            <input type="text" name="nama_gejala" placeholder="Nama Gejala" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>

        <?php
        if (isset($_POST['tambah'])) {
            $kode = $_POST['kode_gejala'];
            $nama = $_POST['nama_gejala'];
            mysqli_query($koneksi, "INSERT INTO gejala VALUES('', '$kode', '$nama')");
            echo "<p style='text-align:center;color:#0f0;'>Data berhasil ditambahkan!</p>";
        }

        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            mysqli_query($koneksi, "DELETE FROM gejala WHERE id_gejala=$id");
            echo "<p style='text-align:center;color:#f44;'>Data berhasil dihapus!</p>";
        }
        ?>

        <table>
            <tr>
                <th>Kode</th>
                <th>Nama Gejala</th>
                <th>Aksi</th>
            </tr>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM gejala");
            while ($row = mysqli_fetch_assoc($data)) {
                echo "<tr>
                        <td>{$row['kode_gejala']}</td>
                        <td>{$row['nama_gejala']}</td>
                        <td>
                            <a href='edit_gejala.php?id={$row['id_gejala']}' class='edit'>Edit</a>
                            <a href='?hapus={$row['id_gejala']}' class='delete'>Hapus</a>
                        </td>
                     </tr>";
            }
            ?>
        </table>

        <!-- Tombol kembali di bawah tabel -->
        <a href="dashboard.php" class="back-btn">🏠 Kembali ke Dashboard</a>
    </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
