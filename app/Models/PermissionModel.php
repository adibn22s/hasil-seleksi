<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;

class PermissionModel extends Model
{
    protected $table = 'permission';
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

    public function role()
    {
        return $this->belongsToMany(RoleModel::class, 'role_id', 'id');
    }

    public function permission_role()
    {
        return $this->hasMany(PermissionRoleUserModel::class, 'permission_id', 'id');
    }
}
