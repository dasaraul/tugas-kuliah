<?php
function tambahTugas($nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    $sql = "INSERT INTO tugas (nama_tugas, mata_kuliah, file_tugas) VALUES ('$nama_tugas', '$mata_kuliah', '$file_tugas')";
    $conn->query($sql);
}

function updateTugas($id, $nama_tugas, $mata_kuliah, $file_tugas, $conn) {
    $sql = "UPDATE tugas SET nama_tugas='$nama_tugas', mata_kuliah='$mata_kuliah', file_tugas='$file_tugas' WHERE id=$id";
    $conn->query($sql);
}

function hapusTugas($id, $conn) {
    $sql = "DELETE FROM tugas WHERE id=$id";
    $conn->query($sql);
}

function tampilkanTugas($conn) {
    $sql = "SELECT * FROM tugas";
    return $conn->query($sql);
}

function getTugasById($id, $conn) {
    $sql = "SELECT * FROM tugas WHERE id=$id";
    return $conn->query($sql)->fetch_assoc();
}

function uploadFile() {
    $filename = $_FILES['file_tugas']['name'];
    $destination = '../uploads/' . $filename;
    move_uploaded_file($_FILES['file_tugas']['tmp_name'], $destination);
    return $filename;
}
?>
