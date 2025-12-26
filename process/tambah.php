<?php
include '../config/database.php';

$judul = $_POST['judul'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';
$user_id = $_POST['user_id'] ?? '';

if (empty($judul) || empty($deskripsi) || empty($user_id)) {
    header("Location: ../pages/tambah.php");
    exit;
}

$query = "INSERT INTO tasks (id_user, judul, deskripsi, status_terkini)
          VALUES ('$user_id', '$judul', '$deskripsi', 'baru')";
mysqli_query($conn, $query);

header("Location: ../pages/index.php");
exit;
?>
