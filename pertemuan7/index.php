<?php
require_once 'config/db.php';
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kajung</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./krs/krs.php">KRS</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">


        <div class="d-grid gap-3">
            <h1>Daftar Mahasiswa</h1>
    
            <div class="containerm">
                <a href="./mahasiswa/create.php" class='btn btn-sm btn-success'>Add</a>
            </div>
    
            <?php
            session_start();
            ?>

            <?php 
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            endif;
            ?>
    
    
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
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
                            $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
                            foreach ($query as $row) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?=$row['npm']?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['jurusan']?></td>
                                    <td><?=$row['alamat']?></td>
                                    <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <a href="./mahasiswa/edit.php?npm=<?=$row['npm']?>" class='btn btn-sm btn-warning'>Edit</a>
                                        <a href="./mahasiswa/delete.php?npm=<?=$row['npm']?>" class='btn btn-sm btn-danger'>Delete</a>
                                    </div>
                                    </td>
                                </tr>    
                                <?php
                            }   
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-grid gap-3">
            <h1>Daftar Mata Kuliah</h1>
    
            <div class="containerm">
                <a href="./matakuliah/create.php" class='btn btn-sm btn-success'>Add</a>
            </div>
    
            <?php 
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            endif;
            ?>
    
    
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama</th>
                            <th>Jumlah SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            $no = 1;
                            $query = mysqli_query($conn, "SELECT * FROM matakuliah");
                            foreach ($query as $row) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?=$row['kodemk']?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['jumlah_sks']?></td>
                                    <td>
                                    <div class="btn-group d-flex justify-content-center">
                                        <a href="./matakuliah/edit.php?kodemk=<?=$row['kodemk']?>" class='btn btn-sm btn-warning'>Edit</a>
                                        <a href="./matakuliah/delete.php?kodemk=<?=$row['kodemk']?>" class='btn btn-sm btn-danger'>Delete</a>
                                    </div>
                                    </td>
                                </tr>    
                                <?php
                            }   
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>