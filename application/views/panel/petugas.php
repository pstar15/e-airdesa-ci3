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

	.breadcrumb-container .breadcrumb-item + .breadcrumb-item::before {
		content: ">";
		margin: 0 6px;
		color: #adb5bd;
	}

	/* ===========================================
	RESPONSIVE TABLE → CARD VIEW (DATA PETUGAS)
	=========================================== */

	@media (max-width: 768px) {

		/* Hilangkan header tabel */
		#dataTable thead {
			display: none;
		}

		/* Setiap row menjadi card */
		#dataTable tbody tr {
			display: block;
			background: #ffffff;
			margin-bottom: 16px;
			padding: 15px;
			border-radius: 12px;
			border: 1px solid #e3e6f0;
			box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.06);
		}

		/* Setiap kolom menjadi baris */
		#dataTable tbody tr td {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px 4px;
			position: relative;
			font-size: 14px;
			border-bottom: 1px solid #f1f1f1;
		}

		#dataTable tbody tr td:last-child {
			border-bottom: none;
		}

		/* =======================
		LABEL KOLOM CARD VIEW
		======================= */
		#dataTable tbody tr td:nth-child(1)::before {
			content: "No";
		}
		#dataTable tbody tr td:nth-child(2)::before {
			content: "Nama";
		}
		#dataTable tbody tr td:nth-child(3)::before {
        content: "Email";
    }
    #dataTable tbody tr td:nth-child(4)::before {
        content: "Role";
    }
    #dataTable tbody tr td:nth-child(5)::before {
        content: "Status";
    }
    #dataTable tbody tr td:nth-child(6)::before {
        content: "Aksi";
    }

    /* Styling untuk label col */
    #dataTable tbody tr td::before {
        font-weight: 600;
        color: #4e73df;
        margin-right: 8px;
        flex-basis: 40%; /* label 40%, value 60% */
    }

    /* Tombol Aksi */
    #dataTable tbody tr td:last-child {
        display: flex;
        justify-content: flex-start;
        gap: 6px;
        flex-wrap: wrap;
    }

    #dataTable tbody tr td:last-child .btn {
        padding: 6px 10px;
        font-size: 12px;
    }

    /* Badge Status */
    .badge {
        padding: 6px 10px !important;
        font-size: 12px !important;
    }
}

</style>

<div class="container-fluid" id="container-wrapper">

	<div class="d-sm-flex align-items-center justify-content-between mb-1.5">
		<h1 class="h3 text-gray-800 title-underline page-title">Data Petugas</h1>

		<button class="btn btn-primary fade-stagger" data-toggle="modal" data-target="#modalTambah">
			<i class="fas fa-plus stagger-item"></i>
			<span class="stagger-item">Tambah Petugas</span>
		</button>
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

				<li class="breadcrumb-item stagger-item active" aria-current="page" style="color: #6c757d;">
					Data Petugas
				</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4 fade-stagger">

				<div class="card-header py-3 stagger-item">
					<h6 class="m-0 font-weight-bold text-primary stagger-item">Data Petugas</h6>
				</div>

				<div class="table-responsive p-3 stagger-item">
					<table class="table table-bordered" id="dataTable">
						<thead class="thead-light">
							<tr class="stagger-item">
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Role</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($petugas as $i => $p) : ?>
								<tr class="stagger-item">
									<td><?= $i + 1 ?></td>
									<td><?= $p->nama ?></td>
									<td><?= $p->email ?></td>
									<td><?= $p->role ?></td>
									<td>
										<?php if ($p->status == 'Aktif') : ?>
											<span class="badge badge-success">Aktif</span>
										<?php else : ?>
											<span class="badge badge-danger">Tidak Aktif</span>
										<?php endif ?>
									</td>
									<td>
										<a href="<?= base_url('panel/petugasedit/' . $p->id) ?>" class="btn btn-sm btn-warning stagger-item">
											<i class="fas fa-edit"></i>
										</a>

										<a href="<?= base_url('panel/petugashapus/' . $p->id) ?>"
											onclick="return confirm('Yakin hapus petugas ini?')"
											class="btn btn-sm btn-danger stagger-item">
											<i class="fas fa-trash"></i>
										</a>
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


<!-- ================= Modal Tambah Petugas ================= -->
<div class="modal fade" id="modalTambah" tabindex="-1">
	<div class="modal-dialog modal-lg">

		<form method="POST" action="<?= base_url('panel/petugassimpan') ?>" class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title">Tambah Petugas</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">

				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control" required>
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
				</div>

			</div>

			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">Simpan</button>
				<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>

		</form>

	</div>
</div>

<?php $this->load->view('layouts/panel-footer') ?>