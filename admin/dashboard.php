<?php
require '../config/database.php';
require '../functions/tugas.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

$list_tugas = tampilkanTugas($conn);
foreach ($list_tugas as $tugas) {
    echo "<a href='../uploads/" . $tugas['file_tugas'] . "'>" . $tugas['nama_tugas'] . "</a>";
    echo "<a href='edit_tugas.php?id=" . $tugas['id'] . "'>Edit</a>";
    echo "<a href='hapus_tugas.php?id=" . $tugas['id'] . "'>Hapus</a><br>";
}
?>

<a href="tambah_tugas.php">Tambah Tugas</a>
<a href="../auth/logout.php">Logout</a>
