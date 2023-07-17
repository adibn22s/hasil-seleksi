<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;

class PermissionRoleModel extends Model
{
    protected $table = 'permission_role';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function permission()
    {
        return $this->belongsTo(PermissionModel::class, 'permission_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'id');
    }

    public function hasPermission($userId, $permission)
    {
        $roleUserModel = new RoleUserModel();

        // Cari role_id berdasarkan user_id
        $roleUser = $roleUserModel->where('user_id', $userId)->first();

        if ($roleUser) {
            // Cari permission_role berdasarkan role_id dan permission_id
            $permissionRole = $this->where('role_id', $roleUser['role_id'])
                ->join('permission', 'permission.id = permission_role.permission_id')
                ->where('permission.title', $permission)
                ->first();

            return !empty($permissionRole);
        }

        return false;
    }
}