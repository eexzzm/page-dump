<?php 
require_once '../config/db.php';


// Get values from form
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $npm, $nama, $jurusan, $alamat); // s = string (all 3 are string)

// Execute the statement
if ($stmt->execute()) {
    echo "Data berhasil ditambahkan dengan aman!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>