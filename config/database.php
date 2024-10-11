<?php
// Pengaturan koneksi database
$host = 'localhost';
$user = 'root';  // Default untuk XAMPP
$password = '';  // Default untuk XAMPP
$dbname = 'db_tugas_kuliah';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek jika koneksi gagal
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
