<?php
require_once '../config/db.php';
session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    $_SESSION['message'] = "ID tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit;
}

// Ambil data untuk ditampilkan
$stmt = $conn->prepare("
    SELECT krs.id, mahasiswa.nama AS mahasiswa_nama, matakuliah.nama AS matakuliah_nama
    FROM krs 
    JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm 
    JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk 
    WHERE krs.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Konfirmasi Hapus</h2>
    <div class="alert alert-warning mt-4">
        <p>Apakah Anda yakin ingin menghapus data berikut?</p>
        <ul>
            <li><strong>Mahasiswa:</strong> <?= htmlspecialchars($data['mahasiswa_nama']) ?></li>
            <li><strong>Mata Kuliah:</strong> <?= htmlspecialchars($data['matakuliah_nama']) ?></li>
        </ul>
    </div>

    <form action="deletePro.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="krs.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
