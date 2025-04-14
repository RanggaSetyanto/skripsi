<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'jamaah_id'        => ['type' => 'INT',  'unsigned' => true],
            'paket_umrah_id'   => ['type' => 'INT',  'unsigned' => true,],
            'tanggal_daftar'   => ['type' => 'DATE'],
            'status_pendaftaran' => ['type' => 'ENUM("terdaftar","lunas","batal")', 'default' => 'terdaftar'],
            'user_id'            => ['type' => 'INT', 'unsigned' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('jamaah_id', 'jamaah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('paket_umrah_id', 'paket_umrah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran');
    }
}
