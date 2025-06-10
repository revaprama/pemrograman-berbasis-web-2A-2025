<!DOCTYPE html>
<html>
<head>
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 2px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 2px solid #000;

        }
        th {
            background-color:rgb(234, 245, 250);
        }
        td {
            width: 70%;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 5px;
        }
        button[type="submit"],
        input[type="submit"] {
            background-color:rgb(36, 21, 124);
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover,
        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Profil Interaktif Mahasiswa</h1>
    <h2>Data Diri</h2>
    <?php
    $nama = "Reva Pramaulidia";
    $nim = 240441100131;
    $ttl = "Jombang, 29 Maret 2006";
    $email = "pramaulidiareva@gmail.com";
    $nohp = "083834645715";
    ?>
    <table>
        <tr>
            <th>Nama</th>
            <td><?=($nama)?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= ($nim)?></td>
        </tr>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td><?= ($ttl)?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= ($email)?></td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <td><?= ($nohp)?></td>
        </tr>
    </table>

    <?php
    function isValidInput($data) {
        if (is_array($data)) {
            return count(array_filter($data, 'trim')) > 0;
        } else {
            return !empty(trim($data));
        }
    }                                                              
    $bahasa_inputs = isset($_POST['bahasa']) ? $_POST['bahasa'] : [''];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bahasa = array_filter(array_map('trim', $_POST['bahasa'] ?? []));
        $pengalaman = trim($_POST['pengalaman']);
        $software = isset($_POST['software']) ? $_POST['software'] : [];
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $tingkat_php = isset($_POST['tingkat_php']) ? $_POST['tingkat_php'] : '';
    ?>
        <h2>Hasil Input Profil</h2>
            <table border="1">
                <tr><th>Bahasa Pemrograman</th><td><?=(implode(", ", $bahasa)) ?></td></tr>
                <tr><th>Pengalaman Membuat Proyek</th><td><?= ($pengalaman)?></td></tr>
                <tr><th>Software yang Sering Digunakan</th><td><?=(implode(", ", $software)) ?></td></tr>
                <tr><th>Sistem Operasi</th><td><?= ($os) ?></td></tr>
                <tr><th>Tingkat Penguasaan PHP</th><td><?= ($tingkat_php) ?></td></tr>
            </table>
    <?php
    if (count($bahasa) > 2) {
                echo "<strong>Anda cukup berpengalaman dalam pemrograman!</strong>";
            }
        }
        if (isset($_POST['tambah_bahasa'])) {
            $bahasa_inputs[] = ''; 
        }
    ?>
    <form method="post" action="">
        <div class="form-label">Bahasa Pemrograman yang Dikuasai:</div>
            <?php foreach ($bahasa_inputs as $index => $bahasa_input): ?>
                <input type="text" name="bahasa[]" placeholder="" value="<?= ($bahasa_input) ?>" required><br>
            <?php endforeach; ?>
            <button type="submit" name="tambah_bahasa">Tambah Bahasa</button>

        <label class="form-label">Penjelasan tentang Pengalaman Membuat Proyek Pribadi:<br>
            <textarea name="pengalaman" rows="4" cols="40" required><?= isset($_POST['pengalaman']) ? ($_POST['pengalaman']) : '' ?></textarea>
        </label><br><br>

        <div class="form-label">Software yang sering digunakan:</div>
        <input type="checkbox" name="software[]" value="VS Code" <?= isset($_POST['software']) && in_array('VS Code', $_POST['software']) ? 'checked' : '' ?>> VS Code<br>
        <input type="checkbox" name="software[]" value="XAMPP" <?= isset($_POST['software']) && in_array('XAMPP', $_POST['software']) ? 'checked' : '' ?>> XAMPP<br>
        <input type="checkbox" name="software[]" value="Git" <?= isset($_POST['software']) && in_array('Git', $_POST['software']) ? 'checked' : '' ?>> Git<br><br>
       
        <div class="form-label">Sistem Operasi yang digunakan:</div>
        <input type="radio" name="os" value="Windows" required <?= isset($_POST['os']) && $_POST['os'] == 'Windows' ? 'checked' : '' ?>> Windows<br>
        <input type="radio" name="os" value="Linux" required <?= isset($_POST['os']) && $_POST['os'] == 'Linux' ? 'checked' : '' ?>> Linux<br>
        <input type="radio" name="os" value="Mac" required <?= isset($_POST['os']) && $_POST['os'] == 'Mac' ? 'checked' : '' ?>> Mac<br><br>

        <label class="form-label">Tingkat Penguasaan PHP:<br>
            <select name="tingkat_php" required>
                <option value="">--Pilih--</option>
                <option value="Pemula" <?= isset($_POST['tingkat_php']) && $_POST['tingkat_php'] == 'Pemula' ? 'selected' : '' ?>>Pemula</option>
                <option value="Menengah" <?= isset($_POST['tingkat_php']) && $_POST['tingkat_php'] == 'Menengah' ? 'selected' : '' ?>>Menengah</option>
                <option value="Mahir" <?= isset($_POST['tingkat_php']) && $_POST['tingkat_php'] == 'Mahir' ? 'selected' : '' ?>>Mahir</option>
            </select>
        </label>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="halaman2.php">Pengalaman Kuliah </a> |
    <a href="halaman3.php">Menuju Ke Blog</a>
</body>
</html>

#opertor yang digunakan ,tanda tanya 2 untuk apaa