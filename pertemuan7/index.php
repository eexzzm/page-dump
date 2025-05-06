<?php
require_once 'config/db.php';

$query = "SELECT * FROM mahasiswa ORDER BY npm";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="./mahasiswa/index.php">Tambah Mahasiswa</a>

    <table border="1" cellpading="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['npm'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <a href="edit.php?npm=<?= $row['npm'] ?>">Edit</a>
                        | 
                        <a href="delete.php?npm=<?= $row['npm'] ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            
        </tbody>
    </table>

</body>
</html>