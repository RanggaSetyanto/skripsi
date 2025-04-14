<?php

namespace App\Models;

use CodeIgniter\Model;

class JamaahModel extends Model
{
    protected $table            = 'jamaah';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'nama_lengkap',
        'no_ktp',
        'no_hp',
        'email',
        'alamat',
        'tanggal_lahir',
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
