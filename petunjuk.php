<<<<<<< HEAD
<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Petunjuk Penggunaan</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* ====== BACKGROUND ====== */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;

      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ====== BLOK TRANSPARAN ====== */
    .content-wrapper {
      position: relative;
      z-index: 2;
      background: rgba(0, 0, 0, 0.35);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      padding: 50px 40px;
      max-width: 800px;
      width: 90%;
      margin: 100px auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      animation: fadeIn 1s ease-in-out;
      flex: 1;
    }

    h2 {
      font-size: 1.9em;
      margin-bottom: 15px;
      text-align: center;
      color: #e8ffeb;
      text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }

    p {
      font-size: 1.05em;
      line-height: 1.6;
      margin-bottom: 20px;
      text-align: center;
      color: #eafdf8;
    }

    ol {
      text-align: left;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(6px);
      padding: 20px 25px;
      border-radius: 15px;
      font-size: 1em;
      line-height: 1.8;
      margin-top: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }

    ol li {
      margin-bottom: 10px;
      color: #f0fff4;
    }

    /* ====== TOMBOL KEMBALI ====== */
    .back-btn {
      display: inline-block;
      margin-top: 35px;
      background: linear-gradient(90deg, #1e6037, #174a75);
      padding: 10px 25px;
      border-radius: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .back-btn:hover {
      background: linear-gradient(90deg, #2b8d53, #1e5d99);
      transform: translateY(-3px);
    }

    /* ====== ANIMASI ====== */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 600px) {
      .content-wrapper {
        margin: 60px 15px;
        padding: 35px 20px;
      }
      h2 { font-size: 1.6em; }
      p, ol { font-size: 0.95em; }
    }

    /* ====== FOOTER ====== */
    footer {
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      letter-spacing: 0.3px;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
      border-top: 2px solid rgba(255,255,255,0.15);
    }

    footer strong {
      color: #aef7d0;
    }

    footer span {
      color: #d8ecff;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="content-wrapper">
    <h2>📘 Petunjuk Penggunaan Sistem</h2>
    <p>
      Sistem ini membantu memberikan <b>rekomendasi pupuk terbaik</b> untuk tanaman sayuran daun
      berdasarkan gejala yang kamu pilih. Ikuti langkah-langkah di bawah ini untuk menggunakan sistem:
    </p>

    <ol>
      <li>Pilih menu <b>Gejala dan Solusi</b> pada halaman utama.</li>
      <li>Pilih <b>jenis sayuran</b> yang ingin diperiksa, lalu tentukan gejala yang terjadi pada tanaman kamu.</li>
      <li>Sistem akan memproses data menggunakan metode <b>Certainty Factor (CF)</b>.</li>
      <li>Hasil berupa <b>rekomendasi pupuk terbaik</b> akan ditampilkan untuk kamu.</li>
    </ol>

    <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
  </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
=======
<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Petunjuk Penggunaan</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* ====== BACKGROUND ====== */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      color: #fff;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;

      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ====== BLOK TRANSPARAN ====== */
    .content-wrapper {
      position: relative;
      z-index: 2;
      background: rgba(0, 0, 0, 0.35);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      padding: 50px 40px;
      max-width: 800px;
      width: 90%;
      margin: 100px auto;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      animation: fadeIn 1s ease-in-out;
      flex: 1;
    }

    h2 {
      font-size: 1.9em;
      margin-bottom: 15px;
      text-align: center;
      color: #e8ffeb;
      text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }

    p {
      font-size: 1.05em;
      line-height: 1.6;
      margin-bottom: 20px;
      text-align: center;
      color: #eafdf8;
    }

    ol {
      text-align: left;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(6px);
      padding: 20px 25px;
      border-radius: 15px;
      font-size: 1em;
      line-height: 1.8;
      margin-top: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }

    ol li {
      margin-bottom: 10px;
      color: #f0fff4;
    }

    /* ====== TOMBOL KEMBALI ====== */
    .back-btn {
      display: inline-block;
      margin-top: 35px;
      background: linear-gradient(90deg, #1e6037, #174a75);
      padding: 10px 25px;
      border-radius: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .back-btn:hover {
      background: linear-gradient(90deg, #2b8d53, #1e5d99);
      transform: translateY(-3px);
    }

    /* ====== ANIMASI ====== */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 600px) {
      .content-wrapper {
        margin: 60px 15px;
        padding: 35px 20px;
      }
      h2 { font-size: 1.6em; }
      p, ol { font-size: 0.95em; }
    }

    /* ====== FOOTER ====== */
    footer {
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      letter-spacing: 0.3px;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
      border-top: 2px solid rgba(255,255,255,0.15);
    }

    footer strong {
      color: #aef7d0;
    }

    footer span {
      color: #d8ecff;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="content-wrapper">
    <h2>📘 Petunjuk Penggunaan Sistem</h2>
    <p>
      Sistem ini membantu memberikan <b>rekomendasi pupuk terbaik</b> untuk tanaman sayuran daun
      berdasarkan gejala yang kamu pilih. Ikuti langkah-langkah di bawah ini untuk menggunakan sistem:
    </p>

    <ol>
      <li>Pilih menu <b>Gejala dan Solusi</b> pada halaman utama.</li>
      <li>Pilih <b>jenis sayuran</b> yang ingin diperiksa, lalu tentukan gejala yang terjadi pada tanaman kamu.</li>
      <li>Sistem akan memproses data menggunakan metode <b>Certainty Factor (CF)</b>.</li>
      <li>Hasil berupa <b>rekomendasi pupuk terbaik</b> akan ditampilkan untuk kamu.</li>
    </ol>

    <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
  </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
