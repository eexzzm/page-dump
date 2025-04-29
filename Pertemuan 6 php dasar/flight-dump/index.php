<?php
include 'pajak.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Pendaftaran Penerbangan</title>
  <style>
    body { font-family: sans-serif; max-width: 600px; margin: auto; padding: 1rem; color: #493628; background-color: #D6C0B3 ; }
    label { display: block; margin-top: 1rem; }
    input, select { width: 100%; padding: 0.5rem; margin-top: 0.5rem; }
    button { margin-top: 1.5rem; padding: 0.7rem 1.2rem; }
  </style>
</head>
<body>

    <h1 style="text-align: center; color: #2c3e50; font-size: 28px; margin-bottom: 20px;">
      Pendaftaran Rute Penerbangan
    </h1>

  <form action="process.php" method="POST">
    <label for="tanggal">Tanggal Penerbangan</label>
    <input type="date" name="tanggal" required>

    <label for="maskapai">Nama Maskapai</label>
    <input type="text" name="maskapai" required>

    <label for="asal">Bandara Asal</label>
    <select name="asal" required>
      <option value="">-- Pilih Bandara Asal --</option>
      <?php foreach ($bandara_asal as $nama => $pajak): ?>
        <option value="<?= $nama ?>"><?= $nama ?></option>
      <?php endforeach; ?>
    </select>

    <label for="tujuan">Bandara Tujuan</label>
    <select name="tujuan" required>
      <option value="">-- Pilih Bandara Tujuan --</option>
      <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
        <option value="<?= $nama ?>"><?= $nama ?></option>
      <?php endforeach; ?>
    </select>

    <label for="harga">Harga Tiket Dasar (Rp)</label>
    <input type="number" name="harga" required min="0">

    <div style="text-align: center;">
      <button type="submit">Kirim</button>
    </div>

  </form>

</body>
</html>
