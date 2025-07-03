<?php

namespace App\Controllers;

use App\Models\M_stok;

class Stok extends BaseController
{
    protected $mStok;

    public function __construct(){
        $this->mStok = new M_stok();
    }
    
    public function index(): string
    {
        $dataBuku = $this->mStok->list_all();
        $data['kategoriList'] = $this->mStok->getKategoriList();
        $data["buku"] = $dataBuku;
        return view('template/header')
        .view('stok/list_stok.php', $data)
        .view ('template/footer');
    }

    public function edit($idbuku)
    {
        $data['kategoriList'] = $this->mStok->getKategoriList();

        if ($this->request->getMethod() === 'post') {
            $dataPost = [];
            $dataPost['stok_buku'] = $this->request->getVar('stok_buku');

            $update = $this->mStok->updateData(
                $idbuku,
                $dataPost['stok_buku']
            );

            // Jika update berhasil, arahkan kembali ke halaman stok
            if ($update === "success") {
                return redirect()->to(base_url("stok"));
            }
        }

        $getData = $this->mStok->getData($idbuku);
        $data['buku'] = $getData;
        return view('template/header')
            .view('stok/edit_stok.php', $data)
            .view('template/footer');
    }


    public function delete($idbuku)
    {
        $delete = $this->mStok->deleteData($idbuku);
        return redirect()->to(base_url("stok"));
    }

    public function homeUser(): string
    {
        $dataBuku = $this->mStok->list_all();
        $data["buku"] = $dataBuku;
        return view('template-user/header')
        .view ('user/home-user', $data)
        .view ('template-user/footer');
    }
}
