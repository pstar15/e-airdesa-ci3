<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registrasi e-airdesa</title>
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
            font-family: system-ui, 'Segoe UI', Roboto;
		}

		/* WAVE BESAR DI BAWAH */
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

        /* ============ REGISTER CARD ============ */
        .login-card { /* Digunakan untuk registrasi card juga */
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

        /* ============ SweetAlert Customization (Opsional, tapi disarankan) ============ */
        .swal2-styled.swal2-confirm {
            background: linear-gradient(180deg, #1f4ea0, #143b7a) !important;
            border: none !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
            font-weight: 500;
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
	</style>
</head>

<body class="d-flex justify-content-center align-items-center">

	<div class="card p-4 shadow login-card">

		<div class="text-center mb-3">
			<img src="<?= base_url('assets/foto/logo3.png'); ?>" class="img-fluid mb-2" style="width: 50%;" alt="Logo">
		</div>

		<h4 class="text-center fw-bold mb-3">Registrasi</h4>

		<form action="<?= base_url('AuthController/registerproses'); ?>" method="post">

			<div class="mb-3">
                <label class="form-label" for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap" 
                    value="<?= $this->session->flashdata('old_nama') ?: set_value('nama'); ?>" 
                    required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" 
                    value="<?= $this->session->flashdata('old_email') ?: set_value('email'); ?>" 
                    required autocomplete="username">
            </div>

            <div class="mb-2">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password" required autocomplete="new-password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
						<i class="bi bi-eye"></i>
					</button>
                </div>
            </div>

            <div class="form-check mt-3 mb-3">
                <input class="form-check-input" type="checkbox" name="agree_terms" id="agreeTerms" value="1" required>
                <label class="form-check-label" for="agreeTerms" style="font-size: 14px;">
                    Saya menyetujui <a href="<?= base_url('syaratketentuan'); ?>" target="_blank">Syarat & Ketentuan</a> yang berlaku.
                </label>
            </div>

			<button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>

			<div class="text-center">
				Sudah punya akun? <a href="<?= base_url('login'); ?>">Login</a>
			</div>

		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pendaftaran Berhasil!',
                text: '<?php echo $this->session->flashdata('success'); ?>',
            });
        </script>
    <?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <script>
        var errorMessage = '<?php echo str_replace(["\r", "\n"], '', $this->session->flashdata('error')); ?>';
        
        Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal!',
            html: errorMessage,
            customClass: {
                        htmlContainer: 'text-start'
            }
        });
    </script>
<?php endif; ?>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle ikon mata
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>
