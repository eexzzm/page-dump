<?php
require_once '../config/db.php';
session_start();

$id = $_POST['id'] ?? null;
$mahasiswa_npm = $_POST['mahasiswa_npm'] ?? '';
$matakuliah_kodemk = $_POST['matakuliah_kodemk'] ?? '';

if ($id && $mahasiswa_npm && $matakuliah_kodemk) {
    $stmt = $conn->prepare("UPDATE krs SET mahasiswa_npm = ?, matakuliah_kodemk = ? WHERE id = ?");
    $stmt->bind_param("ssi", $mahasiswa_npm, $matakuliah_kodemk, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data KRS berhasil diperbarui.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal memperbarui data: " . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "Semua field wajib diisi.";
    $_SESSION['message_type'] = "warning";
}

$conn->close();
header("Location: krs.php");
exit;
