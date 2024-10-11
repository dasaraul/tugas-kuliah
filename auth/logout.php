<?php
session_start();
session_destroy(); // Hapus session yang ada, artinya user akan logout
header('Location: ../index.php'); // Arahkan kembali ke halaman utama setelah logout
exit();
?>
