<?php $this->load->view('layouts/panel-header') ?>

<style>
	.title-underline {
		position: relative;
		opacity: 1;
		animation: underlineFadeIn 1s ease forwards;
		animation-delay: 0.1s;
	}

	.title-underline.animate-underline::after {
		content: "";
		position: absolute;
		left: 0;
		bottom: -3px;
		width: 0%;
		height: 3px;
		background: #4e73df; /* warna primary */
		border-radius: 3px;
		animation: underlineGrow 0.8s ease forwards;
		animation-delay: 0.2s;
	}

	@keyframes underlineFadeIn {
		0% { opacity: 0; transform: translateY(6px); }
		100% { opacity: 1; transform: translateY(0); }
	}

	@keyframes underlineGrow {
		0% { width: 0%; }
		100% { width: 60%; }
	}

	/* skeleton shimmer untuk title, TIDAK dihilangkan saat loaded */
	.skeleton-shimmer-nohide {
		position: relative;
		overflow: hidden;
	}

	.skeleton-shimmer-nohide::before {
		content: "";
		position: absolute;
		inset: 0;
		background-size: 200% 100%;
		border-radius: 6px;
		animation: shimmerMove 1.4s ease-in-out infinite;
		opacity: 1;
	}

	/* hilangkan shimmer HANYA setelah loaded */
	body.loaded .skeleton-shimmer-nohide::before {
		opacity: 0;
		animation: none !important;
	}

	.breadcrumb-container .breadcrumb-item + .breadcrumb-item::before {
		content: ">";
		margin: 0 6px;
		color: #adb5bd;
	}

	/* =======================================================
	Fade + Slide + Stagger (Breadcrumb, Icon, Text, Card)
	======================================================= */

	.fade-stagger .stagger-item {
		opacity: 0;
		transform: translateY(10px);
		transition: opacity .45s ease, transform .45s ease;
	}

	/* Aktif setelah body.loaded */
	body.loaded .fade-stagger .stagger-item {
		opacity: 1;
		transform: translateY(0);
	}

	/* Delay otomatis (stagger) */
	.fade-stagger .stagger-item:nth-child(1) { transition-delay: .15s; }
	.fade-stagger .stagger-item:nth-child(2) { transition-delay: .25s; }
	.fade-stagger .stagger-item:nth-child(3) { transition-delay: .35s; }
	.fade-stagger .stagger-item:nth-child(4) { transition-delay: .45s; }
	.fade-stagger .stagger-item:nth-child(5) { transition-delay: .55s; }
	.fade-stagger .stagger-item:nth-child(6) { transition-delay: .65s; }
	.fade-stagger .stagger-item:nth-child(7) { transition-delay: .75s; }
	.fade-stagger .stagger-item:nth-child(8) { transition-delay: .85s; }
	.fade-stagger .stagger-item:nth-child(9) { transition-delay: .95s; }
	.fade-stagger .stagger-item:nth-child(10) { transition-delay: 1.05s; }

	/* ============================
	Skeleton Loading Sync Fix
	============================ */

	/* Card wrapper */
	.skeleton-shimmer {
		position: relative;
		overflow: hidden;
	}

	/* Shimmer Layer */
	.skeleton-shimmer::before {
		content: "";
		position: absolute;
		inset: 0;
		background: linear-gradient(
			120deg,
			rgba(220, 220, 220, 0.15) 0%,
			rgba(220, 220, 220, 0.35) 50%,
			rgba(220, 220, 220, 0.15) 100%
		);
		background-size: 200% 100%;
		animation: shimmerMove 1.4s ease-in-out infinite;
		border-radius: inherit;
		opacity: 1;
		transition: opacity .45s ease-out;
	}

	/* Matikan shimmer sepenuhnya setelah loaded */
	body.loaded .skeleton-shimmer::before {
		opacity: 0;
		animation: none !important;  /* <-- PENTING (menghentikan shimmer) */
	}

	@keyframes shimmerMove {
		0%   { background-position: -100% 0; }
		100% { background-position: 100% 0; }
	}

</style>

<?php if ($this->session->userdata('user')['role'] == 'Admin'): ?>

<div class="container-fluid" id="container-wrapper">

	<div class="d-sm-flex align-items-center justify-content-between mb-2 ">
		<h1 class="h3 mb-0 text-gray-800 title-underline skeleton-shimmer-nohide">Dashboard</h1>
	</div>

	<div class="breadcrumb-container mb-4">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb fade-stagger" style="
				display: flex;
				flex-wrap: wrap;
				list-style: none;
				padding: 8px 12px;
				border-radius: 6px;
				font-size: 14px;
				margin: 0;
			">
				<li class="breadcrumb-item stagger-item active" aria-current="page" style="color: #6c757d;">
					Dashboard
				</li>
			</ol>
		</nav>
	</div>

	<div class="row mb-3">

		<!-- Total Users -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Total User</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $total_users ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-users fa-2x text-primary"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Total Pelanggan -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Total Pelanggan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $total_pelanggan ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-address-book fa-2x text-success"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tagihan Lunas -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Tagihan Lunas</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_lunas ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-check-circle fa-2x text-info"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tagihan Menunggu Konfirmasi -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Menunggu Konfirmasi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_menunggu ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-clock fa-2x text-warning"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tagihan Belum Bayar -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Belum Bayar</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_belum ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-exclamation-circle fa-2x text-danger"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Inbox -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Pesan Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $total_inbox ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-envelope fa-2x text-secondary"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Notifikasi Baru -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Notifikasi Baru</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $notifikasi_baru ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-bell fa-2x text-danger"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<?php endif; ?>

<?php if ($this->session->userdata('user')['role'] == 'Petugas'): ?>
	<div class="container-fluid" id="container-wrapper">

	<div class="d-sm-flex align-items-center justify-content-between mb-2 ">
		<h1 class="h3 mb-0 text-gray-800 title-underline skeleton-shimmer-nohide">Dashboard</h1>
	</div>

	<div class="breadcrumb-container mb-4">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb fade-stagger" style="
				display: flex;
				flex-wrap: wrap;
				list-style: none;
				padding: 8px 12px;
				background: #f8f9fa;
				border-radius: 6px;
				font-size: 14px;
				margin: 0;
			">
				<li class="breadcrumb-item stagger-item active" aria-current="page" style="color: #6c757d;">
					Dashboard
				</li>
			</ol>
		</nav>
	</div>

	<div class="row mb-3">

		<!-- Tagihan Lunas -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Tagihan Lunas</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_lunas ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-check-circle fa-2x text-info"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tagihan Menunggu Konfirmasi -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Menunggu Konfirmasi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_menunggu ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-clock fa-2x text-warning"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tagihan Belum Bayar -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Belum Bayar</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800 stagger-item"><?= $tagihan_belum ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-exclamation-circle fa-2x text-danger"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Notifikasi Baru -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 skeleton-shimmer fade-stagger">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1 stagger-item">Notifikasi Baru</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" stagger-item><?= $notifikasi_baru ?></div>
						</div>
						<div class="col-auto stagger-item">
							<i class="fas fa-bell fa-2x text-danger"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		setTimeout(() => {
			document.body.classList.add("loaded");

			// jalankan animasi underline tanpa membuat title invisible
			document.querySelector(".title-underline")?.classList.add("animate-underline");
		}, 100);
	});
</script>
<?php endif; ?>
<?php $this->load->view('layouts/panel-footer') ?>