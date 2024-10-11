<?php
// Fungsi untuk menampilkan semua tugas
function tampilkanTugas($conn) {
    $sql = "SELECT * FROM tugas";
    return $conn->query($sql);
}

// Fungsi untuk mengupdate tugas
function updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    $sql = "UPDATE tugas SET nama_tugas='$nama_tugas', mata_kuliah='$mata_kuliah', file_tugas='$file_tugas' WHERE id=$id";
    $conn->query($sql);
}

// Fungsi untuk upload file
function uploadFile() {
    $target_dir = "../assets/uploads/";
    $target_file = $target_dir . basename($_FILES["file_tugas"]["name"]);
    move_uploaded_file($_FILES["file_tugas"]["tmp_name"], $target_file); // Pindahkan file ke folder uploads
    return basename($_FILES["file_tugas"]["name"]);
}
?>
