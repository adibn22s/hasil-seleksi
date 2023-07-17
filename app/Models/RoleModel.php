<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'title', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function user()
    {
        return $this->belongsToMany(UserModel::class);
    }

    public function permission()
    {
        return $this->belongsToMany(PermissionModel::class);
    }

    public function role_user()
    {
        return $this->hasMany(RoleUserModel::class, 'role_id', 'id');
    }

    public function permission_role()
    {
        return $this->hasMany(PermissionRoleModel::class, 'role_id', 'id');
    }
}