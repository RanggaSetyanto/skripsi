<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'jamaah_id',
        'paket_umrah_id',
        'tanggal_daftar',
        'status_pendaftaran',
        'user_id',
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    // Relasi dengan tabel lain jika kamu mau gunakan dalam query builder
    public function getPendaftaranLengkap()
    {
        return $this->select('pendaftaran.*, jamaah.nama_lengkap, paket_umrah.nama_paket, users.nama_pengguna')
            ->join('jamaah', 'jamaah.id = pendaftaran.jamaah_id')
            ->join('paket_umrah', 'paket_umrah.id = pendaftaran.paket_umrah_id')
            ->join('users', 'users.id = pendaftaran.user_id');
    }
}
