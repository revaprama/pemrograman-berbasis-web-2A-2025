<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

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

    $query = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang)
              VALUES ('$nip', '$nama', '$umur', '$jenis_kelamin', '$departemen', '$jabatan', '$kota_asal', '$tanggal', '$jam_masuk', '$jam_pulang')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h3>Tambah Data Karyawan & Absensi</h3>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" id="karyawanForm">
        <div class="mb-3"><label>NIP:</label><input type="text" name="nip" class="form-control" required></div>
        <div class="mb-3"><label>Nama:</label><input type="text" name="nama" class="form-control" required></div>
        <div class="mb-3"><label>Umur:</label><input type="number" name="umur" class="form-control" required></div>
        <div class="mb-3"><label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3"><label>Departemen:</label><input type="text" name="departemen" class="form-control" required></div>
        <div class="mb-3"><label>Jabatan:</label><input type="text" name="jabatan" class="form-control" required></div>
        <div class="mb-3"><label>Kota Asal:</label><input type="text" name="kota_asal" class="form-control" required></div>
        <div class="mb-3"><label>Tanggal Absensi:</label><input type="date" name="tanggal" class="form-control" required></div>
        <div class="mb-3"><label>Jam Masuk:</label><input type="time" name="jam_masuk" class="form-control" required></div>
        <div class="mb-3"><label>Jam Pulang:</label><input type="time" name="jam_pulang" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>

  <script>
    document.getElementById('karyawanForm').addEventListener('submit', function(event) {
      const nip = document.getElementById('nip').value.trim();
      const nama = document.getElementById('nama').value.trim();
      const tanggal = document.getElementById('tanggal').value.trim();

      if (nip === '' || nama === '' || tanggal === '') {
        alert('Semua field wajib diisi!');
        event.preventDefault(); 
      }
    });
  </script>
</body>
</html>