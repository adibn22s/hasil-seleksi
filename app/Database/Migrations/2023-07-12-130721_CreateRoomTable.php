<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomTable extends Migration
{
    public function up()
    {
        // Membuat tabel administrasi_akhir
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_ruang' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
            'tgl_wawancara' => [
                'type' => 'DATE',
            ],
            'jam' => [
                'type' => 'TIME',
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255, 
                'null' => false,  
            ],
            'meeting_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);

        // Menentukan primary key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel administrasi_akhir
        $this->forge->createTable('room');
    }

    public function down()
    {
        $this->forge->dropTable('room');
    }
}
