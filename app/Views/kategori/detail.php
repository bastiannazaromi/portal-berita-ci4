<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Kategori <?= ucfirst($nama_kategori) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('kategori') ?>" class="text-danger">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= ucfirst($nama_kategori) ?></li>
    </ol>
</nav>

<div class="p-4 mb-4 bg-light rounded-3 border-start border-danger border-5 shadow-sm">
    <div class="container-fluid py-2">
        <h2 class="display-6 fw-bold">Arsip Kategori: <?= ucfirst($nama_kategori) ?></h2>
        <p class="col-md-12 fs-6 text-muted">Menampilkan semua artikel berita yang diterbitkan di bawah kategori <strong><?= $nama_kategori ?></strong>.</p>
    </div>
</div>

<div class="list-group shadow-sm">
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0 fw-bold">Contoh Berita Utama di Kategori <?= ucfirst($nama_kategori) ?></h6>
                <p class="mb-0 opacity-75 small text-muted">Ini adalah konten placeholder sebelum kita menghubungkan aplikasi ini ke database MySQL...</p>
            </div>
            <small class="text-nowrap text-muted">3 hari lalu</small>
        </div>
    </div>
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0 fw-bold">Artikel Populer Terkait <?= ucfirst($nama_kategori) ?></h6>
                <p class="mb-0 opacity-75 small text-muted">Mahasiswa nanti akan belajar melakukan query SELECT dengan klausa WHERE sesuai kategori ini.</p>
            </div>
            <small class="text-nowrap text-muted">1 minggu lalu</small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>