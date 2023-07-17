<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Wawancara',
                'email' => 'Wawancara@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Peserta1',
                'email' => 'Peserta1@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
