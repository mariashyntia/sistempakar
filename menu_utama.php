<<<<<<< HEAD
<?php
session_start();
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menu Utama - Sistem Pakar IoT</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* ===== BODY ===== */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;
      overflow-x: hidden;

      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ===== BLOK TRANSPARAN UTAMA ===== */
    .content-wrapper {
      position: relative;
      z-index: 2;
      background: rgba(0, 0, 0, 0.35);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      padding: 60px 40px;
      max-width: 950px;
      width: 90%;
      margin: 80px auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      animation: fadeIn 1s ease-in-out;
      flex: 1;
    }

    /* ===== TULISAN UTAMA ===== */
    h1 {
      font-size: 2.4em;
      margin-bottom: 10px;
      text-align: center;
      text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
    }

    h3 {
      font-weight: 400;
      margin-bottom: 40px;
      text-align: center;
      color: #e0f8ff;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    /* ===== GRID MENU ===== */
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 25px;
      max-width: 800px;
      margin: 0 auto;
    }

    /* ===== CARD MENU ===== */
    .menu-card {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 18px;
      padding: 30px 20px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1em;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
      transition: all 0.3s ease;
      backdrop-filter: blur(8px);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .menu-card:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
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

    /* ===== TOMBOL LOGOUT ===== */
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .logout:hover {
      background: #c62828;
      transform: translateY(-3px);
    }

    /* ===== FOOTER ===== */
    footer {
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      letter-spacing: 0.3px;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
      border-top: 2px solid rgba(255, 255, 255, 0.15);
    }

    footer strong {
      color: #aef7d0;
    }

    footer span {
      color: #d8ecff;
      font-weight: 500;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(25px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 1.8em;
      }

      .content-wrapper {
        padding: 40px 20px;
        margin: 60px 15px;
      }

      .menu-card {
        font-size: 1em;
      }

      footer {
        font-size: 0.85em;
        padding: 14px 6px;
      }
    }
  </style>
</head>

<body>
  <div class="content-wrapper">
    <h1>Sistem Pakar IoT Untuk Rekomendasi Pemilihan Pupuk Terbaik Pada Tanaman Sayuran Daun</h1>
    <h3>Metode Certainty Factor (CF)</h3>

    <div class="menu-grid">
      <a href="petunjuk.php" class="menu-card">
        <span class="icon">📘</span>
        <span class="title">Petunjuk Penggunaan</span>
        <span class="caption">Cara menggunakan sistem pakar dengan mudah</span>
      </a>

      <a href="pilih_sayuran.php" class="menu-card">
        <span class="icon">🌾</span>
        <span class="title">Gejala & Solusi</span>
        <span class="caption">Lihat daftar gejala tanaman dan rekomendasi pupuknya</span>
      </a>

      <!-- 🔹 Kartu Baru: Info Sayur & Pupuk -->
      <a href="info_sayur_pupuk.php" class="menu-card">
        <span class="icon">🥬</span>
        <span class="title">Info Sayur & Pupuk</span>
        <span class="caption">Lihat jenis sayur dan pupuk yang digunakan</span>
      </a>

      <!-- 🔹 Kartu Baru: Dashboard IoT -->
      <a href="iot_dashboard.php" class="menu-card">
        <span class="icon">🤖</span>
        <span class="title">Dashboard IoT</span>
        <span class="caption">Monitoring sensor IoT secara real-time</span>
      </a>

      <a href="tentang.php" class="menu-card">
        <span class="icon">👩‍💻</span>
        <span class="title">Tentang Pengembang</span>
        <span class="caption">Kenali tim pengembang dan latar belakang proyek</span>
      </a>

      <a href="dokumentasi.php" class="menu-card">
        <span class="icon">📄</span>
        <span class="title">Dokumentasi</span>
        <span class="caption">Dokumentasi Observasi</span>
      </a>
    </div>

    <a href="login_user.php" class="logout">🚪 Keluar</a>
  </div>
</body>

</html>
=======
<?php
session_start();
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menu Utama - Sistem Pakar IoT</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* ===== BODY ===== */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;
      overflow-x: hidden;

      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ===== BLOK TRANSPARAN UTAMA ===== */
    .content-wrapper {
      position: relative;
      z-index: 2;
      background: rgba(0, 0, 0, 0.35);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      padding: 60px 40px;
      max-width: 950px;
      width: 90%;
      margin: 80px auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      animation: fadeIn 1s ease-in-out;
      flex: 1;
    }

    /* ===== TULISAN UTAMA ===== */
    h1 {
      font-size: 2.4em;
      margin-bottom: 10px;
      text-align: center;
      text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
    }

    h3 {
      font-weight: 400;
      margin-bottom: 40px;
      text-align: center;
      color: #e0f8ff;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    /* ===== GRID MENU ===== */
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 25px;
      max-width: 800px;
      margin: 0 auto;
    }

    /* ===== CARD MENU ===== */
    .menu-card {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 18px;
      padding: 30px 20px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1em;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
      transition: all 0.3s ease;
      backdrop-filter: blur(8px);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .menu-card:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
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

    /* ===== TOMBOL LOGOUT ===== */
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .logout:hover {
      background: #c62828;
      transform: translateY(-3px);
    }

    /* ===== FOOTER ===== */
    footer {
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      letter-spacing: 0.3px;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
      border-top: 2px solid rgba(255, 255, 255, 0.15);
    }

    footer strong {
      color: #aef7d0;
    }

    footer span {
      color: #d8ecff;
      font-weight: 500;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(25px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 1.8em;
      }

      .content-wrapper {
        padding: 40px 20px;
        margin: 60px 15px;
      }

      .menu-card {
        font-size: 1em;
      }

      footer {
        font-size: 0.85em;
        padding: 14px 6px;
      }
    }
  </style>
</head>

<body>
  <div class="content-wrapper">
    <h1>Sistem Pakar IoT Untuk Rekomendasi Pemilihan Pupuk Terbaik Pada Tanaman Sayuran Daun</h1>
    <h3>Metode Certainty Factor (CF)</h3>

    <div class="menu-grid">
      <a href="petunjuk.php" class="menu-card">
        <span class="icon">📘</span>
        <span class="title">Petunjuk Penggunaan</span>
        <span class="caption">Cara menggunakan sistem pakar dengan mudah</span>
      </a>

      <a href="pilih_sayuran.php" class="menu-card">
        <span class="icon">🌾</span>
        <span class="title">Gejala & Solusi</span>
        <span class="caption">Lihat daftar gejala tanaman dan rekomendasi pupuknya</span>
      </a>

      <!-- 🔹 Kartu Baru: Info Sayur & Pupuk -->
      <a href="info_sayur_pupuk.php" class="menu-card">
        <span class="icon">🥬</span>
        <span class="title">Info Sayur & Pupuk</span>
        <span class="caption">Lihat jenis sayur dan pupuk yang digunakan</span>
      </a>

      <!-- 🔹 Kartu Baru: Dashboard IoT -->
      <a href="iot_dashboard.php" class="menu-card">
        <span class="icon">🤖</span>
        <span class="title">Dashboard IoT</span>
        <span class="caption">Monitoring sensor IoT secara real-time</span>
      </a>

      <a href="tentang.php" class="menu-card">
        <span class="icon">👩‍💻</span>
        <span class="title">Tentang Pengembang</span>
        <span class="caption">Kenali tim pengembang dan latar belakang proyek</span>
      </a>

      <a href="dokumentasi.php" class="menu-card">
        <span class="icon">📄</span>
        <span class="title">Dokumentasi</span>
        <span class="caption">Dokumentasi Observasi</span>
      </a>
    </div>

    <a href="login_user.php" class="logout">🚪 Keluar</a>
  </div>
</body>

</html>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
<?php include 'includes/footer.php'; ?>