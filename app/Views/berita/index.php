<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Kelola Berita (Admin)<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<div>
				<h2 class="mb-1"><i class="fa-solid fa-newspaper text-danger"></i> Manajemen Berita</h2>
			</div>
			<a href="<?= base_url('berita/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tulis Berita</a>
		</div>

		<?php if (session()->getFlashdata('sukses')) : ?>
			<div class="alert alert-success small py-2 mb-3"><?= session()->getFlashdata('sukses') ?></div>
		<?php endif ?>

		<div class="card shadow-sm border-0">
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover table-striped mb-0 align-middle">
						<thead class="table-dark">
							<tr>
								<th class="text-center" style="width: 60px;">No</th>
								<th class="text-center" style="width: 100px;">Sampul</th>
								<th>Judul Berita</th>
								<th class="text-center">Kategori</th>
								<th class="text-center">Tanggal Rilis</th>
								<th class="text-center" style="width: 180px;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (empty($berita)) : ?>
								<tr>
									<td colspan="6" class="text-center text-muted py-3">Belum ada artikel berita.</td>
								</tr>
							<?php else : ?>
								<?php $no = 1;
								foreach ($berita as $b) : ?>
									<tr>
										<td class="text-center fw-bold"><?= $no++ ?></td>
										<td class="text-center">
											<img src="<?= base_url('uploads/' . $b['gambar']) ?>" class="img-thumbnail" style="width: 70px; height: 50px; object-fit: cover;">
										</td>
										<td><strong><?= esc($b['judul']) ?></strong><br><small class="text-muted">Slug: <?= esc($b['slug']) ?></small></td>
										<td class="text-center"><span class="badge bg-secondary"><?= esc($b['nama_kategori']) ?></span></td>
										<td class="text-center"><small><?= date('d M Y, H:i', strtotime($b['created_at'])) ?></small></td>
										<td class="text-center">
											<a href="<?= base_url('berita/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning text-white me-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
											<a href="<?= base_url('berita/delete/' . $b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus artikel ini?')"><i class="fa-solid fa-trash"></i> Hapus</a>
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
		"numberOfItems": <?= count($berita) ?>,
		"itemListElement": [
			<?php $i = 1;
			foreach ($berita as $b) : ?> {
					"@type": "ListItem",
					"position": <?= $i++ ?>,
					"item": {
						"@type": "NewsArticle",
						"headline": "<?= esc($b['judul']) ?>",
						"image": "<?= base_url('uploads/' . $b['gambar']) ?>",
						"datePublished": "<?= $b['created_at'] ?>",
						"articleSection": "<?= esc($b['nama_kategori']) ?>"
					}
				}
				<?= ($i <= count($berita)) ? ',' : '' ?>
			<?php endforeach ?>
		]
	}
</script>
<?= $this->endSection() ?>