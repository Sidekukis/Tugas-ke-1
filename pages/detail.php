<?php
include '../config/database.php';
include '../partial/navbar.php';

$id = $_GET['id'];

$task = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id")
);

$logs = mysqli_query($conn,
    "SELECT * FROM pembaruan_status WHERE id_task=$id ORDER BY changed_at DESC"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Detail Tugas</h2>

<p><strong>Judul:</strong> <?= $task['judul']; ?></p>
<p><strong>Deskripsi:</strong> <?= $task['deskripsi']; ?></p>
<p><strong>Status Saat Ini:</strong> <?= ucfirst($task['status_terkini']); ?></p>

<hr>

<h3>Riwayat Perubahan Status</h3>

<table>
    <tr>
        <th>No</th>
        <th>Status Lama</th>
        <th>Status Baru</th>
        <th>Waktu</th>
    </tr>

    <?php $no=1; while($log = mysqli_fetch_assoc($logs)): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $log['status_lama']; ?></td>
        <td><?= $log['status_baru']; ?></td>
        <td><?= $log['changed_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="index.php" class="btn-secondary">Kembali</a>

</body>
</html>
