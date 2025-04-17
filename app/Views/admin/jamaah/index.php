<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Jamaah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Jamaah</li>
            </ol>

            <div class="card mb-4 shadow rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <i class="fas fa-table me-1"></i>
                    Data Jamaah
                </div>
                <div class="card-body">
                    <a href="<?= base_url('jamaah/tambah') ?>" class="btn btn-success mb-3 rounded-pill px-4">Tambah Jamaah</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>jenis Kelamin</th>
                                    <th>Nama Orang Tua</th>
                                    <th>No KTP</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($jamaah)) : ?>
                                    <?php $no = 1; foreach ($jamaah as $data): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($data['nama_lengkap']) ?></td>
                                            <td><?= esc($data['jenis_kelamin']) ?></td>
                                            <td><?= esc($data['nama_ortu']) ?></td>
                                            <td><?= esc($data['no_ktp']) ?></td>
                                            <td><?= esc($data['no_hp']) ?></td>
                                            <td><?= esc($data['email']) ?></td>
                                            <td><?= esc($data['tempat_lahir']) . ', ' . date('d-m-Y', strtotime($data['tanggal_lahir'])) ?></td>
                                            <td>
                                                <?= esc($data['alamat']) ?>, 
                                                Kelurahan <?= esc($data['kelurahan']) ?>, 
                                                Kecamatan <?= esc($data['kecamatan']) ?>, 
                                                Kabupaten <?= esc($data['kabupaten']) ?>, 
                                                Propinsi <?= esc($data['propinsi']) ?>, 
                                                Kode Pos <?= esc($data['kode_pos']) ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('jamaah/edit/' . $data['id']) ?>" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                                                <a href="<?= base_url('jamaah/hapus/' . $data['id']) ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Belum ada data jamaah.</td>
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
