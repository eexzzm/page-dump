<?php
session_start();
include '../config/db.php';

$npm = $_POST['npm'] ?? '';

if (!$npm) {
    $_SESSION['flash_error'] = "NPM not provided.";
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM matakuliah WHERE npm = ?");
$stmt->bind_param("s", $npm);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['flash_success'] = "Data with NPM <strong>$npm</strong> deleted successfully.";
} else {
    $_SESSION['flash_error'] = "Failed to delete data. It may not exist.";
}

$stmt->close();
$conn->close();

header("Location: ../index.php");
exit;
