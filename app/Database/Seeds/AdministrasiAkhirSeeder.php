<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdministrasiAkhirSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'user_id' => 1,
                'berkas_id' => 1,
                'wawancara_id' => 1,
                'surat_pernyataan_peraturan' => 'sp.jpg',
                'status_surat_pernyataan_peraturan'=> 'Valid',
                'surat_pernyataan_IPK' => 'ipk.jpg',
                'status_surat_pernyataan_IPK' => 'Valid',
                'link' => 'youtube.com',
                'status_kelulusan' => 'Lolos'
            ],
            [
                'user_id' => 2,
                'berkas_id' => 2,
                'wawancara_id' => 2,
                'surat_pernyataan_peraturan' => 'sp.jpg',
                'status_surat_pernyataan_peraturan'=> 'Invalid',
                'surat_pernyataan_IPK' => 'ipk.jpg',
                'status_surat_pernyataan_IPK' => 'Valid',
                'link' => NULL,
                'status_kelulusan' => 'Tidak Lolos'
            ]
        ]; 
        $this->db->table('administrasi_akhir')->insertBatch($data);
    }
}
