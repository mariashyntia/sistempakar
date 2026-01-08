<?php
include '../db/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin.php");
    exit;
}
include 'includes/header.php';
include 'includes/sidebar.php';

// Ambil data rule berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM aturan WHERE id_rule=$id");
    $rule = mysqli_fetch_assoc($query);
    if (!$rule) {
        echo "<p style='color:red;text-align:center;'>Rule tidak ditemukan!</p>";
        exit;
    }
} else {
    header("Location: kelola_rule.php");
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $id_gejala = $_POST['id_gejala'];
    $id_solusi = $_POST['id_solusi'];

    mysqli_query($koneksi, "UPDATE aturan SET id_gejala='$id_gejala', id_solusi='$id_solusi' WHERE id_rule=$id");
    echo "<p style='color:#0f0;text-align:center;'>Rule berhasil diperbarui!</p>";

    // Refresh data setelah update
    $query = mysqli_query($koneksi, "SELECT * FROM aturan WHERE id_rule=$id");
    $rule = mysqli_fetch_assoc($query);
}

// Ambil semua gejala dan solusi untuk dropdown
$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");
$solusi = mysqli_query($koneksi, "SELECT * FROM solusi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Rule - Sistem Pakar</title>
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
            background: rgba(0,0,0,0.35);
            backdrop-filter: blur(6px);
            border-radius: 20px;
            padding: 50px 40px;
            max-width: 600px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
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

        select {
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
            form, select, button { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>✏️ Edit Rule</h1>

        <form method="POST">
            <select name="id_gejala" required>
                <option value="">-- Pilih Gejala --</option>
                <?php
                while ($row = mysqli_fetch_assoc($gejala)) {
                    $selected = $row['id_gejala'] == $rule['id_gejala'] ? 'selected' : '';
                    echo "<option value='{$row['id_gejala']}' $selected>{$row['nama_gejala']}</option>";
                }
                ?>
            </select>

            <select name="id_solusi" required>
                <option value="">-- Pilih Solusi --</option>
                <?php
                while ($row = mysqli_fetch_assoc($solusi)) {
                    $selected = $row['id_solusi'] == $rule['id_solusi'] ? 'selected' : '';
                    echo "<option value='{$row['id_solusi']}' $selected>{$row['deskripsi']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="update">Perbarui Rule</button>
        </form>

        <a href="aturan.php" class="back-btn">🏠 Kembali ke Kelola Rule</a>
    </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
