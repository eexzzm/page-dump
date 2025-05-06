<?php 
session_start(); 
require_once '../config/db.php';


$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$stmt = $conn->prepare("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $npm, $nama, $jurusan, $alamat);

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
