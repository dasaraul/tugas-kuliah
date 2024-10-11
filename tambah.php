<?php
include 'config.php';
include 'auth.php'; // Pastikan admin sudah login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_matkul = $_POST['nama_matkul'];
    $deskripsi = $_POST['deskripsi'];

    // Mengelola upload file
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES["file_tugas"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa jenis file (opsional)
    $allowed_types = ['pdf', 'doc', 'docx', 'zip', 'rar'];
    if (!in_array($fileType, $allowed_types)) {
        echo "<script>alert('Jenis file tidak diizinkan.');window.location.href='tambah.php';</script>";
        $uploadOk = 0;
    }

    // Memeriksa apakah upload berhasil
    if ($uploadOk && move_uploaded_file($_FILES["file_tugas"]["tmp_name"], $target_file)) {
        // Menyimpan data ke database
        $stmt = $conn->prepare("INSERT INTO tugas (nama_matkul, deskripsi, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_matkul, $deskripsi, $target_file);

        if ($stmt->execute()) {
            echo "<script>alert('Tugas berhasil ditambahkan.');window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Gagal mengunggah file.');window.location.href='tambah.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Tugas Kuliah</h2>
    <form action="tambah.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Tugas</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file_tugas" class="form-label">File Tugas</label>
            <input class="form-control" type="file" id="file_tugas" name="file_tugas" required>
            <div class="form-text">Jenis file yang diizinkan: PDF, DOC, DOCX, ZIP, RAR.</div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
