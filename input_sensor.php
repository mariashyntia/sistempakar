<<<<<<< HEAD
<?php
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Proses form jika ada submit
if (isset($_POST['submit'])) {
    $id_jenis = intval($_POST['id_jenis']);
    $cahaya = floatval($_POST['cahaya']);
    $kelembapan = floatval($_POST['kelembapan']);
    $suhu = floatval($_POST['suhu']);
    $ph = floatval($_POST['ph']);

    $query = "INSERT INTO sensor_iot (id_jenis, cahaya, kelembapan_tanah, suhu, ph_tanah) 
              VALUES ($id_jenis, $cahaya, $kelembapan, $suhu, $ph)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('✅ Data sensor berhasil disimpan!'); window.location.href='iot_dashboard.php?id_jenis=$id_jenis';</script>";
    } else {
        echo "<script>alert('❌ Gagal menyimpan data sensor!');</script>";
    }
}

// Ambil id_jenis dari URL
$id_jenis = isset($_GET['id_jenis']) ? intval($_GET['id_jenis']) : 0;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Input Data Sensor IoT</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 80px auto 40px auto;
            background: rgba(30, 80, 60, 0.88);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #e8ffeb;
            text-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
        }

        .info-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 600;
            color: #e8ffeb;
            font-size: 1em;
        }

        label .icon {
            margin-right: 8px;
        }

        input[type="number"] {
            padding: 12px 15px;
            border-radius: 10px;
            border: none;
            font-size: 1em;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-weight: 500;
        }

        input[type="number"]:focus {
            outline: 2px solid #4caf50;
        }

        .input-hint {
            font-size: 0.85em;
            color: #b8e6d5;
            margin-top: -5px;
        }

        button {
            padding: 14px 25px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            font-size: 1.05em;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #666, #888);
            color: #fff;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(135deg, #777, #999);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .container {
                margin: 40px 20px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>📡 Input Data Sensor IoT</h2>

        <?php
        if ($id_jenis > 0) {
            $sayuran = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis"));

            echo "<div class='info-box'>";
            echo "<p><strong>🌿 Tanaman: {$sayuran['nama_jenis']}</strong></p>";
            echo "<p style='font-size: 0.9em; color: #d4ffd4;'>Masukkan data pembacaan sensor terbaru</p>";
            echo "</div>";

            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='id_jenis' value='$id_jenis'>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>☀️</span> Intensitas Cahaya</label>";
            echo "<input type='number' name='cahaya' step='0.01' min='0' max='100000' required placeholder='Contoh: 8500'>";
            echo "<span class='input-hint'>Satuan: Lux (0 - 100000)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>💧</span> Kelembapan Tanah</label>";
            echo "<input type='number' name='kelembapan' step='0.01' min='0' max='100' required placeholder='Contoh: 65'>";
            echo "<span class='input-hint'>Satuan: % (0 - 100)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>🌡️</span> Suhu Udara</label>";
            echo "<input type='number' name='suhu' step='0.01' min='-50' max='100' required placeholder='Contoh: 28.5'>";
            echo "<span class='input-hint'>Satuan: °C (-50 - 100)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>⚗️</span> pH Tanah</label>";
            echo "<input type='number' name='ph' step='0.01' min='0' max='14' required placeholder='Contoh: 6.2'>";
            echo "<span class='input-hint'>Satuan: pH (0 - 14)</span>";
            echo "</div>";

            echo "<button type='submit' name='submit'>💾 Simpan Data Sensor</button>";
            echo "</form>";

            echo "<div class='btn-group'>";
            echo "<a href='iot_dashboard.php?id_jenis=$id_jenis' class='btn'>⬅️ Kembali ke Dashboard</a>";
            echo "</div>";

        } else {
            echo "<div style='text-align: center; padding: 40px;'>";
            echo "<p>❌ ID Jenis sayuran tidak valid</p>";
            echo "<a href='iot_dashboard.php' class='btn' style='margin-top: 20px;'>🏠 Kembali ke Dashboard</a>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

=======
<?php
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Proses form jika ada submit
if (isset($_POST['submit'])) {
    $id_jenis = intval($_POST['id_jenis']);
    $cahaya = floatval($_POST['cahaya']);
    $kelembapan = floatval($_POST['kelembapan']);
    $suhu = floatval($_POST['suhu']);
    $ph = floatval($_POST['ph']);

    $query = "INSERT INTO sensor_iot (id_jenis, cahaya, kelembapan_tanah, suhu, ph_tanah) 
              VALUES ($id_jenis, $cahaya, $kelembapan, $suhu, $ph)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('✅ Data sensor berhasil disimpan!'); window.location.href='iot_dashboard.php?id_jenis=$id_jenis';</script>";
    } else {
        echo "<script>alert('❌ Gagal menyimpan data sensor!');</script>";
    }
}

// Ambil id_jenis dari URL
$id_jenis = isset($_GET['id_jenis']) ? intval($_GET['id_jenis']) : 0;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Input Data Sensor IoT</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 80px auto 40px auto;
            background: rgba(30, 80, 60, 0.88);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #e8ffeb;
            text-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
        }

        .info-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 600;
            color: #e8ffeb;
            font-size: 1em;
        }

        label .icon {
            margin-right: 8px;
        }

        input[type="number"] {
            padding: 12px 15px;
            border-radius: 10px;
            border: none;
            font-size: 1em;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-weight: 500;
        }

        input[type="number"]:focus {
            outline: 2px solid #4caf50;
        }

        .input-hint {
            font-size: 0.85em;
            color: #b8e6d5;
            margin-top: -5px;
        }

        button {
            padding: 14px 25px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            font-size: 1.05em;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #666, #888);
            color: #fff;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(135deg, #777, #999);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .container {
                margin: 40px 20px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>📡 Input Data Sensor IoT</h2>

        <?php
        if ($id_jenis > 0) {
            $sayuran = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis"));

            echo "<div class='info-box'>";
            echo "<p><strong>🌿 Tanaman: {$sayuran['nama_jenis']}</strong></p>";
            echo "<p style='font-size: 0.9em; color: #d4ffd4;'>Masukkan data pembacaan sensor terbaru</p>";
            echo "</div>";

            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='id_jenis' value='$id_jenis'>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>☀️</span> Intensitas Cahaya</label>";
            echo "<input type='number' name='cahaya' step='0.01' min='0' max='100000' required placeholder='Contoh: 8500'>";
            echo "<span class='input-hint'>Satuan: Lux (0 - 100000)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>💧</span> Kelembapan Tanah</label>";
            echo "<input type='number' name='kelembapan' step='0.01' min='0' max='100' required placeholder='Contoh: 65'>";
            echo "<span class='input-hint'>Satuan: % (0 - 100)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>🌡️</span> Suhu Udara</label>";
            echo "<input type='number' name='suhu' step='0.01' min='-50' max='100' required placeholder='Contoh: 28.5'>";
            echo "<span class='input-hint'>Satuan: °C (-50 - 100)</span>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label><span class='icon'>⚗️</span> pH Tanah</label>";
            echo "<input type='number' name='ph' step='0.01' min='0' max='14' required placeholder='Contoh: 6.2'>";
            echo "<span class='input-hint'>Satuan: pH (0 - 14)</span>";
            echo "</div>";

            echo "<button type='submit' name='submit'>💾 Simpan Data Sensor</button>";
            echo "</form>";

            echo "<div class='btn-group'>";
            echo "<a href='iot_dashboard.php?id_jenis=$id_jenis' class='btn'>⬅️ Kembali ke Dashboard</a>";
            echo "</div>";

        } else {
            echo "<div style='text-align: center; padding: 40px;'>";
            echo "<p>❌ ID Jenis sayuran tidak valid</p>";
            echo "<a href='iot_dashboard.php' class='btn' style='margin-top: 20px;'>🏠 Kembali ke Dashboard</a>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
</html>