<?php
include '../config/database.php';
include '../partial/navbar.php';
$keyword = $_GET['keyword'] ?? '';

$query = "
    SELECT 
        tasks.id,
        tasks.judul,
        tasks.deskripsi,
        tasks.status_terkini,
        users.nama AS user_nama
    FROM tasks
    JOIN users ON tasks.id_user = users.id
";

if (!empty($keyword)) {
    $query .= " WHERE tasks.judul LIKE '%$keyword%'";
}

$query .= " ORDER BY tasks.created_at DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Tugas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Daftar Tugas</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['judul']); ?></td>
                    <td class="col-deskripsi">
                        <?= htmlspecialchars($row['deskripsi']); ?>
                    </td>
                    <td>
                        <span class="status <?= $row['status_terkini']; ?>">
                            <?= ucfirst($row['status_terkini']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="detail.php?id=<?= $row['id']; ?>">Detail</a> |
                        <a href="../process/hapus.php?id=<?= $row['id']; ?>"
                           onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center;">Belum ada tugas</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
