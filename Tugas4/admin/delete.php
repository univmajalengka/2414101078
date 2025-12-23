<?php
session_start();
if (empty($_SESSION["is_admin"])) {
  header("Location: logini.php");
  exit;
}

require_once "../db.php";

$id = (int)($_POST["id"] ?? 0);
if ($id < 1) {
  http_response_code(400);
  exit("ID tidak valid");
}

$stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: admin.php");
exit;