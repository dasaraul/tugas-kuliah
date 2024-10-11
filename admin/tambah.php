<?php
session_start();
include('../config/database.php');
include('../functions/auth.php');
include('../functions/tugas.php');

// Cek apakah user sudah login, kalau belum arahkan ke login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Proses penambahan tugas jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];

    // Cek apakah ada file yang di-upload
    if (isset($_FILES['file_tugas']) && !empty($_FILES['file_tugas']['name'][0])) {
        $total_files = count($_FILES['file_tugas']['name']);
        
        // Batasi jumlah maksimal file yang bisa di-upload menjadi 5
        if ($total_files > 5) {
            $error = 'Maksimal 5 file yang bisa di-upload sekaligus.';
        } else {
            // Loop untuk setiap file yang di-upload
            for ($i = 0; $i < $total_files; $i++) {
                $file_name = $_FILES['file_tugas']['name'][$i];
                $file_tmp = $_FILES['file_tugas']['tmp_name'][$i];

                // Panggil fungsi untuk upload file dan simpan nama filenya ke database
                $uploaded_file_name = uploadMultipleFiles($file_name, $file_tmp);

                if ($uploaded_file_name) {
                    tambahTugas($nama_tugas, $mata_kuliah, $uploaded_file_name, $conn);
                }
            }
            header('Location: dashboard.php?status=added');
            exit();
        }
    } else {
        $error = 'Pilih minimal 1 file untuk di-upload.';
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
                <label for="file_tugas">File Tugas (Maksimal 5 file)</label>
                <input type="file" name="file_tugas[]" multiple required>
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
