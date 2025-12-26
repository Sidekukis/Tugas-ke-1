<?php
include '../config/database.php';
include '../partial/navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id = $id");
$task = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Edit Tugas</h2>

<form action="../process/update.php" method="POST">
    <input type="hidden" name="id" value="<?= $task['id']; ?>">

    <label>Judul</label>
    <input type="text" name="judul" value="<?= $task['judul']; ?>" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi"><?= $task['deskripsi']; ?></textarea>

    <button type="submit">Update</button>
    <a href="index.php" class="btn-secondary">Kembali</a>
</form>

<hr>

<h3>Update Status</h3>

<form action="../process/update-status.php" method="POST">
    <input type="hidden" name="id" value="<?= $task['id']; ?>">
    <input type="hidden" name="status_lama" value="<?= $task['status_terkini']; ?>">

    <select name="status_baru">
        <option value="baru" <?= $task['status_terkini'] == 'baru' ? 'selected' : ''; ?>>Baru</option>
        <option value="dikerjakan" <?= $task['status_terkini'] == 'dikerjakan' ? 'selected' : ''; ?>>Dikerjakan</option>
        <option value="selesai" <?= $task['status_terkini'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
    </select>

    <button type="submit">Update Status</button>
</form>

<br>
<a href="detail.php?id=<?= $task['id']; ?>">Lihat Riwayat Status</a><br><br>
<a href="index.php" class="btn-secondary">Kembali</a>

</body>
</html>
