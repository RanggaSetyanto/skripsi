<?= $this->extend('admin/layout/template'); ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ol>
                        <div class="container pt-2 pb-4">
                            <div class="card shadow-lg rounded-4">
                                <div class="card-header bg-success text-white text-center rounded-top-4">
                                    <h3 class="mb-0">Form Pendaftaran Umrah</h3>
                                </div>
                            <div class="card-body p-4">
                            <form action="<?= base_url('/pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>

                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="no_ktp" class="form-label">No. KTP</label>
                                    <input type="text" name="no_ktp" class="form-control" required>
                                </div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" name="no_hp" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                </div>

                                <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                </div>

                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="paket_umrah_id" class="form-label">Paket Umrah</label>
                                    <select name="paket_umrah_id" class="form-select" required>
                                    <option value="">-- Pilih Paket --</option>
                                    <?php foreach ($paket as $paket): ?>
                                        <option value="<?= $paket['id'] ?>"><?= $paket['nama_paket'] ?> - Rp<?= number_format($paket['harga'], 0, ',', '.') ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>

                                <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4 rounded-pill">Daftar Sekarang</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
<?= $this->endSection(); ?>