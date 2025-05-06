<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <form action="create.php" method="POST">
    <label>NPM:</label>
    <input type="text" name="npm" required><br>

    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Jurusan:</label>
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Operasi">Sistem Operasi</option>
    </select><br>

    <label>Alamat:</label>
    <input type="text" name="alamat" required><br>

    <button type="submit">Submit</button>
    </form>
</body>
</html>