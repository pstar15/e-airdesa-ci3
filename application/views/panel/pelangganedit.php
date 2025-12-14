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
</style>
<div class="container-fluid" id="container-wrapper">

	<div class="d-sm-flex align-items-center justify-content-between mb-1.5">
		<h1 class="h3 text-gray-800 title-underline page-title">Edit Pelanggan</h1>
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
					Edit Pelanggan
				</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="card mb-4 fade-stagger">

				<div class="card-header py-3 fade-stagger">
					<h6 class="m-0 font-weight-bold text-primary stagger-item">Form Edit Pelanggan</h6>
				</div>

				<div class="card-body stagger-item">

					<form method="POST" action="<?= base_url('panel/pelangganupdate/' . $pelanggan->id) ?>">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?= $pelanggan->nama ?>" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control" required><?= $pelanggan->alamat ?></textarea>
						</div>

						<div class="form-group">
							<label>No Meter</label>
							<input type="text" name="nometer" value="<?= $pelanggan->nometer ?>" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jeniskelamin" class="form-control" required>
								<option value="Laki-laki" <?= $pelanggan->jeniskelamin == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
								<option value="Perempuan" <?= $pelanggan->jeniskelamin == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Latitude</label>
							<input type="text" name="lat" id="lat" class="form-control"
								value="<?= $pelanggan->lat ?>" required readonly>
						</div>

						<div class="form-group">
							<label>Longitude</label>
							<input type="text" name="lng" id="lng" class="form-control"
								value="<?= $pelanggan->lng ?>" required readonly>
						</div>

						<div class="form-group">
							<label>Pilih Lokasi</label>
							<div id="mapEditPelanggan" style="height: 350px; border-radius: 8px;"></div>
						</div>

						<button type="submit" class="btn btn-primary stagger-item">Update</button>
						<a href="<?= base_url('panel/pelanggan') ?>" class="btn btn-secondary stagger-item">Kembali</a>

					</form>

				</div>

			</div>

		</div>
	</div>

</div>

<?php $this->load->view('layouts/panel-footer') ?>

<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
	let mapEdit;
	let markerEdit;

	let oldLat = parseFloat("<?= $pelanggan->lat ?>");
	let oldLng = parseFloat("<?= $pelanggan->lng ?>");

	// Init map
	mapEdit = L.map('mapEditPelanggan').setView([oldLat, oldLng], 15);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
	}).addTo(mapEdit);

	// Marker awal
	markerEdit = L.marker([oldLat, oldLng], {
		draggable: true
	}).addTo(mapEdit);

	markerEdit.on('dragend', function() {
		let pos = markerEdit.getLatLng();
		$('#lat').val(pos.lat.toFixed(6));
		$('#lng').val(pos.lng.toFixed(6));
	});

	// Klik peta
	mapEdit.on('click', function(e) {
		let lat = e.latlng.lat.toFixed(6);
		let lng = e.latlng.lng.toFixed(6);

		$('#lat').val(lat);
		$('#lng').val(lng);

		markerEdit.setLatLng(e.latlng);
	});

	setTimeout(() => {
		mapEdit.invalidateSize();
	}, 500);
</script>