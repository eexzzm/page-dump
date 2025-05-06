<?php
require_once '../config/db.php';
session_start();

if (!isset($_GET['kodemk'])) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
    exit;
}

$kodemk = $_GET['kodemk'];
$result = $conn->query("SELECT * FROM matakuliah WHERE kodemk = '$kodemk'");
$data = $result->fetch_assoc();

if (!$data) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hapus Mata Kuliah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <div class="alert alert-warning">
    <h4>Apakah Anda yakin ingin menghapus data ini?</h4>
    <ul>
      <li><strong>kodemk:</strong> <?= $data['kodemk'] ?></li>
      <li><strong>Nama:</strong> <?= $data['nama'] ?></li>
      <li><strong>Jumlah SKS:</strong> <?= $data['jumlah_sks'] ?></li>
    </ul>

    <form action="deletePro.php" method="POST">
      <input type="hidden" name="kodemk" value="<?= $data['kodemk'] ?>">
      <button type="submit" class="btn btn-danger">Ya, Hapus</button>
      <a href="../index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
