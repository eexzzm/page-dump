<?php
require_once '../config/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kajung</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">KRS</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="mb-4">Data KRS</h2>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>

        <a href="create.php" class="btn btn-success btn-sm mb-3">Add</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Mata Kuliah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT krs.id, mhs.nama AS mahasiswa_nama, mk.nama AS matakuliah_nama, mk.jumlah_sks
                            FROM krs
                            JOIN mahasiswa mhs ON krs.mahasiswa_npm = mhs.npm
                            JOIN matakuliah mk ON krs.matakuliah_kodemk = mk.kodemk";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()):
                        $nama = htmlspecialchars($row['mahasiswa_nama']);
                        $matkul = htmlspecialchars($row['matakuliah_nama']);
                        $sks = (int) $row['jumlah_sks'];
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $matkul ?></td>
                        <td>
                            <span class="text-danger fw-semibold"><?= $nama ?></span>
                            Mengambil Mata Kuliah 
                            <span class="text-primary fw-semibold"><?= $matkul ?></span>
                            (<?= $sks ?> SKS)
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="./edit.php?id=<?=$row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="./delete.php?id=<?=$row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>    
            </table>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
