<?php
session_start();
session_destroy(); // Hapus session
header('Location: ../index.php'); // Arahkan kembali ke halaman utama
exit();
?>
