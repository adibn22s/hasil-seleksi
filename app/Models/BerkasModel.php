<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;

class BerkasModel extends Model
{
    protected $table = 'berkas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'nomor_registrasi',
        'kartu_peserta',
        'kartu_peserta_status',
        'ijazah',
        'ijazah_status',
        'nilai_us',
        'nilai_us_status',
        'rapor_smt4_6',
        'rapor_smt4_6_status',
        'prestasi',
        'prestasi_status',
        'slip_gaji',
        'slip_gaji_status',
        'SKTM',
        'SKTM_status',
        'KK',
        'KK_status',
        'rekening_listrik',
        'rekening_listrik_status',
        'KTP',
        'KTP_status',
        'hasil_seleksi',
        'hasil_seleksi_status',
        'rumah',
        'rumah_status',
        'status_kelulusan',
        'is_data_inputted',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

   
   

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

     public function wawancara()
    {
        return $this->hasMany(WawancaraModel::class, 'berkas_id', 'id');
    }
     public function administrasi_akhir()
    {
        return $this->hasMany(AdministrasiAkhirModel::class, 'berkas_id', 'id');
    }

     
}