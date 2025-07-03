<?php

namespace App\Controllers;

use App\Models\M_peminjaman;
use App\Models\M_buku;

class PeminjamanUser extends BaseController
{
    protected $mPeminjaman;
    protected $mBuku;

    public function __construct(){
        $this->mPeminjaman = new M_peminjaman();
        $this->mBuku = new M_buku();
    }
    
    public function index(): string
    {
        $dataPeminjaman = $this->mPeminjaman->list_all();
        $data["peminjaman"] = $dataPeminjaman;
        return view('template-user/header')
        .view('user/list_peminjaman.php', $data)
        .view ('template-user/footer');
    }
}
