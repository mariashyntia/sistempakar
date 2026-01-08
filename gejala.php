<?php
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Gejala dan Solusi</title>
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
            max-width: 850px;
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
            margin-bottom: 25px;
            color: #e8ffeb;
            text-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
            font-size: 1.9em;
        }

        /* ===== SENSOR IOT SECTION ===== */
        .iot-section {
            background: linear-gradient(135deg, rgba(43, 122, 75, 0.6), rgba(30, 144, 163, 0.6));
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .iot-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .iot-header h3 {
            margin: 0 0 5px 0;
            font-size: 1.3em;
            color: #aef7d0;
        }

        .iot-header .timestamp {
            font-size: 0.85em;
            color: #d4ffd4;
        }

        .sensor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .sensor-card {
            background: rgba(255, 255, 255, 0.15);
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s;
        }

        .sensor-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.2);
        }

        .sensor-card .icon {
            font-size: 2em;
            margin-bottom: 5px;
        }

        .sensor-card .label {
            font-size: 0.85em;
            color: #d4ffd4;
            margin-bottom: 5px;
        }

        .sensor-card .value {
            font-size: 1.6em;
            font-weight: 700;
            color: #fff;
        }

        .sensor-card .unit {
            font-size: 0.8em;
            color: #aef7d0;
        }

        .iot-note {
            background: rgba(255, 255, 255, 0.1);
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            font-size: 0.9em;
            color: #e8ffeb;
        }

        /* ===== GEJALA SECTION ===== */
        .gejala-section {
            margin-top: 30px;
        }

        .gejala-section h3 {
            text-align: center;
            margin-bottom: 15px;
            color: #e8ffeb;
            font-size: 1.2em;
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            margin: 25px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            background: rgba(255, 255, 255, 0.1);
            padding: 12px 15px;
            border-radius: 8px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        label:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.01);
        }

        label.sensor-based {
            background: rgba(255, 193, 7, 0.2);
            border-left: 4px solid #ffc107;
        }

        label.sensor-based:hover {
            background: rgba(255, 193, 7, 0.3);
        }

        input[type="checkbox"] {
            margin-right: 12px;
            transform: scale(1.3);
            accent-color: #4caf50;
        }

        button {
            margin-top: 25px;
            padding: 14px 30px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            font-size: 1.05em;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        a.back-btn {
            display: inline-block;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
            text-align: center;
        }

        a.back-btn:hover {
            color: #aef7b5;
            text-decoration: underline;
        }

        .legend {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 0.9em;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-box {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        .legend-box.sensor {
            background: rgba(255, 193, 7, 0.5);
            border: 2px solid #ffc107;
        }

        .legend-box.visual {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        footer {
            background: rgba(0, 0, 0, 0.5);
            text-align: center;
            padding: 15px 0;
            font-size: 0.9em;
            flex-shrink: 0;
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
                margin: 40px 15px;
                padding: 25px 20px;
            }

            .sensor-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <?php
        if (isset($_GET['id_jenis'])) {
            $id_jenis = intval($_GET['id_jenis']);
            $sayuran = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis"));

            echo "<h2>🌿 Diagnosis Tanaman {$sayuran['nama_jenis']}</h2>";

            // ===== TAMPILKAN DATA SENSOR IOT OTOMATIS =====
            $sensor = mysqli_fetch_assoc(mysqli_query($koneksi, "
                SELECT * FROM sensor_iot 
                WHERE id_jenis = $id_jenis 
                ORDER BY waktu_baca DESC 
                LIMIT 1
            "));

            if ($sensor) {
                echo "<div class='iot-section'>";
                echo "<div class='iot-header'>";
                echo "<h3>🤖 Data Sensor IoT (Real-Time)</h3>";
                echo "<div class='timestamp'>📡 Terakhir diperbarui: " . date('d M Y H:i:s', strtotime($sensor['waktu_baca'])) . "</div>";
                echo "</div>";

                echo "<div class='sensor-grid'>";

                // Card Cahaya
                echo "<div class='sensor-card'>
                        <div class='icon'>☀️</div>
                        <div class='label'>Cahaya</div>
                        <div class='value'>{$sensor['cahaya']}</div>
                        <div class='unit'>Lux</div>
                      </div>";

                // Card Kelembapan
                echo "<div class='sensor-card'>
                        <div class='icon'>💧</div>
                        <div class='label'>Kelembapan</div>
                        <div class='value'>{$sensor['kelembapan_tanah']}</div>
                        <div class='unit'>%</div>
                      </div>";

                // Card Suhu
                echo "<div class='sensor-card'>
                        <div class='icon'>🌡️</div>
                        <div class='label'>Suhu</div>
                        <div class='value'>{$sensor['suhu']}</div>
                        <div class='unit'>°C</div>
                      </div>";

                // Card pH
                echo "<div class='sensor-card'>
                        <div class='icon'>⚗️</div>
                        <div class='label'>pH Tanah</div>
                        <div class='value'>{$sensor['ph_tanah']}</div>
                        <div class='unit'>pH</div>
                      </div>";

                echo "</div>";

                echo "<div class='iot-note'>";
                echo "✅ Data sensor telah terekam otomatis dari perangkat IoT Anda";
                echo "</div>";

                echo "</div>";
            } else {
                echo "<div class='iot-section'>";
                echo "<div class='iot-header'>";
                echo "<h3>⚠️ Sensor IoT Belum Terhubung</h3>";
                echo "<p style='text-align: center; margin: 10px 0;'>Pastikan perangkat sensor IoT sudah terpasang dan mengirim data.</p>";
                echo "</div>";
                echo "</div>";
            }

            // ===== DIVIDER =====
            echo "<div class='section-divider'></div>";

            // ===== FORM PILIH GEJALA =====
            echo "<div class='gejala-section'>";
            echo "<h3>📋 Pilih Gejala Visual yang Terlihat</h3>";

            echo '<form method="POST" action="solusi.php?id_jenis=' . $id_jenis . '">';

            // Ambil gejala dan HANYA tampilkan yang BUKAN berbasis sensor
            $sensor_keywords = ['pH', 'Suhu', 'Kelembapan', 'suhu', 'kelembapan', 'ph'];

            $query = mysqli_query($koneksi, "SELECT * FROM gejala WHERE id_jenis = $id_jenis ORDER BY kode_gejala ASC");
            while ($data = mysqli_fetch_assoc($query)) {
                // Cek apakah gejala ini berbasis sensor
                $is_sensor_based = false;
                foreach ($sensor_keywords as $keyword) {
                    if (stripos($data['nama_gejala'], $keyword) !== false) {
                        $is_sensor_based = true;
                        break;
                    }
                }

                // HANYA tampilkan gejala visual (bukan sensor)
                if (!$is_sensor_based) {
                    echo "<label>
                            <input type='checkbox' name='gejala[]' value='{$data['id_gejala']}'>
                            👁️ {$data['nama_gejala']}
                          </label>";
                }
            }

            echo '<button type="submit" name="proses">🔍 Proses & Lihat Rekomendasi Pupuk</button>';
            echo '</form>';
            echo "</div>";

            echo '<div style="text-align: center;"><a href="pilih_sayuran.php" class="back-btn">⬅️ Kembali ke Pilih Sayuran</a></div>';
        } else {
            echo "<script>window.location.href='pilih_sayuran.php';</script>";
        }
        ?>
    </div>
</body>

</html>

<?php include 'includes/footer.php'; ?>