<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WawancaraSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'berkas_id' => 1,
                'hasil_wawancara' => 'sangat bagus semuanya',
                'status_wawancara' => 'lulus',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'berkas_id' => 2,
                'hasil_wawancara' => 'sangat bagus semuanya',
                'status_wawancara' => 'tidak lulus',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('wawancara')->insertBatch($data);
    }
}
