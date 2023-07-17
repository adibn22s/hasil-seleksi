<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BerkasSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'user_id' => 1,
                'nomor_registrasi' => 'ABC123',
                'kartu_peserta' => 'Kartu Peserta Data.jpg',
                'kartu_peserta_status' => 'Valid',
                'ijazah' => 'ijazah.jpg',
                'ijazah_status' => 'Valid',
                'nilai_us' => 'nilai_us.jpg',
                'nilai_us_status' => 'Valid',
                'rapor_smt4_6' => 'rapor.jpg',
                'rapor_smt4_6_status' => 'Valid',
                'prestasi' => 'prestasi.jpg',
                'prestasi_status' => 'Valid',
                'slip_gaji' => 'slip_gaji.jpg',
                'slip_gaji_status' => 'Valid',
                'SKTM' => 'sktm.jpg',
                'SKTM_status' => 'Valid',
                'KK' => 'KK.jpg',
                'KK_status' => 'Valid',
                'rekening_listrik' => 'kening_listrik.jpg',
                'rekening_listrik_status' => 'Valid',
                'KTP' => 'ktp.jpg',
                'KTP_status' => 'Valid',
                'hasil_seleksi' => 'hasil_seleksi.jpg',
                'hasil_seleksi_status' => 'Valid',
                'rumah' => 'rumah.jpg',
                'rumah_status' => 'Valid',
                'status_kelulusan' => 'Lolos',
                'is_data_inputted' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'nomor_registrasi' => 'ABC456',
                'kartu_peserta' => 'Kartu Peserta Data.jpg',
                'kartu_peserta_status' => 'invalid',
                'ijazah' => 'ijazah.jpg',
                'ijazah_status' => 'Valid',
                'nilai_us' => 'nilai_us.jpg',
                'nilai_us_status' => 'Valid',
                'rapor_smt4_6' => 'rapor.jpg',
                'rapor_smt4_6_status' => 'Valid',
                'prestasi' => 'prestasi.jpg',
                'prestasi_status' => 'Valid',
                'slip_gaji' => 'slip_gaji.jpg',
                'slip_gaji_status' => 'Invalid',
                'SKTM' => 'sktm.jpg',
                'SKTM_status' => 'Valid',
                'KK' => 'KK.jpg',
                'KK_status' => 'Invalid',
                'rekening_listrik' => 'kening_listrik.jpg',
                'rekening_listrik_status' => 'Valid',
                'KTP' => 'ktp.jpg',
                'KTP_status' => 'Valid',
                'hasil_seleksi' => 'hasil_seleksi.jpg',
                'hasil_seleksi_status' => 'Valid',
                'rumah' => 'rumah.jpg',
                'rumah_status' => 'Valid',
                'status_kelulusan' => 'Lolos',
                'is_data_inputted' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('berkas')->insertBatch($data);
    }
}
