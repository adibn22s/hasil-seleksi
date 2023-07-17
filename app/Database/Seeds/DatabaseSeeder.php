<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{   
    protected $seeders = [
        UserSeeder::class,
        RoleSeeder::class,
        RoleUserSeeder::class,
        PermissionSeeder::class,
        PermissionRoleSeeder::class,
        BerkasSeeder::class,
        WawancaraSeeder::class,
        AdministrasiAkhirSeeder::class,
    ];


    public function run()
    {
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
