<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'user_id' => 1, // ID user yang akan dihubungkan dengan peran
                'role_id' => 1, // ID peran yang akan disinkronkan
            ],
            [
                'user_id' => 2, // ID user yang akan dihubungkan dengan peran
                'role_id' => 2, // ID peran yang akan disinkronkan
            ],
            [
                'user_id' => 3, // ID user yang akan dihubungkan dengan peran
                'role_id' => 3, // ID peran yang akan disinkronkan
            ],
        ];

        $this->db->table('role_user')->insertBatch($data);
    }
}
