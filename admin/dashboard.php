<?php
session_start();
include('../config/database.php');
include('../functions.php');

// Cek apakah user sudah login sebagai admin, kalau belum arahkan ke login
if (!isset($_SESSION['admin'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil semua tugas untuk ditampilkan di dashboard admin
$tugas = tampilkanTugas($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>Dashboard Admin</h1>
        <div class="header-actions">
            <a href="../auth/logout.php" class="btn">Logout</a>
            <a href="tambah.php" class="btn">Tambah Tugas</a>
        </div>
    </header>

    <main>
        <h2>List Tugas</h2>
        <?php if ($tugas->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama Tugas</th>
                        <th>Mata Kuliah</th>
                        <th>File Tugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $tugas->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['nama_tugas']; ?></td>
                            <td><?= $row['mata_kuliah']; ?></td>
                            <td><a href="../assets/uploads/<?= $row['file_tugas']; ?>" target="_blank" class="btn">Download</a></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn">Edit</a>
                                <a href="#" onclick="confirmDelete(<?= $row['id']; ?>)" class="btn">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada tugas yang ditemukan.</p>
        <?php endif; ?>
    </main>

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
                    window.location.href = `delete.php?id=${id}`;
                }
            });
        }
    </script>
</body>
</html>
