<<<<<<< HEAD
<?php
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard IoT Sensor</title>
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
            max-width: 900px;
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
            font-size: 2em;
        }

        .sayuran-selector {
            text-align: center;
            margin-bottom: 30px;
        }

        .sayuran-selector form {
            display: inline-flex;
            gap: 15px;
            align-items: center;
        }

        .sayuran-selector select {
            padding: 12px 20px;
            border-radius: 12px;
            border: none;
            font-size: 1em;
            font-weight: 500;
            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            cursor: pointer;
            min-width: 200px;
        }

        .sayuran-selector button {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .sayuran-selector button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        .sensor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .sensor-card {
            background: linear-gradient(135deg, rgba(43, 122, 75, 0.8), rgba(30, 144, 163, 0.8));
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .sensor-card:hover {
            transform: translateY(-5px);
        }

        .sensor-card .icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .sensor-card .label {
            font-size: 0.9em;
            color: #d4ffd4;
            margin-bottom: 8px;
        }

        .sensor-card .value {
            font-size: 1.8em;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .sensor-card .unit {
            font-size: 0.85em;
            color: #aef7d0;
        }

        .sensor-card .timestamp {
            font-size: 0.75em;
            color: #b8e6d5;
            margin-top: 10px;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
        }

        .info-box p {
            margin: 8px 0;
            font-size: 1.05em;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            color: #fff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background: linear-gradient(135deg, #4ad68c, #56b6da);
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #666, #888);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #777, #999);
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }

        .empty-state .icon {
            font-size: 4em;
            margin-bottom: 20px;
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

            .sensor-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>🤖 Dashboard IoT Sensor</h2>

        <!-- Pilih Sayuran -->
        <div class="sayuran-selector">
            <form method="GET" action="">
                <select name="id_jenis" required>
                    <option value="">-- Pilih Sayuran --</option>
                    <?php
                    $query_sayuran = mysqli_query($koneksi, "SELECT * FROM jenis_sayuran ORDER BY nama_jenis ASC");
                    while ($row = mysqli_fetch_assoc($query_sayuran)) {
                        $selected = (isset($_GET['id_jenis']) && $_GET['id_jenis'] == $row['id_jenis']) ? 'selected' : '';
                        echo "<option value='{$row['id_jenis']}' $selected>{$row['nama_jenis']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Tampilkan Data</button>
            </form>
        </div>

        <?php
        if (isset($_GET['id_jenis'])) {
            $id_jenis = intval($_GET['id_jenis']);

            // Ambil nama sayuran
            $sayuran = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis"));

            // Ambil data sensor terbaru
            $sensor = mysqli_fetch_assoc(mysqli_query($koneksi, "
                SELECT * FROM sensor_iot 
                WHERE id_jenis = $id_jenis 
                ORDER BY waktu_baca DESC 
                LIMIT 1
            "));

            if ($sensor) {
                echo "<div class='info-box'>";
                echo "<p><strong>🌿 Tanaman: {$sayuran['nama_jenis']}</strong></p>";
                echo "<p>Data sensor terakhir diperbarui: " . date('d M Y H:i:s', strtotime($sensor['waktu_baca'])) . "</p>";
                echo "</div>";

                echo "<div class='sensor-grid'>";

                // Card Cahaya
                echo "<div class='sensor-card'>
                        <div class='icon'>☀️</div>
                        <div class='label'>Intensitas Cahaya</div>
                        <div class='value'>{$sensor['cahaya']}</div>
                        <div class='unit'>Lux</div>
                      </div>";

                // Card Kelembapan Tanah
                echo "<div class='sensor-card'>
                        <div class='icon'>💧</div>
                        <div class='label'>Kelembapan Tanah</div>
                        <div class='value'>{$sensor['kelembapan_tanah']}</div>
                        <div class='unit'>%</div>
                      </div>";

                // Card Suhu
                echo "<div class='sensor-card'>
                        <div class='icon'>🌡️</div>
                        <div class='label'>Suhu Udara</div>
                        <div class='value'>{$sensor['suhu']}</div>
                        <div class='unit'>°C</div>
                      </div>";

                // Card pH Tanah
                echo "<div class='sensor-card'>
                        <div class='icon'>⚗️</div>
                        <div class='label'>pH Tanah</div>
                        <div class='value'>{$sensor['ph_tanah']}</div>
                        <div class='unit'>pH</div>
                      </div>";

                echo "</div>";

                echo "<div class='btn-group'>";
                echo "<a href='gejala.php?id_jenis=$id_jenis' class='btn'>📋 Pilih Gejala Manual</a>";
                echo "<a href='input_sensor.php?id_jenis=$id_jenis' class='btn btn-secondary'>🔄 Update Data Sensor</a>";
                echo "</div>";

            } else {
                echo "<div class='empty-state'>";
                echo "<div class='icon'>📡</div>";
                echo "<h3>Belum Ada Data Sensor</h3>";
                echo "<p>Data sensor untuk {$sayuran['nama_jenis']} belum tersedia.</p>";
                echo "<a href='input_sensor.php?id_jenis=$id_jenis' class='btn' style='margin-top: 20px;'>➕ Input Data Sensor</a>";
                echo "</div>";
            }

        } else {
            echo "<div class='empty-state'>";
            echo "<div class='icon'>🌱</div>";
            echo "<h3>Pilih Jenis Sayuran</h3>";
            echo "<p>Silakan pilih jenis sayuran untuk melihat data sensor IoT</p>";
            echo "</div>";
        }
        ?>

        <div class="btn-group" style="margin-top: 30px;">
            <a href="menu_utama.php" class="btn btn-secondary">🏠 Menu Utama</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

=======
<?php
include 'db/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard IoT Sensor</title>
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
            max-width: 900px;
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
            font-size: 2em;
        }

        .sayuran-selector {
            text-align: center;
            margin-bottom: 30px;
        }

        .sayuran-selector form {
            display: inline-flex;
            gap: 15px;
            align-items: center;
        }

        .sayuran-selector select {
            padding: 12px 20px;
            border-radius: 12px;
            border: none;
            font-size: 1em;
            font-weight: 500;
            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            cursor: pointer;
            min-width: 200px;
        }

        .sayuran-selector button {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .sayuran-selector button:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-2px);
        }

        .sensor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .sensor-card {
            background: linear-gradient(135deg, rgba(43, 122, 75, 0.8), rgba(30, 144, 163, 0.8));
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .sensor-card:hover {
            transform: translateY(-5px);
        }

        .sensor-card .icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .sensor-card .label {
            font-size: 0.9em;
            color: #d4ffd4;
            margin-bottom: 8px;
        }

        .sensor-card .value {
            font-size: 1.8em;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .sensor-card .unit {
            font-size: 0.85em;
            color: #aef7d0;
        }

        .sensor-card .timestamp {
            font-size: 0.75em;
            color: #b8e6d5;
            margin-top: 10px;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
        }

        .info-box p {
            margin: 8px 0;
            font-size: 1.05em;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            color: #fff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background: linear-gradient(135deg, #4ad68c, #56b6da);
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #666, #888);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #777, #999);
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }

        .empty-state .icon {
            font-size: 4em;
            margin-bottom: 20px;
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

            .sensor-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>🤖 Dashboard IoT Sensor</h2>

        <!-- Pilih Sayuran -->
        <div class="sayuran-selector">
            <form method="GET" action="">
                <select name="id_jenis" required>
                    <option value="">-- Pilih Sayuran --</option>
                    <?php
                    $query_sayuran = mysqli_query($koneksi, "SELECT * FROM jenis_sayuran ORDER BY nama_jenis ASC");
                    while ($row = mysqli_fetch_assoc($query_sayuran)) {
                        $selected = (isset($_GET['id_jenis']) && $_GET['id_jenis'] == $row['id_jenis']) ? 'selected' : '';
                        echo "<option value='{$row['id_jenis']}' $selected>{$row['nama_jenis']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Tampilkan Data</button>
            </form>
        </div>

        <?php
        if (isset($_GET['id_jenis'])) {
            $id_jenis = intval($_GET['id_jenis']);

            // Ambil nama sayuran
            $sayuran = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis"));

            // Ambil data sensor terbaru
            $sensor = mysqli_fetch_assoc(mysqli_query($koneksi, "
                SELECT * FROM sensor_iot 
                WHERE id_jenis = $id_jenis 
                ORDER BY waktu_baca DESC 
                LIMIT 1
            "));

            if ($sensor) {
                echo "<div class='info-box'>";
                echo "<p><strong>🌿 Tanaman: {$sayuran['nama_jenis']}</strong></p>";
                echo "<p>Data sensor terakhir diperbarui: " . date('d M Y H:i:s', strtotime($sensor['waktu_baca'])) . "</p>";
                echo "</div>";

                echo "<div class='sensor-grid'>";

                // Card Cahaya
                echo "<div class='sensor-card'>
                        <div class='icon'>☀️</div>
                        <div class='label'>Intensitas Cahaya</div>
                        <div class='value'>{$sensor['cahaya']}</div>
                        <div class='unit'>Lux</div>
                      </div>";

                // Card Kelembapan Tanah
                echo "<div class='sensor-card'>
                        <div class='icon'>💧</div>
                        <div class='label'>Kelembapan Tanah</div>
                        <div class='value'>{$sensor['kelembapan_tanah']}</div>
                        <div class='unit'>%</div>
                      </div>";

                // Card Suhu
                echo "<div class='sensor-card'>
                        <div class='icon'>🌡️</div>
                        <div class='label'>Suhu Udara</div>
                        <div class='value'>{$sensor['suhu']}</div>
                        <div class='unit'>°C</div>
                      </div>";

                // Card pH Tanah
                echo "<div class='sensor-card'>
                        <div class='icon'>⚗️</div>
                        <div class='label'>pH Tanah</div>
                        <div class='value'>{$sensor['ph_tanah']}</div>
                        <div class='unit'>pH</div>
                      </div>";

                echo "</div>";

                echo "<div class='btn-group'>";
                echo "<a href='gejala.php?id_jenis=$id_jenis' class='btn'>📋 Pilih Gejala Manual</a>";
                echo "<a href='input_sensor.php?id_jenis=$id_jenis' class='btn btn-secondary'>🔄 Update Data Sensor</a>";
                echo "</div>";

            } else {
                echo "<div class='empty-state'>";
                echo "<div class='icon'>📡</div>";
                echo "<h3>Belum Ada Data Sensor</h3>";
                echo "<p>Data sensor untuk {$sayuran['nama_jenis']} belum tersedia.</p>";
                echo "<a href='input_sensor.php?id_jenis=$id_jenis' class='btn' style='margin-top: 20px;'>➕ Input Data Sensor</a>";
                echo "</div>";
            }

        } else {
            echo "<div class='empty-state'>";
            echo "<div class='icon'>🌱</div>";
            echo "<h3>Pilih Jenis Sayuran</h3>";
            echo "<p>Silakan pilih jenis sayuran untuk melihat data sensor IoT</p>";
            echo "</div>";
        }
        ?>

        <div class="btn-group" style="margin-top: 30px;">
            <a href="menu_utama.php" class="btn btn-secondary">🏠 Menu Utama</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
</html>