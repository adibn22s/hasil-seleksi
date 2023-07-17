<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BerkasModel;
use App\Models\WawancaraModel;
use App\Models\AdministrasiAkhirModel;
use App\Models\UserModel;
use App\Models\RoleUserModel;
use App\Models\TemplateModel;
use App\Models\PermissionRoleModel;
use App\Models\RoomModel;

class Seleksi extends BaseController
{
    protected $permissionRoleModel;

    public function __construct()
    {
        $this->permissionRoleModel = new PermissionRoleModel();
    }

    public function login()
    {
        $session = session();
            $data = [
                'title' => 'Seleksi | Login',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input')
            ];
            return view('pages/frontsite/login', $data);
    }
    

    public function tombollogin()
    {
        $session = session();
        // Mendapatkan data yang dikirimkan dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Panggil model UserModel atau sesuaikan dengan nama model yang Anda gunakan
        $userModel = new UserModel();
    
        // Cari user berdasarkan email
        $user = $userModel->where('email', $email)->first();
    
        // Periksa apakah user ditemukan dan password sesuai
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Buat session untuk menandakan bahwa user telah login
                $session->set('logged_in', true);
                $session->set('user', $user);
    
                // Panggil model RoleUserModel atau sesuaikan dengan nama model yang Anda gunakan
                $roleUserModel = new RoleUserModel();
    
                // Cek role user
                $roleUser = $roleUserModel->where('user_id', $user['id'])->first();
    
                if ($roleUser && in_array($roleUser['role_id'], [3])) {
                    // Jika role user adalah 1 atau 2, redirect ke halaman '/backsite/dashboard'
                    return redirect()->to('/beranda');
                } else {

                    if(!$this->validate([
                        'email' => [
                            'rules' => 'required|matches[users.email]',
                            'errors' => [
                                'required' => 'Kolom {field} wajib diisi.',
                                'matches' => '{field} Tidak Ditemukan.',
                            ]
                            ],
                
                    ]))
                    // validasi jika user tidak ditemukan
                    $validation = \Config\Services::validation();
                    $session->setFlashdata('input', $this->request->getPost());
            
                    $data = [
                        'title' => 'Seleksi | Login',
                        'validation' => $validation,
                        'input' => $session->getFlashdata('input')
                    ];
                    return view('pages/frontsite/login', $data);
                }
            } else {
                // validasi jika password tidak sesuai
                $validation = \Config\Services::validation();
                $validation->setError('password', 'Password salah.');
                $session->setFlashdata('input', $this->request->getPost());
    
                $data = [
                    'title' => 'Seleksi | Login',
                    'validation' => $validation,
                    'input' => $session->getFlashdata('input')
                ];
                return view('pages/frontsite/login', $data);
            }
        } else {

            if(!$this->validate([
                'email' => [
                    'rules' => 'required|matches[users.email]',
                    'errors' => [
                        'required' => 'Kolom {field} wajib diisi.',
                        'matches' => '{field} Salah.',
                    ]
                    ],
        
            ]))
            // validasi jika user tidak ditemukan
            $validation = \Config\Services::validation();
            $session->setFlashdata('input', $this->request->getPost());
    
            $data = [
                'title' => 'Seleksi | Login',
                'validation' => $validation,
                'input' => $session->getFlashdata('input')
            ];
            return view('pages/frontsite/login', $data);
        }
    }
    

    

    public function pengumuman()
    {
        
        $session = session();

    // Periksa apakah user sudah login
    if (!$session->get('logged_in')) {
        // Jika user belum login, redirect ke halaman login
        return redirect()->to('/login');
    }

    // Mendapatkan ID user yang sedang login
    $userId = session('user')['id'];
    
    if ($this->permissionRoleModel->hasPermission($userId, 'pengumumanpeserta_access')) {

    $wawancaraModel = new WawancaraModel();
    $berkasModel = new BerkasModel();
    $administrasiModel = new AdministrasiAkhirModel();
    $userModel = new UserModel();

    // Mendapatkan data wawancara berdasarkan berkas_id
    $wawancara = $wawancaraModel->where('berkas_id', $userId)->first();

    if ($wawancara) {
        $berkasId = $wawancara['berkas_id'];

        // Mencari data berkas berdasarkan berkas_id
        $berkas = $berkasModel->where('id', $berkasId)->first();

        if ($berkas) {
            $userId = $berkas['user_id'];
            $data = [
                'title' => 'Seleksi | Hasil Akhir',
                'berkas' => $berkas
            ];

            
            // Gunakan $userId yang didapatkan untuk keperluan selanjutnya

            if ($wawancara['status_wawancara'] == 'Tidak Lolos') {
                return view('pages/frontsite/wawancaragagal', $data);
            }
            // Mendapatkan data administrasi akhir berdasarkan user_id
            $administrasiAkhir = $administrasiModel->where('user_id', $userId)->first();
            $user = $userModel->find($userId);

            $data = [
                'title' => 'Seleksi | Hasil Akhir',
                'berkas' => $berkas,
                'administrasi' => $administrasiAkhir,
                'user' => $user,
            ];
            if ($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Tidak Lolos') {
                return view('pages/frontsite/wawancaragagal', $data);
            }elseif($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Diproses') {
                return view('pages/frontsite/menunggu', $data);
            }elseif($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Lolos') {
                return view('pages/frontsite/pengumuman', $data);
            }
            
            // dd($data);
            // Jika tidak ada kondisi yang terpenuhi, tampilkan halaman akhir
                return view('pages/frontsite/menunggu', $data);
            }
        
        }
    }
            $data = [
        'title' => 'Seleksi | Pengumuman Akhir ',
    ];
    return view('pages/frontsite/menunggu', $data);
}
    

    public function awal()
    {
        
        $session = session();

        // Periksa apakah user sudah login
        if (!$session->get('logged_in')) {
            // Jika user belum login, redirect ke halaman login
            return redirect()->to('/login');
        }
        
        // Mendapatkan ID user yang sedang login
        $userId = session('user')['id'];

        if ($this->permissionRoleModel->hasPermission($userId, 'hasilawalpeserta_access')) {
            
            $model = new BerkasModel();
            $berkas = $model->where('user_id', $userId)->findAll();
        
            if ($berkas) {
                $berkasId = $berkas[0]['id'];
                foreach ($berkas as $item) {
                    $data = [
                        'title' => 'Seleksi | Hasil Awal',
                        'berkas' => $berkas
                    ];
                    if ($item['status_kelulusan'] == 'Tidak Lolos') {
                        return view('pages/frontsite/awalgagal', $data);
                    }elseif ($item['status_kelulusan'] == 'Diproses') {
                        return view('pages/frontsite/menunggu', $data);
                    }
                }
        
                $wawancaraModel = new WawancaraModel();
                $wawancara = $wawancaraModel->where('berkas_id', $berkasId)->first();
        
                if ($wawancara) {
                    $wawancaraId = $wawancara['room_id'];
        
                    $roomModel = new RoomModel();
                    $room = $roomModel->where('id', $wawancaraId)->first();
        
                    $data = [
                        'title' => 'Seleksi | Hasil Awal',
                        'berkas' => $berkas,
                        'wawancara' => $wawancara,
                        'room' => $room,
                    ];
                    // dd($data);
                    return view('pages/frontsite/awal', $data);
                }
            }
        
            // Menampilkan view "pages/frontsite/menunggu" jika tidak memenuhi kondisi di atas
            $data = [
                'title' => 'Seleksi | Hasil Awal',
                'berkas' => $berkas,
            ];
            return view('pages/frontsite/menunggu', $data);
        }
    $data = [
        'title' => 'Seleksi | Hasil Awal',
    ];
    return view('pages/frontsite/menunggu', $data);
}
    

    public function logout()
        {
            // Hapus data session yang terkait dengan login
            session()->destroy();

            // Redirect ke halaman login atau halaman lain yang Anda inginkan
            return redirect()->to('/login');
        }


        public function akhir()
{
    $session = session();

    // Periksa apakah user sudah login
    if (!$session->get('logged_in')) {
        // Jika user belum login, redirect ke halaman login
        return redirect()->to('/login');
    }
    $userId = session('user')['id'];
    
    if ($this->permissionRoleModel->hasPermission($userId, 'hasilakhirpeserta_access')) {
    $wawancaraModel = new WawancaraModel();
    $berkasModel = new BerkasModel();
    $administrasiModel = new AdministrasiAkhirModel();

    // Mendapatkan data wawancara berdasarkan berkas_id
    $wawancara = $wawancaraModel->where('berkas_id', $userId)->first();

    if ($wawancara) {
        $berkasId = $wawancara['berkas_id'];

        // Mencari data berkas berdasarkan berkas_id
        $berkas = $berkasModel->where('id', $berkasId)->first();

        if ($berkas) {
            $userId = $berkas['user_id'];

            // Gunakan $userId yang didapatkan untuk keperluan selanjutnya

            $data = [
                'title' => 'Seleksi | Hasil Akhir',
                'berkas' => $berkas
            ];
            if ($wawancara['status_wawancara'] == 'Tidak Lolos') {
                return view('pages/frontsite/wawancaragagal', $data);
            }
            // Mendapatkan data administrasi akhir berdasarkan user_id
            $administrasiAkhir = $administrasiModel->where('user_id', $userId)->first();
            $data = [
                'title' => 'Seleksi | Hasil Akhir',
                'berkas' => $berkas,
                'administrasi' => $administrasiAkhir
            ];
            if ($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Tidak Lolos') {
                return view('pages/frontsite/akhirgagal', $data);
            }elseif($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Diproses') {
                return view('pages/frontsite/menunggu', $data);
            
            }elseif($administrasiAkhir && $administrasiAkhir['status_kelulusan'] == 'Lolos') {
                return view('pages/frontsite/akhir', $data);
            }
            
            // dd($data);
            // Jika tidak ada kondisi yang terpenuhi, tampilkan halaman akhir
                return view('pages/frontsite/menunggu', $data);
        }
        }
    }
        $data = [
        'title' => 'Seleksi | Hasil Akhir',
    ];
    return view('pages/frontsite/menunggu', $data);
}



public function wawancara()
{
    $session = session();

    // Periksa apakah user sudah login
    if (!$session->get('logged_in')) {
        // Jika user belum login, redirect ke halaman login
        return redirect()->to('/login');
    }

    // Mendapatkan ID user yang sedang login
    $userId = session('user')['id'];
    
    if ($this->permissionRoleModel->hasPermission($userId, 'hasilwawancarapeserta_access')) {
    // Mendapatkan berkas_id dari tabel berkas berdasarkan user_id
    $berkasModel = new BerkasModel();
    $berkas = $berkasModel->where('user_id', $userId)->first();
    
    $data = [
        'title' => 'Seleksi | Wawancara',
    ];
    if ($berkas) {
        $berkasId = $berkas['id'];

        $wawancaraModel = new WawancaraModel();
        $wawancara = $wawancaraModel->where('berkas_id', $berkasId)->first();

        if($berkas['status_kelulusan'] == 'Tidak Lolos') {
            return view('pages/frontsite/wawancaragagal', $data);
        }elseif ($wawancara && $wawancara['status_wawancara'] === 'Lolos') {
            // Jika status wawancara lulus, tampilkan halaman wawancara
            return view('pages/frontsite/wawancara', $data);
        } elseif ($wawancara && $wawancara['status_wawancara'] === 'Tidak Lolos'){
            return view('pages/frontsite/wawancaragagal', $data);
        } elseif ($wawancara && $wawancara['status_wawancara'] === 'Diproses'){
            return view('pages/frontsite/menunggu', $data);
        }
    }
    else{
            // Jika status wawancara Tidak Lolos, tampilkan halaman wawancaragagal
            return view('pages/frontsite/menunggu', $data);
        }
    }
        $data = [
        'title' => 'Seleksi | Hasil Wawancara',
    ];
    return view('pages/frontsite/menunggu', $data);
}
    

    

public function submit()
    {
        $session = session();

        // Periksa apakah user sudah login
        if (!$session->get('logged_in')) {
            // Jika user belum login, redirect ke halaman login
            return redirect()->to('/login');
        }

        // Mendapatkan id user
        $id_user = session('user')['id'];
        $userModel = new UserModel();
        $user = $userModel->find($id_user);

        // Mendapatkan data dari table berkas berdasarkan user_id
        $berkasModel = new BerkasModel();
        $berkas = $berkasModel->where('user_id', $id_user)->findAll();

        if (count($berkas) > 0) {
            $id_berkas = $berkas[0]['id'];

            // Mendapatkan data dari tabel wawancara berdasarkan berkas_id
            $wawancaraModel = new WawancaraModel();
            $wawancara = $wawancaraModel->where('berkas_id', $id_berkas)->findAll();

            if (count($wawancara) > 0) {
                $id_wawancara = $wawancara[0]['id'];

                $suratPernyataan = $this->request->getFile('surat_pernyataan_peraturan');
                $suratIpk = $this->request->getFile('surat_pernyataan_IPK');

                if(!$this->validate([
                    'surat_pernyataan_peraturan' => [
                        'rules' => 'uploaded[surat_pernyataan_peraturan]|ext_in[surat_pernyataan_peraturan,pdf]|max_size[surat_pernyataan_peraturan,1024]',
                        'errors' => [
                            'uploaded' => 'File wajib diisi.',
                            'ext_in' => 'File harus berupa file PDF.',
                            'max_size' => 'Ukuran file lebih dari 1MB.'
                        ]
                        ],
                    'surat_pernyataan_IPK' => [
                        'rules' => 'uploaded[surat_pernyataan_IPK]|ext_in[surat_pernyataan_IPK,pdf]|max_size[surat_pernyataan_IPK,1024]',
                        'errors' => [
                            'uploaded' => 'File wajib diisi.',
                            'ext_in' => 'File harus berupa file PDF.',
                            'max_size' => 'Ukuran file lebih dari 1MB.'
                        ]
                        ],
            
                ])) {
                    // Memuat pustaka validasi
                    $validation = \Config\Services::validation();
                    // dd($validation);
                     // Menyimpan data masukan ke dalam session
                     $session = session();
                     $session->setFlashdata('input', $this->request->getPost());
            
                    $data = [
                        'title' => 'Seleksi | Berkas',
                        'validation' => $validation,
                        'input' => $session->getFlashdata('input'),
                    ];
                    return view('pages/frontsite/formberkas', $data);
                }

                // Pindahkan file yang diunggah
                $suratPernyataanName = $suratPernyataan->getRandomName();
                $suratIpkName = $suratIpk->getRandomName();
                $suratPernyataan->move(ROOTPATH . 'public/akhir', $suratPernyataanName);
                $suratIpk->move(ROOTPATH . 'public/akhir', $suratIpkName);

                // Simpan informasi file dan data pengguna ke database
                $administrasiakhirModel = new AdministrasiAkhirModel();
                $data = [
                    'user_id' => $id_user,
                    'berkas_id' => $id_berkas,
                    'wawancara_id' => $id_wawancara,
                    'surat_pernyataan_peraturan' => $suratPernyataanName,
                    'surat_pernyataan_IPK' => $suratIpkName,
                    'is_data_inputted' => true,
                ];
                $administrasiakhirModel->insert($data);
                
                $data = [
                    'title' => 'Seleksi | Berkas',
                    'validation' => \Config\Services::validation(),
                ];
                // Redirect atau tampilkan pesan sukses
                return view('pages/frontsite/menunggu', $data);
                // Tindakan yang akan diambil jika tidak ada wawancara yang ditemukan untuk berkas_id yang sesuai
                return redirect()->back()->withInput()->with('error', 'Data wawancara tidak ditemukan');
            }
        } else {
            // Tindakan yang akan diambil jika tidak ada berkas yang ditemukan untuk user yang sedang login
            return redirect()->back()->withInput()->with('error', 'Data berkas tidak ditemukan');
        }
    }





    public function formberkas()
    {
        $session = session();
    
        // Periksa apakah user sudah login
        if (!$session->get('logged_in')) {
            // Jika user belum login, redirect ke halaman login
            return redirect()->to('/login');
        }

        $userId = session('user')['id'];
    
    if ($this->permissionRoleModel->hasPermission($userId, 'formberkas_access')) {
    
        
    
        // Panggil model AdministrasiAkhirModel dan BerkasModel
        $administrasiModel = new AdministrasiAkhirModel();
        $wawancaraModel = new WawancaraModel();
        $berkasModel = new BerkasModel();
        $templateModel = new TemplateModel();

        // Mendapatkan data wawancara berdasarkan berkas_id
        $wawancara = $wawancaraModel->where('berkas_id', $userId)->first();

    if ($wawancara) {
        $berkasId = $wawancara['berkas_id'];

        // Mencari data berkas berdasarkan berkas_id
        $berkas = $berkasModel->where('id', $berkasId)->first();

        if ($berkas) {
            $userId = $berkas['user_id'];
            // Mendapatkan data template terbaru
            $template = $templateModel->orderBy('created_at', 'DESC')->first();
            $data = [
                'title' => 'Seleksi | Berkas',
                'berkas' => $berkas,
                'template' => $template,
                'validation' => \Config\Services::validation(),
            ];

            
            // Gunakan $userId yang didapatkan untuk keperluan selanjutnya
            if ($wawancara['status_wawancara'] == 'Tidak Lolos') {
                return view('pages/frontsite/wawancaragagal', $data);
            }elseif($wawancara['status_wawancara'] == 'Diproses') {
                // dd($data);
                return view('pages/frontsite/menunggu', $data);
            }
            // Mendapatkan data administrasi akhir berdasarkan user_id
            $administrasiAkhir = $administrasiModel->where('user_id', $userId)->first();

            // Mendapatkan data template terbaru
            $template = $templateModel->orderBy('created_at', 'DESC')->first();
            
            $data = [
                'title' => 'Seleksi | Berkas',
                'berkas' => $berkas,
                'administrasi' => $administrasiAkhir,
                'template' => $template,
                'validation' => \Config\Services::validation(),
            ];
        
        // Periksa status_kelulusan
        if ($administrasiAkhir && ($administrasiAkhir['status_kelulusan'] == 'Diproses' || $administrasiAkhir['status_kelulusan'] == 'Lolos' || $administrasiAkhir['status_kelulusan'] == 'Tidak Lolos')) {
        //     // Jika status_kelulusan adalah Diproses, lulus, atau Tidak Lolos, redirect ke halaman lain atau tampilkan pesan
            
        return view('pages/frontsite/menunggu', $data );
        }
        else 
        {    
            return view('pages/frontsite/formberkas', $data);
        }
    }
}
    }
            $data = [
        'title' => 'Seleksi | Form Berkas',
    ];
    return view('pages/frontsite/menunggu', $data);
}
    
   
    

public function tunggu(){
    $session = session();
    
    // Periksa apakah user sudah login
    if (!$session->get('logged_in')) {
        // Jika user belum login, redirect ke halaman login
        return redirect()->to('/login');
    }
    $data = [
        'title' => 'Berkas | Berkas',
    ];
    // Redirect atau tampilkan pesan sukses
    return view('pages/frontsite/menunggu' ,$data);

}

public function home(){
    
    $data = [
        'title' => 'Berkas | Home',
    ];
    // Redirect atau tampilkan pesan sukses
    return view('pages/frontsite/homepage' ,$data);

}

public function beranda(){
    
    $userId = session('user')['id'];
    $userModel = new UserModel();
    $berkasModel = new BerkasModel();

    $user = $userModel->where('id',$userId)->first();
    $berkas = $berkasModel->where('user_id',$userId)->first();

    $data = [
        'title' => 'Berkas | Beranda',
        'user' => $user,
        'berkas' => $berkas,
    ];
    // dd($data);
    // Redirect atau tampilkan pesan sukses
    return view('pages/frontsite/beranda' ,$data);

}
}
