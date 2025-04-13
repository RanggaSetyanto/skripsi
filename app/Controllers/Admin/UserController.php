<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // Ambil data pengguna untuk ditampilkan
        $users = $userModel->findAll();

        // Cek apakah ada request edit
        $editData = null;
        $editId = $this->request->getGet('edit'); // Menangkap parameter edit dari URL
        if ($editId) {
            $editData = $userModel->find($editId); // Ambil data pengguna berdasarkan ID
        }

        return view('admin/user/index', [
            'users' => $users,
            'editData' => $editData // Hanya ada jika kita sedang mengedit pengguna
        ]);
    }

    public function simpan()
    {
        $userModel = new UserModel();

        $userModel->save([
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'kata_sandi' => $this->request->getPost('kata_sandi'),
            'peran' => $this->request->getPost('peran'),
        ]);

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
            $user = $userModel->find($id);

            // Kirim data pengguna yang akan diedit dan daftar semua pengguna
            return view('admin/user/index', [
                'users' => $userModel->findAll(), // Kirim semua pengguna untuk daftar
                'editData' => $user // Kirim data pengguna yang akan diedit
            ]);
    }

    public function perbarui($id)
    {
        $userModel = new UserModel();

        $data = [
            'id' => $id,
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'peran' => $this->request->getPost('peran')
        ];

        // Update password jika diisi
        $password = $this->request->getPost('kata_sandi');
        if (!empty($password)) {
            $data['kata_sandi'] = $password;
        }

        $userModel->save($data);

        return redirect()->to('/user');
    }

    public function hapus($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('user');
    }
}
