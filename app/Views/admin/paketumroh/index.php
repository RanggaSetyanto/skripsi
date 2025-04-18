<?= $this->extend('admin/layout/template'); ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
        <div class="container mt-5">
            <h1 class="mt-4">Paket Umrah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a>Paket Umroh</a></li>
                <li class="breadcrumb-item active">Daftar Paket Umrah</li>
            </ol>
            <div class="container mt-4">
                <h2 class="text-center mb-4">Daftar Paket Umrah</h2>

                <div class="row">
                    <?php foreach ($paket as $item): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow rounded-4 border-0 h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-primary"><?= esc($item['nama_paket']) ?></h5>
                                    <p class="card-text mb-1"><strong>Harga:</strong> Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                    <p class="card-text mb-1"><strong>Tanggal Berangkat:</strong> <?= date('d M Y', strtotime($item['tanggal_berangkat'])) ?></p>
                                    <p class="card-text mb-1"><strong>Durasi:</strong> <?= esc($item['durasi_hari']) ?> hari</p>
                                    <p class="card-text"><strong>Fasilitas:</strong><br> <?= nl2br(esc($item['fasilitas'])) ?></p>
                                    
                                    <!-- Tombol Edit & Hapus -->
                                    <!-- <div class="d-flex justify-content-between mt-3">
                                        <a href="<?= base_url('admin/edit_paket/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?= base_url('admin/paket/delete/' . $item['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (empty($paket)) : ?>
                    <div class="alert alert-warning text-center">
                        Belum ada data paket umrah.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>        
    </main>
<?= $this->endSection(); ?>