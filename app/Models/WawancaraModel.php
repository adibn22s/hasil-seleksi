<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;
use App\Models\UserModel; 
use App\Models\BerkasModel; 
use App\Models\RoomModel; 

class WawancaraModel extends Model
{
    protected $table = 'wawancara';
    protected $useSoftDeletes = true;
    protected $primaryKey = 'id';
    protected $allowedFields = [ 
        'room_id',
        'berkas_id',
        'hasil_wawancara', 
        'status_wawancara', 
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

    public function berkas()
    {
        return $this->belongsTo(BerkasModel::class, 'berkas_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'room_id', 'id');
    }
    public function administrasi_akhir()
    {
        return $this->hasMany(AdministrasiAkhirModel::class, 'wawancara_id', 'id');
    }
    
}