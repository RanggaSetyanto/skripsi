<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Amanah Wisata Grup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .login-page, html {
            height: 100%;
            margin: 0;
            background: url('<?= base_url("asset-admin/img/makkah.jpg") ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            transition: all 0.3s ease;
        }

        .logo {
            max-width: 180px;
            margin-bottom: 20px;
        }

        .centered {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="login-page">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-12 centered">
                <div class="login-container text-center">
                    <img src="<?= base_url('asset-admin/img/logo.png') ?>" alt="Logo" class="logo">
                    <h4 class="mb-4">Login</h4>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/proses') ?>" method="post" class="text-start">
                        <div class="mb-3">
                            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                            <input type="text" name="nama_pengguna" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kata_sandi" class="form-label">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" name="kata_sandi" id="kata_sandi" class="form-control" required>
                                <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                    <i id="eyeIcon" class="bi bi-eye text-dark"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById("kata_sandi");
            const eyeIcon = document.getElementById("eyeIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("bi-eye");
                eyeIcon.classList.add("bi-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("bi-eye-slash");
                eyeIcon.classList.add("bi-eye");
            }
        }
    </script>
</body>
</html>
