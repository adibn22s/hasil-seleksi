<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;
use App\Models\DetailUser; 
use App\Models\RoleModel; 
use App\Models\BerkasModel; 
use App\Models\WawancaraModel; 
use App\Models\AdministrasiAkhirModel;
use App\Models\PermissionRoleModel;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 
        'email', 
        'password', 
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
        return $this->hasMany(RoleModel::class, 'user_id', 'id');
    }
    public function berkas()
    {
        return $this->hasMany(BerkasModel::class, 'user_id', 'id');
    }
    public function wawancara()
    {
        return $this->hasMany(WawancaraModel::class, 'user_id', 'id');
    }
    public function administrasi_akhir()
    {
        return $this->hasMany(AdministrasiAkhirModel::class, 'user_id', 'id');
    }
    public function room()
    {
        return $this->hasMany(RoomModel::class, 'user_id', 'id');
    }
    public function template()
    {
        return $this->hasMany(TemplateModel::class, 'user_id', 'id');
    }

    public function pewawancara()
    {
        return $this->hasMany(PewawancaraModel::class, 'user_id', 'id');
    }

    

}