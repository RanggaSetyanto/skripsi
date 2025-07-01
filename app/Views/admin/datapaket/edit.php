<?= $this->extend('admin/layout/navbar') ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
        <main>
        <div class="container mt-4">
            <h2>Edit Paket Umrah</h2>

            <form action="<?= base_url('datapaket/perbarui/' . $paket['id']) ?>" method="post">
                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="<?= esc($paket['nama_paket']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" value="<?= esc($paket['harga']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                    <input type="date" name="tanggal_berangkat" class="form-control" id="tanggal_berangkat" value="<?= esc($paket['tanggal_berangkat']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="durasi_hari" class="form-label">Durasi (Hari)</label>
                    <input type="number" name="durasi_hari" class="form-control" id="durasi_hari" value="<?= esc($paket['durasi_hari']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control" id="fasilitas" rows="4" required><?= esc($paket['fasilitas']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= base_url('datapaket') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        </main>

<?= $this->endSection() ?>
