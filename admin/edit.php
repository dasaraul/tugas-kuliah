<?php
session_start();
include('../config/database.php');
include('../functions.php');

// Cek apakah user sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil data tugas berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM tugas WHERE id=$id";
$result = $conn->query($sql);
$tugas = $result->fetch_assoc();

// Proses update tugas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $file_tugas = $_FILES['file_tugas']['name'] ? uploadFile() : $tugas['file_tugas']; // Cek jika ada file baru yang di-upload

    updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn);
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Edit Tugas</h1>
        <a href="dashboard.php" class="btn">Kembali</a>
    </header>

    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nama_tugas">Nama Tugas</label>
                <input type="text" name="nama_tugas" value="<?php echo $tugas['nama_tugas']; ?>" required>
            </div>
            <div>
                <label for="mata_kuliah">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" value="<?php echo $tugas['mata_kuliah']; ?>" required>
            </div>
            <div>
                <label for="file_tugas">File Tugas</label>
                <input type="file" name="file_tugas">
                <p>File saat ini: <?php echo $tugas['file_tugas']; ?></p>
            </div>
            <div>
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </main>
</body>
</html>
