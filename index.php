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
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Hubungkan ke file CSS -->
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
            <ul>
                <?php while ($row = $tugas->fetch_assoc()): ?>
                    <li>
                        <strong><?php echo $row['nama_tugas']; ?></strong> - <?php echo $row['mata_kuliah']; ?>
                        <a href="assets/uploads/<?php echo $row['file_tugas']; ?>" target="_blank" class="btn">Download</a>
                        <?php if(isset($_SESSION['admin'])): ?>
                            <a href="admin/edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                            <a href="admin/delete.php?id=<?php echo $row['id']; ?>" class="btn">Hapus</a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Tidak ada tugas yang ditemukan.</p>
        <?php endif; ?>
    </main>

    <footer>
        <center><p>&copy; 2024 Tugas Kuliah</p>
    </footer>
</body>
</html>
