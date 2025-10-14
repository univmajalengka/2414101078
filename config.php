<?php
$host = "localhost";
$user = "tugaspabw_2414101078"; 
$pass = "tugaspabw_2414101078";
$db   = "tugaspabw_2414101078";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
