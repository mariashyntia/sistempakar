<?php include 'db/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gejala dan Solusi</title>
</head>
<body>
    <h2>Data Gejala dan Solusi</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Kode Gejala</th>
            <th>Nama Gejala</th>
            <th>Solusi</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT g.kode_gejala, g.nama_gejala, s.deskripsi 
                                         FROM aturan a
                                         JOIN gejala g ON a.id_gejala = g.id_gejala
                                         JOIN solusi s ON a.id_solusi = s.id_solusi");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>{$data['kode_gejala']}</td>
                    <td>{$data['nama_gejala']}</td>
                    <td>{$data['deskripsi']}</td>
                 </tr>";
        }
        ?>
    </table>
</body>
</html>
