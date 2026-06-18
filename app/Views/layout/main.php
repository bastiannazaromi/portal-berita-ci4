<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->renderSection('title') ?> | Portal Berita</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<style>
		body {
			background-color: #f8f9fa;
		}

		.navbar-brand {
			font-weight: bold;
			color: #dc3545 !important;
		}

		.hero-section {
			background: #fff;
			border-bottom: 1px solid #dee2e6;
			padding: 40px 0;
		}

		.card {
			border: none;
			transition: transform 0.2s;
		}

		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
		}

		footer {
			background: #212529;
			color: white;
			padding: 40px 0;
		}
	</style>
</head>

<body class="d-flex flex-column h-100">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/') ?>"><i class="fa-solid fa-fire"></i> Portal Berita</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= base_url('kategori') ?>">Kategori</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<main class="container my-5 flex-shrink-0">
		<?= $this->renderSection('content') ?>
	</main>

	<footer class="mt-auto">
		<div class="container text-center">
			<p>&copy; <?= date('Y') ?> Portal Berita - Praktikum Web Semantic</p>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>