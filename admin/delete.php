<?php
session_start();
include('../config/database.php');

// Cek apakah user sudah login, kalau belum arahkan ke login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Hapus tugas berdasarkan ID yang didapat dari parameter URL
$id = $_GET['id'];
$sql = "DELETE FROM tugas WHERE id=$id";

if ($conn->query($sql)) {
    // Redirect ke dashboard setelah berhasil menghapus
    header('Location: dashboard.php?status=deleted');
    exit();
} else {
    echo "Gagal menghapus tugas.";
}
?>
