<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
        $adminPermissions = $this->db->table('permission')->get()->getResult();

        $adminRoleId = 1;
        $adminPermissionIds = array_column($adminPermissions, 'id');

        $adminRolePermissions = array_map(function ($permissionId) use ($adminRoleId) {
            return [
                'role_id' => $adminRoleId,
                'permission_id' => $permissionId,
            ];
        }, $adminPermissionIds);

        // Sync admin role with all permissions
        $this->db->table('permission_role')->insertBatch($adminRolePermissions);

        // Get user permissions
        $userPermissions = array_filter($adminPermissions, function ($permission) {
            return strpos($permission->title, 'user_') !== 0
                && strpos($permission->title, 'role_') !== 0
                && strpos($permission->title, 'permission_') !== 0;
        });

        $userRoleId = 2;
        $userPermissionIds = array_column($userPermissions, 'id');

        $userRolePermissions = array_map(function ($permissionId) use ($userRoleId) {
            return [
                'role_id' => $userRoleId,
                'permission_id' => $permissionId,
            ];
        }, $userPermissionIds);

        // Sync user role with user permissions
        $this->db->table('permission_role')->insertBatch($userRolePermissions);
    }
}
