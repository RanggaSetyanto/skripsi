<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotifikasiWaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'jamaah_id'      => ['type' => 'INT', 'unsigned' => true],
            'jenis_pesan'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'isi_pesan'      => ['type' => 'TEXT'],
            'status_kirim'   => ['type' => 'ENUM', 'constraint' => ['berhasil', 'gagal', 'menunggu'], 'default' => 'menunggu'],
            'waktu_kirim'    => ['type' => 'DATETIME', 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key

        // foreign key ke tabel jamaah
        $this->forge->addForeignKey('jamaah_id', 'jamaah', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('notifikasi_wa');
    }

    public function down()
    {
        $this->forge->dropTable('notifikasi_wa');
    }
}
