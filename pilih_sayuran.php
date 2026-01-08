<?php 
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Sayuran</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 500px;
            margin: 100px auto 40px auto; /* tambahkan bottom margin supaya footer tidak menempel */
            background: rgba(30, 80, 60, 0.85);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            animation: fadeIn 1s ease-in-out;
            text-align: center;
            flex: 1; /* agar container mengisi ruang vertikal sebelum footer */
        }

        h2 {
            margin-bottom: 25px;
            color: #e8ffeb;
            text-shadow: 0 3px 8px rgba(0,0,0,0.4);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: none;
            font-size: 1em;
            font-weight: 500;
            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            appearance: none;
            cursor: pointer;
            transition: 0.3s;
        }

        select:hover, select:focus {
            background: rgba(0, 0, 0, 0.75);
        }

        button {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        a.back-btn {
            margin-top: 20px;
            display: inline-block;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        a.back-btn:hover {
            color: #aef7b5;
            text-decoration: underline;
        }

        footer {
            width: 100%;
            background: linear-gradient(90deg, #1e6037, #174a75);
            color: #f1f1f1;
            text-align: center;
            padding: 15px 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95em;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
            border-top: 2px solid rgba(255,255,255,0.15);
            flex-shrink: 0; /* supaya footer tidak mengecil */
        }

        footer strong {
            color: #aef7d0;
        }

        footer span {
            color: #d8ecff;
            font-weight: 500;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            .container {
                margin: 60px 20px 40px 20px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>🌿 Pilih Jenis Sayuran</h2>
        <form method="GET" action="gejala.php">
            <select name="id_jenis" required>
                <option value="">-- Pilih Sayuran --</option>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM jenis_sayuran ORDER BY nama_jenis ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['id_jenis']}'>{$row['nama_jenis']}</option>";
                }
                ?>
            </select>
            <button type="submit">Lanjut</button>
        </form>

        <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
    </div>
</body>
</html>

<?php include 'includes/footer.php'; ?>
