<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('Login/index');
    }

    public function proses()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('nama_pengguna');
        $password = $this->request->getPost('kata_sandi');

        $user = $userModel->where('nama_pengguna', $username)->first();

        if ($user) {
            // Simple password check (disarankan hash password sebenarnya!)
            if ($user['kata_sandi'] === $password) {
                // Simpan ke session
                session()->set([
                    'id' => $user['id'],
                    'nama_pengguna' => $user['nama_pengguna'],
                    'peran' => $user['peran'],
                    'logged_in' => true
                ]);

                // Arahkan berdasarkan peran
                if ($user['peran'] === 'admin') {
                    return redirect()->to('dashboard'); // halaman admin
                } else {
                    return redirect()->to('dashboardstaf'); // halaman staf
                }
            } else {
                return redirect()->back()->with('error', 'Kata sandi salah')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('Login');
    }
}
