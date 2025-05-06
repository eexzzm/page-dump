<?php
require_once '../config/db.php';
session_start();

// Get npm from URL
$npm = $_GET['npm'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE npm='$npm'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <form action="editPro.php" method="POST">
            <input type="hidden" name="old_npm" value="<?= $row['npm'] ?>">

            <div class="mb-3">
                <label for="npmInput" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npmInput" name="npm" value="<?= $row['npm'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="namaInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="namaInput" name="nama" value="<?= $row['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="jurusanSelect" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusanSelect" name="jurusan">
                    <option value="Informatika" <?= $row['jurusan'] == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                    <option value="Sistem Informasi" <?= $row['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamatInput" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamatInput" name="alamat" value="<?= $row['alamat'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="../index.php" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</body>
</html>