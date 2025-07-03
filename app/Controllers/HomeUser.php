<?php

namespace App\Controllers;

use App\Models\M_homeuser;

class HomeUser extends BaseController
{
    protected $mHomeUser;

    public function __construct()
    {
        $this->mHomeUser = new M_homeuser();
    }

    public function index(): string
    {
        $dataBuku = $this->mHomeUser->listByCategory(); 
        $data["buku"] = $dataBuku;
        return view('template-user/header')
            . view('user/home-user', $data)
            . view('template-user/footer');
    }

}
