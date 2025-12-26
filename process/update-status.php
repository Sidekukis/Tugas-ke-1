<?php
include '../config/database.php';

$id = $_POST['id'];
$status_lama = $_POST['status_lama'];
$status_baru = $_POST['status_baru'];

if ($status_lama != $status_baru) {

    // update status di tabel tasks
    mysqli_query($conn, 
        "UPDATE tasks SET status_terkini='$status_baru' WHERE id=$id"
    );

    // simpan ke log
    mysqli_query($conn,
        "INSERT INTO pembaruan_status (id_task, status_lama, status_baru)
         VALUES ($id, '$status_lama', '$status_baru')"
    );
}

header("Location: ../pages/edit.php?id=$id");
exit;
?>