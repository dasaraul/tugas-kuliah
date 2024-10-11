<?php
include 'config.php';

// Cek apakah admin sudah login
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$unique_key_provided = "jawalu"; // Unique Key yang diberikan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $unique_key = trim($_POST['unique_key']);

    // Validasi Unique Key
    if ($unique_key !== $unique_key_provided) {
        $error = "Unique Key salah. Hubungi developer di WhatsApp 082210819939 untuk mendapatkan Unique Key.";
    } else {
        // Cek apakah username sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Username sudah digunakan. Silakan pilih username lain.";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user baru
            $stmt_insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $username, $hashed_password);

            if ($stmt_insert->execute()) {
                echo "<script>alert('Registrasi berhasil. Silakan login.');window.location.href='login.php';</script>";
                exit();
            } else {
                $error = "Terjadi kesalahan saat registrasi. Coba lagi.";
            }

            $stmt_insert->close();
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Registrasi Admin</h2>
    <p>Untuk mendaftar sebagai admin, silakan hubungi developer di nomor WhatsApp <a href="https://wa.me/6282210819939" target="_blank">082210819939</a> untuk
