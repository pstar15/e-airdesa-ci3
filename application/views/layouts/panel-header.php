<?php
if (!$this->session->userdata('user')) {
	$this->session->set_flashdata('error', 'Anda harus login terlebih dahulu');
	redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="<?= base_url('assets/foto/logo3.png'); ?>" rel="icon">
	<title>BUMDES Desa Ngabeyan</title>
	<link href="<?= base_url('assets/panel'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/panel'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/panel'); ?>/css/ruang-admin.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/panel'); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
	<div id="wrapper">

		<style>

			:root {
				--deep-blue: #0e3b78;
				--mid-blue: #1b63b3;
				--light-blue: #2a96ff;
			}

			/* ========================= */
			/* LOGO AUTO RESIZE SIDEBAR */
			/* ========================= */

			/* Logo default (sidebar open) */
			.sidebar .sidebar-brand img {
				width: 100%;
				height: auto;
				transition: width 0.3s ease, left 0.3s ease;
			}

			/* Jika sidebar ditutup (desktop & mobile) */
			.sidebar.toggled .sidebar-brand img {
				width: 80px;  /* mengecil */
				height: auto;
			}

			/* Menyempurnakan ukuran brand ketika collapsed */
			.sidebar.sidebar-light.toggled .sidebar-brand {
				padding: 0.75rem 0;
			}

			.sidebar {
				min-height: 100vh;
				width: 14rem !important;
				background-color: #253f6e !important;
				box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
			}

			.sidebar .nav-link {
				color: #d7e1ff !important;
				font-weight: 500;
			}

			.sidebar .nav-link i {
				color: #d7e1ff !important;
			}

			.sidebar .nav-link:hover,
			.sidebar .nav-link:focus {
				color: #ffffff !important;
				background-color: rgba(255, 255, 255, 0.12) !important;
			}

			.sidebar .nav-link:hover i,
			.sidebar .nav-link:focus i {
				color: #ffffff !important;
			}

			.sidebar .nav-item.active>.nav-link,
			.sidebar .nav-item .nav-link.active {
				color: #ffffff !important;
				/*background-color: rgba(255, 255, 255, 0.25) !important;*/	
				font-weight: 600;
			}

			.sidebar .nav-item.active>.nav-link i,
			.sidebar .nav-item .nav-link.active i {
				color: #ffffff !important;
			}

			.sidebar-heading {
				color: #bfcaf5 !important;
				font-size: 12px;
				text-transform: uppercase;
			}

			.collapse-inner .collapse-item {
				color: #374f80 !important;
			}

			.collapse-inner .collapse-item:hover {
				color: #1f3b73 !important;
				font-weight: 600;
			}

			.sidebar-light .nav-item .nav-link:active,
			.sidebar-light .nav-item .nav-link:focus,
			.sidebar-light .nav-item .nav-link:hover {
				background-color: transparent !important;
				color: inherit !important;
			}

			.bg-navbar {
				background-color: #253f6e !important;
			}

			.sidebar-light .sidebar-brand {
				color: #fafafa;
				background-color: #253f6e !important;
			}

			#wrapper #content-wrapper #content {
				-webkit-box-flex: 1;
				-ms-flex: 1 0 auto;
				flex: 0 auto !important;
			}

			/* Animasi ikon toggle */
			#iconToggle {
				transition: transform 0.35s ease, opacity 0.35s ease;
			}

			/* Hamburger menjadi panah kiri */
			.icon-arrow {
				transform: rotate(180deg);
			}

			/* Opsional: sedikit fade untuk lebih smooth */
			#iconToggle.fade-out {
				opacity: 0;
			}

			#iconToggle.fade-in {
				opacity: 1;
			}

			/* Toggle hanya muncul di mobile */
			#sidebarToggleTop {
				display: inline-flex !important;
			}

			@media (min-width: 769px) {
				#sidebarToggleTop {
					display: none !important;
				}
			}

			#topLoader {
				position: fixed;
				top: 0;
				left: 0;
				width: 0%;
				height: 3px; /* ketebalan bar */
				background: linear-gradient(135deg, var(--deep-blue) 0%, var(--mid-blue) 40%, var(--light-blue) 100%);
				z-index: 99999;
				transition: width 0.25s ease;
			}

			/* ================================
			GLOBAL LOADING STATE
			=================================== */
			body.loading {
				overflow: hidden !important;
			}

			/* ================================
			NAVBAR & SIDEBAR GHOST MODE
			=================================== */
			body.loading .navbar,
			body.loading .sidebar {
				/*PR*/
				background: #253f6e;
				backdrop-filter: blur(6px);
				-webkit-backdrop-filter: blur(6px);
				transition: background 0.4s ease;
			}

			/* Sembunyikan semua isi */
			body.loading .navbar *:not(#sidebarToggleTop):not(#iconToggle),
			body.loading .sidebar * {
				color: transparent !important;
				opacity: 0 !important;
			}

			/* ================================
			SHIMMER EFFECT (Skeleton)
			=================================== */
			.skeleton-shimmer {
				position: relative;
				overflow: hidden;
				background: rgba(255, 255, 255, 0.1);
				border-radius: 6px;
			}

			.skeleton-shimmer::after {
				content: "";
				position: absolute;
				top: 0;
				left: -100%;
				width: 200%;
				height: 100%;
				background: linear-gradient(120deg,
					rgba(255, 255, 255, 0) 0%,
					rgba(255, 255, 255, 0.15) 50%,
					rgba(255, 255, 255, 0) 100%
				);
				animation: shimmer 1.6s infinite;
			}

			@keyframes shimmer {
				0% { left: -100%; }
				100% { left: 100%; }
			}

			/* Terapkan skeleton khusus di navbar & sidebar */
			body.loading .navbar,
			body.loading .sidebar {
				position: relative;
			}
			body.loading .navbar::before,
			body.loading .sidebar::before {
				content: "";
				position: absolute;
				inset: 0;
				border-radius: 0;
				background: rgba(255,255,255,0.05);
			}
			body.loading .navbar::after,
			body.loading .sidebar::after {
				content: "";
				position: absolute;
				inset: 0;
				animation: shimmer 1.6s infinite;
				background: linear-gradient(120deg,
					rgba(255,255,255,0) 0%,
					rgba(255, 255, 255, 0.11) 50%,
					rgba(255, 255, 255, 0) 100%
				);
				opacity: .7;
			}

			/* ================================
			LOGO PULSE WHILE LOADING
			=================================== */
			body.loading .img-profile {
				animation: pulseLogo 1.5s ease-in-out infinite;
			}

			@keyframes pulseLogo {
				0% { opacity: 0.4; transform: scale(0.95); }
				50% { opacity: 1; transform: scale(1.05); }
				100% { opacity: 0.4; transform: scale(0.95); }
			}

			/* ================================
			FADE-IN + STAGGER MENU ITEMS
			=================================== */
			.sidebar .nav-item,
			.navbar .version * {
				opacity: 0;
				transform: translateY(8px);
				transition: opacity 0.45s ease, transform 0.45s ease;
			}

			body:not(.loading) .sidebar .nav-item,
			body:not(.loading) .navbar
			body:not(.loading) .version * {
				opacity: 1;
				transform: translateY(0);
			}

			/* Stagger effect untuk sidebar menu */
			.sidebar .nav-item .version:nth-child(1)  { transition-delay: .05s; }
			.sidebar .nav-item .version:nth-child(2)  { transition-delay: .1s; }
			.sidebar .nav-item .version:nth-child(3)  { transition-delay: .15s; }
			.sidebar .nav-item .version:nth-child(4)  { transition-delay: .2s; }
			.sidebar .nav-item .version:nth-child(5)  { transition-delay: .25s; }
			.sidebar .nav-item .version:nth-child(6)  { transition-delay: .3s; }
			.sidebar .nav-item .version:nth-child(7)  { transition-delay: .35s; }

			/* Navbar items muncul sedikit lebih cepat */
			.navbar * { transition-delay: .15s; }


			/* ============================= */
			/* MOBILE MODE (≤ 768px)        */
			/* Sidebar Navigation + Animasi */
			/* ============================= */
			@media (max-width: 768px) {

				/* Wrapper background overlay */
				.mobile-overlay {
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background: rgba(0, 0, 0, 0.35);
					backdrop-filter: blur(2px);
					opacity: 0;
					visibility: hidden;
					transition: opacity 0.35s ease;
					z-index: 9998;
				}

				.mobile-overlay.active {
					opacity: 1;
					visibility: visible;
				}

				/* Sidebar Navigation Drawer */
				.sidebar {
					position: fixed !important;
					top: 0;
					left: -16rem; /* posisi awal sebelum muncul */
					width: 14rem !important;
					height: 100vh;
					background-color: #253f6e !important;
					z-index: 9999;
					transition: transform 0.35s ease, opacity 0.35s ease;
					transform: translateX(-100%);
					opacity: 0;
				}

				/* Sidebar muncul dengan fade + slide */
				.sidebar.mobile-open {
					transform: translateX(0);
					left: 0 !important;
					opacity: 1;
				}

				#sidebarToggleTop {
					position: fixed !important;
					top: 14px;
					left: 14px;
					z-index: 11000 !important; /* lebih tinggi dari sidebar (9999) */
				}

				#sidebarToggleTop i {
					color: #ffffff !important;
				}

				/* Konten tidak geser */
				#content-wrapper {
					margin-left: 0 !important;
				}

				/* Tombol Navigation (hamburger) */
				#sidebarToggleTop {
					display: block !important;
				}

				/* Matikan mode collapse desktop */
				body.sidebar-toggled .sidebar {
					width: 14rem !important;
				}
			}
		</style>

		<div id="topLoader"></div>

		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('panel'); ?>">
				<div class="sidebar-brand-icon">
					<img src="<?= base_url('assets/foto/logo3.png'); ?>">
				</div>
				<!-- <div class="sidebar-brand-text mx-3">BUMES</div> -->
			</a>
			<hr class="sidebar-divider my-0">
			<?php
			$menu = $this->uri->segment(2); // panel/<ini>
			?>

			<li class="nav-item <?= ($menu == '' ? 'active' : '') ?>">
				<a class="nav-link" href="<?= base_url('panel'); ?>">
					<i class="fas fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<hr class="sidebar-divider">

			<?php if ($this->session->userdata('user')['role'] == 'Admin'): ?>

				<div class="sidebar-heading">Master Data</div>

				<li class="nav-item <?= ($menu == 'pelanggan' ? 'active' : '') ?>">
					<a class="nav-link" href="<?= base_url('panel/pelanggan'); ?>">
						<i class="fas fa-users"></i>
						<span>Pelanggan</span>
					</a>
				</li>

				<li class="nav-item <?= ($menu == 'tagihan' ? 'active' : '') ?>">
					<a class="nav-link" href="<?= base_url('panel/tagihan'); ?>">
						<i class="fas fa-file-invoice-dollar"></i>
						<span>Tagihan</span>
					</a>
				</li>

				<li class="nav-item <?= ($menu == 'petugas' ? 'active' : '') ?>">
					<a class="nav-link" href="<?= base_url('panel/petugas'); ?>">
						<i class="fas fa-user-shield"></i>
						<span>Petugas</span>
					</a>
				</li>

				<li class="nav-item <?= ($menu == 'inbox' ? 'active' : '') ?>">
					<a class="nav-link" href="<?= base_url('panel/inbox'); ?>">
						<i class="fas fa-inbox"></i>
						<span>Inbox</span>
					</a>
				</li>

				<!-- <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
					aria-controls="collapseForm">
					<i class="fab fa-fw fa-wpforms"></i>
					<span>Forms</span>
				</a>
				<div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Forms</h6>
						<a class="collapse-item" href="form_basics.html">Form Basics</a>
						<a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
					</div>
				</div>
			</li> -->

			<?php endif; ?>
			<?php if ($this->session->userdata('user')['role'] == 'Petugas'): ?>

				<div class="sidebar-heading">Master Data</div>

				<li class="nav-item <?= ($menu == 'tagihan' ? 'active' : '') ?>">
					<a class="nav-link" href="<?= base_url('panel/tagihan'); ?>">
						<i class="fas fa-file-invoice-dollar"></i>
						<span>Tagihan</span>
					</a>
				</li>
			<?php endif; ?>

			<hr class="sidebar-divider">
			<div class="version" id="version-ruangadmin"></div>
		</ul>
		<!-- ======== MOBILE OVERLAY (PASTIKAN ADA DI ATAS NAVBAR) ======== -->
		<div id="mobileOverlay" class="mobile-overlay"></div>

		<!-- ======== CONTENT WRAPPER ======== -->
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">

				<!-- TopBar -->
				<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">

					<!-- MOBILE SIDEBAR TOGGLE -->
					<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3 d-md-none">
						<i class="fa fa-bars" id="iconToggle"></i>
					</button>

					<ul class="navbar-nav ml-auto">

						<!-- NOTIFIKASI -->
						<?php
						$user_id = $this->session->userdata('user')['id'];

						$notifikasi = $this->db->order_by('created_at', 'DESC')
							->limit(5)
							->get_where('notifikasi', ['user_id' => $user_id])
							->result();

						$jml_notif = $this->db->where(['user_id' => $user_id, 'status' => 'Belum Dibaca'])
							->from('notifikasi')
							->count_all_results();
						?>

						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

								<i class="fas fa-bell fa-fw"></i>

								<?php if ($jml_notif > 0): ?>
									<span class="badge badge-danger badge-counter">
										<?= $jml_notif > 9 ? '9+' : $jml_notif ?>
									</span>
								<?php endif; ?>
							</a>

							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="alertsDropdown">

								<h6 class="dropdown-header">Notifikasi</h6>

								<?php if (!empty($notifikasi)): ?>
									<?php foreach ($notifikasi as $n): ?>
										<a class="dropdown-item d-flex align-items-center" href="<?= $n->link; ?>">
											<div class="mr-3">
												<div class="icon-circle bg-primary">
													<i class="fas fa-info text-white"></i>
												</div>
											</div>
											<div>
												<div class="small text-gray-500"><?= date('d M Y H:i', strtotime($n->created_at)) ?></div>
												<span class="<?= $n->status == 'Belum Dibaca' ? 'font-weight-bold' : '' ?>">
													<?= $n->judul ?>
												</span>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<span class="dropdown-item text-center small text-gray-500">Tidak ada notifikasi</span>
								<?php endif; ?>

								<a class="dropdown-item text-center small text-gray-500" href="<?= base_url('panel/notifikasi') ?>">
									Lihat Semua Notifikasi
								</a>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- USER -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

								<img class="img-profile rounded-circle"
									src="<?= base_url('assets/panel'); ?>/img/boy.png"
									style="max-width: 60px">

								<span class="ml-2 d-none d-lg-inline text-white small">
									<?= $this->session->userdata('user')['nama']; ?>
								</span>
							</a>

							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">

								<a class="dropdown-item" href="<?= base_url('panel/profile'); ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>

								<div class="dropdown-divider"></div>

								<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
									data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>
				<!-- /Topbar -->

			</div>
		

			<!-- Modal Logout -->
			<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Apakah Anda yakin ingin keluar?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
							<a href="<?= base_url('logout'); ?>" class="btn btn-primary">Logout</a>
						</div>
					</div>
				</div>
			</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const body      = document.body;
    const sidebar   = document.querySelector(".sidebar");
    const toggleBtn = document.querySelector("#sidebarToggleTop");
    const icon      = document.querySelector("#iconToggle");
    const overlay   = document.querySelector("#mobileOverlay");

    /* =============================================================
    1. HAPUS fitur collapse RuangAdmin (penting!)
    ============================================================= */
    body.classList.remove("sidebar-toggled");
    sidebar.classList.remove("toggled");

    /* =============================================================
    2. FUNGSI SET ICON
    ============================================================= */
    function setIcon(isOpen) {
        icon.classList.add("fade-out");

        setTimeout(() => {
            if (isOpen) {
                icon.classList.remove("fa-bars");
                icon.classList.add("fa-arrow-left");
            } else {
                icon.classList.remove("fa-arrow-left");
                icon.classList.add("fa-bars");
            }

            icon.classList.remove("fade-out");
            icon.classList.add("fade-in");

            setTimeout(() => icon.classList.remove("fade-in"), 150);

        }, 150);
    }

    /* =============================================================
    3. MOBILE SIDEBAR TOGGLE
    ============================================================= */
    toggleBtn.addEventListener("click", function () {

        // pastikan collapse bawaan OFF
        body.classList.remove("sidebar-toggled");
        sidebar.classList.remove("toggled");

        const opening = !sidebar.classList.contains("mobile-open");

        sidebar.classList.toggle("mobile-open");
        overlay.classList.toggle("active");

        setIcon(opening);
    });

    /* =============================================================
    4. KLIK OVERLAY = CLOSE
    ============================================================= */
    overlay.addEventListener("click", function () {
        sidebar.classList.remove("mobile-open");
        overlay.classList.remove("active");
        setIcon(false);
    });

    /* =============================================================
    5. RESPONSIVE HANDLER
    ============================================================= */
    function responsiveHandler() {

        // Hilangkan semua class RuangAdmin agar tidak bentrok
        body.classList.remove("sidebar-toggled");
        sidebar.classList.remove("toggled");

        if (window.innerWidth > 768) {
            // Desktop
            sidebar.classList.remove("mobile-open");
            overlay.classList.remove("active");
            toggleBtn.style.display = "none";
            setIcon(false);
        } else {
            // Mobile
            toggleBtn.style.display = "flex";
            sidebar.classList.remove("mobile-open");
            overlay.classList.remove("active");
            setIcon(false);
        }
    }

    responsiveHandler();
    window.addEventListener("resize", responsiveHandler);

});

document.body.classList.add("loading");

window.addEventListener("load", function () {
    setTimeout(() => {
        document.body.classList.remove("loading");
    }, 450); // delay = waktu skeleton tampil
});
</script>
