<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5">
        <form action="createPro.php" method="POST">
            <div class="mb-3">
                <label for="npmInput" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npmInput" name="npm" required>
            </div>
            
            <div class="mb-3">
                <label for="namaInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="namaInput" name="nama" required>
            </div>
            
            <div class="mb-3">
                <label for="jurusanSelect" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusanSelect" name="jurusan">
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="alamatInput" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamatInput" name="alamat" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="../index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    </div>

    
</body>
</html>