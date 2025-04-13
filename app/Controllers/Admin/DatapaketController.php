<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PaketUmrahModel;

class DatapaketController extends BaseController
{
    public function index()
    {
        $model = new PaketUmrahModel();

        // Ambil keyword dari parameter GET
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            // Cari di beberapa kolom
            $paket = $model
                ->like('nama_paket', $keyword)
                ->orLike('harga', $keyword)
                ->orLike('tanggal_berangkat', $keyword)
                ->orLike('durasi_hari', $keyword)
                ->orLike('fasilitas', $keyword)
                ->findAll();
        } else {
            $paket = $model->findAll();
        }

        $data = [
            'paket' => $paket,
            'keyword' => $keyword
        ];

        return view('admin/datapaket/index', $data);
    }

    // Form tambah paket baru
    public function tambah()
    {
        return view('admin/datapaket/tambah');
    }

    // Simpan data paket baru ke database
    public function simpan()
    {
        $model = new PaketUmrahModel();
        $model->insert([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga' => $this->request->getPost('harga'),
            'tanggal_berangkat' => $this->request->getPost('tanggal_berangkat'),
            'durasi_hari' => $this->request->getPost('durasi_hari'),
            'fasilitas' => $this->request->getPost('fasilitas'),
        ]);
        return redirect()->to('datapaket')->with('success', 'Paket berhasil ditambahkan!');
    }

    // Form ubah data paket
    public function ubah($id)
    {
        $model = new PaketUmrahModel();
        $data['paket'] = $model->find($id);
        return view('admin/datapaket/edit', $data);
    }

    // Simpan perubahan data paket
    public function perbarui($id)
    {
        $model = new PaketUmrahModel();
        $model->update($id, [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga' => $this->request->getPost('harga'),
            'tanggal_berangkat' => $this->request->getPost('tanggal_berangkat'),
            'durasi_hari' => $this->request->getPost('durasi_hari'),
            'fasilitas' => $this->request->getPost('fasilitas'),
        ]);
        return redirect()->to('datapaket')->with('success', 'Paket berhasil diperbarui!');
    }

    // Hapus data paket
    public function hapus($id)
    {
        $model = new PaketUmrahModel();
        $model->delete($id);
        return redirect()->to('datapaket')->with('success', 'Paket berhasil dihapus!');
    }
}
