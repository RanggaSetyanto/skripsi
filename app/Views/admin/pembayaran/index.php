<?= $this->extend('admin/layout/navbar'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <main class="container-fluid px-4 mt-4">
            <div class="row">
                <div class="col-12 ps-4">
                    <h2>Data Pembayaran</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pembayaran</li>
                    </ol>
                </div>

                <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pembayaranModal" onclick="bukaModalTambah()">+ Tambah Pembayaran</button>

                    <form id="searchForm" method="get" action="<?= base_url('pembayaran') ?>" class="input-group w-auto">
                        <input type="search" name="q" id="searchInput" class="form-control shadow-sm" placeholder="Cari..." value="<?= esc($keyword ?? '') ?>">
                        <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                    </form>
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light text-black d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Daftar Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jamaah</th>
                                            <th>Paket Umrah</th>
                                            <th>Jumlah</th>
                                            <th>Metode</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($pembayaran) && is_array($pembayaran)) : ?>
                                            <?php foreach ($pembayaran as $index => $bayar) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $index + 1 ?></td>
                                                    <td><?= esc($bayar['nama_lengkap']) ?></td>
                                                    <td><?= esc($bayar['nama_paket']) ?></td>
                                                    <td class="text-end">Rp<?= number_format($bayar['jumlah_pembayaran'], 0, ',', '.') ?></td>
                                                    <td class="text-center"><?= esc($bayar['metode_pembayaran'] ?? '-') ?></td>
                                                    <td class="text-center"><?= date('d M Y', strtotime($bayar['tanggal_pembayaran'])) ?></td>
                                                    <td class="text-center">
                                                        <?php if (!empty($bayar['bukti_pembayaran'])) : ?>
                                                            <a href="<?= base_url('uploads/bukti/' . $bayar['bukti_pembayaran']) ?>" target="_blank">
                                                                <img src="<?= base_url('uploads/bukti/' . $bayar['bukti_pembayaran']) ?>" alt="Bukti" width="40" class="img-thumbnail">
                                                            </a>
                                                        <?php else : ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-warning btn-sm"
                                                        onclick="bukaModalEdit(
                                                            <?= $bayar['id'] ?>,
                                                            <?= $bayar['pendaftaran_id'] ?>,
                                                            '<?= $bayar['tanggal_pembayaran'] ?>',
                                                            <?= $bayar['jumlah_pembayaran'] ?>,
                                                            '<?= $bayar['metode_pembayaran'] ?>',
                                                            '<?= $bayar['bukti_pembayaran'] ?>'
                                                        )">
                                                            Edit
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                                            onclick="konfirmasiHapus(<?= $bayar['id'] ?>)">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data pembayaran.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah/Edit -->
            <div class="modal fade" id="pembayaranModal" tabindex="-1" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="pembayaranForm" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pembayaranModalLabel">Tambah Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id">

                                <!-- Pendaftaran -->
                                <div class="mb-3">
                                    <label>Pilih Pendaftaran</label>
                                    <select name="pendaftaran_id" id="pendaftaran_id" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($pendaftaran as $item) : ?>
                                            <option value="<?= $item['id'] ?>">
                                                <?= esc($item['nama_lengkap'] . ' - ' . $item['nama_paket']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <!-- Tanggal Bayar -->
                                <div class="mb-3">
                                    <label>Tanggal Bayar</label>
                                    <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control" required>
                                </div>

                                <!-- Jumlah -->
                                <div class="mb-3">
                                    <label>Jumlah Bayar</label>
                                    <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" placeholder="Contoh: 5000000" required>
                                </div>

                                <!-- Metode Pembayaran -->
                                <div class="mb-3">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                                        <option value="">-- Pilih Metode --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cicilan">Cicilan</option>
                                    </select>
                                </div>

                                <!-- Upload Bukti -->
                                <div class="mb-3">
                                    <label>Bukti Pembayaran (opsional)</label>
                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                                    <input type="hidden" name="bukti_lama" id="bukti_lama">
                                </div>

                                <!-- Preview -->
                                <div class="mb-3">
                                    <label>Bukti Saat Ini</label><br>
                                    <img id="buktiPreview" src="" alt="Bukti" style="max-width: 100px; display: none;" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </main>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function bukaModalTambah() {
        document.getElementById('pembayaranModalLabel').innerText = 'Tambah Pembayaran';
        document.getElementById('pembayaranForm').action = "<?= base_url('pembayaran/simpan') ?>";
        document.getElementById('id').value = "";
        document.getElementById('pendaftaran_id').value = "";
        document.getElementById('tanggal_pembayaran').value = "";
        document.getElementById('jumlah_pembayaran').value = "";
        document.getElementById('metode_pembayaran').value = "";
        document.getElementById('bukti_pembayaran').value = "";
        document.getElementById('buktiPreview').style.display = "none";
    }

    function bukaModalEdit(id, pendaftaran_id, tanggal_pembayaran, jumlah_pembayaran, metode_pembayaran, bukti_pembayaran) {
        document.getElementById('pembayaranModalLabel').innerText = 'Edit Pembayaran';
        document.getElementById('pembayaranForm').action = "<?= base_url('pembayaran/update') ?>/" + id;
        document.getElementById('id').value = id;
        document.getElementById('pendaftaran_id').value = pendaftaran_id;
        document.getElementById('tanggal_pembayaran').value = tanggal_pembayaran;
        document.getElementById('jumlah_pembayaran').value = jumlah_pembayaran;

        const metodePembayaranEl = document.getElementById('metode_pembayaran');
        [...metodePembayaranEl.options].forEach(option => {
            if (option.value.trim().toLowerCase() === metode_pembayaran.trim().toLowerCase()) {
                option.selected = true;
            }
        });

        document.getElementById('bukti_lama').value = bukti_pembayaran;

        if (bukti_pembayaran && bukti_pembayaran !== '') {
            document.getElementById('buktiPreview').src = "<?= base_url('uploads/bukti/') ?>/" + bukti_pembayaran;
            document.getElementById('buktiPreview').style.display = "block";
        } else {
            document.getElementById('buktiPreview').style.display = "none";
        }

        var modal = new bootstrap.Modal(document.getElementById('pembayaranModal'));
        modal.show();
    }

    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Hapus Data?',
            text: 'Data yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('pembayaran/hapus') ?>/" + id;
            }
        });
    }
</script>
<?= $this->endSection() ?>
