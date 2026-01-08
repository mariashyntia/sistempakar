<?php
session_start();
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Sistem Pakar</title>
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
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            animation: fadeIn 1s ease-in-out;
            flex: 1;
        }

        h1 {
            font-size: 2.4em;
            text-align: center;
            margin-bottom: 15px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        h3 {
            font-weight: 400;
            margin-bottom: 40px;
            text-align: center;
            color: #e0f8ff;
            text-shadow: 0 2px 6px rgba(0,0,0,0.4);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            max-width: 850px;
            margin: 0 auto;
        }

        .menu-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 18px;
            padding: 25px 20px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1em;
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menu-card:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        .menu-card span.icon {
            font-size: 2.8em;
            margin-bottom: 10px;
        }

        .menu-card span.title {
            font-weight: 700;
            font-size: 1.15em;
        }

        .menu-card span.caption {
            margin-top: 6px;
            font-weight: 400;
            font-size: 0.9em;
            color: #e0f8ff;
            opacity: 0.9;
            text-align: center;
        }

        .logout {
            display: inline-block;
            margin: 50px auto 0;
            background: rgba(220, 53, 69, 0.9);
            padding: 10px 25px;
            border-radius: 30px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            text-align: center;
        }

        .logout:hover {
            background: #c62828;
            transform: translateY(-3px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            h1 { font-size: 1.8em; }
            .content-wrapper { padding: 40px 20px; margin: 60px 15px; }
            .menu-card { font-size: 1em; }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>🛠 Dashboard Admin</h1>
        <h3>Kelola Sistem Pakar</h3>

        <div class="menu-grid">
            <a href="gejala.php" class="menu-card">
                <span class="icon">🌾</span>
                <span class="title">Kelola Gejala</span>
                <span class="caption">Tambahkan, edit, atau hapus gejala tanaman</span>
            </a>
            <a href="solusi.php" class="menu-card">
                <span class="icon">💡</span>
                <span class="title">Kelola Solusi</span>
                <span class="caption">Atur solusi atau rekomendasi pupuk</span>
            </a>
            <a href="aturan.php" class="menu-card">
                <span class="icon">📜</span>
                <span class="title">Kelola Rule</span>
                <span class="caption">Buat atau ubah aturan Certainty Factor</span>
            </a>
            <!-- Tombol baru: Kelola Sayuran -->
            <a href="kelola_sayuran.php" class="menu-card">
                <span class="icon">🥬</span>
                <span class="title">Kelola Sayuran</span>
                <span class="caption">Tambahkan, edit, atau hapus jenis sayuran</span>
            </a>
        </div>

        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
