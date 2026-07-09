<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['kategori_id', 'judul', 'slug', 'isi_berita', 'gambar'];
    protected $useTimestamps    = true;

    public function getBeritaWithKategori($id = null)
    {
        if ($id === null) {
            return $this->select('berita.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id = berita.kategori_id')
                ->orderBy('berita.id', 'DESC')
                ->findAll();
        }

        return $this->select('berita.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = berita.kategori_id')
            ->find($id);
    }
}
