<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateModel extends Model
{
    
    protected $table            = 'template';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'surat_pernyataan_peraturan',  
        'surat_pernyataan_IPK',
        'created_at', 
        'updated_at',
        'deleted_at'

    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $deletedField = 'deleted_at';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
