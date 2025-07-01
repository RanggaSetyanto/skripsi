<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12pt; margin: 40px; }
        .kop-wrapper {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-logo img {
            width: 100px;
            height: auto;
        }
        .kop-text {
            flex: 1;
            text-align: center;
        }
        .kop-text h1 { margin: 0; font-size: 20pt; }
        .kop-text h3 { margin: 5px 0; font-size: 14pt; }
        .kop-text p { margin: 0; font-size: 12pt; }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-table {
            border-collapse: collapse;
            width: 100%;
        }

        .info-table td {
            padding: 4px 8px;
            vertical-align: top;
        }

        .info-table td.label {
            white-space: nowrap;
            width: 160px;
        }

        .photo-box {
            width: 3cm;
            height: 4cm;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10pt;
            margin: 20px auto 0 auto;
        }

        .box {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 20px;
        }

        .ttd {
            text-align: right;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="kop-wrapper">
    <div class="kop-text">
        <h1>PT. AMANAH WISATA GROUP</h1>
        <h3>FORMULIR PENDAFTARAN HAJI & UMROH</h3>
        <p>Jl. Raya Kudus No. 123, Kudus, Jawa Tengah</p>
    </div>
</div>

<div class="header">
    <h3>FORMULIR PENDAFTARAN HAJI & UMROH</h3>
    <p>Tahun <?= date('Y') ?> / .................. H</p>
</div>

<table width="100%">
    <tr>
        <td width="70%">
        <table class="info-table">
            <tr><td class="label">1. No. KTP</td><td>:</td><td><?= $pendaftaran['no_ktp'] ?></td></tr>
            <tr><td class="label">2. Nama Lengkap</td><td>:</td><td><?= $pendaftaran['nama_lengkap'] ?></td></tr>
            <tr><td class="label">3. Nama Orang Tua</td><td>:</td><td><?= $pendaftaran['nama_ortu'] ?></td></tr>
            <tr><td class="label">4. Tempat & Tanggal Lahir</td><td>:</td><td><?= $pendaftaran['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($pendaftaran['tanggal_lahir'])) ?></td></tr>
            <tr><td class="label">5. Jenis Kelamin</td><td>:</td><td><?= $pendaftaran['jenis_kelamin'] ?></td></tr>
            <tr><td class="label">6. Pekerjaan</td><td>:</td><td><?= $pendaftaran['pekerjaan'] ?></td></tr>
            <tr><td class="label">7. Alamat</td><td>:</td><td>
                <?= $pendaftaran['alamat'] ?><br>
                Kelurahan: <?= $pendaftaran['kelurahan'] ?><br>
                Kecamatan: <?= $pendaftaran['kecamatan'] ?><br>
                Kabupaten: <?= $pendaftaran['kabupaten'] ?><br>
                Provinsi: <?= $pendaftaran['provinsi'] ?><br>
                Kode Pos: <?= $pendaftaran['kode_pos'] ?><br>
                Telp (Rumah / HP): <?= $pendaftaran['no_hp'] ?>
            </td></tr>
            <tr><td class="label">8. Email</td><td>:</td><td><?= $pendaftaran['email'] ?></td></tr>
            <tr><td class="label">9. Paket Umroh</td><td>:</td><td><?= esc($pendaftaran['nama_paket']) ?></td></tr>
            <tr><td class="label">10. Petugas Input</td><td>:</td><td><?= esc($pendaftaran['nama_pengguna']) ?></td></tr>
            <tr><td class="label">11. Deposit</td><td>:</td><td>Rp <?= number_format($pendaftaran['harga'], 0, ',', '.') ?></td></tr>
        </table>
        </td>
        <td width="30%" style="text-align: center;">
            <div class="photo-box">FOTO 3x4</div>
        </td>
    </tr>
</table>

<div class="ttd">
    <p>Kudus, <?= date('d F Y') ?></p>
    <p>Calon Jamaah,</p>
    <div style="height: 50px;"></div>
    <p style="font-weight: bold;"><?= $pendaftaran['nama_lengkap'] ?></p>
</div>

</body>
</html>
