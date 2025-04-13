<?= $this->extend('admin/layout/template'); ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <main class="container mt-5 ps-4">
            <div class="row">
                <div class="col-12 ps-4">
                    <h2>Data Pengguna</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pengguna</li>
                    </ol>
                </div>
                <!-- Bagian TABEL -->
                <div class="col-md-7">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pengguna</th>
                                            <th scope="col">Peran</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($users) && is_array($users)) : ?>
                                            <?php foreach ($users as $index => $user) : ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= esc($user['nama_pengguna']) ?></td>
                                                    <td>
                                                        <span class="badge <?= $user['peran'] === 'admin' ? 'bg-success' : 'bg-secondary' ?>">
                                                            <?= esc(ucfirst($user['peran'])) ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <a href="<?= base_url('user/hapus/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data pengguna.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian FORM -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <?= isset($editData) ? 'Edit Pengguna' : 'Tambah Pengguna' ?>
                        </div>
                        <form action="<?= isset($editData) ? base_url('user/perbarui/' . $editData['id']) : base_url('user/simpan') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" class="form-control" 
                                           value="<?= isset($editData) ? esc($editData['nama_pengguna']) : '' ?>" 
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label>Kata Sandi <?= isset($editData) ? '(kosongkan jika tidak diganti)' : '' ?></label>
                                    <input type="password" name="kata_sandi" class="form-control" 
                                           <?= isset($editData) ? '' : 'required' ?>>
                                </div>
                                <div class="mb-3">
                                    <label>Peran</label>
                                    <select name="peran" class="form-select" required>
                                        <option value="admin" <?= isset($editData) && $editData['peran'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="staf" <?= isset($editData) && $editData['peran'] == 'staf' ? 'selected' : '' ?>>Staf</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <?php if (isset($editData)): ?>
                                    <a href="<?= base_url('user') ?>" class="btn btn-secondary">Batal</a>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-<?= isset($editData) ? 'primary' : 'success' ?>">
                                    <?= isset($editData) ? 'Perbarui' : 'Simpan' ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </main>

<?= $this->endSection(); ?>
