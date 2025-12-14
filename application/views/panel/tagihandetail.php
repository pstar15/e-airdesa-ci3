<?php $this->load->view('layouts/panel-header') ?>
<style>
	/* Hilangkan title saat loading */
	body:not(.loaded) .fade-stagger .stagger-item {
		opacity: 0 !important;
		transform: translateY(10px) !important;
	}

	/* Tampilkan title setelah loaded */
	body.loaded .page-title {
		opacity: 1;
		visibility: visible;
		transition: opacity .35s ease, transform .35s ease;
		transform: translateY(0);
	}

	.breadcrumb-container .breadcrumb-item + .breadcrumb-item::before {
		content: ">";
		margin: 0 6px;
		color: #adb5bd;
	}

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
	body.loaded .skeleton-shimmer::before,
	body.loaded .skeleton-shimmer-nohide::before {
		opacity: 0 !important;
		animation: none !important;
		visibility: hidden !important;
		pointer-events: none !important;
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
		opacity: 0 !important;
		animation: none !important;
		pointer-events: none !important;
		transition: opacity .25s ease-out;
	}

	@keyframes shimmerMove {
		0%   { background-position: -100% 0; }
		100% { background-position: 100% 0; }
	}

	/* ================================
	RESPONSIVE IMAGE – BUKTI BAYAR
	================================ */

	.bukti-wrapper {
		max-width: 100%;
		overflow: hidden;
	}

	.bukti-wrapper img {
		width: 100%;
		max-width: 350px;
		height: auto;
		display: block;
		border-radius: 8px;
		border: 1px solid #ddd;
	}

	/* Saat layar kecil (≤ 576px), gambar otomatis 100% container */
	@media (max-width: 576px) {
		.bukti-wrapper img {
			max-width: 100%;
			width: 100% !important;
			margin: 0 auto;
		}
	}
</style>
<div class="container-fluid" id="container-wrapper">

	<h1 class="h3 text-gray-800 title-underline page-title">Detail Tagihan</h1>

	<!-- Breadcrumb -->
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
				<li class="breadcrumb-item stagger-item">
					<a href="<?= base_url('panel') ?>" style="text-decoration: none; color: #007bff;">
						Dashboard
					</a>
				</li>

				<li class="breadcrumb-item stagger-item">
					<a href="<?= base_url('panel/tagihan') ?>" style="text-decoration: none; color: #007bff;">
						Data Tagihan
					</a>
				</li>

				<li class="breadcrumb-item stagger-item active" aria-current="page" style="color: #6c757d;">
					Detail Tagihan
				</li>
			</ol>
		</nav>
	</div>

	<div class="card shadow mb-4 fade-stagger">
		<div class="card-header bg-primary text-white d-flex align-items-center fade-stagger">
			<h6 class="m-0 font-weight-bold stagger-item">Informasi Tagihan</h6>
		</div>

		<div class="card-body fade-stagger">

			<!-- SECTION: DATA PELANGGAN -->
			<div class="row mb-4 fade-stagger">
				<div class="col-md-6 stagger-item">
					<h6 class="text-primary font-weight-bold mb-3 stagger-item">Informasi Pelanggan</h6>

					<div class="mb-2"><strong>Nama:</strong> <?= $pelanggan->nama ?></div>
					<div class="mb-2"><strong>No Meter:</strong> <?= $pelanggan->nometer ?></div>
					<div class="mb-2"><strong>Alamat:</strong> <?= $pelanggan->alamat ?></div>
				</div>

				<!-- SECTION: DATA TAGIHAN -->
				<div class="col-md-6 stagger-item">
					<h6 class="text-primary font-weight-bold mb-3 stagger-item">Rincian Tagihan</h6>

					<div class="mb-2"><strong>Meter Awal:</strong> <?= $tagihan->jumlah_meter_awal ?></div>
					<div class="mb-2"><strong>Meter Akhir:</strong> <?= $tagihan->jumlah_meter_akhir ?></div>
					<div class="mb-2"><strong>Periode:</strong> <?= $tagihan->periode ?></div>
					<div class="mb-2"><strong>Total:</strong>
						<span class="text-success font-weight-bold">
							Rp <?= number_format($tagihan->total, 0, ',', '.') ?>
						</span>
					</div>

					<div class="mb-2"><strong>Status:</strong>
						<span class="badge 
							<?= $tagihan->status == 'Belum Bayar' ? 'badge-danger' : '' ?>
							<?= $tagihan->status == 'Menunggu Konfirmasi' ? 'badge-warning' : '' ?>
							<?= $tagihan->status == 'Lunas' ? 'badge-success' : '' ?>">
							<?= $tagihan->status ?>
						</span>
					</div>
				</div>
			</div>

			<hr>

			<!-- SECTION: BUKTI PEMBAYARAN -->
			<div class="mb-4 fade-stagger">
				<h6 class="text-primary font-weight-bold stagger-item">Bukti Pembayaran</h6>

				<?php if (!empty($tagihan->buktibayar)) : ?>
					<?php $ext = strtolower(pathinfo($tagihan->buktibayar, PATHINFO_EXTENSION)); ?>

					<div class="mt-2 p-3 border rounded bg-light bukti-wrapper stagger-item">
						<?php if (in_array($ext, ['jpg', 'jpeg', 'png'])) : ?>
							<img src="<?= base_url('assets/uploads/' . $tagihan->buktibayar) ?>"
								alt="Bukti Bayar"
								style="max-width: 350px; border:1px solid #ddd;">
						<?php else : ?>
							<a href="<?= base_url('assets/uploads/' . $tagihan->buktibayar) ?>"
								class="btn btn-info btn-sm" target="_blank">
								📄 Lihat Dokumen
							</a>
						<?php endif; ?>
					</div>

				<?php else : ?>
					<p class="text-danger mt-2 stagger-item">Tidak ada bukti pembayaran.</p>
				<?php endif; ?>
			</div>

			<hr>

			<!-- SECTION: UPDATE STATUS (ADMIN ONLY) -->
			<?php if ($this->session->userdata('user')['role'] == "Admin") : ?>
				<div class="mt-4 stagger-item">

					<h6 class="text-primary font-weight-bold mb-3">Update Status Tagihan</h6>

					<form action="<?= base_url('panel/tagihanupdatestatus/' . $tagihan->id) ?>" method="POST">

						<div class="form-group col-md-4 px-0">
							<label><strong>Status Baru</strong></label>
							<select name="status" class="form-control">
								<option value="Belum Bayar" <?= $tagihan->status == 'Belum Bayar' ? 'selected' : '' ?>>Belum Bayar</option>
								<option value="Menunggu Konfirmasi" <?= $tagihan->status == 'Menunggu Konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
								<option value="Lunas" <?= $tagihan->status == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
							</select>
						</div>

						<div class="mt-3 stagger-item">
							<button type="submit" class="btn btn-primary ">Update Status</button>
							<a href="<?= base_url('panel/tagihan') ?>" class="btn btn-secondary">Kembali</a>
						</div>

					</form>
				</div>
			<?php endif; ?>

		</div>
	</div>

</div>

<?php $this->load->view('layouts/panel-footer') ?>