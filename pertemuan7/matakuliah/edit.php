<?php
require_once '../config/db.php';
session_start();

$kodemk = $_GET['kodemk'];
$result = $conn->query("SELECT * FROM matakuliah WHERE kodemk='$kodemk'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <form action="editPro.php" method="POST">
            <input type="hidden" name="old_kodemk" value="<?= $row['kodemk'] ?>">

            <div class="mb-3">
                <label for="kodemkInput" class="form-label">Kode MK</label>
                <input type="text" class="form-control" id="kodemkInput" name="kodemk" value="<?= $row['kodemk'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="namaInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="namaInput" name="nama" value="<?= $row['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_sksInput" class="form-label">Jumlah SKS</label>
                <input type="text" class="form-control" id="jumlah_sksInput" name="jumlah_sks" value="<?= $row['jumlah_sks'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="../index.php" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</body>
</html>