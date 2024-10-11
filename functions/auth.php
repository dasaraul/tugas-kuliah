<?php
// Function untuk melakukan registrasi admin baru
function registerAdmin($username, $password, $conn) {
    // Hash password menggunakan BCRYPT untuk keamanan
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    // Query untuk memasukkan data user baru ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
    $conn->query($sql);
}

// Function untuk login admin
function loginAdmin($username, $password, $conn) {
    // Query untuk mengambil data user berdasarkan username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    // Verifikasi password yang diinput dengan password yang ada di database
    if (password_verify($password, $user['password'])) {
        session_start(); // Mulai session untuk menyimpan data login
        $_SESSION['admin'] = $user['username']; // Simpan username di session
        header("Location: ../admin/dashboard.php"); // Arahkan ke dashboard admin
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        echo "Login gagal.";
    }
}
?>
