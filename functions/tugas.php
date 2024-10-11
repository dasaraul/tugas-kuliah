<?php
// Function untuk menambah tugas baru ke database
function tambahTugas($nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    // Simpan data tugas baru di database
    $sql = "INSERT INTO tugas (nama_tugas, mata_kuliah, file_tugas) VALUES ('$nama_tugas', '$mata_kuliah', '$file_tugas')";
    $conn->query($sql);
}

// Function untuk mengupload file secara massal dan menghindari nama file yang sama
function uploadMultipleFiles($file_name, $file_tmp) {
    // Ganti nama file dengan uniqid biar nama filenya unik dan gak nimpah file yang ada
    $unique_file_name = uniqid() . '_' . $file_name;
    $destination = '../assets/uploads/' . $unique_file_name;

    // Pindahkan file dari temporary folder ke folder tujuan
    if (move_uploaded_file($file_tmp, $destination)) {
        return $unique_file_name; // Balikin nama file kalo berhasil di-upload
    }
    return false; // Balikin false kalo gagal upload
}

// Function untuk mendapatkan tugas berdasarkan ID
function getTugasById($id, $conn) {
    $sql = "SELECT * FROM tugas WHERE id=$id";
    return $conn->query($sql)->fetch_assoc();
}

// Function untuk update data tugas berdasarkan ID
function updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    $sql = "UPDATE tugas SET nama_tugas='$nama_tugas', mata_kuliah='$mata_kuliah', file_tugas='$file_tugas' WHERE id=$id";
    $conn->query($sql);
}
?>
