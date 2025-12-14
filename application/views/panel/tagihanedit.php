<?php $this->load->view('layouts/panel-header') ?>

<div class="container-fluid" id="container-wrapper">

	<h1 class="h3 mb-4 text-gray-800">Edit Tagihan</h1>

	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Tagihan</h6>
		</div>

		<form action="<?= base_url('panel/tagihanupdate/' . $tagihan->id) ?>"
			method="POST" enctype="multipart/form-data"
			class="card-body row">

			<!-- PILIH PELANGGAN -->
			<div class="form-group col-md-6">
				<label>Pelanggan</label>
				<select name="pelanggan_id" id="pelangganSelect" class="form-control select2" required>
					<?php foreach ($pelanggan as $p) : ?>
						<option
							value="<?= $p->id ?>"
							<?= $p->id == $tagihan->pelanggan_id ? 'selected' : '' ?>
							data-alamat="<?= $p->alamat ?>"
							data-nometer="<?= $p->nometer ?>">
							<?= $p->nama ?> - (<?= $p->nometer ?>)
						</option>
					<?php endforeach ?>
				</select>
			</div>

			<!-- ALAMAT -->
			<div class="form-group col-md-6">
				<label>Alamat</label>
				<input type="text" id="alamat" class="form-control" readonly>
			</div>

			<!-- NOMETER -->
			<div class="form-group col-md-6">
				<label>No Meter</label>
				<input type="text" id="nometer" class="form-control" readonly>
			</div>

			<!-- METER AWAL -->
			<div class="form-group col-md-3">
				<label>Meter Awal</label>
				<input type="number" name="jumlah_meter_awal" class="form-control"
					value="<?= $tagihan->jumlah_meter_awal ?>" required>
			</div>

			<!-- METER AKHIR -->
			<div class="form-group col-md-3">
				<label>Meter Akhir</label>
				<input type="number" name="jumlah_meter_akhir" class="form-control"
					value="<?= $tagihan->jumlah_meter_akhir ?>" required>
			</div>

			<!-- PERIODE -->
			<div class="form-group col-md-4">
				<label>Periode</label>
				<input type="month" name="periode" class="form-control"
					value="<?= $tagihan->periode ?>" required>
			</div>

			<!-- TOTAL -->
			<div class="form-group col-md-4">
				<label>Total</label>
				<input type="number" name="total" class="form-control"
					value="<?= $tagihan->total ?>" required>
			</div>

			<!-- STATUS -->
			<div class="form-group col-md-4">
				<label>Status</label>
				<select name="status" id="statusSelect" class="form-control" required>
					<option value="Belum Bayar"
						<?= $tagihan->status == 'Belum Bayar' ? 'selected' : '' ?>>
						Belum Bayar
					</option>

					<option value="Menunggu Konfirmasi"
						<?= $tagihan->status == 'Menunggu Konfirmasi' ? 'selected' : '' ?>>
						Lunas
					</option>
				</select>
			</div>

			<!-- UPLOAD BUKTI BAYAR -->
			<div class="form-group col-md-6" id="uploadBuktiWrapper">
				<label>Upload Bukti Bayar</label>
				<input type="file" name="buktibayar" class="form-control">

				<?php if (!empty($tagihan->buktibayar)) : ?>
					<?php
					$ext = pathinfo($tagihan->buktibayar, PATHINFO_EXTENSION);
					?>

					<div class="mt-2">
						<small class="text-info d-block mb-1">
							File lama: <?= $tagihan->buktibayar ?>
						</small>

						<?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])) : ?>
							<img src="<?= base_url('assets/uploads/' . $tagihan->buktibayar) ?>"
								alt="Bukti Bayar"
								style="max-width: 200px; border: 1px solid #ccc; border-radius: 5px;">
						<?php else : ?>
							<a href="<?= base_url('assets/uploads/' . $tagihan->buktibayar) ?>" target="_blank">
								📄 Lihat PDF
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

			<div class="form-group col-md-12 mt-3">
				<button class="btn btn-primary" type="submit">Perbarui</button>
				<a href="<?= base_url('panel/tagihan') ?>" class="btn btn-secondary">Kembali</a>
			</div>

		</form>
	</div>
</div>

<?php $this->load->view('layouts/panel-footer') ?>

<script>
	// Auto load alamat & no meter
	$("#pelangganSelect").on("change", function() {
		let alamat = $(this).find(':selected').data('alamat');
		let nometer = $(this).find(':selected').data('nometer');

		$("#alamat").val(alamat);
		$("#nometer").val(nometer);
	}).trigger('change'); // trigger untuk prefill data

	// Show/hide upload bukti
	function toggleBukti() {
		let status = $("#statusSelect").val();
		if (status === "Menunggu Konfirmasi" || status === "Lunas") {
			$("#uploadBuktiWrapper").show();
		} else {
			$("#uploadBuktiWrapper").hide();
		}
	}

	$("#statusSelect").on("change", toggleBukti);
	toggleBukti(); // initial
</script>