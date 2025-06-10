<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Blog kuliah</title>
    <style>
    body {
        font-family: sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
        color: #333;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    h2 {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 10px;
    }
    .artikel-detail {
        max-width: 700px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 5px;
    }
    .judul-detail {
        font-size: 1.2em;
        font-weight:bold;
        color: #333;
        margin-bottom: 5px;
    }
    .tanggal-detail {
        color: #777;
        font-size: 0.9em;
    }
    .refleksi-detail {
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .ilustrasi-detail {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .kutipan-detail {
        background-color: #f9f9f9;
        border-left: 5px solid #ccc;
        padding: 15px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }
    .sumber-detail {
        font-size: 0.9em;
        color: #337ab7;
        margin-top: 10px;
    }
    .sumber-detail a {
        color: #337ab7;
        text-decoration: none;
    }
    .sumber-detail a:hover {
        text-decoration: underline;
    }
    .kembali-link a {
        display: inline-block;
        margin-top: 20px;
        color: #337ab7;
        text-decoration: none;
    }
    .kembali-link a:hover {
        text-decoration: underline;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        max-width: 800px;
        background-color: #fff;
        border: 1px solid #999;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    </style>
</head>
<body>
<?php
$daftarArtikel = [
    'artikel-1' => [
        'judul' => 'Mengenal Dasar Penulisan Jurnalistik',
        'tanggal' => '21-5-2025',
        'refleksi' => 'Penulisan jurnalistik adalah keterampilan penting yang menuntut keakuratan, kejelasan, dan ketepatan informasi',
        'gambar' => 'image1.png',
        'sumber' => 'https://www.kompasiana.com/awul76000/682d6a1aed6415039240e422/mengenal-dasar-penulisan-jurnalistik',
    ],
    'artikel-2' => [
        'judul' => 'Pemrograman di Era Digital: Kunci Inovasi Teknologi',
        'tanggal' => '13-05-2025',
        'refleksi' => 'Semester ini menjadi titik balik ketika saya benar-benar terpukau dengan dunia pemrograman. Proses memecahkan masalah melalui kode, menciptakan aplikasi dari ide-ide abstrak, memberikan kepuasan tersendiri. Bergabung dengan kelompok studi dan berkolaborasi dalam proyek kecil semakin memperdalam pemahaman dan semangat saya dalam bidang ini.',
        'gambar' => 'image2.png',
        'sumber' => 'https://www.kompasiana.com/alifbima/68222ffbc925c418e809d4e5/pemrograman-di-era-digital-kunci-inovasi-teknologi',
    ],
];

$kutipanMotivasi = [
    "Kegagalan adalah guru terbaik jika kita berani belajar darinya.",
    "Mimpi tidak akan menjadi kenyataan tanpa tindakan nyata.",
    "Setiap langkah kecil adalah bagian dari perjalanan besar.",
    "Jangan takut untuk mencoba hal baru, di sanalah potensi diri berkembang.",
    "Kesuksesan adalah hasil dari persiapan, kerja keras, dan belajar dari kesalahan.",
];
$slugArtikel = $_GET['artikel'] ?? null;
?>

<h1>Blog Reflektif</h1>
<?php if ($slugArtikel && isset($daftarArtikel[$slugArtikel])): ?>
    <?php $artikel = $daftarArtikel[$slugArtikel]; ?>
    <div class="artikel-detail">
        <h2 class="judul-detail"><?= htmlspecialchars($artikel['judul']) ?></h2>
        <p class="tanggal-detail">Diposting pada: <?= htmlspecialchars($artikel['tanggal']) ?></p>
        <p class="refleksi-detail"><?= htmlspecialchars($artikel['refleksi']) ?></p>

        <?php if (!empty($artikel['gambar'])): ?>
            <img src="<?= htmlspecialchars($artikel['gambar']) ?>" alt="Ilustrasi Artikel" class="ilustrasi-detail">
        <?php endif; ?>

        <div class="kutipan-detail">
            “<?= htmlspecialchars($kutipanMotivasi[array_rand($kutipanMotivasi)]) ?>”
        </div>

        <?php if (!empty($artikel['sumber'])): ?>
            <p class="sumber-detail">
                Sumber: <a href="<?= htmlspecialchars($artikel['sumber']) ?>" target="_blank" rel="noopener noreferrer">
                    <?= htmlspecialchars($artikel['sumber']) ?>
                </a>
            </p>
        <?php endif; ?>
        <p class="kembali-link"><a href="halaman3.php">Kembali ke Daftar Artikel</a></p>
    </div>
<?php else: ?>
    <div class="artikel-detail">
        <h2 class="judul-detail">Artikel Tidak Ditemukan</h2>
        <p class="refleksi-detail">Maaf, artikel yang dicari tidak tersedia atau URL tidak valid</p>
    </div>
<?php endif; ?>
</body>
</html>