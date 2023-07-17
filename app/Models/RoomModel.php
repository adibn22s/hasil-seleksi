<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;
use App\Models\PewawancaraModel; 
use App\Models\WawancaraModel; 


class RoomModel extends Model
{
    
    protected $table = 'room';
    protected $useSoftDeletes = true;
    protected $primaryKey = 'id';
    protected $allowedFields = [ 
        'no_ruang', 
        'tgl_wawancara', 
        'jam', 
        'link', 
        'meeting_id', 
        'password', 
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

    public function pewawancara()
    {
        return $this->hasMany(PewawancaraModel::class, 'room_id', 'id');
    }

    public function wawancara()
    {
        return $this->hasMany(WawancaraModel::class, 'room_id', 'id');
    }
}
