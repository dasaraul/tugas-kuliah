<?php
require '../config/database.php';
require '../functions/tugas.php';

$list_tugas = tampilkanTugas($conn);
foreach ($list_tugas as $tugas) {
    echo "<a href='../uploads/" . $tugas['file_tugas'] . "'>" . $tugas['nama_tugas'] . "</a><br>";
}
?>
