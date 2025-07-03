<?php

namespace App\Models;
use CodeIgniter\Model;

class M_buku extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_buku';
    protected $primaryKey       = 'kode_buku';
    protected $orderBy          = 'judul';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all(){
        $builder = $this->db->table('tbl_buku');
        $builder->select('tbl_buku.*, tbl_kategori.nama_kategori');
        $builder->join('tbl_kategori', 'tbl_kategori.kode_kategori = tbl_buku.kode_kategori', 'left');
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        $respon = $query->getResult();
        return $respon;
    }
    

    function add($data){
        if($this->db->table($this->table)->insert($data)){
            return "success";
        }else{
            return "failed";
        }
    }

    function getKategoriList(){
        return $this->db->table('tbl_kategori')->get()->getResult();
    }

    function getData($idbuku){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_buku WHERE kode_buku='$idbuku'; ");
        $respon = $query->getRow();
        return $respon;
    }

    public function updateData($idbuku, $ISBN, $judul, $penulis, $penerbit, $tahunTerbit)
    {
        $message = "";
        // Koneksi menggunakan simple query
        $db = db_connect();
        try {
            if (!$db->simpleQuery("UPDATE tbl_buku SET ISBN = '$ISBN', judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahunTerbit' WHERE kode_buku = '$idbuku';")) {
                $message = $db->error();
            } else {
                $message = "success";
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
    
    function deleteData($idbuku){
        $message="Delete Data Berhasil";
        $db = db_connect();

        // Mengambil informasi gambar sebelum menghapus data
        $query = $db->query("SELECT gambar_barang FROM tbl_buku WHERE kode_buku = '$idbuku'");
        $respon = $query->getRow();

        if ($respon) {
            $gambarPath = FCPATH . 'asset/' . $respon->gambar_barang;

            // Menghapus data barang
            try {
                if (!$db->simpleQuery("DELETE FROM tbl_buku WHERE kode_buku = '$idbuku';")) {
                    $message = $db->error();
                } else {
                    // Menghapus file gambar jika data barang berhasil dihapus
                    if (file_exists($gambarPath)) {
                        unlink($gambarPath);
                    }
                    $message = "success";
                }
            } catch(\Exception $e){
                $message = $e->getMessage();
            }
        } else {
            $message = "Barang tidak ditemukan";
        }
        
        return $message;
    }

    public function updateStok($kodeBuku, $jumlah)
    {
        $builder = $this->db->table($this->table);
        $builder->set('stok_buku', 'stok_buku + ' . $jumlah, false);
        $builder->where('kode_buku', $kodeBuku);
        $builder->update();
    }
}
