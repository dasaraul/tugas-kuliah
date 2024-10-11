<?php
function registerAdmin($username, $password, $conn) {
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
    $conn->query($sql);
}

function loginAdmin($username, $password, $conn) {
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['admin'] = $user['username'];
        header("Location: ../admin/dashboard.php");
    } else {
        echo "Login gagal.";
    }
}
?>
