<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-4">
                <h1 class="mt-4">Data Paket</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Paket</li>
                </ol>

                <!-- Tombol tambah & pencarian -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <a href="<?= base_url('datapaket/tambah') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Paket
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form action="<?= base_url('datapaket') ?>" method="get" class="d-flex justify-content-md-end">
                            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari data..." value="<?= esc($keyword ?? '') ?>">
                            <button type="submit" class="btn btn-secondary">Cari</button>
                        </form>
                    </div>
                </div>

                <!-- Tabel data -->
                <div class="card mb-4 shadow rounded-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0 rounded-3 overflow-hidden" style="border-collapse: separate; border-spacing: 0;">
                            <thead class="table-striped text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Durasi (Hari)</th>
                                    <th>Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($paket)): ?>
                                    <?php foreach ($paket as $key => $row): ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1 ?></td>
                                            <td><?= esc($row['nama_paket']) ?></td>
                                            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['tanggal_berangkat'])) ?></td>
                                            <td class="text-center"><?= esc($row['durasi_hari']) ?> hari</td>
                                            <td><?= esc($row['fasilitas']) ?></td>
                                            <td class="text-center">
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
                </div>
            </div>
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
