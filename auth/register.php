<?php
require '../config/database.php';
require '../functions/auth.php';

if (isset($_POST['register'])) {
    $unique_key = $_POST['unique_key'];
    if ($unique_key !== 'jawalu') {
        echo "Unique key salah. Hubungi developer di WhatsApp 082210819939.";
        exit();
    }

    registerAdmin($_POST['username'], $_POST['password'], $conn);
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="unique_key" placeholder="Masukkan Unique Key" required>
    <button type="submit" name="register">Register</button>
</form>
