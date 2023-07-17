<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdministrasiAkhirTable extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => false,
            ],
            'berkas_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'wawancara_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'surat_pernyataan_peraturan' => [
                'type' => 'LONGTEXT',
            ],
            'status_surat_pernyataan_peraturan' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'surat_pernyataan_IPK' => [
                'type' => 'LONGTEXT',
            ],
            'status_surat_pernyataan_IPK' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255, 
                'null' => true,  
            ],
            'status_kelulusan' => [
                'type' => 'ENUM',
                'constraint' => ['Lolos', 'Tidak Lolos', 'Diproses'],
                'default' => 'Diproses',
            ],
            'is_data_inputted' => [
                'type' => 'BOOLEAN',
                'default' => 0,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Menambahkan foreign key ke dalam tabel
        $this->forge->addForeignKey('wawancara_id', 'wawancara', 'id', 'CASCADE', 'CASCADE');

        // Menambahkan foreign key ke dalam tabel
        $this->forge->addForeignKey('berkas_id', 'berkas', 'id', 'CASCADE', 'CASCADE');

        // Menentukan primary key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel administrasi_akhir
        $this->forge->createTable('administrasi_akhir');
    }

    public function down()
    {
        // Menghapus tabel administrasi_akhir
        $this->forge->dropTable('administrasi_akhir');
    }
}