<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$kucing = $_POST['kucing'];
$harga = $_POST['harga'];

$conn->query("INSERT INTO pembeli (nama, kucing, harga) VALUES ('$nama', '$kucing', '$harga')");
header("Location: index.php");
?>
