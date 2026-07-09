<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Tambah Berita
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white fw-bold">
                <i class="fa-solid fa-pen-to-square"></i> Tulis Artikel Berita Baru
            </div>
            <div class="card-body">

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger p-2 small">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <form action="<?= base_url('berita/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-bold">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>" placeholder="Masukkan judul berita yang menarik...">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kategori_id" class="form-label fw-bold">Kategori Berita</label>
                            <select class="form-select" id="kategori_id" name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id'] ?>" <?= old('kategori_id') == $k['id'] ? 'selected' : '' ?>><?= esc($k['nama_kategori']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gambar" class="form-label fw-bold">Gambar Sampul (Maks 2MB)</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="isi_berita" class="form-label fw-bold">Isi Berita</label>
                        <textarea class="form-control" id="isi_berita" name="isi_berita" rows="8" placeholder="Tuliskan konten berita secara lengkap di sini..."><?= old('isi_berita') ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('berita') ?>" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>