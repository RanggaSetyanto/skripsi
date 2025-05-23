<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\JamaahModel;

class JamaahController extends BaseController
{
    public function index()
    {
        $jamaahModel = new JamaahModel();
        $data['jamaah'] = $jamaahModel->findAll();
        return view('User/jamaahstaf/index', $data);
    }

    public function tambah()
    {
        return view('User/jamaahstaf/tambah');
    }

    public function simpan()
    {
        $jamaahModel = new JamaahModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'nama_ortu' => $this->request->getPost('nama_ortu'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'kelurahan' => $this->request->getPost('kelurahan'), 
            'kecamatan' => $this->request->getPost('kecamatan'), 
            'kabupaten' => $this->request->getPost('kabupaten'), 
            'provinsi' => $this->request->getPost('provinsi'), 
            'kode_pos' => $this->request->getPost('kode_pos'), 
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

        return view('User/jamaahstaf/edit', $data);
    }

    public function update($id)
    {
        $jamaahModel = new JamaahModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'nama_ortu' => $this->request->getPost('nama_ortu'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'kelurahan' => $this->request->getPost('kelurahan'), 
            'kecamatan' => $this->request->getPost('kecamatan'), 
            'kabupaten' => $this->request->getPost('kabupaten'), 
            'provinsi' => $this->request->getPost('provinsi'), 
            'kode_pos' => $this->request->getPost('kode_pos'), 
        ];

        $jamaahModel->update($id, $data);

        return redirect()->to(base_url('jamaahstaf'))->with('message', 'Jamaah berhasil diperbarui');
    }

    public function hapus($id)
    {
        $jamaahModel = new JamaahModel();
        $jamaah = $jamaahModel->find($id);

        if ($jamaah) {
            $jamaahModel->delete($id);
            return redirect()->to(base_url('jamaahstaf'))->with('message', 'Data jamaah berhasil dihapus');
        } else {
            return redirect()->to(base_url('jamaahstaf'))->with('error', 'Data jamaah tidak ditemukan');
        }
    }
}
