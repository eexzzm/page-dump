<?php
require_once '../config/db.php';
session_start();

// Ambil data mahasiswa
$mahasiswa = $conn->query("SELECT npm, nama FROM mahasiswa ORDER BY nama ASC");

// Ambil data matakuliah
$matakuliah = $conn->query("SELECT kodemk, nama FROM matakuliah ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Tambah Data KRS</h2>
    <form action="createPro.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="mahasiswa_npm" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_npm" id="mahasiswa_npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php while ($mhs = $mahasiswa->fetch_assoc()): ?>
                    <option value="<?= $mhs['npm'] ?>"><?= $mhs['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="matakuliah_kodemk" class="form-label">Mata Kuliah</label>
            <select name="matakuliah_kodemk" id="matakuliah_kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php while ($mk = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $mk['kodemk'] ?>"><?= $mk['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
