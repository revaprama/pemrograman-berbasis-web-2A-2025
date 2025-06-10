<?php
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi ORDER BY tanggal_absensi DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h3>Halo, <?= $_SESSION['username'] ?></h3>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    <a href="input.php" class="btn btn-primary mb-3">+ Tambah Data Karyawan</a>

    <table class="table table-bordered">
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Kota Asal</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Aksi</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['umur'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['departemen'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['kota_asal'] ?></td>
                <td><?= $row['tanggal_absensi'] ?></td>
                <td><?= $row['jam_masuk'] ?></td>
                <td><?= $row['jam_pulang'] ?></td>
                <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
    </table>
</body>
</html>