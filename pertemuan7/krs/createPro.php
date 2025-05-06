    <?php
    require_once '../config/db.php';
    session_start();

    $mahasiswa_npm = $_POST['mahasiswa_npm'] ?? '';
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'] ?? '';

    if ($mahasiswa_npm && $matakuliah_kodemk) {
        $stmt = $conn->prepare("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
        $stmt->bind_param("ss", $mahasiswa_npm, $matakuliah_kodemk);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Data KRS berhasil ditambahkan.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Gagal menambahkan data: " . $conn->error;
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
