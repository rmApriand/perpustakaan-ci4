<?php

namespace App\Controllers;

use App\Models\M_buku;

class Buku extends BaseController
{
    protected $mBuku;

    public function __construct(){
        $this->mBuku = new M_buku();
    }
    
    public function index(): string
    {
        $dataBuku = $this->mBuku->list_all();
        $data['kategoriList'] = $this->mBuku->getKategoriList();
        $data["buku"] = $dataBuku;
        return view('template/header')
        .view('buku/list_buku.php', $data)
        .view ('template/footer');
    }

    public function tambah(): string
    {
        if ($this->request->getMethod() == 'post') {
            $dataPost = [];

            $gambar = $this->request->getFile('gambar_buku');
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                $newName = $gambar->getRandomName();
                $gambar->move(FCPATH . 'asset', $newName);
                $dataPost['gambar_buku'] = $newName;
            } else {
                $dataPost['gambar_buku'] = 'default.png';
            }

            $dataPost['ISBN'] = $this->request->getVar('ISBN');
            $dataPost['judul'] = $this->request->getVar('judul');
            $dataPost['penulis'] = $this->request->getVar('penulis');
            $dataPost['penerbit'] = $this->request->getVar('penerbit');
            $dataPost['tahun_terbit'] = $this->request->getVar('tahun_terbit');
            $dataPost['kode_kategori'] = $this->request->getVar('kode_kategori');

            // Add validation if needed

            $tambah = $this->mBuku->add($dataPost);
        }

        $data['kategoriList'] = $this->mBuku->getKategoriList();
        return view('template/header')
            . view('buku/tambah_buku.php', $data)
            . view('template/footer');
    }

    public function edit($idbuku)
    {
        $data['kategoriList'] = $this->mBuku->getKategoriList();

        if ($this->request->getMethod() === 'post') {
            $dataPost = [];
            $dataPost['ISBN'] = $this->request->getVar('ISBN');
            $dataPost['judul'] = $this->request->getVar('judul');
            $dataPost['penulis'] = $this->request->getVar('penulis');
            $dataPost['penerbit'] = $this->request->getVar('penerbit');
            $dataPost['tahun_terbit'] = $this->request->getVar('tahun_terbit');

            $update = $this->mBuku->updateData(
                $idbuku,
                // $dataPost['gambar_buku'],
                $dataPost['ISBN'],
                $dataPost['judul'],
                $dataPost['penulis'],
                $dataPost['penerbit'],
                $dataPost['tahun_terbit'],
            );
        }

        $getData = $this->mBuku->getData($idbuku);
        $data['buku'] = $getData;
        return view('template/header')
            .view('buku/edit_buku.php', $data)
            .view('template/footer');
    }

    public function delete($idbuku)
    {
        $delete = $this->mBuku->deleteData($idbuku);
        return redirect()->to(base_url("buku"));
    }

    public function homeUser(): string
    {
        $dataBuku = $this->mBuku->list_all();
        $data["buku"] = $dataBuku;
        return view('template-user/header')
        .view ('user/home-user', $data)
        .view ('template-user/footer');
    }
}
