<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'foto'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'nama_pengguna' => ['type' => 'VARCHAR', 'constraint' => 50],
            'kata_sandi'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'peran'         => ['type' => 'ENUM("admin","staf")', 'default' => 'staf'],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
