<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>e-airdesa - Solusi Modern Pengelolaan Air Desa</title>
	<link href="<?= base_url('assets/foto/logo2.png'); ?>" rel="icon">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free HTML Templates" name="keywords">
	<meta content="Free HTML Templates" name="description">

	<!-- Favicon -->
	<link href="<?= base_url('assets/home'); ?>/img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
		rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="<?= base_url('assets/home'); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/home'); ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?= base_url('assets/home'); ?>/css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="<?= base_url('assets/home'); ?>/css/style.css" rel="stylesheet">
	<style>
		/* === LOADING BAR (3px top) === */
		#pageLoadingBar {
			position: fixed;
			top: 0;
			left: 0;
			height: 3px;
			width: 0%;
			background: linear-gradient(90deg, #007bff, #00d0ff);
			z-index: 9999;
			transition: width .25s ease-out;
		}

		/* === NAVBAR SKELETON SHIMMER === */
		.navbar-skeleton {
			position: relative;
			overflow: hidden;
			background: #ffffff !important;
			color: transparent !important;
		}

		.navbar-skeleton::after {
			content: "";
			position: absolute;
			top: 0;
			left: -150px;
			height: 100%;
			width: 150px;
			background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
			animation: shimmer 1.2s infinite;
		}

		@keyframes shimmer {
			0% { left: -150px; }
			100% { left: 100%; }
		}

		/* Untuk link di navbar saat loading */
		.navbar-loading .nav-link {
			color: transparent !important;
			background: #ffffff;
			border-radius: 5px;
			margin-right: 8px;
			position: relative;
			overflow: hidden;
		}

		.navbar-loading .nav-link::after {
			content: "";
			position: absolute;
			top: 0;
			left: -150px;
			height: 100%;
			width: 150px;
			background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
			animation: shimmer 1.2s infinite;
		}

		/* === MOBILE OVERLAY === */
		.mobile-overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0,0,0,0.45);
			z-index: 9998;
			opacity: 0;
			pointer-events: none;
			transition: .3s ease-in-out;
		}

		.mobile-overlay.show {
			opacity: 1;
			pointer-events: auto;
		}
	</style>
</head>

<body>
	<div id="pageLoadingBar"></div>
	<div id="mobileOverlay" class="mobile-overlay"></div>
	<!-- Topbar Start -->
	<!-- <div class="container-fluid py-2 border-bottom d-none d-lg-block">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
					<div class="d-inline-flex align-items-center">
						<a class="text-decoration-none text-body pe-3" href="#!"><i
								class="bi bi-telephone me-2"></i>+012
							345 6789</a>
						<span class="text-body">|</span>
						<a class="text-decoration-none text-body px-3" href="#!"><i
								class="bi bi-envelope me-2"></i>info@example.com</a>
					</div>
				</div>
				<div class="col-md-6 text-center text-lg-end">
					<div class="d-inline-flex align-items-center">
						<a class="text-body px-2" href="#!">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a class="text-body px-2" href="#!">
							<i class="fab fa-twitter"></i>
						</a>
						<a class="text-body px-2" href="#!">
							<i class="fab fa-linkedin-in"></i>
						</a>
						<a class="text-body px-2" href="#!">
							<i class="fab fa-instagram"></i>
						</a>
						<a class="text-body ps-2" href="#!">
							<i class="fab fa-youtube"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Topbar End -->


	<!-- Navbar Start -->
	<div class="container-fluid sticky-top bg-white shadow-sm">
		<div class="container">
			<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
				<a href="<?= base_url(); ?>" class="navbar-brand">
					<!-- <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>E-Airdesa</h1> -->
					<h1 class="m-0 text-uppercase text-primary"><img src="<?= base_url('assets/foto/logo3.png'); ?>" alt="" width="200"></h1>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav ms-auto py-0">
						<?php
						$menu = $this->uri->segment(1);
						?>
						<a href="<?= base_url(); ?>" class="nav-item nav-link <?= $menu == '' ? 'active' : ''; ?>">Home</a>
						<a href="<?= base_url('syaratketentuan'); ?>" class="nav-item nav-link <?= $menu == 'syaratketentuan' ? 'active' : ''; ?>">Syarat dan Ketentuan</a>
						<a href="<?= base_url('fitur'); ?>" class="nav-item nav-link <?= $menu == 'fitur' ? 'active' : ''; ?>">Daftar Fitur</a>
						<a href="<?= base_url('login'); ?>" class="nav-item nav-link">Login</a>

						<!-- <div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
							<div class="dropdown-menu m-0">
								<a href="blog.html" class="dropdown-item">Blog Grid</a>
							</div>
						</div> -->
						<!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->
	<script>
		// === TOP LOADING BAR ===
		function startLoadingBar() {
			const bar = document.getElementById('pageLoadingBar');
			bar.style.width = "0%";
			setTimeout(() => { bar.style.width = "60%"; }, 30);
		}

		function finishLoadingBar() {
			const bar = document.getElementById('pageLoadingBar');
			bar.style.width = "100%";
			setTimeout(() => {
				bar.style.width = "0%";
			}, 300);
		}

		// === NAVBAR SKELETON ===
		function enableNavbarSkeleton() {
			document.querySelector('.navbar').classList.add('navbar-skeleton', 'navbar-loading');
		}

		function disableNavbarSkeleton() {
			document.querySelector('.navbar').classList.remove('navbar-skeleton', 'navbar-loading');
		}

		// === RUN LOADING ON PAGE LOAD ===
		startLoadingBar();
		enableNavbarSkeleton();

		window.addEventListener('load', function() {
			finishLoadingBar();
			setTimeout(disableNavbarSkeleton, 300); // biar smooth
		});

		// === LOADING WHEN CLICK MENU ===
		document.querySelectorAll('.nav-link').forEach(link => {
			link.addEventListener('click', function() {
				startLoadingBar();
				enableNavbarSkeleton();
			});
		});

		// === MOBILE OVERLAY HANDLING === (Untuk sidebar jika ada)
		document.getElementById('mobileOverlay').addEventListener('click', () => {
			document.getElementById('mobileOverlay').classList.remove('show');
		});
	</script>
