<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pendaftaran_id'     => ['type' => 'INT', 'unsigned' => true], 
            'user_id'            => ['type' => 'INT', 'unsigned' => true], // <== admin/staf yang input
            'jumlah_pembayaran'  => ['type' => 'INT'],
            'metode_pembayaran'  => ['type' => 'ENUM("Cash","Cicilan")', 'default' => 'Cash'],
            'tanggal_pembayaran' => ['type' => 'DATE'],
            'bukti_pembayaran'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'         => ['type' => 'DATETIME', 'null' => true],
            'updated_at'         => ['type' => 'DATETIME', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pendaftaran_id', 'pendaftaran', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // <== foreign key ke users
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
