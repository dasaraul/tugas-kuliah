
#### **admin/delete.php**
```php
<?php
session_start();
include('../config/database.php');

// Cek apakah user sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Hapus tugas berdasarkan ID
$id = $_GET['id'];
$sql = "DELETE FROM tugas WHERE id=$id";

if ($conn->query($sql)) {
    header('Location: dashboard.php'); // Arahkan kembali ke dashboard setelah dihapus
    exit();
} else {
    echo "Gagal menghapus tugas.";
}
?>
