<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTemplateTable extends Migration
{
    public function up()
    {
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
            'surat_pernyataan_peraturan' => [
                'type' => 'LONGTEXT',
            ],
            'surat_pernyataan_IPK' => [
                'type' => 'LONGTEXT',
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

         // Menentukan primary key
         $this->forge->addPrimaryKey('id');

         // Membuat tabel administrasi_akhir
         $this->forge->createTable('template');
    }

    public function down()
    {
        $this->forge->dropTable('template');
    }
}
