<?php $this->load->view('layouts/home-header') ?>
<style>
	/* ====================================================
	ANIMASI (Sama seperti Section lain agar konsisten)
	==================================================== */
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

	.fade-up {
		opacity: 0;
		transform: translateY(20px);
		animation: fadeUp .7s ease-out forwards;
		will-change: opacity, transform;   /* mencegah FOUC / flicker */

	}

	.delay-1 { animation-delay: .15s; }
	.delay-2 { animation-delay: .3s; }
	.delay-3 { animation-delay: .45s; }

	.fade-up,
	.terms-card,
	.terms-header {
		backface-visibility: hidden;
	}

	/* ====================================================
	STYLE KHUSUS SYARAT & KETENTUAN
	==================================================== */

	.terms-header h1 {
		font-size: 38px;
		font-weight: 700;
		color: #1d1d1d;
	}

	.terms-header h5 {
		font-size: 16px;
		letter-spacing: 1px;
	}

	.terms-card {
		border-radius: 12px;
		padding: 35px;
		background: #ffffff;
		box-shadow: 0 4px 10px rgba(0,0,0,0.08);
		animation: fadeUp .6s ease-out;
	}

	/* Typografi di dalam card */
	.terms-card p {
		font-size: 16px;
		line-height: 1.7;
		color: #444;
		margin-bottom: 18px;
	}

	.terms-card h4 {
		font-size: 22px;
		font-weight: 700;
		color: #007bff;
		margin-top: 32px;
		margin-bottom: 10px;
	}

	.terms-card ul {
		margin-left: 20px;
		margin-bottom: 15px;
	}

	.terms-card ul li {
		margin-bottom: 6px;
		font-size: 16px;
		line-height: 1.6;
	}


	/* ====================================================
	RESPONSIVE MOBILE
	==================================================== */

	@media (max-width: 576px) {

		.terms-header h1 {
			font-size: 26px;
			margin-top: 10px;
		}

		.terms-header h5 {
			font-size: 13px;
		}

		.terms-card {
			padding: 22px;
		}

		.terms-card h4 {
			font-size: 19px;
		}

		.terms-card p,
		.terms-card ul li {
			font-size: 14px;
		}
	}
</style>
<div class="mb-4 mt-5 text-center terms-header fade-up">
	<h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
		Syarat & Ketentuan
	</h5>
	<h1 class="display-5 mt-3">Solusi Modern Pengelolaan Air Desa</h1>
</div>

<div class="container py-1">
	<div class="card shadow-sm border-0 terms-card delay-1">
		<div class="card-body p-0">

			<p>
				Dengan menggunakan sistem <b>e-airdesa</b>, Anda dianggap telah membaca, memahami,
				dan menyetujui semua syarat dan ketentuan berikut.
			</p>

			<h4 class="mt-4">1. Pendahuluan</h4>
			<p>
				Sistem <b>e-airdesa</b> digunakan oleh warga dan pengurus BUMDES untuk pengelolaan data pelanggan,
				tagihan air, serta laporan penagihan. Pengguna wajib mengikuti aturan yang berlaku.
			</p>

			<h4 class="mt-4">2. Akses Pengguna</h4>
			<ul>
				<li>Setiap pengguna wajib menggunakan akun resmi yang diberikan oleh pihak desa.</li>
				<li>Dilarang menggunakan akun milik orang lain tanpa izin.</li>
			</ul>

			<h4 class="mt-4">3. Tanggung Jawab Pengguna</h4>
			<ul>
				<li>Pengurus bertanggung jawab atas validitas data tagihan yang diinput.</li>
				<li>Petugas bertanggung jawab atas keakuratan laporan penagihan di lapangan.</li>
				<li>Setiap pengguna wajib menjaga kerahasiaan akun dan kata sandi masing-masing.</li>
			</ul>

			<h4 class="mt-4">4. Data & Privasi</h4>
			<p>
				Semua data pelanggan, tagihan, dan aktivitas pengguna disimpan dengan aman dan digunakan
				hanya untuk keperluan operasional penagihan air desa.
			</p>

			<h4 class="mt-4">5. Pembatasan Tanggung Jawab</h4>
			<p>
				Pengembang sistem tidak bertanggung jawab atas kesalahan input atau kelalaian pengguna
				saat menggunakan sistem.
			</p>

			<h4 class="mt-4">6. Perubahan Syarat & Ketentuan</h4>
			<p>
				<i>e-airdesa</i> berhak mengubah syarat & ketentuan sewaktu-waktu melalui pemberitahuan
				di website resmi.
			</p>

			<h4 class="mt-4">7. Persetujuan</h4>
			<p>
				Dengan mencentang kotak persetujuan dan melanjutkan proses login, pengguna menyatakan
				setuju terhadap seluruh syarat dan ketentuan yang berlaku.
			</p>

		</div>
	</div>
</div>

<?php $this->load->view('layouts/home-footer') ?>