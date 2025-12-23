<?php
session_start();
if (empty($_SESSION["is_admin"])) { header("Location: login.php"); exit; }

require_once "../db.php";

$id      = (int)($_POST["id"] ?? 0);
$nama    = trim($_POST["nama"] ?? "");
$tanggal = $_POST["tanggal"] ?? "";
$tamu    = (int)($_POST["tamu"] ?? 0);
$paket   = trim($_POST["paket"] ?? "");
$catatan = trim($_POST["catatan"] ?? "");
$status  = trim($_POST["status"] ?? "");

$allowed = ["pending","confirmed","cancelled"];

if ($id < 1 || $nama === "" || $tanggal === "" || $tamu < 1 || $paket === "" || !in_array($status, $allowed, true)) {
  http_response_code(400);
  exit("Data tidak valid.");
}

$stmt = $conn->prepare("UPDATE orders SET nama=?, tanggal=?, tamu=?, paket=?, catatan=?, status=? WHERE id=?");
$stmt->bind_param("ssisssi", $nama, $tanggal, $tamu, $paket, $catatan, $status, $id);
$stmt->execute();

header("Location: admin.php");
exit;