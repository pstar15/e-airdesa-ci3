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

	/* ============================
	TABLE TO CARD (RESPONSIVE)
	Untuk halaman: Data Tagihan
	============================ */

	@media (max-width: 768px) {

		/* Hilangkan header tabel */
		table#dataTable thead {
			display: none;
		}

		/* Setiap baris berubah menjadi card */
		table#dataTable tbody tr {
			display: block;
			background: #ffffff;
			margin-bottom: 15px;
			padding: 15px;
			border-radius: 12px;
			border: 1px solid #e3e6f0;
			box-shadow: 0px 2px 6px rgba(0,0,0,0.08);
		}

		/* Setiap cell menjadi baris flex dengan label */
		table#dataTable tbody tr td {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px 5px;
			font-size: 14px;
			border-bottom: 1px solid #e9ecef;
			word-break: break-word;
		}

		/* Hilangkan border di cell terakhir */
		table#dataTable tbody tr td:last-child {
			border-bottom: none !important;
		}

		/* Label setiap kolom */
		table#dataTable tbody tr td:nth-child(1)::before {
			content: "No";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(2)::before {
			content: "Pelanggan";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(3)::before {
			content: "Petugas";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(4)::before {
			content: "Periode";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(5)::before {
			content: "Total";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(6)::before {
			content: "Status";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(7)::before {
			content: "Created At";
			font-weight: 600;
			color: #4e73df;
		}

		table#dataTable tbody tr td:nth-child(8)::before {
			content: "Aksi";
			font-weight: 600;
			color: #4e73df;
		}

		/* Aksi tombol berjajar rapi */
		table#dataTable tbody tr td:last-child {
			justify-content: flex-start;
			gap: 8px;
			flex-wrap: wrap;
		}
	}
</style>
<div class="container-fluid" id="container-wrapper">

	<div class="d-sm-flex align-items-center justify-content-between mb-1.5">
		<h1 class="h3 text-gray-800 title-underline page-title">Data Riwayat Tagihan <?= $pelanggan->nama; ?></h1>
	</div>

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
					<a href="<?= base_url('panel/pelanggan') ?>" style="text-decoration: none; color: #007bff;">
						Data Pelanggan
					</a>
				</li>

				<li class="breadcrumb-item stagger-item active" aria-current="page" style="color: #6c757d;">
					Riwayat Tagihan
				</li>
			</ol>
		</nav>
	</div>

	<!-- FILTER -->
	<div class="card mb-4 fade-stagger">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary stagger-item">Filter Tagihan</h6>
		</div>

		<div class="card-body stagger-item">
			<form method="GET" class="row">

				<div class="col-md-3">
					<label>Tanggal Awal</label>
					<input type="date" name="tgl_awal" class="form-control"
						value="<?= $this->input->get('tgl_awal') ?>">
				</div>

				<div class="col-md-3">
					<label>Tanggal Akhir</label>
					<input type="date" name="tgl_akhir" class="form-control"
						value="<?= $this->input->get('tgl_akhir') ?>">
				</div>

				<div class="col-md-3">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="semua">Semua</option>
						<option value="Belum Bayar" <?= $this->input->get('status') == 'Belum Bayar' ? 'selected' : '' ?>>Belum Bayar</option>
						<option value="Menunggu Konfirmasi" <?= $this->input->get('status') == 'Menunggu Konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
						<option value="Lunas" <?= $this->input->get('status') == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
					</select>
				</div>

				<div class="col-md-3 mt-1">
					<label>&nbsp;</label><br>
					<button class="btn btn-primary btn-block stagger-item">
						<i class="fas fa-filter"></i> Filter
					</button>
				</div>

			</form>
		</div>
	</div>

	<!-- TABLE -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4 fade-stagger">

				<div class="card-header py-3 stagger-item">
					<h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
				</div>

				<div class="table-responsive p-3 stagger-item">
					<table class="table table-bordered" id="dataTable">
						<thead class="thead-light stagger-item">
							<tr class="stagger-item">
								<th>No</th>
								<th>Pelanggan</th>
								<th>Petugas</th>
								<th>Periode</th>
								<th>Total</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody class="stagger-item">
							<?php foreach ($tagihan as $i => $t) : ?>
								<tr class="stagger-item">
									<td><?= $i + 1 ?></td>
									<td><?= $t->nama_pelanggan ?></td>
									<td><?= $t->nama_petugas ?></td>
									<td><?= $t->periode ?></td>
									<td>Rp <?= number_format($t->total, 0, ',', '.') ?></td>

									<td>
										<?php if ($t->status == 'Belum Bayar') : ?>
											<span class="badge badge-danger">Belum Bayar</span>
										<?php elseif ($t->status == 'Menunggu Konfirmasi') : ?>
											<span class="badge badge-warning">Menunggu</span>
										<?php else : ?>
											<span class="badge badge-success">Lunas</span>
										<?php endif ?>
									</td>

									<td><?= date('d-m-Y', strtotime($t->created_at)) ?></td>

									<td>
										<!-- Tombol Detail -->
										<a href="<?= base_url('panel/tagihandetail/' . $t->id) ?>" class="btn btn-sm btn-info stagger-item">
											<i class="fas fa-eye"></i>
										</a>

										<?php
										$user   = $this->session->userdata('user');
										$isAdmin = ($user['role'] == 'Admin');
										$isPetugas = ($user['role'] == 'Petugas');
										$isOwner = ($user['id'] == $t->petugas_id);
										?>

										<!-- Tombol Edit hanya untuk Petugas pemilik tagihan -->
										<?php if ($isPetugas && $isOwner): ?>
											<a href="<?= base_url('panel/tagihanedit/' . $t->id) ?>" class="btn btn-sm btn-warning stagger-item">
												<i class="fas fa-edit"></i>
											</a>
										<?php endif; ?>

										<!-- Tombol Hapus hanya Admin -->
										<?php if ($isAdmin || ($isPetugas && $isOwner)): ?>
											<a href="<?= base_url('panel/tagihanhapus/' . $t->id) ?>"
												onclick="return confirm('Yakin hapus tagihan ini?')"
												class="btn btn-sm btn-danger stagger-item">
												<i class="fas fa-trash"></i>
											</a>
										<?php endif; ?>
									</td>

								</tr>
							<?php endforeach ?>
						</tbody>

					</table>
				</div>

			</div>
		</div>
	</div>

</div>

<?php $this->load->view('layouts/panel-footer') ?>