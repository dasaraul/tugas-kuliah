<?php
include 'config.php';

// Mengambil semua data tugas
$sql = "SELECT * FROM tugas ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Tugas Kuliah</h2>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="me-3">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary me-2">Login Admin</a>
                <a href="register.php" class="btn btn-success">Registrasi Admin</a>
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Tugas</a>
    <?php endif; ?>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Deskripsi</th>
                    <th>File Tugas</th>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($row['nama_matkul']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td>
                            <a href="download.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Unduh</a>
                        </td>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">Hapus</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Tidak ada tugas yang ditemukan.</p>
    <?php endif; ?>
</div>
</body>
</html>
