<?php
require_once '../config/db.php';
session_start();

if (!isset($_GET['npm'])) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
    exit;
}

$npm = $_GET['npm'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE npm = '$npm'");
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
  <title>Hapus Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <div class="alert alert-warning">
    <h4>Apakah Anda yakin ingin menghapus data ini?</h4>
    <ul>
      <li><strong>NPM:</strong> <?= $data['npm'] ?></li>
      <li><strong>Nama:</strong> <?= $data['nama'] ?></li>
      <li><strong>Jurusan:</strong> <?= $data['jurusan'] ?></li>
      <li><strong>Alamat:</strong> <?= $data['alamat'] ?></li>
    </ul>

    <form action="deletePro.php" method="POST">
      <input type="hidden" name="npm" value="<?= $data['npm'] ?>">
      <button type="submit" class="btn btn-danger">Ya, Hapus</button>
      <a href="../index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
