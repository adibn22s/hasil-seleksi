<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'title'      => 'dashboard_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            // user
            [
                'title'      => 'permission_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'role_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'role_edit',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'user_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'user_edit',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'user_delete',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            // permission
            [
                'title'      => 'user_create',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'awal_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            // role
            [
                'title'      => 'dataawal_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'pewawancara_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'admakhir_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'pengumuman_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'dataakhir_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'room_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'pewawancara_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'template_create',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'room_create',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'pengumumanpeserta_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'hasilawalpeserta_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'hasilakhirpeserta_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'hasilwawancarapeserta_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'formberkas_access',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            [
                'title'      => 'edit_wawancara',
                'created_at' => '2023-07-16 00:00:00',
                'updated_at' => '2023-07-16 00:00:00',
            ],
            
        ];

        $this->db->table('permission')->insertBatch($data);
    }
}
