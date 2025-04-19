<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'pendaftaran_id', 'user_id', 'jumlah_pembayaran', 'metode_pembayaran',
        'tanggal_pembayaran', 'bukti_pembayaran', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    public function getPembayaranWithRelasi()
    {
        return $this->select('pembayaran.*, jamaah.nama_lengkap, paket_umrah.nama_paket, users.nama_pengguna')
            ->join('pendaftaran', 'pendaftaran.id = pembayaran.pendaftaran_id')
            ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
            ->join('users', 'users.id = pembayaran.user_id')
            ->join('jamaah', 'jamaah.id = pendaftaran.id')  // Menambahkan join dengan tabel jamaah
            ->orderBy('pembayaran.tanggal_pembayaran', 'DESC')
            ->findAll();
    }

}
