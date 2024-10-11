<?php
// Pengaturan koneksi database
$host = 'localhost'; // Alamat server database
$user = 'root';      // Username untuk koneksi ke database, defaultnya root untuk XAMPP
$password = '';      // Password untuk koneksi ke database, defaultnya kosong untuk XAMPP
$dbname = 'db_tugas_kuliah'; // Nama database yang digunakan

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek jika koneksi gagal, tampilkan pesan error
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
