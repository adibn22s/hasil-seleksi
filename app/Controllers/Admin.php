<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BerkasModel;
use App\Models\WawancaraModel;
use App\Models\AdministrasiAkhirModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RoleUserModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\TypeUserModel;
use App\Models\RoomModel;
use App\Models\PewawancaraModel;
use App\Models\TemplateModel;
use SweetAlert\Alert;

class Admin extends BaseController
{
    protected $permissionRoleModel;

    public function __construct()
    {
        $this->permissionRoleModel = new PermissionRoleModel();
    }

    public function index()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'dashboard_access')) {
            $data = [
                'title' => 'Dashboard | Admin',
            ];
            return view('pages/backsite/index', $data);
        } else {
            // Menampilkan halaman error 404
            return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
        }
    }

    public function login()
    {
        $session = session();
            $data = [
                'title' => 'Seleksi | Login',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input')
            ];
            return view('pages/frontsite/login-admin', $data);
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
    
                if ($roleUser && in_array($roleUser['role_id'], [1, 2])) {
                    // Jika role user adalah 1 atau 2, redirect ke halaman '/backsite/dashboard'
                    return redirect()->to('/backsite/dashboard');
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

    public function logout()
        {
            // Hapus data session yang terkait dengan login
            session()->destroy();

            // Redirect ke halaman login atau halaman lain yang Anda inginkan
            return redirect()->to('/loginadmin');
        }

    public function permission()
    {   
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'permission_access')) {
        $permissionModel = new PermissionModel();

        // Mengambil semua data users dari tabel users berdasarkan waktu pembuatannya
        $permission = $permissionModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Permission | Admin',
            'permission' => $permission,
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/permission' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function role()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'role_access')) {
        $roleModel = new RoleModel();
        $permissionroleModel = new PermissionRoleModel();
        $permissionModel = new PermissionModel();

        $role = $roleModel->orderBy('created_at', 'DESC')->findAll();

        // looping untuk setiap role
        foreach ($role as &$roles){
            $rolesId = $roles['id'];

            // Cari data permission_role berdasarkan role_id
            $permission = $permissionroleModel->where('role_id', $rolesId)->findAll();

            // menghitung jumlah permission
            $permissionCount = count($permission);

            // menambahkan jumlah permission_id kedalam $role
            $roles['permission_count'] = $permissionCount;

            // array untuk menampung title dari table permission
            $permissionTitle = [];

            // Melakakukan looping untuk setiap permission
            foreach($permission as $permissions){
                // menammpung permission_id
                $permissionId = $permissions['permission_id'];

                // cari data berdasarkan permission_id yang ditampung sebelumnya
                $permissionData = $permissionModel->find($permissionId);

                // Jika permission ditemukan, akan dimasukkan ke array $permissionTitle
                if($permissionData){
                    $permissionTitle[] = $permissionData['title']; 
                }
            }

            $roles['permission_title'] = $permissionTitle;
        }



        $data = [
            'title' => 'Role | Admin',
             'role' => $role
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/role' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function editrole($roleId)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'role_edit')) {
        $permissionRoleModel = new PermissionRoleModel();
        $permissionModel = new PermissionModel();
        $roleModel = new RoleModel();
    
        // Ambil data permission_role berdasarkan role_id
        $permissionRole = $permissionRoleModel->where('role_id', $roleId)->findAll();
    
        // Dapatkan semua permission dari tabel permission
        $allPermissions = $permissionModel->findAll();
    
        // Buat array baru untuk menyimpan status ceklis permission
        $checkedPermissions = [];
        foreach ($allPermissions as $permission) {
            // Periksa apakah permission terkait dengan role_id
            $checked = false;
            foreach ($permissionRole as $item) {
                if ($item['permission_id'] == $permission['id']) {
                    $checked = true;
                    break;
                }
            }
            // Tambahkan status ceklis ke dalam array
            $checkedPermissions[$permission['id']] = $checked;
        }
    
        $role = $roleModel->find($roleId);
        $data = [
            'title' => 'Edit Role: ' . $role['title'],
            'role_id' => $roleId,
            'permissions' => $allPermissions,
            'checkedPermissions' => $checkedPermissions,
            'role_permissions' => $permissionRole,
        ];
    // dd($data);
        return view('pages/backsite/edit-role', $data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function submiteditrole($roleId)
{
    $selectedPermissions = $this->request->getPost('permissions');

    if (!is_array($selectedPermissions)) {
        $selectedPermissions = []; // Ubah menjadi array kosong jika $selectedPermissions bukan array
    }

    $permissionRoleModel = new PermissionRoleModel();

    // Dapatkan permission_role berdasarkan role_id
    $existingPermissions = $permissionRoleModel->where('role_id', $roleId)->findAll();

    $existingPermissionIds = [];
    foreach ($existingPermissions as $existingPermission) {
        $existingPermissionIds[] = $existingPermission['permission_id'];
    }

    // Periksa permission yang di-submit
    foreach ($selectedPermissions as $permissionId) {
        // Jika permission_id belum ada dalam permission_role, tambahkan ke database
        if (!in_array($permissionId, $existingPermissionIds)) {
            $data = [
                'role_id' => $roleId,
                'permission_id' => $permissionId
            ];
            
            $permissionRoleModel->insert($data);
        }
    }
    
    // Periksa permission yang sudah ada dalam permission_role
    foreach ($existingPermissions as $existingPermission) {
        $permissionId = $existingPermission['permission_id'];
        // Jika permission_id tidak ada dalam permission yang di-submit, hapus dari database
        if (!in_array($permissionId, $selectedPermissions)) {
            $permissionRoleModel->where('role_id', $roleId)->where('permission_id', $permissionId)->delete();
        }
    }
    session()->setFlashdata('pesan','Data Berhasil Diubah.');
    return redirect()->to('/backsite/role');
}

    public function user()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'user_access')) {
    $userModel = new UserModel();

    // Mengambil semua data users dari tabel users berdasarkan waktu pembuatannya
    $users = $userModel->orderBy('created_at', 'DESC')->findAll();

    // Looping untuk setiap user
    foreach ($users as &$user) {
        $userId = $user['id'];
        
        // Panggil model RoleUserModel 
        $roleUserModel = new RoleUserModel();

        // Cari data role_user berdasarkan user_id
        $roleUser = $roleUserModel->where('user_id', $userId)->first();

        if ($roleUser) {
            $roleId = $roleUser['role_id'];
            
            // Panggil model RoleModel 
            $roleModel = new RoleModel();

            // Cari data role berdasarkan role_id
            $role = $roleModel->find($roleId);

            if ($role) {
                $user['role_name'] = $role['title'];
            }
        }
    }

    $data = [
        'title' => 'User | Admin',
        'users' => $users,
    ];

    // Redirect atau tampilkan pesan sukses
    return view('pages/backsite/user', $data);
} else {
    // Menampilkan halaman error 404
    return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
}
    }


    public function admawal()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'awal_access')) {

        $administrasiAwalModel = new BerkasModel();
        $userModel = new UserModel();

        $berkas = $administrasiAwalModel->orderBy('created_at', 'DESC')->findAll();

        // melakukan perulangan untuk seriap data yang ada di tabe berkas
        foreach ($berkas as &$b){
            // mengambil user_id dari tabel berkas
            $userId = $b['user_id'];

            // Mencari data di tabel users berdasarkan user_id
            $user = $userModel->find($userId);

            // jika ada id yang sesuai akan disimpan di variabel $b dengan parameter user_name
            $b['user_name'] = $user['name'];
        }

        $data = [
            'title' => 'Administrasi Awal | Admin',
            'berkas' => $berkas
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/adm-awal' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function dataawal($id)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'dataawal_access')) {

        // Panggil model untuk mengambil data berdasarkan id
        $berkasModel = new BerkasModel();
    
        // Ambil data berkas berdasarkan id
        $berkas = $berkasModel->where('id', $id)->first();
    
        // Jika data berkas ditemukan
        
            $data = [
                'title' => 'Administrasi Awal | Admin',
                'berkas' => $berkas,
            ];
            // dd($data);
            // Tampilkan view dengan data yang diperoleh
            return view('pages/backsite/data-awal', $data);
        } else {
            // Menampilkan halaman error 404
            return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
        }
        } 
        
        public function deletedataawal($id)
        {
            // Panggil model untuk mengambil data berdasarkan id
            $berkasModel = new BerkasModel();
        
            // Cek apakah ada post request dengan key "confirm"
            
                // Jika pengguna mengonfirmasi, hapus data berkas
                $berkas = $berkasModel->where('id', $id)->delete();
                session()->setFlashdata('pesan', 'Data berhasil dihapus.');
            
        
            return redirect()->to('/backsite/admawal');
        }

    


    public function pewawancara($roomId)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'pewawancara_access')) {
        
        $wawancaraModel = new WawancaraModel();
        $berkasModel = new BerkasModel();
        $userModel = new UserModel();
        $roomModel = new RoomModel();
    
        // Mengambil seluruh data room dari tabel
        $room = $roomModel->where('id', $roomId)->first();

        $wawancara = $wawancaraModel->where('room_id', $roomId)->orderBy('created_at', 'DESC')->findAll();

        // melakukan perulangan untuk seriap data yang ada di tabe wawancara
        foreach ($wawancara as &$b){
            // mengambil berkas_id dari tabel berkas
            $berkasId = $b['berkas_id'];
            // Mencari data di tabel berkas berdasarkan berkas_id
            $berkas = $berkasModel->find($berkasId);
            // jika ada id yang sesuai akan disimpan di variabel $b dengan parameter user_id
            $b['user_id'] = $berkas['user_id'];
            // mencari user_id dari tabel berkas untuk mencari data peserta
            $user = $userModel->find($b['user_id']);
            $b['nama'] = $user['name'];
        }

        $data = [
            'title' => 'Wawancara | Admin',
            'wawancara' => $wawancara,
            'room' => $room,
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/pewawancara' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function deleteroom($roomId) {


        $roomModel = new RoomModel();
        $wawancaraModel = new WawancaraModel();

        // Mengambil seluruh data room dari tabel
        $room = $roomModel->where('id', $roomId)->delete();

        // Mengupdate field room_id menjadi kosong atau NULL pada tabel wawancara
        $wawancaraModel->where('room_id', $roomId)->set('room_id', null)->update();

        session()->setFlashdata('pesan', 'Room berhasil dihapus.');
        return redirect()->to('/backsite/room');
        
    }

    public function admakhir()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'admakhir_access')) {

        $administrasiAkhirModel = new AdministrasiAkhirModel();
        $berkasModel = new BerkasModel();
        $userModel = new UserModel();
        
        // menampilkan data berdasarkan tanggal pembuatan
        $adminAkhir = $administrasiAkhirModel->orderBy('created_at', 'DESC')->findAll();

        // perulangan untuk tabel administrasi_akhir di setiap barisnya
        foreach ($adminAkhir as &$b){
            // menangkap berkas_id di tabel admisitrasi_akhir
            $berkasId = $b['berkas_id'];
            // menangkap user_id di tabel admisitrasi_akhir
            $userId = $b['user_id'];

            // mencari berkas_id yang sesuai dengan id di tabel berkas
            $berkas = $berkasModel->find($berkasId);
            // mencari user_id yang sesuai dengan id di tabel users
            $namaUser = $userModel->find($userId);

            // membuat kolom baru dengan nama no_regis untuk menampung nomor_regisrasi berdasarkan berkas_id di tabel administrasi akhir dan id di tabel berkas
            $b['no_regis'] = $berkas['nomor_registrasi'];
            // membuat kolom baru dengan nama "nama" untuk menampung name berdasarkan user_id di tabel administrasi akhir dan id di tabel users
            $b['nama'] = $namaUser['name'];

            
        }

        $data = [
            'title' => 'Administrasi Akhir | Admin',
            'AdmAkhir' => $adminAkhir,
        ];
        // dd($adminAkhir);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/adm-akhir' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function pengumumanakhir()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'pengumuman_access')) {

        $administrasiAkhirModel = new AdministrasiAkhirModel();
        $berkasModel = new BerkasModel();
        $userModel = new UserModel();
        
        // menampilkan data berdasarkan tanggal pembuatan
        $adminAkhir = $administrasiAkhirModel->orderBy('created_at', 'DESC')->findAll();

        // perulangan untuk tabel administrasi_akhir di setiap barisnya
        foreach ($adminAkhir as &$b){
            // menangkap berkas_id di tabel admisitrasi_akhir
            $berkasId = $b['berkas_id'];
            // menangkap user_id di tabel admisitrasi_akhir
            $userId = $b['user_id'];

            // mencari berkas_id yang sesuai dengan id di tabel berkas
            $berkas = $berkasModel->find($berkasId);
            // mencari user_id yang sesuai dengan id di tabel users
            $namaUser = $userModel->find($userId);

            // membuat kolom baru dengan nama no_regis untuk menampung nomor_regisrasi berdasarkan berkas_id di tabel administrasi akhir dan id di tabel berkas
            $b['no_regis'] = $berkas['nomor_registrasi'];
            // membuat kolom baru dengan nama "nama" untuk menampung name berdasarkan user_id di tabel administrasi akhir dan id di tabel users
            $b['nama'] = $namaUser['name'];

            
        }

        $data = [
            'title' => 'Administrasi Akhir | Admin',
            'AdmAkhir' => $adminAkhir,
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/pengumuman-akhir' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }

    public function datadiri()
    {
        $data = [
            'title' => 'Data Diri | Admin',
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/data-diri' ,$data);
    }

    public function isidatadiri()
    {
        $data = [
            'title' => 'Isi Data Diri | Admin',
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/isi-data-diri' ,$data);
    }

    public function edituser($userId)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'user_edit')) {   
    // Dapatkan data role_user berdasarkan user_id
    $roleUserModel = new RoleUserModel();
    $roleUser = $roleUserModel->where('user_id', $userId)->first();

    // Dapatkan data user berdasarkan user_id
    $userModel = new UserModel();
    $user = $userModel->find($roleUser['user_id']);

     // Decrypt password jika diperlukan
    //  $decryptedPassword = password_verify('password_asli', $user['password']);


        $data = [
            'title' => 'Edit User | Admin',
            'berkas' => $user,
            'role' => $roleUser,
            'validation' => \Config\Services::validation(),
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/edit-user' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }
    public function reset($userId)
    {   
    // Dapatkan data role_user berdasarkan user_id
    $roleUserModel = new RoleUserModel();
    $roleUser = $roleUserModel->where('user_id', $userId)->first();

    // Dapatkan data user berdasarkan user_id
    $userModel = new UserModel();
    $user = $userModel->find($roleUser['user_id']);

     // Decrypt password jika diperlukan
    //  $decryptedPassword = password_verify('password_asli', $user['password']);


        $data = [
            'title' => 'Reset Password | Admin',
            'berkas' => $user,
            'role' => $roleUser,
        ];
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/reset-password' ,$data);
    }

    public function resetpassword($userId)
{
    // Validasi inputan form
    $validation = \Config\Services::validation();
    $validation->setRules([
        'new_password' => 'required|min_length[8]',
        'confirm_password' => 'required|matches[new_password]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        // Jika validasi gagal, kembali ke halaman reset password dengan pesan error
        return redirect()->back()->withInput()->with('error', $validation->getErrors());
    }

    // Dapatkan user berdasarkan ID user yang ingin direset passwordnya
    $userModel = new UserModel();
    $user = $userModel->find($userId);

    if (!$user) {
        // Jika user tidak ditemukan, redirect ke halaman yang sesuai atau tampilkan pesan error
        return redirect()->to('/backsite/user')->with('error', 'User not found.');
    }

    // Reset password
    $newPassword = $this->request->getPost('new_password');
    $userModel->update($user['id'], ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);

    // Redirect ke halaman sukses reset password
    session()->setFlashdata('pesan','Password Berhasil Diubah.');
    return redirect()->to('/backsite/user');
}
public function deleteuser($userId)
{
    // Periksa apakah user yang sedang login memiliki akses untuk menghapus pengguna
    $loggedInUserId = session('user')['id'];
    if (!$this->permissionRoleModel->hasPermission($loggedInUserId, 'user_delete')) {
        // Jika tidak memiliki akses, tampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }

    // Hapus data pengguna dari tabel role_user berdasarkan user_id
    $roleUserModel = new RoleUserModel();
    $roleUserModel->where('user_id', $userId)->delete();

    // Hapus data pengguna dari tabel users berdasarkan id
    $userModel = new UserModel();
    $userModel->delete($userId);
    // dd($userModel);
    // Redirect ke halaman lain atau tampilkan pesan sukses
    session()->setFlashdata('pesan', 'User berhasil dihapus.');
    return redirect()->to('/backsite/user');
}


    public function adduser()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'user_create')) {

        // session();
        $data = [
            'title' => 'Add User | Admin',
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/add-user' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    }
    
    public function detailwawancara($id)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'edit_wawancara')) {
        // Panggil model untuk mengambil data berdasarkan id
        $wawancaraModel = new WawancaraModel();
        $berkasModel = new BerkasModel();
    
        // Ambil data berkas berdasarkan id
        $wawancara = $wawancaraModel->where('berkas_id', $id)->findAll();

        $berkas = $berkasModel->find($id);

        

        $data = [
            'title' => 'Detail Wawancara | Admin',
            'wawancara' => $wawancara,
            'berkas' => $berkas,
        ];
        // dd($data);
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/detail-wawancara' ,$data);
    } 
    else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
    
    }
    public function dataakhir($id)
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'dataakhir_access')) {
        $administrasiAkhir = new AdministrasiAkhirModel();

        $berkas = $administrasiAkhir->where('id', $id)->first();
        
        


        $data = [
            'title' => 'Administrasi Akhir | Admin',
            'berkas' => $berkas,
        ];
        // dd($data);
        
        return view('pages/backsite/data-akhir' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }

    }

    public function deletedataakhir($id)
    {
        
        $administrasiAkhir = new AdministrasiAkhirModel();

        $berkas = $administrasiAkhir->where('id', $id)->delete();
        
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/backsite/adm-akhir');
    }

    public function register()
{
    

    if(!$this->validate([
        'name' => [
            'rules' => 'required|is_unique[users.name]',
            'errors' => [
                'required' => 'Kolom {field} wajib diisi.',
                'is_unique' => '{field} Sudah tersedia.',
            ]
            ],
        'email' => [
            'rules' => 'required|is_unique[users.email]',
            'errors' => [
                'required' => 'Kolom {field} wajib diisi.',
                'is_unique' => '{field} Sudah tersedia.',
            ]
            ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Kolom {field} wajib diisi.',
                'min_length' => '{field} Kurang dari 8.',
            ]
            ],
        'role' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom {field} wajib diisi.',
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
            'title' => 'Add User | Admin',
            'validation' => $validation,
            'input' => $session->getFlashdata('input'),
        ];
        return view('pages/backsite/add-user', $data);
    }

    $userModel = new UserModel();
    $userData = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    ];
    $userId = $userModel->insert($userData);

    // Simpan data role_user ke tabel role_user
    $roleModel = new RoleUserModel();
    $roleData = [
        'user_id' => $userId,
        'role_id' => $this->request->getPost('role')
    ];
    $roleModel->insert($roleData);

    session()->setFlashdata('pesan','Data Berhasil Ditambahkan.');
    // Redirect ke halaman sukses registrasi
    return redirect()->to('/backsite/user');
}


    public function submitedituser($userId)
    {   

    // Dapatkan data role_user berdasarkan user_id
    $roleUserModel = new RoleUserModel();
    $roleUser = $roleUserModel->where('user_id', $userId)->first();

    // Dapatkan data user berdasarkan user_id
    $userModel = new UserModel();
    $user = $userModel->find($roleUser['user_id']);


    $validationRules = [
        'name' => 'required', // Validasi kolom 'name' wajib diisi
        'email' => 'required', // Validasi kolom 'email' wajib diisi
        'role' => 'required' // Validasi kolom 'role' wajib diisi
    ];

    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');

    // Tambahkan validasi is_unique hanya jika nilai input berbeda dengan data asli
    if ($name !== $user['name']) {
        $validationRules['name'] .= '|is_unique[users.name]'; // Validasi kolom 'name' harus unik di tabel 'users'
    }
    if ($email !== $user['email']) {
        $validationRules['email'] .= '|is_unique[users.email]'; // Validasi kolom 'email' harus unik di tabel 'users'
    }

    $validationErrors = [
        'name' => [
            'required' => 'Kolom {field} wajib diisi.',
            'is_unique' => '{field} sudah tersedia.'
        ],
        'email' => [
            'required' => 'Kolom {field} wajib diisi.',
            'is_unique' => '{field} sudah tersedia.'
        ],
        'role' => [
            'required' => 'Kolom {field} wajib diisi.'
        ]
    ];

    // Validasi data menggunakan aturan dan pesan kesalahan yang ditentukan
    if (!$this->validate($validationRules, $validationErrors)) {
        $validation = \Config\Services::validation();
        $session = session();
        $session->setFlashdata('input', $this->request->getPost());

        $data = [
            'title' => 'Edit User | Admin',
            'role' => $roleUser,
            'berkas' => $user,
            'validation' => $validation,
            'input' => $session->getFlashdata('input'),
        ];
        return view('pages/backsite/edit-user', $data);
    }

    // Update data user ke tabel users
    $userData = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
    ];
    $userModel->update($user['id'], $userData);

    // Update data role_user ke tabel role_user
    $roleData = [
        'role_id' => $this->request->getPost('role')
    ];
    $roleUserModel->update($roleUser['id'], $roleData);
    // dd($roleUserModel);
    // Redirect ke halaman sukses edit
    session()->setFlashdata('pesan','Data Berhasil Diubah.');
    return redirect()->to('/backsite/user');
    }


    public function submitdataawal($id)
{
    // Mendapatkan data yang dikirimkan melalui form
    $kartuPesertaStatus = $this->request->getPost('kartu_peserta_status');
    $IjazahStatus = $this->request->getPost('ijazah_status');
    $NilaiStatus = $this->request->getPost('nilai_us_status');
    $RaporStatus = $this->request->getPost('rapor_smt4_6_status');
    $PrestasiStatus = $this->request->getPost('prestasi_status');
    $SlipGajiStatus = $this->request->getPost('slip_gaji_status');
    $SKTMStatus = $this->request->getPost('SKTM_status');
    $KKStatus = $this->request->getPost('KK_status');
    $RekeningListrikStatus = $this->request->getPost('rekening_listrik_status');
    $KTPStatus = $this->request->getPost('KTP_status');
    $HasilSeleksiStatus = $this->request->getPost('hasil_seleksi_status');
    $RumahStatus = $this->request->getPost('rumah_status');
    $StatusKelulusan = $this->request->getPost('status_kelulusan');


    // Validasi data
    $validationRules = [
        'kartu_peserta_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'ijazah_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'nilai_us_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'rapor_smt4_6_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'prestasi_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'slip_gaji_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'SKTM_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'KK_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'rekening_listrik_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'KTP_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'hasil_seleksi_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'rumah_status' => 'required|in_list[Valid, Invalid, Diproses]',
        'status_kelulusan' => 'required|in_list[Lolos,Tidak Lolos,Diproses]',
    ];

    if (!$this->validate($validationRules)) {
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Mengupdate data pada tabel "berkas"
    $berkasModel = new BerkasModel();
    $berkasData = [
        'kartu_peserta_status' => $kartuPesertaStatus,
        'ijazah_status' => $IjazahStatus,
        'nilai_us_status' => $NilaiStatus,
        'rapor_smt4_6_status' => $RaporStatus,
        'prestasi_status' => $PrestasiStatus,
        'slip_gaji_status' => $SlipGajiStatus,
        'SKTM_status' => $SKTMStatus,
        'KK_status' => $KKStatus,
        'rekening_listrik_status' => $RekeningListrikStatus,
        'KTP_status' => $KTPStatus,
        'hasil_seleksi_status' => $HasilSeleksiStatus,
        'rumah_status' => $RumahStatus,
        'status_kelulusan' => $StatusKelulusan
    ];
    $berkasModel->update($id, $berkasData);
    // Mengecek jika status kelulusan adalah "Lulus"
    if ($StatusKelulusan == 'Lolos') {
    // Mendapatkan id baru dari data yang baru di-insert
    
    $wawancaraModel = new WawancaraModel();

    // Mencari data wawancara berdasarkan berkas_id
    $existingWawancara = $wawancaraModel->where('berkas_id', $id)->first();
    $wawancaraData = [
        'berkas_id' => $id,
        'status_wawancara' => 'Diproses',
        // Isi data lain sesuai kebutuhan
    ];
    // dd($wawancaraData);    
    // Melakukan insert data baru ke tabel "wawancara"
   $wawancaraModel->insert($wawancaraData);
}
elseif ($StatusKelulusan == 'Tidak Lolos') {
    // Membuat objek model WawancaraModel
    $wawancaraModel = new WawancaraModel();

    // Mencari data wawancara berdasarkan berkas_id
    $existingWawancara = $wawancaraModel->where('berkas_id', $id)->first();

    if ($existingWawancara) {
        // Jika data wawancara dengan berkas_id yang sama sudah ada,
        // hapus data tersebut
        $wawancaraModel->delete($existingWawancara['id']);
    }
}


    // Redirect ke halaman lain atau tampilkan pesan sukses
    session()->setFlashdata('pesan','Data Berhasil Diubah.');
    return redirect()->to('/backsite/admawal');
}


    public function editwawancara($id)
        {
            // Mendapatkan data yang dikirimkan melalui form
            $deskripsi = $this->request->getPost('hasil_wawancara');
            $StatusWawancara = $this->request->getPost('status_wawancara');

            $validationRules = [
                'hasil_wawancara' => 'permit_empty',
                'status_wawancara' => 'required|in_list[Lolos,Tidak Lolos,Diproses]',
            ];

            if (!$this->validate($validationRules)) {
                // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            // Mengupdate data pada tabel "berkas"
            $berkasWawancara = new WawancaraModel();

            $wawancara = $berkasWawancara->find($id);

    
            // Mengambil room_id dari wawancara yang ditemukan
            $roomId = $wawancara['room_id']; 
            $dataWawancara = [
                'hasil_wawancara' => $deskripsi,
                'status_wawancara' => $StatusWawancara,
            ];
            $berkasWawancara->update($id, $dataWawancara);

            // Redirect ke halaman lain atau tampilkan pesan sukses
            session()->setFlashdata('pesan','Data Berhasil Diubah.');
            return redirect()->to("/backsite/pewawancara/$roomId");
        }

    public function submitdataakhir($id)
        {
            // Mendapatkan data yang dikirimkan melalui form
            $SuratPernyataanPeraturan = $this->request->getPost('status_surat_pernyataan_peraturan');
            $SuratPernyataanIPK = $this->request->getPost('status_surat_pernyataan_IPK');
            $link = $this->request->getPost('link');
            $StatusKelulusan = $this->request->getPost('status_kelulusan');

            $validationRules = [
                'status_surat_pernyataan_peraturan' => 'required|in_list[Valid, Invalid, Diproses]',
                'status_surat_pernyataan_IPK' => 'required|in_list[Valid, Invalid, Diproses]',
                'link' => 'permit_empty',
                'status_kelulusan' => 'required|in_list[Lolos,Tidak Lolos,Lolos]',
            ];

            if (!$this->validate($validationRules)) {
                // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            // Mengupdate data pada tabel "berkas"
            $berkasAkhir = new AdministrasiAkhirModel();
            $dataBerkasAkhir = [
                'status_surat_pernyataan_peraturan' => $SuratPernyataanPeraturan,
                'status_surat_pernyataan_IPK' => $SuratPernyataanIPK,
                'link' => $link,
                'status_kelulusan' => $StatusKelulusan,
            ];
            $berkasAkhir->update($id, $dataBerkasAkhir);

            // Redirect ke halaman lain atau tampilkan pesan sukses
            session()->setFlashdata('pesan','Data Berhasil Diubah.');
            return redirect()->to('/backsite/adm-akhir');
        }

        public function template()
        {
            $id_user = session('user')['id'];
    
            if ($this->permissionRoleModel->hasPermission($id_user, 'template_create')) {
            $templateModel = new TemplateModel();

            // Mengambil semua data users dari tabel users berdasarkan waktu pembuatannya
            $template = $templateModel->orderBy('created_at', 'DESC')->findAll();

            $data = [
                'title' => 'Template | Admin',
                'template' => $template,
            ];
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return view('pages/backsite/template', $data);
        } else {
            // Menampilkan halaman error 404
            return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
        }
        }        
      
        public function addtemplate()
        {   
            $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'template_create')) {
            $data = [
                'title' => 'Add Template | Admin',
                'validation' => \Config\Services::validation(),
            ];
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return view('pages/backsite/add-template', $data);
        } else {
            // Menampilkan halaman error 404
            return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
        }
        }

        public function submitaddtemplate()
{
    $session = session();

    // Mendapatkan id user
    $id_user = session('user')['id'];
    $userModel = new UserModel();
    $user = $userModel->find($id_user);

    $suratPernyataan = $this->request->getFile('surat_pernyataan_peraturan');
    $suratIpk = $this->request->getFile('surat_pernyataan_IPK');

    if (!$this->validate([
        'surat_pernyataan_peraturan' => [
            'rules' => 'uploaded[surat_pernyataan_peraturan]|ext_in[surat_pernyataan_peraturan,pdf,docx]|max_size[surat_pernyataan_peraturan,1024]',
            'errors' => [
                'uploaded' => 'File wajib diisi.',
                'ext_in' => 'File harus berupa file PDF atau DOCX.',
                'max_size' => 'Ukuran file lebih dari 1MB.'
            ]
        ],
        'surat_pernyataan_IPK' => [
            'rules' => 'uploaded[surat_pernyataan_IPK]|ext_in[surat_pernyataan_IPK,pdf,docx]|max_size[surat_pernyataan_IPK,1024]',
            'errors' => [
                'uploaded' => 'File wajib diisi.',
                'ext_in' => 'File harus berupa file PDF atau DOCX.',
                'max_size' => 'Ukuran file lebih dari 1MB.'
            ]
        ],
    ])) {
        // Memuat pustaka validasi
        $validation = \Config\Services::validation();

        // Menyimpan data masukan ke dalam session
        $session = session();
        $session->setFlashdata('input', $this->request->getPost());

        $data = [
            'title' => 'Add Template | Admin',
            'validation' => $validation,
            'input' => $session->getFlashdata('input'),
        ];
        return view('pages/backsite/add-template', $data);
    }
    $templateModel = new TemplateModel();
   
    $suratPernyataan->move(ROOTPATH . 'public/template');
    $suratIpk->move(ROOTPATH . 'public/template');

    $suratPernyataanName = $suratPernyataan->getName();
    $suratIpkName = $suratIpk->getName();

    
    $data = [
        'user_id' => $id_user,
        'surat_pernyataan_peraturan' => $suratPernyataanName,
        'surat_pernyataan_IPK' => $suratIpkName,
    ];
    // Simpan informasi file dan data pengguna ke database
    $templateModel->insert($data);

    $data = [
        'title' => 'Add Template | Admin',
        'validation' => \Config\Services::validation(),
    ];
    // dd($data);
    // Redirect ke halaman lain atau tampilkan pesan sukses
    session()->setFlashdata('pesan','Data Berhasil Ditambah.');
    return redirect()->to('/backsite/template');
}

public function deletetemplate($Id) {


    $templateModel = new TemplateModel();

    // Mengambil seluruh data room dari tabel
    $template = $templateModel->where('id', $Id)->delete();
    

    session()->setFlashdata('pesan', 'Template berhasil dihapus.');
    return redirect()->to('/backsite/template');
    
}
        
    public function room()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'room_access')) {

        // Buat objek RoomModel
        $roomModel = new RoomModel();
    
        // Mengambil seluruh data room dari tabel
        $room = $roomModel->findAll();
       
        $data = [
            'title' => 'Room | Admin',
            'room' => $room,
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/room' ,$data);
    } 
    else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
}
    

    public function roompewawancara()
{
    $id_user = session('user')['id'];
    
    if ($this->permissionRoleModel->hasPermission($id_user, 'pewawancara_access')) {
        // Mendapatkan ID user yang sedang login
        $userId = session('user')['id'];

        // Buat objek PewawancaraModel
        $pewawancaraModel = new PewawancaraModel();

        // Mencari data pewawancara berdasarkan user_id pengguna yang sedang login
        $pewawancara = $pewawancaraModel->where('user_id', $userId)->first();

        // Jika pewawancara ditemukan
        if ($pewawancara) {
            // Mendapatkan room_id dari pewawancara
            $roomId = $pewawancara['room_id'];

            // Buat objek RoomModel
            $roomModel = new RoomModel();

            // Mengambil data room berdasarkan room_id
            $room = $roomModel->findAll($roomId);

            $data = [
                'title' => 'Room | Admin',
                'room' => $room,
            ];
            // dd($data);
            // Tampilkan view room dengan data room yang ditemukan
            return view('pages/backsite/room', $data);
        }  
    else {
        $data = [
            'title' => 'Room | Admin',
        ];
        // Jika pewawancara tidak ditemukan, tampilkan pesan atau lakukan tindakan sesuai kebutuhan Anda
        return view('pages/backsite/tidakada', $data);
    }
    }
    else {
    // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
}


    public function addroom()
    {
        $id_user = session('user')['id'];
    
        if ($this->permissionRoleModel->hasPermission($id_user, 'room_create')) {

        $wawancaraModel = new WawancaraModel();
        $berkasModel = new BerkasModel();
        $userModel = new UserModel();
        $roleUserModel = new RoleUserModel();
    
        // Mendapatkan semua data wawancara berdasarkan berkas_id
    $wawancaras = $wawancaraModel->where('room_id', null)->findAll();

    $peserta = [];

    // Melakukan loop untuk setiap wawancara
    foreach ($wawancaras as $wawancara) {
        $berkasId = $wawancara['berkas_id'];

        // Mendapatkan data berkas berdasarkan berkas_id
        $berkas = $berkasModel->find($berkasId);

        // Jika berkas ditemukan
        if ($berkas) {
            $userId = $berkas['user_id'];

            // Mendapatkan data user berdasarkan user_id
            $user = $userModel->find($userId);

            // Jika user ditemukan
            if ($user) {
                // Tambahkan data nama user dan id wawancara ke dalam array data
                $peserta[] = [
                    'id_wawancara' => $wawancara['id'],
                    'nama_user' => $user['name'],
                ];
            }
        }
    }
        // Mengambil data role_user berdasarkan role_id 2
        $roleUsers = $roleUserModel->where('role_id', 2)->findAll();
    
        $userId = array_column($roleUsers, 'user_id');
    
        // Mengambil data pengguna dari tabel users berdasarkan user_id yang memiliki role_id 2
        $users = $userModel->where('id', $userId)->findAll();
    
        
        $data = [
            'title' => 'Seleksi | Hasil Akhir',
            'users' => $users,
            'peserta' => $peserta,
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        return view('pages/backsite/add-room' ,$data);
    } else {
        // Menampilkan halaman error 404
        return \Config\Services::response()->setStatusCode(404)->setBody('404 Page Not Found');
    }
      
    }

    public function submitaddroom()
{
    // Mendapatkan data input dari form
    $noRuang = $this->request->getPost('no_ruang');
    $tglWawancara = $this->request->getPost('tgl_wawancara');
    $jam = $this->request->getPost('jam');
    $link = $this->request->getPost('link');
    $meetingId = $this->request->getPost('meeting_id');
    $password = $this->request->getPost('password');

    
    // Buat objek RoomModel, PewawancaraModel, dan WawancaraModel
    $roomModel = new RoomModel();
    $pewawancaraModel = new PewawancaraModel();
    $wawancaraModel = new WawancaraModel();

    // Ubah format tanggal menjadi 'YYYY-MM-DD'
    $timestamp = strtotime($tglWawancara);
    $tglWawancaraFormatted = date('Y-m-d', $timestamp);

    // Siapkan data yang akan diinsert ke tabel room
    $roomData = [
        'no_ruang' => $noRuang,
        'tgl_wawancara' => $tglWawancaraFormatted,
        'jam' => $jam,
        'link' => $link,
        'meeting_id' => $meetingId,
        'password' => $password
    ];

    // Insert data ke tabel room
    $roomModel->insert($roomData);

    // Mendapatkan ID ruang yang baru saja diinsert
    $roomId = $roomModel->insertID();

    // Mendapatkan pewawancara yang dipilih
    $pewawancaraIds = $this->request->getPost('pewawancara_id[]');

    // Memasukkan data pewawancara ke tabel pewawancara
    foreach ($pewawancaraIds as $pewawancaraId) {
        $pewawancaraData = [
            'user_id' => $pewawancaraId,
            'room_id' => $roomId,
        ];
        $pewawancaraModel->insert($pewawancaraData);
    }

    // Mendapatkan id_wawancara yang dipilih pada view
    $pesertaIds = $this->request->getPost('peserta[]');

    // Mengupdate field ruang_id pada tabel wawancara untuk setiap id_wawancara yang dipilih
    foreach ($pesertaIds as $pesertaId) {
        $wawancaraData = [
            'room_id' => $roomId,
        ];
        
        // Menambahkan kondisi where pada model WawancaraModel
        $wawancaraModel->where('id', $pesertaId)->set('room_id', $roomId)->update();
    }
    // Redirect ke halaman sukses registrasi
    session()->setFlashdata('pesan','Data Berhasil Ditambah.');
    return redirect()->to('/backsite/room');
}

    
    



}
