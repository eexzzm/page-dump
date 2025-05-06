<?php
require_once '../config/db.php';
session_start();

$id = $_POST['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM krs WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data KRS berhasil dihapus.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus data: " . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "ID tidak valid.";
    $_SESSION['message_type'] = "warning";
}

$conn->close();
header("Location: krs.php");
exit;
