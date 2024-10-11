<?php
require '../config/database.php';
require '../functions/tugas.php';

$id = $_GET['id'];
$tugas = getTugasById($id, $conn);

if (isset($_POST['submit'])) {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $file_tugas = uploadFile();

    updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn);
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama_tugas" value="<?= $tugas['nama_tugas']; ?>" required>
    <input type="text" name="mata_kuliah" value="<?= $tugas['mata_kuliah']; ?>" required>
    <input type="file" name="file_tugas">
    <button type="submit" name="submit">Edit Tugas</button>
</form>
