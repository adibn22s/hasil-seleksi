<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePewawancaraTable extends Migration
{
    public function up()
    {
        // Membuat tabel wawancara
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'room_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        
        // Menambahkan foreign key ke tabel berkas
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Menambahkan foreign key ke dalam tabel 
        $this->forge->addForeignKey('room_id', 'room', 'id', 'CASCADE', 'CASCADE');
        
        // Menentukan primary key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel
        $this->forge->createTable('pewawancara');
    }

    public function down()
    {
        //
    }
}
