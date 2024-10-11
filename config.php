<?php
session_start();

$host = "localhost"; // Host database Anda
$user = "root";      // Username database Anda
$pass = "";          // Password database Anda
$db   = "tugas_kuliah"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
