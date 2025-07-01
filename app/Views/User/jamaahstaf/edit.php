<?= $this->extend('User/layoutstaf/navbar'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Jamaah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboardstaf') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('jamaahstaf') ?>">Jamaah</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card shadow rounded-4">
                <div class="card-header bg-warning text-white rounded-top-4">
                    <h4 class="mb-0">Form Edit Jamaah</h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('jamaahstaf/update/' . $jamaah['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= esc($jamaah['nama_lengkap']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" <?= ($jamaah['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($jamaah['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_ortu" class="form-label">Nama Orang Tua</label>
                            <input type="text" name="nama_ortu" class="form-control" value="<?= esc($jamaah['nama_ortu']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="<?= esc($jamaah['no_ktp']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="<?= esc($jamaah['no_hp']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= esc($jamaah['email']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $jamaah['tempat_lahir'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $jamaah['tanggal_lahir'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaaan" class="form-control" value="<?= esc($jamaah['pekerjaan']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" required><?= esc($jamaah['alamat']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kelurahan" class="form-label">Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" value="<?= esc($jamaah['kelurahan']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="<?= esc($jamaah['kecamatan']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" value="<?= esc($jamaah['kabupaten']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" value="<?= esc($jamaah['provinsi']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="kode_pos" class="form-label">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" value="<?= esc($jamaah['kode_pos']) ?>" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Update</button>
                            <a href="<?= base_url('jamaahstaf') ?>" class="btn btn-secondary rounded-pill px-4">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?= $this->endSection(); ?>
