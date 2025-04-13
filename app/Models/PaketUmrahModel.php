<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketUmrahModel extends Model
{
    protected $table = 'paket_umrah';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_paket',
        'harga',
        'tanggal_berangkat',
        'durasi_hari',
        'fasilitas',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
}
