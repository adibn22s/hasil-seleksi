<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerkasTable extends Migration
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
            ],
            'nomor_registrasi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'kartu_peserta' => [
                'type' => 'LONGTEXT',
            ],
            'kartu_peserta_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'ijazah' => [
                'type' => 'LONGTEXT',
            ],
            'ijazah_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'nilai_us' => [
                'type' => 'LONGTEXT',
            ],
            'nilai_us_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'rapor_smt4_6' => [
                'type' => 'LONGTEXT',
            ],
            'rapor_smt4_6_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'prestasi' => [
                'type' => 'LONGTEXT',
            ],
            'prestasi_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'slip_gaji' => [
                'type' => 'LONGTEXT',
            ],
            'slip_gaji_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'SKTM' => [
                'type' => 'LONGTEXT',
            ],
            'SKTM_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'KK' => [
                'type' => 'LONGTEXT',
            ],
            'KK_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'rekening_listrik' => [
                'type' => 'LONGTEXT',
            ],
            'rekening_listrik_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'KTP' => [
                'type' => 'LONGTEXT',
            ],
            'KTP_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'hasil_seleksi' => [
                'type' => 'LONGTEXT',
            ],
            'hasil_seleksi_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
            ],
            'rumah' => [
                'type' => 'LONGTEXT',
            ],
            'rumah_status' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses',
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
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Menambahkan foreign key
        $this->forge->createTable('berkas');
    }

    public function down()
    {
        $this->forge->dropTable('berkas');
    }
}
