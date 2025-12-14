<style>
	/* =========================================
	ANIMASI GLOBAL
	========================================= */

	@keyframes fadeSlideLeft {
		0% { opacity: 0; transform: translateX(-25px); }
		100% { opacity: 1; transform: translateX(0); }
	}

	@keyframes fadeUp {
		0% { opacity: 0; transform: translateY(25px); }
		100% { opacity: 1; transform: translateY(0); }
	}

	.fade-left {
		opacity: 0;
		animation: fadeSlideLeft .9s ease-out forwards;
	}

	.fade-up {
		opacity: 0;
		animation: fadeUp .8s ease-out forwards;
	}

	.delay-1 { animation-delay: .2s; }

	.delay-2 { animation-delay: .5s; }
	.delay-3 { animation-delay: .6s; }
	.delay-4 { animation-delay: .7s; }
	/* navigasi */
	.delay-5 { animation-delay: .5s; }
	.delay-6 { animation-delay: .6s; }
	.delay-7 { animation-delay: .7s; }
	.delay-8 { animation-delay: .8s; }
	/* informasi */
	.delay-9 { animation-delay: .5s; }
	.delay-10 { animation-delay: .6s; }
	/**	sosial media */
	.delay-11 { animation-delay: .5s; }
	.delay-12 { animation-delay: .6s; }
	.delay-13 { animation-delay: .7s; }
	.delay-14 { animation-delay: .8s; }
</style>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 py-5">
	<div class="container py-5">
		<div class="row g-5">

			<!-- Kontak -->
			<div class="col-lg-3 col-md-6">
				<h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4 fade-left delay-1">
					Kontak
				</h4>
				<p class="mb-4 fade-up delay-1">
					Sistem layanan pengelolaan air bersih untuk desa, praktis dan modern.
				</p>
				<p class="mb-2 fade-up delay-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Kantor Desa / Unit Pengelola Air</p>
				<p class="mb-2 fade-up delay-3"><i class="fa fa-envelope text-primary me-3"></i>support@e-airdesa.com</p>
				<p class="mb-0 fade-up delay-4"><i class="fa fa-phone-alt text-primary me-3"></i>+62 812-3456-7890</p>
			</div>

			<!-- Link Cepat -->
			<div class="col-lg-3 col-md-6">
				<h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4 fade-left delay-2">
					Navigasi
				</h4>
				<div class="d-flex flex-column justify-content-start">
					<a class="text-light mb-2 fade-up delay-5" href="<?= base_url(); ?>"><i class="fa fa-angle-right me-2"></i>Home</a>
					<a class="text-light mb-2 fade-up delay-6" href="<?= base_url('syaratketentuan'); ?>"><i class="fa fa-angle-right me-2"></i>Syarat & Ketentuan</a>
					<a class="text-light mb-2 fade-up delay-7" href="<?= base_url('fitur'); ?>"><i class="fa fa-angle-right me-2"></i>Daftar Fitur</a>
					<a class="text-light fade-up delay-8" href="<?= base_url('login'); ?>"><i class="fa fa-angle-right me-2"></i>Login</a>
				</div>
			</div>

			<!-- Informasi -->
			<div class="col-lg-3 col-md-6">
				<h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4 fade-left delay-3">
					Informasi
				</h4>
				<p class="mb-2 fade-up delay-9">e-AirDesa membantu penagihan air desa menjadi lebih cepat, efisien, dan transparan.</p>
				<p class="mb-2 fade-up delay-10">Aplikasi mobile-friendly, cocok untuk petugas lapangan.</p>
			</div>

			<!-- Sosial Media -->
			<div class="col-lg-3 col-md-6">
				<h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4 fade-left delay-4">
					Ikuti Kami
				</h4>
				<p class="fade-left delay-5">Dapatkan informasi terbaru tentang pengembangan sistem.</p>
				<div class="d-flex">
					<a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2 fade-up delay-11" href="#!"><i class="fab fa-facebook-f"></i></a>
					<a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2 fade-up delay-12" href="#!"><i class="fab fa-whatsapp"></i></a>
					<a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2 fade-up delay-13" href="#!"><i class="fab fa-instagram"></i></a>
					<a class="btn btn-lg btn-primary btn-lg-square rounded-circle fade-up delay-14" href="#!"><i class="fab fa-youtube"></i></a>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="container-fluid bg-dark text-light border-top border-secondary py-4">
	<div class="container">
		<div class="row g-5">
			<div class="col-md-6 text-center text-md-start">
				<p class="mb-md-0 fade-left delay-6">&copy; <?= date('Y'); ?> <span class="text-primary">e-AirDesa</span>. Semua Hak Dilindungi.</p>
			</div>
			<div class="col-md-6 text-center text-md-end">
				<p class="mb-0 fade-left delay-7">Dikembangkan oleh <span class="text-primary">Tim IT Desa</span></p>
			</div>
		</div>
	</div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?= base_url('assets/home'); ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('assets/home'); ?>/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('success')): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Berhasil!',
			text: '<?php echo $this->session->flashdata('success'); ?>',
		});
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
	<script>
		Swal.fire({
			icon: 'error',
			title: 'Gagal!',
			text: '<?php echo $this->session->flashdata('error'); ?>',
		});
	</script>
<?php endif; ?>
</body>

</html>