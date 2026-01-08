<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= isset($page_title) ? $page_title : 'Sistem Pakar'; ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* === NAVBAR UTAMA === */
    .navbar {
      display: flex;
      justify-content: center; /* logo di tengah */
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: auto;
      min-height: 60px;
      background: linear-gradient(90deg, #1e6037, #174a75);
      color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      font-family: 'Poppins', sans-serif;
      z-index: 1000;
      padding: 10px 0;
    }

    /* === LOGO TENGAH (2 BARIS) === */
    .navbar .logo {
      text-align: center;
      font-weight: 600;
      color: #fff;
      line-height: 1.3;
      letter-spacing: 1px;
      font-size: 1.3em;
      flex: 1;
    }

    .navbar .logo span {
      display: block;
      font-size: 1.05em;
      font-weight: 500;
      color: #d8f7e4;
    }

    /* === NAV LINKS === */
    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
      position: absolute;
      right: 40px;
      top: 50%;
      transform: translateY(-50%);
      margin: 0;
      padding: 0;
    }

    .nav-links li a {
      text-decoration: none;
      color: #f1f1f1;
      font-weight: 500;
      transition: 0.3s;
    }

    .nav-links li a:hover {
      color: #00ff9d;
    }

    /* === RESPONSIVE MOBILE === */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        height: auto;
        padding: 15px;
      }

      .nav-links {
        position: static;
        transform: none;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 8px;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER / NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      Sistem Pakar<br>
      <span>Rekomendasi Pupuk</span>
    </div>
    <ul class="nav-links">
      <li><a href="menu_utama.php">Menu Utama</a></li>
      <li><a href="tentang.php">Tentang</a></li>
      <li><a href="gejala.php">Gejala & Solusi</a></li>
      <li><a href="info_sayur_pupuk.php">Sayuran & Pupuk</a></li>
      <li><a href="dokumentasi.php">Dokumentasi</a></li>
    </ul>
  </nav>
</body>
</html>
