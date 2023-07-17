<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [ 
            [
                'title'      => 'Super Admin', // 1
                'created_at' => '2022-04-22 00:00:00',
                'updated_at' => '2022-04-22 00:00:00',
            ],
            [
                'title'      => 'Wawancara', // 2
                'created_at' => '2022-04-22 00:00:00',
                'updated_at' => '2022-04-22 00:00:00',
            ],
            [
                'title'      => 'Peserta', // 2
                'created_at' => '2022-04-22 00:00:00',
                'updated_at' => '2022-04-22 00:00:00',
            ],
        ];

        $this->db->table('role')->insertBatch($data);
    }
}
