<?php
include '../config/database.php';
include '../partial/navbar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Tambah Tugas Baru</h2>

<form action="../process/tambah.php" method="POST">
    <label>Judul Tugas</label>
    <input type="text" name="judul" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="4"></textarea>

    <!-- user dummy (admin id = 1) -->
    <input type="hidden" name="user_id" value="1">

    <button type="submit">Simpan</button>
    <a href="index.php" class="btn-secondary">Kembali</a>
</form>

</body>
</html>
