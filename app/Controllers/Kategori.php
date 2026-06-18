<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        return view('kategori/index');
    }

    public function detail($nama_kategori)
    {
        return "<h1>Kategori: " . ucfirst($nama_kategori) . "</h1><p>Menampilkan semua artikel yang bergenre " . $nama_kategori . ".</p>";
    }
}
