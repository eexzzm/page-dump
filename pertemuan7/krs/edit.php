<?php
require_once '../config/db.php';
session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    $_SESSION['message'] = "ID tidak valid.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit;
}

// Ambil data KRS berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM krs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "warning";
    header("Location: index.php");
    exit;
}

// Ambil semua mahasiswa
$mahasiswa = $conn->query("SELECT npm, nama FROM mahasiswa ORDER BY nama ASC");

// Ambil semua matakuliah
$matakuliah = $conn->query("SELECT kodemk, nama FROM matakuliah ORDER BY nama ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Edit Data KRS</h2>
    <form action="editPro.php" method="POST" class="mt-4">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label for="mahasiswa_npm" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_npm" id="mahasiswa_npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php while ($mhs = $mahasiswa->fetch_assoc()): ?>
                    <option value="<?= $mhs['npm'] ?>" <?= $data['mahasiswa_npm'] === $mhs['npm'] ? 'selected' : '' ?>>
                        <?= $mhs['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="matakuliah_kodemk" class="form-label">Mata Kuliah</label>
            <select name="matakuliah_kodemk" id="matakuliah_kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php while ($mk = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $mk['kodemk'] ?>" <?= $data['matakuliah_kodemk'] === $mk['kodemk'] ? 'selected' : '' ?>>
                        <?= $mk['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="krs.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
