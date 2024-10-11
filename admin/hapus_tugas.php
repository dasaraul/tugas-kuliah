<?php
require '../config/database.php';
require '../functions/tugas.php';

$id = $_GET['id'];
hapusTugas($id, $conn);
header("Location: dashboard.php");
