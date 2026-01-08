<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Sayur & Pupuk</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      overflow-x: hidden;
      position: relative;
      min-height: 100vh;
    }

    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.65);
      z-index: 0;
    }

    .container {
      position: relative;
      z-index: 1;
      max-width: 950px;
      margin: 12vh auto 80px auto;
      background: rgba(25, 55, 85, 0.85);
      backdrop-filter: blur(10px);
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      padding: 40px 50px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    h2 {
      margin-bottom: 15px;
      font-size: 2em;
      color: #aef7d0;
      text-shadow: 0 3px 8px rgba(0,0,0,0.4);
    }

    p.desc {
      font-size: 1.05em;
      color: #e0f8ff;
      margin-bottom: 40px;
      line-height: 1.7;
    }

    /* === GRID SAYUR & PUPUK === */
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 25px;
      justify-items: center;
      align-items: stretch;
    }

    .info-card {
      background: linear-gradient(145deg, rgba(30,100,70,0.85), rgba(25,60,100,0.9));
      border-radius: 18px;
      padding: 25px 20px;
      text-align: center;
      color: #fff;
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
      transition: all 0.35s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;

      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      min-height: 280px;
    }

    .info-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 10px 25px rgba(0,255,160,0.35);
    }

    .info-card img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #aef7d0;
      margin-bottom: 12px;
      transition: all 0.4s ease;
    }

    .info-card:hover img {
      transform: scale(1.1) rotate(2deg);
      box-shadow: 0 0 15px rgba(0,255,160,0.4);
    }

    .info-card h3 {
      margin: 5px 0 4px;
      font-size: 1.2em;
      color: #fff;
    }

    .info-card p {
      font-size: 0.9em;
      color: #d0e9ff;
      line-height: 1.6;
    }

    .back-btn {
      display: inline-block;
      margin-top: 45px;
      background: linear-gradient(90deg, #1e6037, #174a75);
      padding: 12px 28px;
      border-radius: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
    }

    .back-btn:hover {
      background: linear-gradient(90deg, #2b8d53, #1e5d99);
      transform: translateY(-3px);
      box-shadow: 0 0 15px rgba(0,255,160,0.4);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
      .container {
        padding: 30px 25px;
        margin-top: 90px;
      }
      .info-grid {
        grid-template-columns: 1fr;
      }
      .info-card {
        min-height: auto;
      }
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="container">
    <h2>🌿 Informasi Sayuran & Pupuk</h2>
    <p class="desc">
      Halaman ini berisi penjelasan tentang jenis sayuran daun yang digunakan dalam sistem serta jenis pupuk yang direkomendasikan untuk masing-masing tanaman.
    </p>

    <div class="info-grid">
      <!-- Tomat -->
      <div class="info-card">
        <img src="assets/img/tomat.jpg" alt="Tomat">
        <h3>Tomat</h3>
        <p>
          Tomat membutuhkan pupuk kaya kalium dan nitrogen. 
          Pupuk yang disarankan adalah <b>Bokashi</b> atau <b>Kompos Hijau</b> (S01), 
          untuk mempercepat pembentukan buah dan menjaga kesuburan tanah.
        </p>
      </div>

      <!-- Sawi -->
      <div class="info-card">
        <img src="assets/img/sawi.jpg" alt="Sawi">
        <h3>Sawi</h3>
        <p>
          Sawi cocok dengan <b>Abu Sekam</b> dan <b>Kompos Pisang</b> (S02), 
          karena mengandung kalium tinggi yang mendukung pertumbuhan daun yang lebat dan hijau.
        </p>
      </div>

      <!-- Selada -->
      <div class="info-card">
        <img src="assets/img/selada.jpg" alt="Selada">
        <h3>Selada</h3>
        <p>
          Selada membutuhkan tanah yang kaya kalsium dan magnesium. 
          Gunakan <b>Dolomit</b> atau <b>Bokashi</b> (S04) agar daun tumbuh segar, renyah, dan tidak mudah layu.
        </p>
      </div>

      <!-- Pupuk Lain -->
      <div class="info-card">
        <img src="assets/img/pupuk.jpg" alt="Pupuk">
        <h3>Daftar Pupuk Lain</h3>
        <p>
          <b>S03:</b> Pupuk Tulang / Bokashi — sumber fosfor alami untuk pertumbuhan akar.<br>
          <b>S05:</b> Abu Kayu / Kompos Hijau — menambah unsur kalium dan memperbaiki struktur tanah.
        </p>
      </div>
    </div>

    <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
  </div>
</body>
</html>

<?php include 'includes/footer.php'; ?>
