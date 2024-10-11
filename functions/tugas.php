<?php
// Function untuk menambah tugas baru ke database
function tambahTugas($nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    // Query untuk memasukkan data tugas baru ke database
    $sql = "INSERT INTO tugas (nama_tugas, mata_kuliah, file_tugas) VALUES ('$nama_tugas', '$mata_kuliah', '$file_tugas')";
    $conn->query($sql);
}

// Function untuk update data tugas berdasarkan ID
function updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    // Query untuk memperbarui data tugas berdasarkan ID
    $sql = "UPDATE tugas SET nama_tugas='$nama_tugas', mata_kuliah='$mata_kuliah', file_tugas='$file_tugas' WHERE id=$id";
    $conn->query($sql);
}

// Function untuk menghapus tugas berdasarkan ID
function hapusTugas($id, $conn) {
    // Query untuk menghapus data tugas berdasarkan ID
    $sql = "DELETE FROM tugas WHERE id=$id";
    $conn->query($sql);
}

// Function untuk menampilkan semua tugas dari database
function tampilkanTugas($conn) {
    // Query untuk mengambil semua data tugas
    $sql = "SELECT * FROM tugas";
    return $conn->query($sql);
}

// Function untuk mendapatkan tugas berdasarkan ID tertentu
function getTugasById($id, $conn) {
    // Query untuk mengambil data tugas berdasarkan ID
    $sql = "SELECT * FROM tugas WHERE id=$id";
    return $conn->query($sql)->fetch_assoc();
}

// Function untuk mengupload file tugas ke folder yang ditentukan
function uploadFile() {
    // Ambil nama file yang di-upload
    $filename = $_FILES['file_tugas']['name'];
    // Tentukan lokasi penyimpanan file
    $destination = '../assets/uploads/' . $filename;
    // Pindahkan file dari sementara ke lokasi tujuan
    move_uploaded_file($_FILES['file_tugas']['tmp_name'], $destination);
    return $filename;
}
?>
