<?php

namespace App\Models;

use CodeIgniter\Model;

class M_homeuser extends Model
{
    protected $table = 'tbl_buku';
    protected $primaryKey = 'kode_buku';
    protected $orderBy = 'judul';
    protected $orderByType = 'asc';

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect(); 
    }

    function list_all()
    {
        $builder = $this->db->table('tbl_buku');
        $builder->select('tbl_buku.gambar_buku, tbl_buku.judul, tbl_buku.stok_buku, tbl_kategori.nama_kategori');
        $builder->join('tbl_kategori', 'tbl_kategori.kode_kategori = tbl_buku.kode_kategori', 'left');
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        return $query->getResult();
    }

    function listByCategory()
    {
        $builder = $this->db->table('tbl_buku');
        $builder->select('tbl_buku.*, tbl_kategori.nama_kategori');
        $builder->join('tbl_kategori', 'tbl_kategori.kode_kategori = tbl_buku.kode_kategori', 'left');
        $builder->orderBy('tbl_kategori.nama_kategori', 'asc'); 
        $query = $builder->get();
        $results = $query->getResult();

        $booksByCategory = [];
        foreach ($results as $row) {
            $booksByCategory[$row->nama_kategori][] = $row;
        }

        return $booksByCategory;
    }
}
