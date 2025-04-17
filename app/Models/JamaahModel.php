<?php

namespace App\Models;

use CodeIgniter\Model;

class JamaahModel extends Model
{
    protected $table            = 'jamaah';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'nama_lengkap',
        'jenis_kelamin',
        'nama_ortu',
        'no_ktp',
        'no_hp',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
