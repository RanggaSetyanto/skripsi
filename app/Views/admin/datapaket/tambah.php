<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
        <main>
        <div class="container mt-4">
            <h2>Tambah Paket Umrah</h2>
            <form action="<?= base_url('datapaket/simpan') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                    <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" required>
                </div>

                <div class="mb-3">
                    <label for="durasi_hari" class="form-label">Durasi (Hari)</label>
                    <input type="number" class="form-control" id="durasi_hari" name="durasi_hari" required>
                </div>

                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control" id="fasilitas" name="fasilitas" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('datapaket') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        </main>

<?= $this->endSection() ?>
