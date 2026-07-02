<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Kelola Kategori Berita (Admin)
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<div>
				<h2 class="mb-1"><i class="fa-solid fa-folder text-danger"></i> Manajemen Kategori</h2>
			</div>
			<a href="<?= base_url('kategori/create') ?>" class="btn btn-primary">
				<i class="fa-solid fa-plus"></i> Tambah Kategori
			</a>
		</div>

		<?php if (session()->getFlashdata('sukses')) : ?>
			<div class="alert alert-success small py-2 mb-3">
				<?= session()->getFlashdata('sukses') ?>
			</div>
		<?php endif ?>

		<div class="card shadow-sm border-0">
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover table-striped mb-0 align-middle">
						<thead class="table-dark">
							<tr>
								<th class="text-center" style="width: 70px;">No</th>
								<th class="text-center">Nama Kategori</th>
								<th class="text-center">Slug</th>
								<th class="text-center">Status</th>
								<th class="text-center" style="width: 200px;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (empty($kategori)) : ?>
								<tr>
									<td colspan="5" class="text-center text-muted py-3">Belum ada data kategori.</td>
								</tr>
							<?php else : ?>
								<?php foreach ($kategori as $i => $k) : ?>
									<tr>
										<td class="text-center fw-bold"><?= $i + 1 ?></td>
										<td><?= esc($k['nama_kategori']) ?></td>
										<td><code><?= esc($k['slug']) ?></code></td>
										<td class="text-center">
											<?php if ($k['status'] == 'Aktif') : ?>
												<span class="badge bg-success">Aktif</span>
											<?php else : ?>
												<span class="badge bg-danger">Non-Aktif</span>
											<?php endif ?>
										</td>
										<td class="text-center">
											<a href="<?= base_url('kategori/edit/' . $k['id']) ?>" class="btn btn-sm btn-warning text-white me-1" title="Edit">
												<i class="fa-solid fa-pen-to-square"></i> Edit
											</a>
											<a href="<?= base_url('kategori/delete/' . $k['id']) ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
												<i class="fa-solid fa-trash"></i> Hapus
											</a>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "ItemList",
		"itemListElement": [
			<?php $i = 1;
			foreach ($kategori as $k) : ?> {
					"@type": "ListItem",
					"position": <?= $i++ ?>,
					"name": "<?= esc($k['nama_kategori']) ?>",
					"url": "<?= base_url('kategori/' . $k['slug']) ?>"
				}
				<?= ($i <= count($kategori)) ? ',' : '' ?>
			<?php endforeach ?>
		]
	}
</script>

<?= $this->endSection() ?>