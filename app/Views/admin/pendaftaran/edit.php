<?= $this->extend('admin/layout/navbar'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Pendaftaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('pendaftaran') ?>">Pendaftaran</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card shadow rounded-4">
                <div class="card-header bg-warning text-white rounded-top-4">
                    <h4 class="mb-0">Form Edit Pendaftaran</h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('pendaftaran/update/' . $pendaftaran['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="jamaah_id" class="form-label">Nama Jamaah</label>
                            <select name="jamaah_id" class="form-select" required>
                                <?php foreach ($jamaah as $j): ?>
                                    <option value="<?= $j['id'] ?>" <?= $j['id'] == $pendaftaran['jamaah_id'] ? 'selected' : '' ?>>
                                        <?= $j['nama_lengkap'] ?> - <?= $j['no_hp'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paket_umrah_id" class="form-label">Paket Umrah</label>
                            <select name="paket_umrah_id" class="form-select" required>
                                <?php foreach ($paket as $p): ?>
                                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $pendaftaran['paket_umrah_id'] ? 'selected' : '' ?>>
                                        <?= $p['nama_paket'] ?> - Rp<?= number_format($p['harga'], 0, ',', '.') ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" name="tanggal_daftar" class="form-control" value="<?= $pendaftaran['tanggal_daftar'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pendaftaran" class="form-label">Status Pendaftaran</label>
                            <select name="status_pendaftaran" class="form-select" required>
                                <option value="terdaftar" <?= $pendaftaran['status_pendaftaran'] == 'terdaftar' ? 'selected' : '' ?>>Terdaftar</option>
                                <option value="lunas" <?= $pendaftaran['status_pendaftaran'] == 'lunas' ? 'selected' : '' ?>>Lunas</option>
                                <option value="batal" <?= $pendaftaran['status_pendaftaran'] == 'batal' ? 'selected' : '' ?>>Batal</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select name="user_id" class="form-select" required>
                                <?php foreach ($users as $u): ?>
                                    <option value="<?= $u['id'] ?>" <?= $u['id'] == $pendaftaran['user_id'] ? 'selected' : '' ?>>
                                        <?= $u['nama_pengguna'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Update</button>
                            <a href="<?= base_url('pendaftaran') ?>" class="btn btn-secondary rounded-pill px-4">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?= $this->endSection(); ?>