<?php
session_start();
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dokumentasi Lapangan - Sistem Pakar IoT</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }

    .content-wrapper {
      background: rgba(0, 0, 0, 0.45);
      backdrop-filter: blur(6px);
      border-radius: 20px;
      padding: 50px 30px;
      max-width: 1000px;
      margin: 80px auto;
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
      animation: fadeIn 1s ease-in-out;
    }

    h1 {
      text-align: center;
      margin-bottom: 10px;
      text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }

    h3 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: 400;
      color: #e0f8ff;
    }

    /* === GALERI FOTO === */
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 25px;
      justify-items: center;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.35);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: rgba(255,255,255,0.1);
      cursor: pointer;
    }

    .gallery-item img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
      border-radius: 15px;
      transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.05);
    }

    a.back-btn {
      display: inline-block;
      background: rgba(255,255,255,0.2);
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 30px;
      margin-top: 40px;
      transition: all 0.3s ease;
    }

    a.back-btn:hover {
      background: rgba(255,255,255,0.35);
      transform: translateY(-3px);
    }

    /* === POPUP LIGHTBOX === */
    .lightbox {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.85);
      justify-content: center;
      align-items: center;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 85%;
      border-radius: 10px;
      box-shadow: 0 0 25px rgba(0,0,0,0.7);
      animation: fadeIn 0.5s ease;
    }

    .lightbox:target {
      display: flex;
    }

    .lightbox-close {
      position: absolute;
      top: 30px;
      right: 50px;
      font-size: 35px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .lightbox-close:hover {
      color: #00ffaa;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
  <div class="content-wrapper">
    <h1>📸 Dokumentasi Observasi Lapangan</h1>
    <h3>Kegiatan Pengumpulan Data Tanaman dan Pupuk</h3>

    <div class="gallery">
      <!-- FOTO 1 -->
      <a href="#img1" class="gallery-item">
        <img src="assets/img/observasi1.jpg" alt="Foto Observasi 1">
      </a>
      <div class="lightbox" id="img1">
        <a href="#" class="lightbox-close">&times;</a>
        <img src="assets/img/observasi1.jpg" alt="Foto Observasi 1 Besar">
      </div>

      <!-- FOTO 2 -->
      <a href="#img2" class="gallery-item">
        <img src="assets/img/observasi2.jpg" alt="Foto Observasi 2">
      </a>
      <div class="lightbox" id="img2">
        <a href="#" class="lightbox-close">&times;</a>
        <img src="assets/img/observasi2.jpg" alt="Foto Observasi 2 Besar">
      </div>

      <!-- FOTO 3 -->
      <a href="#img3" class="gallery-item">
        <img src="assets/img/observasi3.jpg" alt="Foto Observasi 3">
      </a>
      <div class="lightbox" id="img3">
        <a href="#" class="lightbox-close">&times;</a>
        <img src="assets/img/observasi3.jpg" alt="Foto Observasi 3 Besar">
      </div>

      <!-- FOTO 4 -->
      <a href="#img4" class="gallery-item">
        <img src="assets/img/observasi4.jpg" alt="Foto Observasi 4">
      </a>
      <div class="lightbox" id="img4">
        <a href="#" class="lightbox-close">&times;</a>
        <img src="assets/img/observasi4.jpg" alt="Foto Observasi 4 Besar">
      </div>

      <!-- FOTO 5 -->
      <a href="#img5" class="gallery-item">
        <img src="assets/img/observasi5.jpg" alt="Foto Observasi 5">
      </a>
      <div class="lightbox" id="img5">
        <a href="#" class="lightbox-close">&times;</a>
        <img src="assets/img/observasi5.jpg" alt="Foto Observasi 5 Besar">
      </div>
    </div>

    <div style="text-align:center;">
      <a href="menu_utama.php" class="back-btn">⬅ Kembali ke Menu Utama</a>
    </div>
  </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
