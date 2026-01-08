<style>
/* ====== SIDEBAR DASAR ====== */
.sidebar {
    position: fixed;
    top: 0;
    left: -230px; /* 🚪 Awalnya tertutup */
    height: 100%;
    width: 230px;
    background: linear-gradient(180deg, #1e6037, #174a75);
    color: #fff;
    padding-top: 60px;
    box-shadow: 2px 0 10px rgba(0,0,0,0.3);
    z-index: 999;
    display: flex;
    flex-direction: column;
    transition: left 0.4s ease;
}

/* ====== KETIKA DIBUKA ====== */
.sidebar.open {
    left: 0;
}

/* ====== TOMBOL TOGGLE ====== */
.toggle-btn {
    position: fixed;
    top: 18px;
    left: 20px; /* 📍 Awalnya di kiri */
    font-size: 26px;
    color: #fff;
    background: rgba(0,0,0,0.4);
    border: none;
    border-radius: 8px;
    padding: 6px 10px;
    cursor: pointer;
    z-index: 1000;
    transition: all 0.4s ease;
}
.toggle-btn:hover {
    background: rgba(255,255,255,0.2);
}

/* ====== JUDUL ====== */
.sidebar h2 {
    text-align: center;
    font-size: 1.3em;
    margin-bottom: 30px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

/* ====== LINK MENU ====== */
.sidebar a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    text-decoration: none;
    color: #f1f1f1;
    font-weight: 500;
    font-size: 0.98em;
    border-left: 4px solid transparent;
    transition: all 0.3s;
}

.sidebar a i {
    margin-right: 10px;
    font-size: 1.2em;
}

/* HOVER */
.sidebar a:hover {
    background: rgba(255, 255, 255, 0.1);
    border-left: 4px solid #4caf50;
}

/* AKTIF */
.sidebar a.active {
    background: rgba(255, 255, 255, 0.2);
    border-left: 4px solid #00ff9d;
    color: #fff;
    font-weight: 600;
}

/* ====== RESPONSIVE ====== */
@media (max-width: 768px) {
    .toggle-btn {
        left: 20px; /* Tetap di kiri di HP */
    }
}
<style>
/* ====== SIDEBAR ====== */
.sidebar {
  position: fixed;
  top: 0;
  left: -230px;
  height: 100%;
  width: 230px;
  background: linear-gradient(180deg, #1e6037, #174a75);
  color: #fff;
  padding-top: 70px;
  box-shadow: 2px 0 10px rgba(0,0,0,0.3);
  z-index: 999;
  display: flex;
  flex-direction: column;
  transition: left 0.4s ease;
}
.sidebar.open {
  left: 0;
}

/* ====== TOMBOL TOGGLE ====== */
.toggle-btn {
  position: fixed;
  top: 15px;
  left: 20px;
  font-size: 24px;
  color: #fff;
  background: rgba(0,0,0,0.6);
  border: none;
  border-radius: 8px;
  padding: 6px 10px;
  cursor: pointer;
  z-index: 2001; /* di atas navbar */
  transition: all 0.3s;
}
.toggle-btn:hover {
  background: rgba(255,255,255,0.25);
}

/* ====== JUDUL ====== */
.sidebar h2 {
  text-align: center;
  font-size: 1.3em;
  margin-bottom: 25px;
  text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

/* ====== LINK MENU ====== */
.sidebar a {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  text-decoration: none;
  color: #f1f1f1;
  font-weight: 500;
  font-size: 0.98em;
  border-left: 4px solid transparent;
  transition: all 0.3s;
}
.sidebar a i {
  margin-right: 10px;
  font-size: 1.2em;
}
.sidebar a:hover {
  background: rgba(255, 255, 255, 0.1);
  border-left: 4px solid #4caf50;
}
.sidebar a.active {
  background: rgba(255, 255, 255, 0.2);
  border-left: 4px solid #00ff9d;
  color: #fff;
  font-weight: 600;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .toggle-btn {
    left: 20px;
  }
}
</style>

<!-- ====== SIDEBAR ====== -->
<div class="sidebar" id="sidebar">
  <h2>🌱 Sistem Pakar</h2>

  <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'menu_utama.php' ? 'active' : ''; ?>">
    <i>🏠</i> Dashboard
  </a>
  <a href="gejala.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'petunjuk.php' ? 'active' : ''; ?>">
    <i>🌾</i> Kelola Gejala
  </a>
  <a href="solusi.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'gejala.php' ? 'active' : ''; ?>">
    <i>💡</i> Kelola Solusi
  </a>
  <a href="aturan.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'tentang.php' ? 'active' : ''; ?>">
    <i>📜</i> Kelola Rule
  </a>
  <a href="kelola_sayuran.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'tentang.php' ? 'active' : ''; ?>">
    <i>🌿</i> Kelola Sayuran
  </a>
  <a href="logout.php"><i>🚪</i> Keluar</a>
</div>

<!-- ====== TOGGLE BUTTON ====== -->
<button class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">☰</button>

<!-- ====== SCRIPT JS ====== -->
<script>
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggleBtn');

  sidebar.classList.toggle('open');
  // posisi tombol ikut geser
  toggleBtn.style.left = sidebar.classList.contains('open') ? '250px' : '20px';
}
</script>
