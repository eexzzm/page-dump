<?php 
session_start(); 
require_once '../config/db.php';


$kodemk = $_POST['kodemk'];
$nama = $_POST['nama'];
$jumlah_sks = $_POST['jumlah_sks'];

$stmt = $conn->prepare("INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $kodemk, $nama, $jumlah_sks);

if ($stmt->execute()) {
    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Gagal menambahkan data: " . $stmt->error;
    $_SESSION['message_type'] = "danger";
}

$stmt->close();
$conn->close();

header("Location: ../index.php");
exit;
?>
