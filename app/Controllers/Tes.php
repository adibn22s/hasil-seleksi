<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//Memanggil model
use App\Models\RoleUserModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function submitedituser($userId)
    {
    // Dapatkan data role_user berdasarkan user_id
    $roleUserModel = new RoleUserModel();
    $roleUser = $roleUserModel->where('user_id', $userId)->first();

    // Dapatkan data user berdasarkan user_id
    $userModel = new UserModel();
    $user = $userModel->find($roleUser['user_id']);

    // Validasi inputan form
    $validation = \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'username' => 'required',
        'role' => 'required|in_list[1,2,3]'
    ]);

    if (!$validation->run($this->request->getPost())) {
        // Jika validasi gagal, kembali ke halaman edit dengan pesan error
        return redirect()->back()->withInput()->with('error', $validation->getErrors());
    }

    // Update data user ke tabel users
    $userData = [
        'name' => $this->request->getPost('name'),
        'username' => $this->request->getPost('username'),
    ];
    // memperbarui data berdasarkan id user yang didapat sebelumnya
    $userModel->update($user['id'], $userData);

    // Update data role_user ke tabel role_user
    $roleData = [
        'role_id' => $this->request->getPost('role')
    ];
    $roleUserModel->update($roleUser['id'], $roleData);

    // Redirect ke halaman sukses edit
    return redirect()->to('/backsite/user');
    }
}
