<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWawancaraTable extends Migration
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
            'room_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'berkas_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'hasil_wawancara' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'status_wawancara' => [
                'type' => 'ENUM',
                'constraint' => ['Lolos', 'Tidak Lolos', 'Diproses'],
                'default' => 'Diproses',
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

        // Menambahkan foreign key ke dalam tabel 
        $this->forge->addForeignKey('room_id', 'room', 'id', 'CASCADE', 'CASCADE');
        
        // Menambahkan foreign key ke tabel berkas
        $this->forge->addForeignKey('berkas_id', 'berkas', 'id', 'CASCADE', 'CASCADE');

        // Menentukan primary key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel
        $this->forge->createTable('wawancara');
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('wawancara');
    }
}
