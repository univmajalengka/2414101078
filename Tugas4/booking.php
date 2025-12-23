<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  http_response_code(405);
  exit("Method not allowed");
}

$nama    = trim($_POST["nama"] ?? "");
$tanggal = $_POST["tanggal"] ?? "";
$tamu    = (int)($_POST["tamu"] ?? 0);
$paket   = trim($_POST["paket"] ?? "");
$catatan = trim($_POST["catatan"] ?? "");

// Validasi dasar
if ($nama === "" || $tanggal === "" || $tamu < 1 || $paket === "") {
  http_response_code(400);
  exit("Data tidak lengkap.");
}

// Aturan paket: max tamu + harga + pembayaran
$rules = [
  "Price List" => [
    "max_tamu" => 100,
    "harga" => 0,
    "pay_type" => "Bayar di tempat",
    "pay_status" => "Bayar di lokasi",
  ],
  "Paket 2" => [
    "max_tamu" => 3,
    "harga" => 200000, // ubah kalau mau pakai harga lain
    "pay_type" => "Bayar saat pesan",
    "pay_status" => "Menunggu pembayaran",
  ],
  "Paket 4" => [
    "max_tamu" => 5,
    "harga" => 250000, // ubah kalau mau pakai harga lain
    "pay_type" => "Bayar saat pesan",
    "pay_status" => "Menunggu pembayaran",
  ],
];

// Paket harus valid
if (!isset($rules[$paket])) {
  http_response_code(400);
  exit("Paket tidak valid.");
}

// Validasi batas tamu
$maxTamu = (int)$rules[$paket]["max_tamu"];
if ($tamu > $maxTamu) {
  http_response_code(400);
  exit("Jumlah tamu melebihi batas untuk $paket. Maksimal $maxTamu orang.");
}

// Hitung harga & total (server-side)
$harga = (int)$rules[$paket]["harga"];
$total = ($paket === "Price List") ? 0 : ($harga * $tamu); // kalau mau per paket, ubah logika ini

$pay_type   = $rules[$paket]["pay_type"];
$pay_status = $rules[$paket]["pay_status"];

// Simpan ke DB
$stmt = $conn->prepare("
  INSERT INTO orders (nama, tanggal, tamu, paket, catatan, harga, total, pay_type, pay_status)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("ssissiiss", $nama, $tanggal, $tamu, $paket, $catatan, $harga, $total, $pay_type, $pay_status);
$stmt->execute();

header("Location: sukses.php");
exit;