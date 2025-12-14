<?php $this->load->view('layouts/home-header') ?>
<style>
	/* =====================================================
	ANIMASI FADE-UP AMAN (ANTI KEDIP)
	===================================================== */
	.fade-up {
		opacity: 0;
		transform: translateY(20px);
		animation: fadeUp .7s ease-out forwards;
		will-change: opacity, transform;
	}

	@keyframes fadeUp {
		0% {
			opacity: 0;
			transform: translateY(20px);
		}
		100% {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.delay-1 { animation-delay: .15s; }
	.delay-2 { animation-delay: .3s; }
	.delay-3 { animation-delay: .45s; }
	.delay-4 { animation-delay: .6s; }
	.delay-5 { animation-delay: .75s; }

	/* =====================================================
	STYLE KHUSUS UNTUK HALAMAN DAFTAR FITUR
	===================================================== */

	/* Title Section */
	.fitur-title-box {
		max-width: 620px;
		margin: 70px auto 40px auto;
	}

	.fitur-title-box h1 {
		font-weight: 700;
		line-height: 1.3;
	}

	/* Card wrapper */
	.fitur-card {
		border-radius: 12px;
		border: none;
		padding: 32px;
	}

	/* Heading fitur (nomor + judul) */
	.fitur-card h4 {
		font-weight: 600;
		margin-top: 32px;
		display: flex;
		align-items: center;
		gap: 8px;
		position: relative;
	}

	/* Number styling (1., 2., 3. ...) */
	.fitur-card h4::before {
		content: "";
		position: absolute;
		height: 3px;
		width: 40px;
		left: 0;
		bottom: -6px;
		background-color: #0d6efd;
		opacity: .6;
		border-radius: 6px;
	}

	/* Paragraph styling */
	.fitur-card p {
		margin-top: 12px;
		line-height: 1.7;
		color: #333;
	}

	/* Responsive */
	@media (max-width: 768px) {
		.fitur-title-box {
			max-width: 90%;
			margin-top: 50px;
		}

		.fitur-card {
			padding: 24px;
		}
	}

</style>
<div class="mb-4 mt-5 text-center fitur-title-box fade-up">
	<h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
		Fitur Aplikasi
	</h5>
	<h1 class="display-5 mt-3">Solusi Modern Pengelolaan Air Desa</h1>
</div>

<div class="container py-1">
	<div class="card shadow-sm border-0 fitur-card fade-up delay-1">
		<div class="card-body p-4">

			<p>
				Aplikasi <b>e-airdesa</b> dirancang untuk membantu petugas dan pengurus desa
				dalam mengelola proses penagihan air secara efektif, cepat, dan akurat.
			</p>

			<p>
				Berikut fitur utama yang tersedia:
			</p>

			<!-- FITUR 1 -->
			<h4 class="mt-4 fade-up delay-2">1. Daftar Penagihan Harian</h4>
			<p class="fade-up delay-3">
				Menyediakan akses instan ke daftar pelanggan yang wajib ditagih pada hari operasional berjalan,
				lengkap dengan indikator status penagihan terkini untuk membantu memprioritaskan tugas secara efektif.
			</p>

			<!-- FITUR 2 -->
			<h4 class="mt-4 fade-up delay-3">2. Tandai Pembayaran</h4>
			<p class="fade-up delay-4">
				Memungkinkan pembaruan status tagihan secara real-time langsung melalui perangkat petugas.
				Fitur ini memastikan akurasi data dan mempercepat proses rekonsiliasi keuangan.
			</p>

			<!-- FITUR 3 -->
			<h4 class="mt-4 fade-up delay-4">3. Riwayat Penagihan</h4>
			<p class="fade-up delay-5">
				Menyediakan akses komprehensif ke arsip laporan penagihan sebelumnya.
				Fungsi ini penting untuk audit, verifikasi riwayat pembayaran pelanggan,
				serta analisis tren kinerja petugas.
			</p>

			<!-- FITUR 4 -->
			<h4 class="mt-4 fade-up delay-5">4. Mode Mobile-Friendly</h4>
			<p class="fade-up delay-6">
				Antarmuka aplikasi dioptimalkan sepenuhnya untuk perangkat smartphone.
				Memberikan pengalaman penggunaan yang mudah, navigasi yang intuitif,
				dan efisiensi kerja maksimal ketika bertugas di lapangan.
			</pc>

			<!-- FITUR 5 -->
			<h4 class="mt-4 fade-up delay-6">5. Pesan Penagihan dari Pengurus</h4>
			<p class="fade-up delay-7">
				Menjadi saluran komunikasi resmi untuk menerima instruksi operasional,
				notifikasi penting, serta informasi terbaru secara langsung dari pengurus atau administrator.
			</p>

		</div>
	</div>
</div>

<?php $this->load->view('layouts/home-footer') ?>