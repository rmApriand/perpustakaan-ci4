<?php

namespace App\Models;
use CodeIgniter\Model;

class M_peminjaman extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_peminjaman';
    protected $primaryKey       = 'kode_peminjaman';
    protected $orderBy          = 'status_peminjaman';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all(){
        $builder = $this->db->table('tbl_peminjaman');
        $builder->select('tbl_peminjaman.*, tbl_user.*, tbl_buku.*');
        $builder->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user', 'left');
        $builder->join('tbl_buku', 'tbl_buku.kode_buku = tbl_peminjaman.kode_buku', 'left');
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

    function getUserList(){
        return $this->db->table('tbl_user')->get()->getResult();
    }

    function getBukuList(){
        return $this->db->table('tbl_buku')->get()->getResult();
    }

    function getData($idpeminjaman){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_peminjaman WHERE kode_peminjaman='$idpeminjaman'; ");
        $respon = $query->getRow();
        return $respon;
    }

    public function updateData($idpeminjaman, $idUser, $kodebuku, $tanggalpeminjaman, $tanggaldikembalikan, $statuspeminjaman)
    {
        $message = "";
        $db = db_connect();
        try {
            if (!$db->simpleQuery("UPDATE tbl_peminjaman SET id_user = '$idUser', kode_buku = '$kodebuku', tanggal_peminjaman = '$tanggalpeminjaman', tanggal_dikembalikan = '$tanggaldikembalikan', status_peminjaman = '$statuspeminjaman' WHERE kode_peminjaman = '$idpeminjaman';")) {
                $message = $db->error();
            } else {
                $message = "success";
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }

    
    function deleteData($idpeminjaman){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        try {
            if(! $db->simpleQuery("DELETE FROM tbl_peminjaman WHERE kode_peminjaman = '$idpeminjaman';")){
                $message= $db->eror();
            }else{
                $message="success";
            }
        } catch(\Exception $e){
            $message=$e->getMessage();
        }
        return $message;
    }

}
