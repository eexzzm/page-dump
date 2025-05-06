<?php 
require_once '../config/db.php';
session_start();

// Get values from form
$kodemk_baru = $_POST['kodemk']; 
$nama = $_POST['nama'];
$jumlah_sks = $_POST['jumlah_sks'];
$kodemk_lama = $_POST['kodemk_lama']; // tambahkan ini sebagai hidden input di form

// Prepare update
$stmt = $conn->prepare("UPDATE matakuliah SET kodemk = ?, nama = ?, jumlah_sks = ? WHERE kodemk = ?");
$stmt->bind_param("ssis", $kodemk_baru, $nama, $jumlah_sks, $kodemk_lama);

if ($stmt->execute()) {
    $_SESSION['message'] = "Data berhasil diperbarui.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Terjadi kesalahan saat mengubah data.";
    $_SESSION['message_type'] = "danger";
}

$stmt->close();
$conn->close();

header("Location: ../index.php");
exit;
