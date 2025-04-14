<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JamaahModel;

class JamaahController extends BaseController
{
    public function index()
    {
        $jamaahModel = new JamaahModel();
        $data['jamaah'] = $jamaahModel->findAll();
        return view('admin/jamaah/index', $data);
    }

    public function tambah()
    {
        return view('admin/jamaah/tambah');
    }

    public function simpan()
    {
        $jamaahModel = new JamaahModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];

        $jamaahModel->save($data);

        return redirect()->to(base_url('jamaah'))->with('message', 'Jamaah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jamaahModel = new JamaahModel();
        $data['jamaah'] = $jamaahModel->find($id);

        if (!$data['jamaah']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jamaah tidak ditemukan');
        }

        return view('admin/jamaah/edit', $data);
    }

    public function update($id)
    {
        $jamaahModel = new JamaahModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];

        $jamaahModel->update($id, $data);

        return redirect()->to(base_url('jamaah'))->with('message', 'Jamaah berhasil diperbarui');
    }

    public function hapus($id)
    {
        $jamaahModel = new JamaahModel();
        $jamaah = $jamaahModel->find($id);

        if ($jamaah) {
            $jamaahModel->delete($id);
            return redirect()->to(base_url('jamaah'))->with('message', 'Data jamaah berhasil dihapus');
        } else {
            return redirect()->to(base_url('jamaah'))->with('error', 'Data jamaah tidak ditemukan');
        }
    }
}
