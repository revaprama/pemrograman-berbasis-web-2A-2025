<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Artikel</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #999;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #f0f0f0;
        }
        a {
            color: #0000EE;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .kembali {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
$daftarArtikel = [
    'artikel-1' => [
        'judul' =>'Mengenal Dasar Penulisan Jurnalistik',
        'tanggal' =>'21-05-2025',
        'link' =>'blog.php?artikel=artikel-1'
    ],
    'artikel-2' => [
        'judul' => 'Pemrograman di Era Digital: Kunci Inovasi Teknologi',
        'tanggal' => '13-05-2025',
        'link' => 'blog.php?artikel=artikel-2'
    ],
];

function formatTanggal($tanggal) {
    $bulanIndo = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    $parts = explode('-', $tanggal);
    if(count($parts) === 3) {
        return $parts[0] . ' ' . ($bulanIndo[$parts[1]] ?? $parts[1]) . ' ' . $parts[2];
    }
    return $tanggal;
}
?>
<h2>Daftar Artikel</h2>
<table>
    <?php foreach ($daftarArtikel as $artikel): ?>
    <tr>
        <td><a href="<?= htmlspecialchars($artikel['link']) ?>"><?= htmlspecialchars($artikel['judul']) ?></a></td>
        <td><?= htmlspecialchars(formatTanggal($artikel['tanggal'])) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
    <a href="halaman1.php">Menuju Ke Profil</a> |
    <a href="halaman2.php">Pengalaman Kuliah</a>
</body>
</html>