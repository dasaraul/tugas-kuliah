<?php
require '../config/database.php';
require '../functions/tugas.php';

if (isset($_POST['submit'])) {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $file_tugas = uploadFile();

    tambahTugas($nama_tugas, $mata_kuliah, $file_tugas, $conn);
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama_tugas" placeholder="Nama Tugas" required>
    <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" required>
    <input type="file" name="file_tugas" required>
    <button type="submit" name="submit">Tambah Tugas</button>
</form>
