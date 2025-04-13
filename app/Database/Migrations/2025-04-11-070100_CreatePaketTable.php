<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama_paket'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'harga'          => ['type' => 'INT'],
            'tanggal_berangkat' => ['type' => 'DATE'],
            'durasi_hari'    => ['type' => 'INT'],
            'fasilitas'      => ['type' => 'TEXT'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('paket_umrah');
    }

    public function down()
    {
        $this->forge->dropTable('paket_umrah');
    }
}
