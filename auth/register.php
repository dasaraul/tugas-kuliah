<?php
session_start();
include('../config/database.php');

// Proses registrasi jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $unique_key = $_POST['unique_key'];

    // Cek apakah kunci unik sesuai
    if ($unique_key === 'jawalu') {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password

        // Simpan user baru di database
        $sql = "INSERT INTO users (username, password, unique_key) VALUES ('$username', '$hashed_password', '$unique_key')";
        if ($conn->query($sql)) {
            $_SESSION['admin'] = $username;
            header('Location: ../admin/dashboard.php');
            exit();
        } else {
            $error = 'Gagal registrasi';
        }
    } else {
        $error = 'Kunci unik salah, hubungi pengembang di WhatsApp 082210819939';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Registrasi Admin</h1>
    </header>

    <main>
        <form action="" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="unique_key">Kunci Unik</label>
                <input type="text" name="unique_key" required>
                <p>Hubungi pengembang di WhatsApp 082210819939 untuk mendapatkan kunci unik.</p>
            </div>
            <?php if (isset($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div>
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </main>
</body>
</html>
