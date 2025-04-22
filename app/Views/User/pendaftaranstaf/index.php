<?= $this->extend('User/layoutstaf/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h1 class="mt-4">Pendaftaran</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a>Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Data Pendaftaran</li>
                </ol>

                <div class="card mb-4 shadow rounded-4">
                    <div class="card-header bg-light text-black rounded-top-4">
                        <i class="fas fa-table me-1"></i>
                        Data Pendaftaran Umrah
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('pendaftaranstaf/tambah') ?>" class="btn btn-primary mb-3 rounded-pill px-4">Tambah Pendaftaran</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jamaah</th>
                                        <th>No HP</th>
                                        <th>Paket Umrah</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                        <th>Staff</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pendaftaran)) : ?>
                                        <?php $no = 1; foreach ($pendaftaran as $data): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($data['nama_lengkap']) ?></td>
                                                <td><?= esc($data['no_hp']) ?></td>
                                                <td><?= esc($data['nama_paket']) ?></td>
                                                <td><?= date('d-m-Y', strtotime($data['tanggal_daftar'])) ?></td>
                                                <td>
                                                    <span class="badge 
                                                        <?= $data['status_pendaftaran'] == 'lunas' ? 'bg-success' : 
                                                            ($data['status_pendaftaran'] == 'batal' ? 'bg-danger' : 'bg-warning') ?>">
                                                        <?= ucfirst($data['status_pendaftaran']) ?>
                                                    </span>
                                                </td>
                                                <td><?= esc($data['nama_pengguna']) ?></td>
                                                <td class="d-flex flex-wrap gap-1">
                                                    <a href="<?= base_url('pendaftaranstaf/edit/' . $data['id']) ?>" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                                                    <a href="<?= base_url('pendaftaranstaf/delete/' . $data['id']) ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                                    <a href="<?= base_url('pendaftaranstaf/cetak/' . $data['id']) ?>" target="_blank" class="btn btn-sm btn-secondary rounded-pill">Cetak PDF</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data pendaftaran.</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
    </main>
<?= $this->endSection(); ?>
