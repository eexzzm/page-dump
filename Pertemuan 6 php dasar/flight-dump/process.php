<?php
// Ambil data bandara dan pajak
include 'pajak.php';

// Ambil data dari form
$tanggal   = $_POST['tanggal'] ?? '';
$maskapai  = $_POST['maskapai'] ?? '';
$asal      = $_POST['asal'] ?? '';
$tujuan    = $_POST['tujuan'] ?? '';
$harga     = (int) ($_POST['harga'] ?? 0);

// Ambil pajak dari masing-masing bandara
$pajak_asal   = $bandara_asal[$asal] ?? 0;
$pajak_tujuan = $bandara_tujuan[$tujuan] ?? 0;

// Hitung pajak dan total harga
$total_pajak     = $pajak_asal + $pajak_tujuan;
$total_harga     = $harga + $total_pajak;

// Tampilkan hasil
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pendaftaran</title>
  <style>
    body { font-family: sans-serif; max-width: 600px; margin: auto; padding: 1rem; color: #493628 ; background-color: #D6C0B3 ; }
    table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
    th, td { border: 1px solid #ccc; padding: 0.8rem; text-align: left; }
    th { background-color: #f0f0f0; }
  </style>
</head>
<body>

    <h1 style="text-align: center; color: #2c3e50; font-size: 28px; margin-bottom: 20px;">
      Data Penerbangan
    </h1>

  <table>
    <tr>
      <th>No</th>
      <td>1</td>
    </tr>
    <tr>
      <th>Tanggal</th>
      <td><?= htmlspecialchars($tanggal) ?></td>
    </tr>
    <tr>
      <th>Maskapai</th>
      <td><?= htmlspecialchars($maskapai) ?></td>
    </tr>
    <tr>
      <th>Asal Penerbangan</th>
      <td><?= htmlspecialchars($asal) ?> (Rp<?= number_format($pajak_asal, 0, ',', '.') ?>)</td>
    </tr>
    <tr>
      <th>Tujuan Penerbangan</th>
      <td><?= htmlspecialchars($tujuan) ?> (Rp<?= number_format($pajak_tujuan, 0, ',', '.') ?>)</td>
    </tr>
    <tr>
      <th>Harga Tiket</th>
      <td>Rp<?= number_format($harga, 0, ',', '.') ?></td>
    </tr>
    <tr>
      <th>Total Pajak</th>
      <td>Rp<?= number_format($total_pajak, 0, ',', '.') ?></td>
    </tr>
    <tr>
      <th>Total Harga Tiket</th>
      <td><strong>Rp<?= number_format($total_harga, 0, ',', '.') ?></strong></td>
    </tr>
  </table>

</body>
</html>
