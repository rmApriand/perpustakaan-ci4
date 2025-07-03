<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function save()
    {
        $userModel = new UserModel();

        $data = [
            'nama_user'    => $this->request->getPost('nama_user'),
            'NPM'    => $this->request->getPost('NPM'),
            'alamat_user'  => $this->request->getPost('alamat_user'),
            'no_hp_user'   => $this->request->getPost('no_hp_user'),
            'email_user'   => $this->request->getPost('email_user'),
            'password_user' => 'umko',
            'kode_role'    => 2 // Default to user role
        ];

        // Debug data
        error_log(print_r($data, true));

        $userModel->save($data);

        return redirect()->to('/home-user');
    }
}

