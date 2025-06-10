<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
        }
        .timeline {;
            margin: 40px;
            padding-left: 20px;
            border-left: 3px solid #3498db;
        }
        .timeline-item {
            position: relative;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .timeline-item::before {
            content: "";
            position: absolute;
            left: -13px;
            top: 20px;
            width: 15px;
            height: 15px;
            background: #3498db;
            border-radius: 50%;
            border: 3px solid white;
        }
        .tahun {
            font-weight: bold;
            color: #3498db;
            margin-bottom: 5px;
            font-size: 1.1em;
        }
        .judul {
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .deskripsi {
            font-size: 0.95em;
            color: #555;
        }
    </style>
</head>
<body>
<?php
function formatTahun($tahun) {
    return "Tahun Ajaran: " . $tahun;
}

$pengalaman = [
    [
        "tahun" => "2024",
        "judul" => "Semester 1",
        "deskripsi" => "Menjadi mahasiswa baru di Universitas Trunojoyo Madura dan mulai mengenal lingkungan sekitar"
    ],
    [
        "tahun" => "2025",
        "judul" => "Semester 2",
        "deskripsi" => "Mulai memahami tentang mata kuliah di prodi sistem informasi"
    ],
];
?>

<h1>Timeline Pengalaman Kuliah</h1>
<div class="timeline">
    <?php foreach($pengalaman as $item): ?>
        <div class="timeline-item">
            <div class="tahun"><?= (formatTahun($item['tahun'])) ?></div>
            <div class="judul"><?= ($item['judul']) ?></div>
            <div class="deskripsi"><?= ($item['deskripsi']) ?></div>
        </div>
    <?php endforeach; ?>
</div>
    <a href="halaman1.php">Kembali ke Profil</a><br>
    <a href="halaman3.php">Menuju blog</a>
</body>
</html>