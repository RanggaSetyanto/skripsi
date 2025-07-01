<?= $this->extend('admin/layout/navbar'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <main class="container-fluid px-4 mt-4">
            <div class="row">
                <div class="col-12 ps-4">
                    <h2>Data Pengguna</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pengguna</li>
                    </ol>
                </div>

                <!-- Tombol Tambah & Pencarian -->
                <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                    <!-- Tombol Tambah di Kiri -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" onclick="bukaModalTambah()">+ Tambah Pengguna</button>

                    <!-- Form Pencarian di Kanan -->
                    <form id="searchForm" method="get" action="<?= base_url('user') ?>" class="input-group w-auto" role="search">
                        <input type="search" name="q" id="searchInput" class="form-control shadow-sm" placeholder="Cari pengguna..." value="<?= esc($keyword ?? '') ?>">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </form>
                </div>


                <!-- Bagian TABEL -->
                <div class="col-md-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light text-black d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead class="table-striped text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Nama Pengguna</th>
                                            <th scope="col">Peran</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($users) && is_array($users)) : ?>
                                            <?php foreach ($users as $index => $user) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $index + 1 ?></td>
                                                    <td class="text-center">
                                                        <?php if (!empty($user['foto'])) : ?>
                                                            <img src="<?= base_url('uploads/foto_user/' . $user['foto']) ?>" alt="Foto" width="40" height="40" class="rounded-circle">
                                                        <?php else : ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?= esc($user['nama_pengguna']) ?></td>
                                                    <td class="text-center">
                                                        <span class="badge <?= $user['peran'] === 'admin' ? 'bg-success' : 'bg-secondary' ?>">
                                                            <?= esc(ucfirst($user['peran'])) ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-warning"
                                                        onclick="bukaModalEdit(<?= $user['id'] ?>, '<?= esc($user['nama_pengguna']) ?>', '<?= $user['peran'] ?>', '<?= esc($user['foto'] ?? '') ?>')">
                                                            Edit
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="konfirmasiHapus(<?= $user['id'] ?>)" class="btn btn-sm btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Form Tambah/Edit Pengguna -->
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="userForm" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userModalLabel">Tambah Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Menampilkan error global -->
                                <?php if (session()->getFlashdata('errors')) : ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endif ?>

                                <input type="hidden" name="id" id="id">
                                
                                <!-- Input Foto -->
                                <div class="mb-3">
                                    <label>Foto (opsional)</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <?= isset($validation) && $validation->getError('foto') ? '<div class="text-danger">' . $validation->getError('foto') . '</div>' : '' ?>
                                </div>

                                <!-- Preview Foto -->
                                <div class="mb-3">
                                    <label>Foto Saat Ini</label><br>
                                    <!-- Foto preview akan ditampilkan di sini jika ada foto -->
                                    <img id="fotoPreview" src="" alt="Foto Pengguna" class="img-fluid rounded-circle" style="max-width: 100px; display: none;">
                                </div>
                                
                                <!-- Input Nama Pengguna -->
                                <div class="mb-3">
                                    <label>Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" value="<?= old('nama_pengguna') ?>" required>
                                    <?= isset($validation) && $validation->getError('nama_pengguna') ? '<div class="text-danger">' . $validation->getError('nama_pengguna') . '</div>' : '' ?>
                                </div>

                                <!-- Input Kata Sandi -->
                                <div class="mb-3">
                                    <label>Kata Sandi <span id="password_note" class="text-muted"></span></label>
                                    <input type="password" name="kata_sandi" id="kata_sandi" class="form-control">
                                    <?= isset($validation) && $validation->getError('kata_sandi') ? '<div class="text-danger">' . $validation->getError('kata_sandi') . '</div>' : '' ?>
                                </div>

                                <!-- Input Peran -->
                                <div class="mb-3">
                                    <label>Peran</label>
                                    <select name="peran" id="peran" class="form-select" required>
                                        <option value="admin">Admin</option>
                                        <option value="staf">Staf</option>
                                    </select>
                                    <?= isset($validation) && $validation->getError('peran') ? '<div class="text-danger">' . $validation->getError('peran') . '</div>' : '' ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </main>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- SweetAlert & Bootstrap Modal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     // Fungsi debounce agar tidak kirim form setiap ketik karakter
     function debounce(func, delay) {
        let timer;
        return function(...args) {
            clearTimeout(timer);
            timer = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // Kirim form pencarian secara otomatis
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');

    searchInput.addEventListener('input', debounce(function () {
        searchForm.submit();
    }, 500)); // submit otomatis setelah 500ms tidak mengetik

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

    function bukaModalTambah() {
        document.getElementById("userModalLabel").innerText = "Tambah Pengguna";
        document.getElementById("userForm").action = "<?= base_url('user/simpan') ?>";
        document.getElementById("id").value = "";
        document.getElementById("foto").value = "";
        document.getElementById("fotoPreview").style.display = "none";
        document.getElementById("nama_pengguna").value = "";
        document.getElementById("kata_sandi").value = "";
        document.getElementById("kata_sandi").required = true;
        document.getElementById("password_note").innerText = "(masukkan minimal 8 karakter)";
        document.getElementById("peran").value = "admin";
    }

    function bukaModalEdit(id, nama, peran) {
        document.getElementById("userModalLabel").innerText = "Edit Pengguna";
        document.getElementById("userForm").action = "<?= base_url('user/perbarui') ?>/" + id;
        document.getElementById("id").value = id;
        document.getElementById("nama_pengguna").value = nama;
        document.getElementById("kata_sandi").value = "";
        document.getElementById("kata_sandi").required = false;
        document.getElementById("password_note").innerText = "(Kosongkan jika tidak diganti)";
        document.getElementById("peran").value = peran;

        // Menampilkan foto saat ini (jika ada)
        var fotoPreview = document.getElementById("fotoPreview");
        if (foto && foto !== '') {
            fotoPreview.src = "<?= base_url('uploads/foto_user/') ?>/" + foto;
            fotoPreview.style.display = "block"; // Menampilkan gambar
        } else {
            fotoPreview.style.display = "none"; // Menyembunyikan gambar jika tidak ada foto
        }

        var modal = new bootstrap.Modal(document.getElementById('userModal'));
        modal.show();
    }
</script>
<?= $this->endSection() ?>
