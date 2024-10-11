<?php
session_start();
include('../config/database.php');
include('../functions.php');

// Cek apakah user sudah login, kalau belum arahkan ke login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Proses penambahan tugas jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $file_tugas = uploadFile();

    // Simpan tugas baru ke database
    $sql = "INSERT INTO tugas (nama_tugas, mata_kuliah, file_tugas) VALUES ('$nama_tugas', '$mata_kuliah', '$file_tugas')";
    if ($conn->query($sql)) {
        header('Location: dashboard.php?status=added');
        exit();
    } else {
        $error = 'Gagal menambahkan tugas';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Tugas</h1>
        <a href="dashboard.php" class="btn">Kembali</a>
    </header>

    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nama_tugas">Nama Tugas</label>
                <input type="text" name="nama_tugas" required>
            </div>
            <div>
                <label for="mata_kuliah">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" required>
            </div>
            <div>
                <label for="file_tugas">File Tugas</label>
                <input type="file" name="file_tugas" required>
            </div>
            <?php if (isset($error)): ?>
                <p style="color:red;"><?= $error; ?></p>
            <?php endif; ?>
            <div>
                <button type="submit" class="btn">Tambah</button>
            </div>
        </form>
    </main>
</body>
</html>
