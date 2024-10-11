<?php
require '../config/database.php';
require '../functions/auth.php';

if (isset($_POST['login'])) {
    loginAdmin($_POST['username'], $_POST['password'], $conn);
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>
