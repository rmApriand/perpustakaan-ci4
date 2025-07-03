<?php

namespace App\Controllers;

use App\Models\M_peminjaman;
use App\Models\M_buku;

class Peminjaman extends BaseController
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
        return view('template/header')
        .view('peminjaman/list_peminjaman.php', $data)
        .view ('template/footer');
    }

    public function tambah(): string
    {
        if ($this->request->getMethod() == 'post') {
            $dataPost = [];

            // Remove $dataPost['kode_peminjaman'] assignment if it's auto increment in database
            $dataPost['id_user'] = $this->request->getVar('id_user');
            $dataPost['kode_buku'] = $this->request->getVar('kode_buku');
            $dataPost['tanggal_peminjaman'] = $this->request->getVar('tanggal_peminjaman');
            $dataPost['tanggal_dikembalikan'] = $this->request->getVar('tanggal_dikembalikan');
            $dataPost['status_peminjaman'] = 'dipinjam';

            $this->mBuku->updateStok($dataPost['kode_buku'], -1);
            $tambah = $this->mPeminjaman->add($dataPost);
        }

        $data['userList'] = $this->mPeminjaman->getUserList();
        $data['bukuList'] = $this->mPeminjaman->getBukuList();
        return view('template/header')
        . view('peminjaman/tambah_peminjaman.php', $data)
        . view('template/footer');
    }
    
    public function edit($idpeminjaman)
    {
        $data['userList'] = $this->mPeminjaman->getUserList();
        $data['bukuList'] = $this->mPeminjaman->getBukuList();

        if ($this->request->getMethod() === 'post') {
            $dataPost = [];

            $dataPost['id_user'] = $this->request->getVar('id_user');
            $dataPost['kode_buku'] = $this->request->getVar('kode_buku');
            $dataPost['tanggal_peminjaman'] = $this->request->getVar('tanggal_peminjaman');
            $dataPost['tanggal_dikembalikan'] = $this->request->getVar('tanggal_dikembalikan');
            $dataPost['status_peminjaman'] = $this->request->getVar('status_peminjaman');

            // Cek perubahan status peminjaman
            $oldStatus = $this->mPeminjaman->getData($idpeminjaman)->status_peminjaman;
            if ($oldStatus !== $dataPost['status_peminjaman']) {
                if ($dataPost['status_peminjaman'] === 'Dikembalikan') {
                    // Tambah stok buku saat dikembalikan
                    $this->mBuku->updateStok($dataPost['kode_buku'], 1);
                } elseif ($dataPost['status_peminjaman'] === 'Dipinjam') {
                    // Kurangi stok buku saat dipinjam
                    $this->mBuku->updateStok($dataPost['kode_buku'], -1);
                }
            }

            $update = $this->mPeminjaman->updateData(
                $idpeminjaman,
                $dataPost['id_user'],
                $dataPost['kode_buku'],
                $dataPost['tanggal_peminjaman'],
                $dataPost['tanggal_dikembalikan'],
                $dataPost['status_peminjaman']
            );

            if ($update == "success") {
                return redirect()->to(base_url('peminjaman'))->with('message', 'Update successful');
            } else {
                return redirect()->back()->with('message', 'Update failed: ' . $update);
            }
        } else {
            $data['peminjaman'] = $this->mPeminjaman->getData($idpeminjaman);
            return view('template/header')
            . view('peminjaman/edit_peminjaman.php', $data)
            . view('template/footer');
        }
    }

    public function delete($idpeminjaman)
    {
        $delete = $this->mPeminjaman->deleteData($idpeminjaman);
        return redirect()->to(base_url("peminjaman"));
    }
}
