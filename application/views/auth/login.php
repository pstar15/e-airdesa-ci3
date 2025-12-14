<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login e-airdesa</title>
	<link href="<?= base_url('assets/foto/logo2.png'); ?>" rel="icon">

	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

	<style>
        :root {
            --deep-blue: #0e3b78;
            --mid-blue: #1b63b3;
            --light-blue: #2a96ff;
        }

		body {
			background: linear-gradient(135deg, var(--deep-blue) 0%, var(--mid-blue) 40%, var(--light-blue) 100%);
			min-height: 100vh;
            margin: 0;
            font-family: system-ui, 'Segoe UI', Roboto;
		}

        .bg-wave {
            position: fixed;
            bottom: -5%;
            left: 0;
            width: 120%;
            height: 45vh;
            background: url("<?= base_url('assets/img/wave-bg.svg'); ?>") no-repeat bottom center;
            background-size: cover;
            opacity: 0.55;
            transform: scale(1.2);
            pointer-events: none;
        }

		.login-card {
            width: 100%;
            max-width: 420px;
            padding: 28px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.93);
            backdrop-filter: blur(7px);
            box-shadow: 0 10px 40px rgba(2, 12, 40, 0.45);

            opacity: 0;
            transform: translateX(-35px);
            animation: fadeSlide 0.8s ease-out forwards;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateX(-35px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

		.login-title {
            font-weight: 700;
            font-size: 20px;
            color: #0d2a52;
        }

        .form-control:focus {
            border-color: #1d6bff;
            box-shadow: 0 6px 15px rgba(29, 107, 255, 0.2);
        }

        .btn-primary {
            background: linear-gradient(180deg, #1f4ea0, #143b7a);
            border: none;
        }

        .btn-primary:hover {
            filter: brightness(1.03);
        }

        .back-link {
            font-size: 14px;
            color: #6c7a95;
        }

        /* ============ SWEETALERT2 CUSTOMIZATION ============ */
        .swal2-styled.swal2-confirm {
            /* Ganti warna ungu default SweetAlert2 dengan warna utama Anda */
            background: linear-gradient(180deg, #1f4ea0, #143b7a) !important;
            border: none !important;
            /* Menambahkan shadow yang konsisten dengan button Login */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
            font-weight: 500;
        }

        .swal2-popup {
            /* Sedikit memperhalus bayangan pop-up */
            box-shadow: 0 10px 45px rgba(2, 12, 40, 0.55) !important;
            border-radius: 12px;
        }

        /* Memperbesar ikon (opsional) */
        .swal2-icon.swal2-error {
            border-color: #dc3545 !important;
        }

        .swal2-icon.swal2-error .swal2-x-mark {
            color: #dc3545 !important;
        }

        @media (max-width: 576px) {
            .bg-wave {
                bottom: -10%;
                height: 40vh;
                opacity: 0.45;
            }
            .login-card {
                padding: 22px;
                margin: 20px;
            }
        }

		a {
			text-decoration: none;
		}
	</style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="bg-wave"></div>

	<div class="card p-4 shadow login-card">

		<div class="text-center mb-3">
			<img src="<?= base_url('assets/foto/logo3.png'); ?>" class="img-fluid mb-2" style="width: 50%;" alt="Logo">
		</div>

		<h4 class="login-title text-center mb-3">Login</h4>

		<form action="<?= base_url('loginproses'); ?>" method="post">

			<div class="mb-3">
				<label class="form-label">Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $this->session->flashdata('old_email'); ?>" autofocus required>
			</div>

			<div class="mb-2">
				<label class="form-label">Password</label>
				<div class="input-group">
					<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="current-password" id="password" required>
					<button class="btn btn-outline-secondary" type="button" id="togglePassword">
						<i class="bi bi-eye"></i>
					</button>
				</div>
			</div>

			<!-- <div class="form-check mb-3">
				<input class="form-check-input" type="checkbox" id="remember">
				<label class="form-check-label" for="remember">
					Remember Me
				</label>
			</div> -->

			<button type="submit" class="btn btn-primary w-100 mb-3 mt-2">Login</button>

			<!-- <div class="text-center mb-2">
				<a href="#" class="small">Lupa Password?</a>
			</div> -->

			<div class="text-center mb-3">
				Belum punya akun? <a href="<?= base_url('register'); ?>">Registrasi</a>
			</div>

			<!-- Kembali ke Halaman Home -->
			<div class="text-center" style="font-size: 14px;">
				<a href="<?= base_url(''); ?>"  style="color: #929292ff;"> <i class="bi bi-arrow-left"></i> Kembali ke Halaman Home</a>
			</div>

		</form>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php if ($this->session->flashdata('success')): ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Login Berhasil!',
				text: '<?php echo $this->session->flashdata('success'); ?>',
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Login Gagal!',
				text: '<?php echo $this->session->flashdata('error'); ?>',
			});
		</script>
	<?php endif; ?>

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function() {
			// tipe input
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);

			// ubah icon
			this.querySelector('i').classList.toggle('bi-eye');
			this.querySelector('i').classList.toggle('bi-eye-slash');
		});
	</script>
</body>

</html>
