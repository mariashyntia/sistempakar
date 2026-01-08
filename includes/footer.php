</div> <!-- end content -->
</div> <!-- end main-container -->

<!-- ====== FOOTER ====== -->
<footer class="footer">
  <p>© <?= date('Y'); ?> <strong>Sistem Pakar IoT Untuk Rekomendasi Pemilihan Pupuk Terbaik Pada Tanaman Sayuran Daun</strong> 🌱 | <span>Metode Certainty Factor</span></p>
</footer>

<style>
/* ====== FOOTER STYLING ====== */
.footer {
  position: relative;
  bottom: 0;
  width: 100%;
  background: linear-gradient(90deg, #1e6037, #174a75);
  color: #f1f1f1;
  text-align: center;
  padding: 18px 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 0.95em;
  letter-spacing: 0.3px;
  box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
  /* Hapus border putih di atas */
  border-top: none;
}

.footer p {
  margin: 0;
  animation: fadeInFooter 1s ease-in-out;
}

.footer strong {
  color: #aef7d0;
}

.footer span {
  color: #d8ecff;
  font-weight: 500;
}

/* animasi lembut */
@keyframes fadeInFooter {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

/* responsif */
@media (max-width: 600px) {
  .footer {
    font-size: 0.85em;
    padding: 14px 6px;
  }
}
</style>
</body>
</html>
