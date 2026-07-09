<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Berita extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['berita'] = $this->beritaModel->getBeritaWithKategori();
        return view('berita/index', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->where('status', 'Aktif')->findAll();
        return view('berita/create', $data);
    }

    public function store()
    {
        $rules = [
            'kategori_id' => 'required',
            'judul'       => 'required|min_length[5]|is_unique[berita.judul]',
            'isi_berita'  => 'required',
            'gambar'      => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');

        $namaGambar = $fileGambar->getRandomName();

        $fileGambar->move(ROOTPATH . 'public/uploads', $namaGambar);

        $judul = (string) $this->request->getPost('judul');
        $this->beritaModel->save([
            'kategori_id' => $this->request->getPost('kategori_id'),
            'judul'       => $judul,
            'slug'        => url_title($judul, '-', true),
            'isi_berita'  => $this->request->getPost('isi_berita'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('berita')->with('sukses', 'Berita baru berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $data['berita'] = $this->beritaModel->find($id);
        if (!$data['berita']) {
            return redirect()->to('berita')->with('errors', ['Berita tidak ditemukan.']);
        }
        $data['kategori'] = $this->kategoriModel->where('status', 'Aktif')->findAll();
        return view('berita/edit', $data);
    }

    public function update($id)
    {
        $beritaLama = $this->beritaModel->find($id);

        $rules = [
            'kategori_id' => 'required',
            'judul'       => "required|min_length[5]|is_unique[berita.judul,id,{$id}]",
            'isi_berita'  => 'required',
            'gambar'      => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = $beritaLama['gambar'];
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads', $namaGambar);

            if (file_exists(ROOTPATH . 'public/uploads/' . $beritaLama['gambar'])) {
                unlink(ROOTPATH . 'public/uploads/' . $beritaLama['gambar']);
            }
        }

        $judul = (string) $this->request->getPost('judul');
        $this->beritaModel->update($id, [
            'kategori_id' => $this->request->getPost('kategori_id'),
            'judul'       => $judul,
            'slug'        => url_title($judul, '-', true),
            'isi_berita'  => $this->request->getPost('isi_berita'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('berita')->with('sukses', 'Berita berhasil diperbarui!');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if (file_exists(ROOTPATH . 'public/uploads/' . $berita['gambar'])) {
            unlink(ROOTPATH . 'public/uploads/' . $berita['gambar']);
        }

        $this->beritaModel->delete($id);
        return redirect()->to('berita')->with('sukses', 'Berita berhasil dihapus!');
    }
}
