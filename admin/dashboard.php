<?php
session_start();
include('../config/database.php');
include('../functions.php');

// Cek apakah user sudah login sebagai admin
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
</head>
<body>
    <header>
        <h1>Dashboard Admin</h1>
        <a href="../auth/logout.php" class="btn">Logout</a>
        <a href="tambah.php" class="btn">Tambah Tugas</a>
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
                            <td><?php echo $row['nama_tugas']; ?></td>
                            <td><?php echo $row['mata_kuliah']; ?></td>
                            <td><a href="../assets/uploads/<?php echo $row['file_tugas']; ?>" target="_blank" class="btn">Download</a></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada tugas yang ditemukan.</p>
        <?php endif; ?>
    </main>
</body>
</html>
