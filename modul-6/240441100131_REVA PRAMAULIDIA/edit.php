<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $departemen = $_POST["departemen"];
    $jabatan = $_POST["jabatan"];
    $kota_asal = $_POST["kota_asal"];
    $tanggal = $_POST["tanggal"];
    $jam_masuk = $_POST["jam_masuk"];
    $jam_pulang = $_POST["jam_pulang"];

    $query = "UPDATE karyawan_absensi SET
              nip='$nip', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin',
              departemen='$departemen', jabatan='$jabatan', kota_asal='$kota_asal',
              tanggal_absensi='$tanggal', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Gagal mengedit data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h3>Edit Data Karyawan</h3>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3"><label>NIP:</label><input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required></div>
        <div class="mb-3"><label>Nama:</label><input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required></div>
        <div class="mb-3"><label>Umur:</label><input type="number" name="umur" class="form-control" value="<?= $data['umur'] ?>" required></div>
        <div class="mb-3"><label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3"><label>Departemen:</label><input type="text" name="departemen" class="form-control" value="<?= $data['departemen'] ?>" required></div>
        <div class="mb-3"><label>Jabatan:</label><input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required></div>
        <div class="mb-3"><label>Kota Asal:</label><input type="text" name="kota_asal" class="form-control" value="<?= $data['kota_asal'] ?>" required></div>
        <div class="mb-3"><label>Tanggal Absensi:</label><input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal_absensi'] ?>" required></div>
        <div class="mb-3"><label>Jam Masuk:</label><input type="time" name="jam_masuk" class="form-control" value="<?= $data['jam_masuk'] ?>" required></div>
        <div class="mb-3"><label>Jam Pulang:</label><input type="time" name="jam_pulang" class="form-control" value="<?= $data['jam_pulang'] ?>" required></div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>