<?php
include 'config.php';
include 'auth.php'; // Pastikan admin sudah login

// Mendapatkan ID tugas yang akan diedit
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Mengambil data tugas
$stmt = $conn->prepare("SELECT * FROM tugas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    echo "Tugas tidak ditemukan.";
    exit();
}

$tugas = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_mat
