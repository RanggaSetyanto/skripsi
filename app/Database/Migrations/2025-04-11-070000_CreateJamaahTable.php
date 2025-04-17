<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJamaahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'      => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap'   => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis_kelamin'  => [ 
                'type'       => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'nama_ortu'   => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_ktp'         => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'no_hp'          => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'email'          => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tempat_lahir'   => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir'  => [
                'type' => 'DATE',
            ],
            'alamat'         => [
                'type' => 'TEXT',
            ],
            'kelurahan'      => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kecamatan'      => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kabupaten'      => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'propinsi'       => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'kode_pos'       => [ 
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'created_at'     => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'     => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('jamaah');
    }

    public function down()
    {
        $this->forge->dropTable('jamaah');
    }
}
