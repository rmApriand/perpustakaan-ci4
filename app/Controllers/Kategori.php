<?php

namespace App\Controllers;

use App\Models\M_kategori;

class Kategori extends BaseController
{
    protected $mKategori;

    function __construct()
    {
        $this->mKategori = new M_kategori();
    }

    public function index(): string
    {
        $dataKategori = $this->mKategori->list_all();
        $data["kategori"] = $dataKategori;
        return view('template/header')
            . view('kategori/list_kategori.php', $data)
            . view('template/footer');
    }

    public function tambah(): string
    {
        if ($_POST) {
            $dataPost["nama_kategori"] = $this->request->getVar("nama_kategori");
            $tambah = $this->mKategori->add($dataPost);

            if ($tambah === "success") {
                return redirect()->to(base_url("kategori"));
            }
        }

        return view('template/header')
            . view('kategori/tambah_kategori.php')
            . view('template/footer');
    }

    public function edit($idKategori)
    {
        if ($_POST) {
            $dataPost["nama_kategori"] = $this->request->getVar("nama_kategori");
            $update = $this->mKategori->updateData($idKategori, $dataPost["nama_kategori"]);

            if ($update === "success") {
                return redirect()->to(base_url("kategori"));
            }
        }

        $getData = $this->mKategori->getData($idKategori);
        $data["kategori"] = $getData;
        return view('template/header')
            . view('kategori/edit_kategori.php', $data)
            . view('template/footer');
    }

    public function delete($idKategori)
    {
        $delete = $this->mKategori->deleteData($idKategori);
        return redirect()->to(base_url("kategori"));
    }
}
