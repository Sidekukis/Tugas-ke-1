<?php
include '../config/database.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE tasks 
          SET judul='$judul', deskripsi='$deskripsi'
          WHERE id=$id";

mysqli_query($conn, $query);

header("Location: ../pages/index.php");
exit;
?>