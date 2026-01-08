<<<<<<< HEAD
<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Komunitas Petani Sayuran Sleman</title>
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

    p {
      font-size: 1.05em;
      color: #e0f8ff;
      margin-bottom: 25px;
      line-height: 1.7;
      text-align: justify;
    }

    ul {
      text-align: left;
      margin: 20px auto 30px;
      max-width: 800px;
      line-height: 1.7;
      color: #e0f8ff;
    }

    .button-group {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
      margin-top: 35px;
    }

    .back-btn {
      display: inline-block;
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
    <h2>🌿 Komunitas Petani Sayuran di Kabupaten Sleman</h2>
    <p>
      Kabupaten Sleman dikenal sebagai salah satu sentra pertanian sayuran di Daerah Istimewa Yogyakarta. 
      Melalui berbagai komunitas dan program, petani di wilayah ini aktif mengembangkan budidaya sayuran daun seperti 
      <b>tomat</b>, <b>sawi</b>, dan <b>selada</b> dengan pendekatan pertanian organik dan teknologi modern.
    </p>

    <p>
      Salah satu inisiatif unggulan adalah program <b>Sleman Kawasan Pertanian Sehat</b>, yang mendorong penggunaan 
      pupuk organik seperti <b>Bokashi</b>, <b>Kompos hijau</b>, hingga <b>Abu sekam</b> sebagai pengganti pupuk kimia. 
      Pendekatan ini terbukti membantu meningkatkan kesuburan tanah dan menjaga keseimbangan ekosistem pertanian.
    </p>

    <p>
      Selain itu, komunitas <b>Sayur Sleman</b> berperan penting dalam mendukung petani lokal untuk beradaptasi dengan era digital. 
      Melalui platform online, mereka membantu pemasaran hasil tani, berbagi teknik budidaya ramah lingkungan, 
      serta mengedukasi masyarakat tentang pentingnya konsumsi sayur sehat dan produksi berkelanjutan.
    </p>

    <p>
      Di sisi lain, program inovatif seperti <b>JGrow+</b> memanfaatkan limbah ternak untuk menghasilkan 
      <b>pupuk organik fermentasi</b> yang efisien dan ramah lingkungan. 
      Hal ini memperkuat upaya pemerintah Sleman dalam menerapkan sistem pertanian sirkular dan mengurangi ketergantungan terhadap pupuk kimia sintetis.
    </p>

    <ul>
      <li><b>Petani tomat</b> di kawasan Turi dan Pakem umumnya menggunakan pupuk Bokashi dan pupuk tulang (S03) untuk memperbaiki struktur tanah dan mempercepat pembungaan.</li>
      <li><b>Petani sawi</b> di daerah Ngaglik dan Cangkringan banyak memanfaatkan abu sekam serta kompos hijau (S02, S01) untuk menjaga kelembapan dan nutrisi daun.</li>
      <li><b>Petani selada</b> di kawasan Mlati dan Sleman Tengah memilih dolomit dan Bokashi (S04) untuk menstabilkan pH tanah dan memperkuat pertumbuhan akar.</li>
    </ul>

    <p>
      Pemerintah Kabupaten Sleman juga terus mendorong diversifikasi tanaman serta penerapan sistem pertanian organik berkelanjutan 
      agar petani mampu meningkatkan produktivitas sekaligus menjaga kelestarian alam. 
      Dengan dukungan komunitas, akademisi, dan inovasi seperti sistem pakar ini, Sleman meneguhkan diri sebagai 
      <b>pusat pertanian sayuran organik unggulan di DIY</b>.
    </p>

    <div class="button-group">
      <a href="tentang.php" class="back-btn">⬅️ Kembali ke Halaman Sebelumnya</a>
      <a href="menu_utama.php" class="back-btn">🏠 Kembali ke Menu Utama</a>
    </div>
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
  <title>Komunitas Petani Sayuran Sleman</title>
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

    p {
      font-size: 1.05em;
      color: #e0f8ff;
      margin-bottom: 25px;
      line-height: 1.7;
      text-align: justify;
    }

    ul {
      text-align: left;
      margin: 20px auto 30px;
      max-width: 800px;
      line-height: 1.7;
      color: #e0f8ff;
    }

    .button-group {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
      margin-top: 35px;
    }

    .back-btn {
      display: inline-block;
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
    <h2>🌿 Komunitas Petani Sayuran di Kabupaten Sleman</h2>
    <p>
      Kabupaten Sleman dikenal sebagai salah satu sentra pertanian sayuran di Daerah Istimewa Yogyakarta. 
      Melalui berbagai komunitas dan program, petani di wilayah ini aktif mengembangkan budidaya sayuran daun seperti 
      <b>tomat</b>, <b>sawi</b>, dan <b>selada</b> dengan pendekatan pertanian organik dan teknologi modern.
    </p>

    <p>
      Salah satu inisiatif unggulan adalah program <b>Sleman Kawasan Pertanian Sehat</b>, yang mendorong penggunaan 
      pupuk organik seperti <b>Bokashi</b>, <b>Kompos hijau</b>, hingga <b>Abu sekam</b> sebagai pengganti pupuk kimia. 
      Pendekatan ini terbukti membantu meningkatkan kesuburan tanah dan menjaga keseimbangan ekosistem pertanian.
    </p>

    <p>
      Selain itu, komunitas <b>Sayur Sleman</b> berperan penting dalam mendukung petani lokal untuk beradaptasi dengan era digital. 
      Melalui platform online, mereka membantu pemasaran hasil tani, berbagi teknik budidaya ramah lingkungan, 
      serta mengedukasi masyarakat tentang pentingnya konsumsi sayur sehat dan produksi berkelanjutan.
    </p>

    <p>
      Di sisi lain, program inovatif seperti <b>JGrow+</b> memanfaatkan limbah ternak untuk menghasilkan 
      <b>pupuk organik fermentasi</b> yang efisien dan ramah lingkungan. 
      Hal ini memperkuat upaya pemerintah Sleman dalam menerapkan sistem pertanian sirkular dan mengurangi ketergantungan terhadap pupuk kimia sintetis.
    </p>

    <ul>
      <li><b>Petani tomat</b> di kawasan Turi dan Pakem umumnya menggunakan pupuk Bokashi dan pupuk tulang (S03) untuk memperbaiki struktur tanah dan mempercepat pembungaan.</li>
      <li><b>Petani sawi</b> di daerah Ngaglik dan Cangkringan banyak memanfaatkan abu sekam serta kompos hijau (S02, S01) untuk menjaga kelembapan dan nutrisi daun.</li>
      <li><b>Petani selada</b> di kawasan Mlati dan Sleman Tengah memilih dolomit dan Bokashi (S04) untuk menstabilkan pH tanah dan memperkuat pertumbuhan akar.</li>
    </ul>

    <p>
      Pemerintah Kabupaten Sleman juga terus mendorong diversifikasi tanaman serta penerapan sistem pertanian organik berkelanjutan 
      agar petani mampu meningkatkan produktivitas sekaligus menjaga kelestarian alam. 
      Dengan dukungan komunitas, akademisi, dan inovasi seperti sistem pakar ini, Sleman meneguhkan diri sebagai 
      <b>pusat pertanian sayuran organik unggulan di DIY</b>.
    </p>

    <div class="button-group">
      <a href="tentang.php" class="back-btn">⬅️ Kembali ke Halaman Sebelumnya</a>
      <a href="menu_utama.php" class="back-btn">🏠 Kembali ke Menu Utama</a>
    </div>
  </div>

</body>
</html>

<?php include 'includes/footer.php'; ?>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
