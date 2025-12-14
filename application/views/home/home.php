<?php $this->load->view('layouts/home-header') ?>
<style>
	/* === HERO SECTION FIX UNTUK MOBILE === */
	.hero-header {
		position: relative;
		overflow: hidden;
	}

	/* H5 Heading */
	.hero-header h5 {
		font-size: 16px;
	}

	/* H1 Title */
	.hero-header h1 {
		font-weight: 700;
		line-height: 1.2;
	}
	/* ===== ANIMASI FADE-SLIDE ===== */
	@keyframes fadeSlideLeft {
		0% {
			opacity: 0;
			transform: translateX(-25px);
		}
		100% {
			opacity: 1;
			transform: translateX(0);
		}
	}

	/* Wrapper animasi */
	.hero-animate {
		opacity: 0;
		animation: fadeSlideLeft 0.8s ease-out forwards;
	}

	/* Delay tiap elemen agar efeknya berurutan */
	.hero-animate.delay-1 {
		animation-delay: .10s;
	}
	.hero-animate.delay-2 {
		animation-delay: .50s;
	}
	.hero-animate.delay-3 {
		animation-delay: .10s;
	}

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
		animation: fadeSlideLeft .8s ease-out forwards;
	}

	.fade-up {
		opacity: 0;
		animation: fadeUp .8s ease-out forwards;
	}

	.delay-1 { animation-delay: .2s; }
	.delay-2 { animation-delay: .35s; }
	.delay-3 { animation-delay: .5s; }
	.delay-4 { animation-delay: .65s; }

	/* =========================================
	ABOUT SECTION (TENTANG SISTEM)
	========================================= */

	.about-section {
		width: 90%;
		border-radius: 14px;
		margin: 10% auto;
		padding: 50px 25px;
		background: #ffffff;
		box-shadow: 0 4px 10px rgba(0,0,0,0.1);
	}

	.about-section h1 {
		font-size: 40px;
		font-weight: 700;
	}

	.about-section img {
		border-radius: 10px;
		object-fit: cover;
	}

	/* Bulatan ikon */
	.feature-box {
		background-color: #f7f7f7;
		border-radius: 100px;
		padding: 30px 0;
		transition: .3s;
	}

	.feature-box:hover {
		background-color: #e7f1ff;
		transform: translateY(-5px);
	}

	/* =========================================
	CONTACT SECTION (HUBUNGI KAMI)
	========================================= */

	.contact-section h1 {
		font-size: 42px;
		font-weight: 700;
	}

	.contact-section input,
	.contact-section textarea {
		border-radius: 10px;
		padding: 12px 16px;
		border: 1px solid #dcdcdc;
		transition: .2s;
	}

	.contact-section input:focus,
	.contact-section textarea:focus {
		border-color: #007bff;
		box-shadow: 0 0 8px rgba(0,123,255,0.25);
	}

	.contact-section button {
		font-size: 18px;
		padding: 12px 35px !important;
	}

	/* ==== MOBILE RESPONSIVE (≤576px) ==== */
	@media (max-width: 576px) {

		/* Alignment kiri */
		.hero-header .text-lg-start {
			text-align: left !important;
		}

		.hero-header h5 {
			font-size: 14px !important;
		}

		.hero-header h1 {
			font-size: 30px !important;
			line-height: 1.3 !important;
			margin-bottom: 20px !important;
		}

		.hero-header .btn {
			padding: 10px 22px !important;
			margin: 5px 0 !important;
			display: inline-block;
			margin-right: 10px !important;
		}

		.hero-header {
			padding-top: 60px !important;
			padding-bottom: 60px !important;
		}

		/* ABOUT responsif */
		.about-section {
			width: 95%;
			padding: 30px 20px;
			margin-top: 15%;
		}

		.about-section h1 {
			font-size: 28px;
		}

		.about-section h5 {
			font-size: 14px;
		}

		.about-section img {
			margin-top: 20px !important;
			height: 200px !important;
		}

		.feature-box {
			padding: 20px 0;
		}

		/* CONTACT responsif */
		.contact-section h1 {
			font-size: 28px;
		}

		.contact-section h5 {
			font-size: 14px;
		}

		.contact-section input,
		.contact-section textarea {
			font-size: 14px;
			padding: 10px 14px;
		}

		.contact-section button {
			width: 100%;
			font-size: 16px;
			padding: 12px !important;
			margin-top: 10px;
		}
	}

</style>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">

                <h5 class="d-inline-block text-primary border-bottom border-5 hero-animate"
                    style="border-color: rgba(256, 256, 256, .3) !important;">
                    SELAMAT DATANG di e-airdesa
                </h5>

                <h1 class="display-1 text-white mb-md-4 hero-animate delay-1">
                    Sistem Informasi Monitoring & Penagihan Air Desa yang efisien
                </h1>

                <div class="pt-2 hero-animate delay-2">
                    <a href="<?= base_url('login'); ?>" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">
                        Masuk Sistem
                    </a>
                    <a href="<?= base_url('register'); ?>" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">
                        Daftar Akun Petugas
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5" 
style="width: 90%;border-radius:12px;margin-top:10%;background-color: #ffffffff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1)">
	<div class="container">
		<div class="row gx-5">

			<div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 300px; max-width: 500px;">
				<h5 class="d-inline-block text-primary text-uppercase border-bottom border-5 fade-left">Tentang Sistem</h5>
				<div class="position-relative h-100">
					<img class="position-absolute w-100 h-80 rounded"
						src="<?= base_url('assets/foto/login.png'); ?>"
						style="object-fit: cover;margin-top:10%;">
				</div>
			</div>

			<div class="col-lg-7">
				<div class="mb-7">
					<h1 class="display-4 fade-left delay-1">Solusi Modern Pengelolaan Air Desa</h1>
				</div>

				<p class="fade-up delay-2">
					<b>e-airdesa</b> adalah platform digital untuk membantu desa dalam mengelola pendistribusian air,
					rekap pemakaian pelanggan, hingga penagihan secara lebih efektif.
					Semua proses mulai dari pencatatan meteran, pelaporan, pembayaran, hingga notifikasi berjalan
					otomatis dan terintegrasi.
				</p>

				<div class="row g-3 pt-3 fade-up delay-3">

					<div class="col-sm-3 col-6">
						<div class="bg-light text-center rounded-circle py-4">
							<i class="fa fa-3x fa-database text-primary mb-3"></i>
							<h6 class="mb-0">Rekap<small class="d-block text-primary">Otomatis</small></h6>
						</div>
					</div>

					<div class="col-sm-3 col-6">
						<div class="bg-light text-center rounded-circle py-4">
							<i class="fa fa-3x fa-chart-line text-primary mb-3"></i>
							<h6 class="mb-0">Pantau<small class="d-block text-primary">Tagihan</small></h6>
						</div>
					</div>

					<div class="col-sm-3 col-6">
						<div class="bg-light text-center rounded-circle py-4">
							<i class="fa fa-3x fa-users text-primary mb-3"></i>
							<h6 class="mb-0">Kelola<small class="d-block text-primary">Pelanggan</small></h6>
						</div>
					</div>

					<div class="col-sm-3 col-6">
						<div class="bg-light text-center rounded-circle py-4">
							<i class="fa fa-3x fa-bell text-primary mb-3"></i>
							<h6 class="mb-0">Notifikasi<small class="d-block text-primary">Realtime</small></h6>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</div>
<!-- About End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
	<div class="container">
		<div class="text-center mb-4">
			<h5 class="d-inline-block text-primary text-uppercase border-bottom border-5 fade-left">Hubungi Kami</h5>
			<h1 class="display-4 fade-left delay-1">Kami Siap Membantu Anda</h1>
		</div>
		<div class="row justify-content-center fade-up delay-2">
			<div class="col-lg-8">
				<form action="<?= base_url('inboxsimpan'); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
						</div>
						<div class="col-md-6">
							<input type="email" name="email" class="form-control" placeholder="Email Anda" required>
						</div>
						<div class="col-12">
							<textarea name="pesan" class="form-control" rows="5" placeholder="Pesan Anda" required></textarea>
						</div>
						<div class="col-12 text-center">
							<button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Kirim Pesan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Contact End -->

<?php $this->load->view('layouts/home-footer') ?>
