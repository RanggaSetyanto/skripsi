<?= $this->extend('admin/layout/navbar'); ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <main class="container mt-5 ps-4">
            <div class="row">
                <div class="col-12 ps-4">
                    <h2>Profil Pengguna</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>

                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Edit Profil</h5>
                        </div>
                        <form action="<?= base_url('user/profile/updateProfil') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_pengguna">Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" class="form-control"
                                        value="<?= esc($user['nama_pengguna']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kata_sandi">Kata Sandi (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" name="kata_sandi" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="peran">Peran</label>
                                    <input type="text" class="form-control" value="<?= ucfirst(esc($user['peran'])) ?>" readonly>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </main>

<?= $this->endSection(); ?>
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
                window.location.href = "<?= base_url('user/hapus') ?>/" + id;
            }
        });
    }
</script>
<?= $this->endSection() ?>