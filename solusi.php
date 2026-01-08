<?php
include('db/koneksi.php');
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi Pupuk</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* ====== STRUKTUR UTAMA ====== */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Overlay hitam transparan */
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* Kontainer utama */
        .content-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            position: relative;
        }

        .container {
            position: relative;
            max-width: 750px;
            width: 90%;
            margin: 60px auto;
            background: rgba(30, 80, 60, 0.88);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            animation: fadeIn 1s ease-in-out;
            text-align: center;
        }

        h2 {
            font-size: 1.9em;
            margin-bottom: 25px;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
            color: #e8ffeb;
        }

        .result-card {
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            text-align: left;
            transition: transform 0.3s;
        }

        .result-card:hover {
            transform: translateY(-3px);
        }

        .result-card b {
            font-size: 1.15em;
            color: #fff;
        }

        .result-card .cf-value {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: #e8ffeb;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 8px;
            margin-top: 8px;
        }

        .empty-msg {
            background: rgba(255,255,255,0.1);
            padding: 20px;
            border-radius: 12px;
            font-size: 1.05em;
            margin-bottom: 20px;
        }

        a.btn {
            display: inline-block;
            margin: 20px 10px 0;
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            color: #fff;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        a.btn:hover {
            background: linear-gradient(135deg, #4ad68c, #56b6da);
            transform: translateY(-3px);
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            .container {
                margin: 40px 20px;
                padding: 30px 20px;
            }
            .result-card {
                text-align: center;
            }
        }

        /* Footer selalu di bawah */
        footer.footer {
            margin-top: auto;
            z-index: 2;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="content-wrapper">
        <div class="container">
            <?php
            if (isset($_POST['gejala'])) {
                $gejala_terpilih = $_POST['gejala']; // array id_gejala dari checkbox
                $hasil = []; // array untuk menyimpan hasil per pupuk

                foreach ($gejala_terpilih as $id_gejala) {
                    // Ambil aturan dan nilai CF pakar berdasarkan gejala
                    $query = mysqli_query($koneksi, "
                        SELECT a.id_solusi, s.deskripsi, s.penjelasan, a.cf_pakar 
                        FROM aturan a
                        JOIN solusi s ON a.id_solusi = s.id_solusi
                        WHERE a.id_gejala = '$id_gejala'
                    ");

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id_solusi = $row['id_solusi'];
                        $cf_pakar = $row['cf_pakar'];
                        $cf_user = 1; // user dianggap yakin 100%
                        $cf_hasil = $cf_pakar * $cf_user;

                        // Gabungkan CF jika solusi sudah ada
                        if (isset($hasil[$id_solusi])) {
                            $hasil[$id_solusi]['cf'] = $hasil[$id_solusi]['cf'] + $cf_hasil * (1 - $hasil[$id_solusi]['cf']);
                        } else {
                            $hasil[$id_solusi] = [
                                'deskripsi' => $row['deskripsi'],
                                'penjelasan' => $row['penjelasan'],
                                'cf' => $cf_hasil
                            ];
                        }
                    }
                }

                // Urutkan hasil dari CF tertinggi ke terendah
                uasort($hasil, function($a, $b) {
                    return $b['cf'] <=> $a['cf'];
                });

                echo "<h2>🌾 Hasil Rekomendasi Pupuk</h2>";

                foreach ($hasil as $id_solusi => $data) {
                    echo "<div class='result-card'>
                            <b>{$data['deskripsi']}</b><br>
                            <p style='margin-top:8px; font-size:0.95em; color:#d4ffd4; line-height:1.6;'>
                                {$data['penjelasan']}
                            </p>
                            <span class='cf-value'>Nilai CF: " . round($data['cf'], 2) . "</span>
                          </div>";
                }

                echo "<a href='gejala.php' class='btn'>⬅️ Kembali ke Gejala</a>";
                echo "<a href='menu_utama.php' class='btn'>🏠 Menu Utama</a>";

            } else {
                echo "<div class='empty-msg'>
                        <p>⚠️ Kamu belum memilih gejala apapun.</p>
                      </div>
                      <a href='gejala.php' class='btn'>⬅️ Kembali ke Gejala</a>";
            }
            ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
