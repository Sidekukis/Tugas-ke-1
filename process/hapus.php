<?php
include '../config/database.php';

// cek apakah parameter id ada
if (!isset($_GET['id'])) {
    header("Location: ../pages/index.php");
    exit;
}

$id_task = $_GET['id'];

// gunakan transaksi agar aman
mysqli_begin_transaction($conn);

try {

    // hapus log pembaruan status
    $queryLog = "DELETE FROM pembaruan_status WHERE id_task = '$id_task'";
    mysqli_query($conn, $queryLog);

    // hapus data task utama
    $queryTask = "DELETE FROM tasks WHERE id = '$id_task'";
    mysqli_query($conn, $queryTask);

    mysqli_commit($conn);

    header("Location: ../pages/index.php");
    exit;

} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Gagal menghapus data.";
}
