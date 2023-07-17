<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;
use App\Models\UserModel;
use App\Models\WawancaraModel;
use App\Models\BerkasModel;

class AdministrasiAkhirModel extends Model
{
    protected $table = 'administrasi_akhir';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [   'user_id',
        'berkas_id',
        'wawancara_id',
        'surat_pernyataan_peraturan', 
        'status_surat_pernyataan_peraturan', 
        'surat_pernyataan_IPK', 
        'status_surat_pernyataan_IPK', 
        'link', 
        'status_kelulusan', 
        'is_data_inputted', 
        'created_at', 
        'updated_at',
        'deleted_at'
    ];
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $deletedField = 'deleted_at';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function wawancara()
    {
        return $this->belongsTo(WawancaraModel::class, 'wawancara_id', 'id');
    }

    public function berkas()
    {
        return $this->belongsTo(BerkasModel::class, 'berkas_id', 'id');
    }
}