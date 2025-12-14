<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function login()
	{
		$this->load->view('auth/login');
	}

	public function loginproses()
	{
		// Ambil input secara aman
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		$this->session->set_flashdata('old_email', $email);

		// Cek input kosong
		if (!$email || !$password) {
			$this->session->set_flashdata('error', 'Email dan password wajib diisi!');
			redirect('login');
			return;
		}

		// 1. Cek apakah email terdaftar di database
		$user = $this->db->where('email', $email)->get('users')->row();

		// ======================================================
		// LOGIKA FLASH DATA BARU DIMULAI DI SINI
		// ======================================================
		
		// SKENARIO A: User (Email) TIDAK DITEMUKAN
		if (!$user) {
			$this->session->set_flashdata('error', 'Email ' . htmlspecialchars($email) . ' belum terdaftar.');
			redirect('login');
			return;
		}

		// SKENARIO B: User DITEMUKAN, Lanjut Verifikasi Password
		if (!password_verify($password, $user->password)) {
			
			// Password TIDAK COCOK
			$this->session->set_flashdata('error', 'Password yang Anda masukkan salah.');
			redirect('login');
			return;
		}

		// SKENARIO C: Password COCOK, Lanjut Cek Status Akun
		if ($user->status != 'Aktif') {
			$this->session->set_flashdata('error', 'Akun Anda belum aktif. Silahkan hubungi admin!');
			redirect('login');
			return;
		}

		// SKENARIO D: LOGIN BERHASIL
		$userdata = [
			'id' => $user->id,
			'email' => $user->email,
			'nama' => $user->nama,
			'role' => $user->role,
		];

		$this->session->set_userdata('user', $userdata);
		$this->session->set_flashdata('success', 'Login Berhasil! Selamat datang, ' . $user->nama);

		redirect('panel');
		
		// (Tambahkan else block kosong atau hapus jika semua skenario ditangani oleh return)
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function register()
	{
		// Jika pengguna sudah login, arahkan ke 'panel'
		if ($this->session->userdata('user')) {
			redirect('panel');
			return;
		}
		
		// MUAT FORM HELPER (FIX: set_value() undefined)
		$this->load->helper('form'); 

		$this->load->view('auth/register');
	}

	public function registerproses()
	{
		// ======================================================
		// A. MUAT LIBRARY VALIDASI (FIX: Error Undefined Property)
		// ======================================================
		$this->load->library('form_validation'); // Baris ini harus ada sebelum menggunakan $this->form_validation

		// ======================================================
		// B. SET RULES VALIDASI
		// ======================================================
		
		// 1. Validasi Nama
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

		// 2. Validasi Email (Unik dan Format)
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email ini sudah terdaftar. Silahkan login atau gunakan email lain.',
			'valid_email' => 'Format email tidak valid.',
		]);

		// 3. Validasi Password (Minimal 6 karakter)
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', [
			'min_length' => 'Password minimal harus 6 karakter.',
		]);

		// 4. Validasi Checkbox Syarat & Ketentuan (Wajib dicentang)
		// Kita cek apakah ada input yang dikirim dan nilainya '1'
		$this->form_validation->set_rules('agree_terms', 'Syarat & Ketentuan', 'required', [
			'required' => 'Anda harus menyetujui Syarat & Ketentuan untuk mendaftar.'
		]);
		
		// Set delimiter error agar pesan dikembalikan dalam bentuk list di SweetAlert2
		$this->form_validation->set_error_delimiters('<li>', '</li>');


		// ======================================================
		// C. JALANKAN VALIDASI & EKSEKUSI
		// ======================================================
		if ($this->form_validation->run() == FALSE) {
			// --- VALIDASI GAGAL ---
			
			// Ambil error validasi dan gabungkan ke dalam flashdata
			// Tambahkan tag <ul> di sekeliling error agar mudah dibaca di SweetAlert2
			$error_message = '<ul style="list-style: none; padding-left: 0; text-align: center;">' . validation_errors() . '</ul>';
			$this->session->set_flashdata('error', $error_message);
			
			// Simpan input lama agar tidak hilang saat redirect (UX)
			$this->session->set_flashdata('old_nama', $this->input->post('nama', true));
			$this->session->set_flashdata('old_email', $this->input->post('email', true));

			redirect('AuthController/register');
			return; 
		} else {
			// --- VALIDASI BERHASIL: SIMPAN KE DATABASE ---
			
			$nama = $this->input->post('nama', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true); // Password dalam bentuk teks biasa

			// Lakukan INSERT
			$this->db->insert('users', [
				'nama' => $nama,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT), // Harus di-HASH!
				'role' => 'Petugas',
				'status' => 'Non Aktif'
			]);

			$this->session->set_flashdata('success', 'Pendaftaran berhasil, silahkan hubungi admin untuk aktivasi!');
			redirect('login');
		}
	}
}
