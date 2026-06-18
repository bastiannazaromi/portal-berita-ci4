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
			<a href="<?= base_url('kategori/tambah') ?>" class="btn btn-primary">
				<i class="fa-solid fa-plus"></i> Tambah Kategori
			</a>
		</div>

		<div class="card shadow-sm border-0">
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover table-striped mb-0 align-middle">
						<thead class="table-dark">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Kategori</th>
								<th class="text-center">Slug</th>
								<th class="text-center">Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center fw-bold">1</td>
								<td>Teknologi</td>
								<td><code>teknologi</code></td>
								<td class="text-center">
									<span class="badge bg-success">Aktif</span>
								</td>
								<td class="text-center">
									<a href="<?= base_url('kategori/edit/1') ?>" class="btn btn-sm btn-warning text-white me-1" title="Edit">
										<i class="fa-solid fa-pen-to-square"></i> Edit
									</a>
									<a href="<?= base_url('kategori/hapus/1') ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
										<i class="fa-solid fa-trash"></i> Hapus
									</a>
								</td>
							</tr>
							<tr>
								<td class="text-center fw-bold">2</td>
								<td>Olahraga</td>
								<td><code>olahraga</code></td>
								<td class="text-center">
									<span class="badge bg-success">Aktif</span>
								</td>
								<td class="text-center">
									<a href="<?= base_url('kategori/edit/2') ?>" class="btn btn-sm btn-warning text-white me-1" title="Edit">
										<i class="fa-solid fa-pen-to-square"></i> Edit
									</a>
									<a href="<?= base_url('kategori/hapus/2') ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
										<i class="fa-solid fa-trash"></i> Hapus
									</a>
								</td>
							</tr>
							<tr>
								<td class="text-center fw-bold">3</td>
								<td>Edukasi</td>
								<td><code>edukasi</code></td>
								<td class="text-center">
									<span class="badge bg-warning text-dark">Non-Aktif</span>
								</td>
								<td class="text-center">
									<a href="<?= base_url('kategori/edit/3') ?>" class="btn btn-sm btn-warning text-white me-1" title="Edit">
										<i class="fa-solid fa-pen-to-square"></i> Edit
									</a>
									<a href="<?= base_url('kategori/hapus/3') ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
										<i class="fa-solid fa-trash"></i> Hapus
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>