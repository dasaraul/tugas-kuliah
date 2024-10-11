<?php
// Mulai session untuk cek status login
session_start();

// Include file konfigurasi database dan fungsi CRUD
include('config/database.php');
include('functions.php');

// Ambil semua tugas dari database
$tugas = tampilkanTugas($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas Kuliah</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>Daftar Tugas Kuliah</h1>
        <?php if(isset($_SESSION['admin'])): ?>
            <a href="auth/logout.php" class="btn">Logout</a>
        <?php endif; ?>
    </header>

    <main>
        <h2>List Tugas</h2>

        <?php if ($tugas->num_rows > 0): ?>
            <ul class="tugas-list">
                <?php while ($row = $tugas->fetch_assoc()): ?>
                    <li>
                        <strong><?= $row['nama_tugas']; ?></strong> - <?= $row['mata_kuliah']; ?>
                        <a href="assets/uploads/<?= $row['file_tugas']; ?>" target="_blank" class="btn">Download</a>
                        <?php if(isset($_SESSION['admin'])): ?>
                            <a href="admin/edit.php?id=<?= $row['id']; ?>" class="btn">Edit</a>
                            <a href="#" onclick="confirmDelete(<?= $row['id']; ?>)" class="btn">Hapus</a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Tidak ada tugas yang ditemukan.</p>
        <?php endif; ?>
    </main>

    <footer>
        <center><p>&copy; 2024 Tugas Kuliah</p></center>
    </footer>

    <script>
        // Fungsi untuk konfirmasi hapus menggunakan sweetalert
        function confirmDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Tugas yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `admin/delete.php?id=${id}`;
                }
            });
        }
    </script>
</body>
</html>
