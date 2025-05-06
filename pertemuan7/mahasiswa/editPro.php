<?php 
require_once '../config/db.php';
session_start();

// Get values from form
$old_npm = $_POST['old_npm'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

// Prepare update
$stmt = $conn->prepare("UPDATE mahasiswa SET npm = ?, nama = ?, jurusan = ?, alamat = ? WHERE npm = ?");
$stmt->bind_param("sssss", $npm, $nama, $jurusan, $alamat, $old_npm);

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
