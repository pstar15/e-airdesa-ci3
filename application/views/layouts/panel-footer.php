<!-- Footer -->

<!-- <footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>copyright &copy; <script>
					document.write(new Date().getFullYear());
				</script> - developed by
				<b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
			</span>
		</div>
	</div>

	<div class="container my-auto py-2">
		<div class="copyright text-center my-auto">
			<span>copyright &copy; <script>
					document.write(new Date().getFullYear());
				</script> - distributed by
				<b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
			</span>
		</div>
	</div>
</footer> -->
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/panel'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/js/demo/chart-area-demo.js"></script>

<script src="<?= base_url('assets/panel'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/panel'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

<script>
	$(document).ready(function() {
		$('#dataTable').DataTable(); // ID From dataTable 
		$('#dataTableHover').DataTable(); // ID From dataTable with Hover
	});
</script>

<script>
	$(".select2").select2();

	const topLoader = document.getElementById("topLoader");

    // Jalankan efek loading
    function startLoader() {
        topLoader.style.width = "0%";
        topLoader.style.display = "block";
        setTimeout(() => topLoader.style.width = "70%", 10); // mulai bergerak
    }

    // Selesaikan loading saat halaman selesai
    function finishLoader() {
        topLoader.style.width = "100%";
        setTimeout(() => {
            topLoader.style.display = "none";
            topLoader.style.width = "0%";
        }, 300);
    }

    // Ketika halaman selesai load
    window.addEventListener("load", finishLoader);

    // Tangkap klik ke semua link yang memuat halaman baru
    document.addEventListener("click", function (e) {
        let target = e.target.closest("a");

        if (!target) return;

        // Abaikan link yang tidak memuat halaman baru
        if (
            target.getAttribute("target") === "_blank" ||
            target.href.startsWith("javascript:") ||
            target.href === "#" ||
            target.dataset.toggle === "modal" ||
            target.dataset.target ||
            target.dataset.toggle === "dropdown"
        ) {
            return;
        }

        // Jika link valid → mulai loading
        startLoader();
    });

    // Tangkap submit form
    document.addEventListener("submit", function () {
        startLoader();
    });

	document.addEventListener("DOMContentLoaded", function () {
		// Pastikan efek skeleton terlihat dulu (minimum 300ms)
		const MIN_LOADING = 300;

		const start = performance.now();

		function finishLoading() {
			document.body.classList.add("loaded");
		}

		window.addEventListener("load", function () {
			const diff = performance.now() - start;

			// Jika loading terlalu cepat, tambahkan delay agar seragam
			if (diff < MIN_LOADING) {
				setTimeout(finishLoading, MIN_LOADING - diff);
			} else {
				finishLoading();
			}
		});
	});
</script>
</body>

</html>
