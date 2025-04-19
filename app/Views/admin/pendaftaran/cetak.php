<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12pt; }
        .header { text-align: center; }
        .info { margin-top: 20px; }
        .info td { padding: 4px; vertical-align: top; }
        .box { border: 1px solid #000; padding: 10px; margin-top: 20px; }
        .photo-box { border: 1px solid #000; width: 3cm; height: 4cm; text-align: center; line-height: 4cm; font-size: 10pt; }
    </style>
</head>
<body>

<div class="header">
    <h3>FORMULIR PENDAFTARAN HAJI & UMROH</h3>
    <p>Tahun <?= date('Y') ?> / .................. H</p>
</div>

<table width="100%">
    <tr>
        <td width="70%">
            <table class="info">
                <tr><td>1. No. KTP</td><td>: <?= $pendaftaran['no_ktp'] ?></td></tr>
                <tr><td>2. Nama Lengkap</td><td>: <?= $pendaftaran['nama_lengkap'] ?></td></tr>
                <tr><td>3. Nama Orang Tua</td><td>:  <?= $pendaftaran['nama_ortu'] ?></td></tr>
                <tr><td>4. Tempat & Tanggal Lahir</td><td>: <?= $pendaftaran['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($pendaftaran['tanggal_lahir'])) ?></td></tr>
                <tr><td>5. Jenis Kelamin</td><td>: <?= $pendaftaran['jenis_kelamin'] ?></td></tr>
                <tr><td>6. Alamat</td><td>: <?= $pendaftaran['alamat'] ?></td></tr>
                <tr><td>&nbsp;</td><td>
                    Kelurahan:  <?= $pendaftaran['kelurahan'] ?><br>
                    Kecamatan:  <?= $pendaftaran['kecamatan'] ?><br>
                    Kabupaten:  <?= $pendaftaran['kabupaten'] ?><br>
                    Provinsi :  <?= $pendaftaran['provinsi'] ?><br>
                    Kode Pos :  <?= $pendaftaran['kode_pos'] ?><br>
                    Telp (Rumah / HP) : <?= $pendaftaran['no_hp'] ?>
                </td></tr>
                <tr><td>7. Pekerjaan</td><td>:  </td></tr>
                <tr><td>8. Alamat Email</td><td>: <?= $pendaftaran['email'] ?></td></tr>
                <tr><td>9. Paket Umroh</td><td>: <?= $pendaftaran['nama_paket'] ?></td></tr>
                <tr><td>9. Paket Umroh</td><td>: <?= $pendaftaran['nama_pengguna'] ?></td></tr>
                <tr><td>10. Deposit</td><td>: Rp <?= number_format($pendaftaran['harga'], 0, ',', '.') ?></td></tr>
            </table>
        </td>
        <td style="text-align: center;" width="30%">
            <div class="photo-box">FOTO 3x4</div>
        </td>
    </tr>
</table>

<div class="box">
    <strong>Umroh Promo <?= date('Y') ?></strong>
    <br><br>
    <u>Lampiran Pendaftaran:</u>
    <ol>
        <li>Menyerahkan pas photo terbaru berwarna</li>
        <li>Fotokopi dokumen: KTP, KK & Akta Nikah</li>
        <li>Paspor berlaku minimal 7 bulan</li>
        <li>Melunasi pembayaran sesuai paket</li>
    </ol>
</div>

<p style="margin-top: 40px; text-align: right;">Kudus, ......................</p>
<p style="text-align: right;">Calon Jamaah</p>

</body>
</html>
