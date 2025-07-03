<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {
        return view('template-user/header')
        .view('user/about.php')
        .view ('template-user/footer');
    }
}
