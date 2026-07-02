<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Edit Kategori
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card shadow-sm border-0">
			<div class="card-header bg-dark text-white fw-bold">
				Form Edit Kategori
			</div>
			<div class="card-body">

				<?php if (session()->getFlashdata('errors')) : ?>
					<div class="alert alert-danger p-2 small">
						<?php foreach (session()->getFlashdata('errors') as $error) : ?>
							<li><?= esc($error) ?></li>
						<?php endforeach ?>
					</div>
				<?php endif ?>

				<form action="<?= base_url('kategori/update/' . $kategori['id']) ?>" method="post">
					<?= csrf_field() ?>
					<div class="mb-3">
						<label for="nama_kategori" class="form-label fw-bold">Nama Kategori</label>
						<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= old('nama_kategori', $kategori['nama_kategori'] ?? '') ?>" placeholder="Contoh: Teknologi Informasi">
					</div>

					<div class="mb-3">
						<label for="status" class="form-label fw-bold">Status</label>
						<select class="form-select" id="status" name="status">
							<option value="Aktif" <?= (old('status', $kategori['status'] ?? '') == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
							<option value="Non-Aktif" <?= (old('status', $kategori['status'] ?? '') == 'Non-Aktif') ? 'selected' : '' ?>>Non-Aktif</option>
						</select>
					</div>

					<div class="d-flex justify-content-between">
						<a href="<?= base_url('kategori') ?>" class="btn btn-secondary btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>