<?php
session_start();
include('../config/database.php');

// Proses login jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah user ada di database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password yang diinput dengan yang ada di database
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin'] = $username; // Set session untuk admin
            header('Location: ../admin/dashboard.php'); // Arahkan ke dashboard admin
            exit();
        } else {
            $error = 'Password salah';
        }
    } else {
        $error = 'Username tidak ditemukan';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Login Admin</h1>
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
            <?php if (isset($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div>
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </main>
</body>
</html>
