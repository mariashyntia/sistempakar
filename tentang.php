<<<<<<< HEAD
<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Pengembang</title>
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

    /* === GRID PENGEMBANG === */
    .developer-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-areas: 
        ". dev1 ."
        "dev2 dev3 dev4";
      gap: 25px;
      justify-items: center;
      align-items: stretch; /* semua kotak sama tinggi */
    }

    .dev1 { grid-area: dev1; }
    .dev2 { grid-area: dev2; }
    .dev3 { grid-area: dev3; }
    .dev4 { grid-area: dev4; }

    .developer-card {
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
      min-height: 260px; /* tinggi minimum sama */
    }

    .developer-card::after {
      content: "";
      position: absolute;
      top: 0; left: -75%;
      width: 50%; height: 100%;
      background: linear-gradient(120deg, rgba(255,255,255,0.2), transparent);
      transform: skewX(-25deg);
      transition: 0.6s;
    }

    .developer-card:hover::after {
      left: 125%;
    }

    .developer-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 10px 25px rgba(0,255,160,0.35);
    }

    .developer-card img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #aef7d0;
      margin-bottom: 12px;
      transition: all 0.4s ease;
    }

    .developer-card:hover img {
      transform: scale(1.1) rotate(2deg);
      box-shadow: 0 0 15px rgba(0,255,160,0.4);
    }

    .developer-card h3 {
      margin: 5px 0 4px;
      font-size: 1.2em;
      color: #fff;
    }

    .developer-card p {
      font-size: 0.9em;
      color: #d0e9ff;
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
      .developer-card img {
        width: 80px;
        height: 80px;
      }
      .developer-grid {
        grid-template-columns: 1fr;
        grid-template-areas:
          "dev1"
          "dev2"
          "dev3"
          "dev4";
      }
      .developer-card {
        min-height: auto;
      }
    }

    footer {
      position: relative;
      bottom: 0;
      width: 100%;
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
      border-top: 2px solid rgba(255,255,255,0.15);
    }

    footer p { margin: 0; }
    footer strong { color: #aef7d0; }
    footer span { color: #d8ecff; font-weight: 500; }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="container">
    <h2>🌿 Tentang Pengembang</h2>
    <p class="desc">
      Website ini dikembangkan sebagai proyek "Sistem Pakar IoT Untuk Rekomendasi Pemilihan Pupuk Terbaik Pada Tanaman Sayuran Daun Menggunakan Metode <b>Certainty Factor (CF)</b>".  
      Tujuan sistem ini adalah membantu petani atau pengguna dalam memilih pupuk yang tepat 
      berdasarkan kondisi dan gejala tanaman.
    </p>

    <div class="developer-grid">
      <div class="developer-card dev1">
        <img src="assets/img/dev1.jpg" alt="Foto Pengembang 1">
        <h3>Yumarlin Mz S.Kom.,M.Pd., M.Kom</h3>
        <p>Dosen Pembimbing</p>
      </div>

      <div class="developer-card dev2">
        <img src="assets/img/dev2.jpg" alt="Foto Pengembang 2">
        <h3>Rafi Maulana Rachman</h3>
        <p>22330039</p>
      </div>

      <div class="developer-card dev3">
        <img src="assets/img/dev3.jpg" alt="Foto Pengembang 3">
        <h3>Maria Shyntia Yofi Nggai</h3>
        <p>22330033</p>
      </div>

      <div class="developer-card dev4">
        <img src="assets/img/dev4.jpg" alt="Foto Pengembang 4">
        <h3>Dafa Maulana Rachim</h3>
        <p>22330040</p>
      </div>
    </div>

    <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
    <a href="tentang_komunitas.php" class="back-btn" style="margin-left:10px; background:linear-gradient(90deg,#1e5d99,#1e6037);">
      🌾 Lanjut ke Halaman Komunitas
    </a>
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
  <title>Tentang Pengembang</title>
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

    /* === GRID PENGEMBANG === */
    .developer-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-areas: 
        ". dev1 ."
        "dev2 dev3 dev4";
      gap: 25px;
      justify-items: center;
      align-items: stretch; /* semua kotak sama tinggi */
    }

    .dev1 { grid-area: dev1; }
    .dev2 { grid-area: dev2; }
    .dev3 { grid-area: dev3; }
    .dev4 { grid-area: dev4; }

    .developer-card {
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
      min-height: 260px; /* tinggi minimum sama */
    }

    .developer-card::after {
      content: "";
      position: absolute;
      top: 0; left: -75%;
      width: 50%; height: 100%;
      background: linear-gradient(120deg, rgba(255,255,255,0.2), transparent);
      transform: skewX(-25deg);
      transition: 0.6s;
    }

    .developer-card:hover::after {
      left: 125%;
    }

    .developer-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 10px 25px rgba(0,255,160,0.35);
    }

    .developer-card img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #aef7d0;
      margin-bottom: 12px;
      transition: all 0.4s ease;
    }

    .developer-card:hover img {
      transform: scale(1.1) rotate(2deg);
      box-shadow: 0 0 15px rgba(0,255,160,0.4);
    }

    .developer-card h3 {
      margin: 5px 0 4px;
      font-size: 1.2em;
      color: #fff;
    }

    .developer-card p {
      font-size: 0.9em;
      color: #d0e9ff;
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
      .developer-card img {
        width: 80px;
        height: 80px;
      }
      .developer-grid {
        grid-template-columns: 1fr;
        grid-template-areas:
          "dev1"
          "dev2"
          "dev3"
          "dev4";
      }
      .developer-card {
        min-height: auto;
      }
    }

    footer {
      position: relative;
      bottom: 0;
      width: 100%;
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: #f1f1f1;
      text-align: center;
      padding: 18px 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95em;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
      border-top: 2px solid rgba(255,255,255,0.15);
    }

    footer p { margin: 0; }
    footer strong { color: #aef7d0; }
    footer span { color: #d8ecff; font-weight: 500; }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="container">
    <h2>🌿 Tentang Pengembang</h2>
    <p class="desc">
      Website ini dikembangkan sebagai proyek "Sistem Pakar IoT Untuk Rekomendasi Pemilihan Pupuk Terbaik Pada Tanaman Sayuran Daun Menggunakan Metode <b>Certainty Factor (CF)</b>".  
      Tujuan sistem ini adalah membantu petani atau pengguna dalam memilih pupuk yang tepat 
      berdasarkan kondisi dan gejala tanaman.
    </p>

    <div class="developer-grid">
      <div class="developer-card dev1">
        <img src="assets/img/dev1.jpg" alt="Foto Pengembang 1">
        <h3>Yumarlin Mz S.Kom.,M.Pd., M.Kom</h3>
        <p>Dosen Pembimbing</p>
      </div>

      <div class="developer-card dev2">
        <img src="assets/img/dev2.jpg" alt="Foto Pengembang 2">
        <h3>Rafi Maulana Rachman</h3>
        <p>22330039</p>
      </div>

      <div class="developer-card dev3">
        <img src="assets/img/dev3.jpg" alt="Foto Pengembang 3">
        <h3>Maria Shyntia Yofi Nggai</h3>
        <p>22330033</p>
      </div>

      <div class="developer-card dev4">
        <img src="assets/img/dev4.jpg" alt="Foto Pengembang 4">
        <h3>Dafa Maulana Rachim</h3>
        <p>22330040</p>
      </div>
    </div>

    <a href="menu_utama.php" class="back-btn">⬅️ Kembali ke Menu Utama</a>
    <a href="tentang_komunitas.php" class="back-btn" style="margin-left:10px; background:linear-gradient(90deg,#1e5d99,#1e6037);">
      🌾 Lanjut ke Halaman Komunitas
    </a>
  </div>

</body>
</html>

<?php include 'includes/footer.php'; ?>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
