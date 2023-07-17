<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;  
use App\Models\RoomModel; 

class PewawancaraModel extends Model
{
    protected $table            = 'pewawancara';
    protected $useSoftDeletes = true;
    protected $primaryKey = 'id';
    protected $allowedFields = [ 
        'user_id',
        'room_id', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function user()
    {
        return $this->belongsToMany(UserModel::class, 'user_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'room_id', 'id');
    }
}
