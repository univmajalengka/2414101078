<?php
session_start();
if (empty($_SESSION["is_admin"])) {
  header("Location: login.php");
  exit;
}

require_once "../db.php";

$id = (int)($_POST["id"] ?? 0);
$status = trim($_POST["status"] ?? "");

$allowed = ["pending","confirmed","cancelled"];
if ($id < 1 || !in_array($status, $allowed, true)) {
  http_response_code(400);
  exit("Data tidak valid");
}

$stmt = $conn->prepare("UPDATE orders SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: admin.php");
exit;