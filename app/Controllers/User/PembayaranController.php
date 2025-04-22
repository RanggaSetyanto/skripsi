<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\JamaahModel;

class PembayaranController extends BaseController
{
    public function index()
    {
        $model = new PembayaranModel();
        $pendaftaranModel = new PendaftaranModel(); // Inisialisasi model Pendaftaran
        
        $data['pembayaran'] = $model
        ->select('pembayaran.*, jamaah.nama_lengkap, paket_umrah.nama_paket')
        ->join('pendaftaran', 'pendaftaran.id = pembayaran.pendaftaran_id')
        ->join('jamaah', 'jamaah.id = pendaftaran.jamaah_id')
        ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
        ->findAll();

        $data['pendaftaran'] = $pendaftaranModel
        ->select('pendaftaran.*, jamaah.nama_lengkap, paket_umrah.nama_paket')
        ->join('jamaah', 'jamaah.id = pendaftaran.jamaah_id')
        ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
        ->findAll();

        return view('User/pembayaranstaf/index', $data);
    }

    public function simpan()
    {
        $rules = [
            'pendaftaran_id' => 'required|numeric',
            'jumlah_pembayaran' => 'required|numeric',
            'tanggal_pembayaran' => 'required|valid_date',
            'metode_pembayaran' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('bukti_pembayaran');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/bukti', $fileName);
        }

        $data = [
            'pendaftaran_id' => $this->request->getPost('pendaftaran_id'), // pastikan nama sama dengan di DB
            'user_id' => 1,
            'jumlah_pembayaran' => $this->request->getPost('jumlah_pembayaran'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'tanggal_pembayaran' => $this->request->getPost('tanggal_pembayaran'),
            'bukti_pembayaran' => $fileName
        ];

        $model = new PembayaranModel();
        if (!$model->save($data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return redirect()->to('pembayaranstaf')->with('message', 'Data berhasil disimpan');
    }

    public function getHarga($pendaftaranId)
    {
        $pendaftaranModel = new PendaftaranModel();
        $data = $pendaftaranModel
            ->select('paket_umrah.harga')
            ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
            ->where('pendaftaran.id', $pendaftaranId)
            ->first();

        return $this->response->setJSON($data);
    }

    public function edit($id)
    {
        $model = new PembayaranModel();
        $data['pembayaran'] = $model->find($id);

        return view('pembayaranstaf/edit', $data); // Pastikan view `edit.php` tersedia
    }

    public function update($id)
    {
        $model = new PembayaranModel();

        // Ambil file bukti baru
        $file = $this->request->getFile('bukti_pembayaran');
        $fileLama = $this->request->getPost('bukti_lama'); // dari hidden input
        $fileName = $fileLama; // Default: pakai file lama

        // Jika ada file baru yang valid di-upload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus file lama jika ada
            if (!empty($fileLama) && file_exists('uploads/bukti/' . $fileLama)) {
                unlink('uploads/bukti/' . $fileLama);
            }

            // Simpan file baru
            $fileName = $file->getRandomName();
            $file->move('uploads/bukti/', $fileName);
        }

        // Update data ke database
        $model->update($id, [
            'pendaftaran_id'     => $this->request->getPost('pendaftaran_id'),
            'user_id'            => 1, // sesuaikan kalau pakai session login
            'jumlah_pembayaran'  => $this->request->getPost('jumlah_pembayaran'),
            'metode_pembayaran'  => $this->request->getPost('metode_pembayaran'),
            'tanggal_pembayaran' => $this->request->getPost('tanggal_pembayaran'),
            'bukti_pembayaran'   => $fileName,
        ]);

        return redirect()->to('pembayaranstaf')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $model = new PembayaranModel();
        $model->delete($id);
        return redirect()->to('pembayaranstaf');
    }

}
