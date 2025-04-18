<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // Ambil keyword pencarian (jika ada)
        $keyword = $this->request->getGet('q');

        // Jika keyword ada, lakukan pencarian
        if ($keyword) {
            $userModel->like('nama_pengguna', $keyword);
        }

        // Ambil data pengguna (baik hasil pencarian atau semua data)
        $users = $userModel->findAll();

        // Cek apakah ada request edit
        $editData = null;
        $editId = $this->request->getGet('edit'); // Menangkap parameter edit dari URL
        if ($editId) {
            $editData = $userModel->find($editId); // Ambil data pengguna berdasarkan ID
        }

        return view('admin/user/index', [
            'users' => $users,
            'editData' => $editData,
            'keyword' => $keyword // Untuk mengisi ulang kolom pencarian di view
        ]);
    }

    public function simpan()
    {
        $userModel = new UserModel();

        // Validasi input
        $validationRules = [
            'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
            'nama_pengguna' => 'required|min_length[3]|max_length[50]',
            'kata_sandi'    => 'required|min_length[6]',
            'peran'         => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file foto dari request
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_user/', $namaFoto);
        }

        // Simpan data user
        $userModel->save([
            'foto' => $namaFoto,
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'kata_sandi'    => $this->request->getPost('kata_sandi'),
            'peran'         => $this->request->getPost('peran'),
        ]);

        return redirect()->to('/user');
    }

    public function perbarui($id)
    {
        $userModel = new UserModel();

        // Validasi input
        $validationRules = [
            'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
            'nama_pengguna' => 'required|min_length[3]|max_length[50]',
            'kata_sandi'    => 'permit_empty|min_length[6]',
            'peran'         => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data yang diinput
        $data = [
            'id' => $id,
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'peran' => $this->request->getPost('peran'),
        ];

        $password = $this->request->getPost('kata_sandi');
        if (!empty($password)) {
            $data['kata_sandi'] = $password;
        }

        // Handle foto baru (jika ada)
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_user/', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        // Update data pengguna
        $userModel->save($data);

        return redirect()->to('/user');
    }

    public function profile()
    {
        $session = session();
        $userId = $session->get('id'); // Pastikan session menyimpan ID user

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        return view('admin/user/profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id');

        $userModel = new UserModel();
        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
        ];

        $password = $this->request->getPost('kata_sandi');
        if (!empty($password)) {
            $data['kata_sandi'] = $password;
        }

        $userModel->update($userId, $data);

        return redirect()->to('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('user');
    }
}
