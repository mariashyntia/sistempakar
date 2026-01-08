<?php
include '../db/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin.php");
    exit;
}
include 'includes/header.php';
include 'includes/sidebar.php';

// Ambil data solusi berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM solusi WHERE id_solusi=$id");
    $solusi = mysqli_fetch_assoc($query);
    if (!$solusi) {
        echo "<p style='color:red;text-align:center;'>Solusi tidak ditemukan!</p>";
        exit;
    }
} else {
    header("Location: kelola_solusi.php");
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $kode = $_POST['kode_solusi'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($koneksi, "UPDATE solusi SET kode_solusi='$kode', deskripsi='$deskripsi' WHERE id_solusi=$id");
    echo "<p style='color:#0f0;text-align:center;'>Data berhasil diperbarui!</p>";
    // Refresh data setelah update
    $query = mysqli_query($koneksi, "SELECT * FROM solusi WHERE id_solusi=$id");
    $solusi = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Solusi - Sistem Pakar</title>
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
            max-width: 600px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], textarea {
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
            .content-wrapper { padding: 40px 20px; margin: 60px 15px; }
            input[type="text"], textarea, button { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>✏️ Edit Solusi</h1>

        <form method="POST">
            <input type="text" name="kode_solusi" value="<?= htmlspecialchars($solusi['kode_solusi']) ?>" placeholder="Kode Solusi" required>
            <textarea name="deskripsi" placeholder="Deskripsi Solusi" required><?= htmlspecialchars($solusi['deskripsi']) ?></textarea>
            <button type="submit" name="update">Perbarui Data</button>
        </form>

        <a href="solusi.php" class="back-btn">🏠 Kembali ke Kelola Solusi</a>
    </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
