<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
        <main>
            <div class="container mt-4">
                <h2>Data Paket Umrah</h2>
                <div class="row align-items-center mb-3">
                    <div class="col-md-6">
                        <a href="<?= base_url('datapaket/tambah') ?>" class="btn btn-success">Tambah Paket</a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form action="<?= base_url('datapaket') ?>" method="get" class="d-flex" role="search">
                            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari data..." value="<?= esc($keyword ?? '') ?>">
                            <button type="submit" class="btn btn-secondary">Cari</button>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Tanggal Berangkat</th>
                            <th style="width: 80px;">Durasi(Hari)</th>
                            <th style="width: 300px;">Fasilitas</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($paket)): ?>
                            <?php foreach ($paket as $key => $row): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($row['nama_paket']) ?></td>
                                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td><?= date('d-m-Y', strtotime($row['tanggal_berangkat'])) ?></td>
                                    <td><?= esc($row['durasi_hari']) ?> hari</td>
                                    <td><?= esc($row['fasilitas']) ?></td>
                                    <td>
                                        <a href="<?= base_url('datapaket/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="javascript:void(0);" onclick="konfirmasiHapus(<?= $row['id'] ?>)" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data paket.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('datapaket/hapus') ?>/" + id;
            }
        });
    }
</script>
<?= $this->endSection() ?>
