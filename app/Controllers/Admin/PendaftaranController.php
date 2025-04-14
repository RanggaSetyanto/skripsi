<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\JamaahModel;
use App\Models\PaketUmrahModel;
use App\Models\UserModel;

class PendaftaranController extends BaseController
{
    protected $pendaftaranModel;
    protected $jamaahModel;
    protected $paketUmrahModel;
    protected $userModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->jamaahModel = new JamaahModel();
        $this->paketUmrahModel = new PaketUmrahModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['pendaftaran'] = $this->pendaftaranModel
            ->select('pendaftaran.*, jamaah.nama_lengkap, jamaah.no_hp, paket_umrah.nama_paket, users.nama_pengguna')
            ->join('jamaah', 'jamaah.id = pendaftaran.jamaah_id')
            ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
            ->join('users', 'users.id = pendaftaran.user_id')
            ->findAll();

        return view('admin/pendaftaran/index', $data);
    }

    public function create()
    {
        $data = [
            'jamaah' => $this->jamaahModel->findAll(),
            'paket' => $this->paketUmrahModel->findAll(),
            'users' => $this->userModel->findAll()
        ];

        return view('admin/pendaftaran/tambah', $data);
    }

    public function simpan()
    {
        $this->pendaftaranModel->save([
            'jamaah_id' => $this->request->getPost('jamaah_id'),
            'paket_umrah_id' => $this->request->getPost('paket_umrah_id'),
            'tanggal_daftar' => $this->request->getPost('tanggal_daftar'),
            'status_pendaftaran' => $this->request->getPost('status_pendaftaran'),
            'user_id' => $this->request->getPost('user_id')
        ]);

        return redirect()->to('pendaftaran')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendaftaran = $this->pendaftaranModel->find($id);

        if (!$pendaftaran) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'pendaftaran' => $pendaftaran,
            'jamaah' => $this->jamaahModel->findAll(),
            'paket' => $this->paketUmrahModel->findAll(),
            'users' => $this->userModel->findAll()
        ];

        return view('admin/pendaftaran/edit', $data);
    }

    public function update($id)
    {
        $this->pendaftaranModel->update($id, [
            'jamaah_id' => $this->request->getPost('jamaah_id'),
            'paket_umrah_id' => $this->request->getPost('paket_umrah_id'),
            'tanggal_daftar' => $this->request->getPost('tanggal_daftar'),
            'status_pendaftaran' => $this->request->getPost('status_pendaftaran'),
            'user_id' => $this->request->getPost('user_id')
        ]);

        return redirect()->to('pendaftaran')->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->pendaftaranModel->delete($id);
        return redirect()->to('pendaftaran')->with('success', 'Data berhasil dihapus.');
    }
}
