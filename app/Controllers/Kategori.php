<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategoriModel->findAll();

        $data = [
            'kategori' => $kategori
        ];

        return view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
    {
        $rules = [
            'nama_kategori' => 'required|min_length[3]|is_unique[kategori.nama_kategori]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = (string) $this->request->getPost('nama_kategori');

        $this->kategoriModel->save([
            'nama_kategori' => $nama,
            'slug'          => url_title($nama, '-', true),
            'status'        => $this->request->getPost('status')
        ]);

        return redirect()->to('kategori')->with('sukses', 'Kategori baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = $this->kategoriModel->find($id);


        if (!$kategori) {
            return redirect()->to('kategori')->with('errors', ['Data tidak ditemukan.']);
        }

        $data = [
            'kategori' => $kategori
        ];

        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_kategori' => "required|min_length[3]|is_unique[kategori.nama_kategori,id,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = (string) $this->request->getPost('nama_kategori');

        $this->kategoriModel->update($id, [
            'nama_kategori' => $nama,
            'slug'          => url_title($nama, '-', true),
            'status'        => $this->request->getPost('status')
        ]);

        return redirect()->to('kategori')->with('sukses', 'Kategori berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('kategori')->with('sukses', 'Kategori berhasil dihapus!');
    }
}
