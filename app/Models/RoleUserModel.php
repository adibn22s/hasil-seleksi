<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;

class RoleUserModel extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'user_id',
        'role_id',
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
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'id');
    }
}