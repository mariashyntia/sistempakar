<<<<<<< HEAD
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sistempakar";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
=======
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sistempakar";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
