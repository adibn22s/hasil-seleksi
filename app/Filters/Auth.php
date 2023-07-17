<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            // Periksa rute saat ini
            $path = $request->uri->getPath();

             // Tentukan halaman login yang sesuai berdasarkan path
             $loginPage = ($this->isBacksiteGroup($path)) ? '/loginadmin' : '/login';

            // Redirect pengguna ke halaman login yang sesuai
            return redirect()->to($loginPage);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah request
    }
    private function isBacksiteGroup($path)
    {
        $backsitePaths = [
        'backsite/dashboard',
        'backsite/permission',
        'backsite/role',
        'backsite/room',
        'backsite/room-pewawancara',
        'backsite/add-room',
        'backsite/addroom',
        'backsite/user',
        'backsite/admawal',
        'backsite/data-awal/(:num)',
        'backsite/pewawancara/(:num)',
        'backsite/adm-akhir',
        'backsite/pengumuman-akhir',
        'backsite/data-diri',
        'backsite/isi-data-diri',
        'backsite/edit-user/(:num)',
        'backsite/edit-role/(:num)',
        'backsite/reset-password/(:num)',
        'backsite/add-user',
        'backsite/detail-wawancara/(:num)',
        'backsite/data-akhir/(:num)',
        'backsite/register',
        'backsite/edituser/(:num)',
        'backsite/reset/(:num)',
        'backsite/editdataawal/(:num)',
        'backsite/edit-wawancara/(:num)',
        'backsite/edit-dataakhir/(:num)',
        'backsite/editrolepermission/(:num)',
        'backsite/template',
        'backsite/add-template',
        'backsite/submitaddtemplate',
        'backsite/user/delete/(:num)',
        'backsite/room/delete/(:num)',
        'backsite/template/delete/(:num)',
        'backsite/dataawal/delete/(:num)',
        'backsite/dataakhir/delete/(:num)',
            // Daftar path lainnya pada grup backsite
        ];

        return in_array($path, $backsitePaths);
    }
}
