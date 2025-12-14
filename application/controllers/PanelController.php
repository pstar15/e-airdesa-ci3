<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PanelController extends CI_Controller
{
	public function dashboard()
	{
		$data['total_users'] = $this->db->count_all('users');

		$data['total_pelanggan'] = $this->db->count_all('pelanggan');

		$data['tagihan_menunggu'] = $this->db->where('status', 'Menunggu Konfirmasi')->from('tagihan')->count_all_results();
		$data['tagihan_lunas'] = $this->db->where('status', 'Lunas')->from('tagihan')->count_all_results();
		$data['tagihan_belum'] = $this->db->where('status', 'Belum Bayar')->from('tagihan')->count_all_results();

		$data['total_inbox'] = $this->db->count_all('inbox');

		$data['notifikasi_baru'] = $this->db
			->where('user_id', $this->session->userdata('user')['id'])
			->where('status', 'Belum Dibaca')
			->from('notifikasi')
			->count_all_results();

		$this->load->view('panel/dashboard', $data);
	}


	// pelanggan
	public function pelanggan()
	{
		$data['pelanggan'] = $this->db->order_by('id', 'DESC')->get('pelanggan')->result_object();
		$this->load->view('panel/pelanggan', $data);
	}

	public function pelanggansimpan()
	{
		$this->db->insert('pelanggan', [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'nometer' => $this->input->post('nometer', true),
			'jeniskelamin' => $this->input->post('jeniskelamin', true),
			'lat' => $this->input->post('lat', true),
			'lng' => $this->input->post('lng', true)
		]);

		$this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan!');
		redirect('panel/pelanggan');
	}

	public function pelangganedit($id)
	{
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $id])->row();

		if (!$data['pelanggan']) {
			$this->session->set_flashdata('error', 'Data pelanggan tidak ditemukan!');
			redirect('panel/pelanggan');
		}

		$this->load->view('panel/pelangganedit', $data);
	}

	public function pelangganupdate($id)
	{
		$this->db->where('id', $id)->update('pelanggan', [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'nometer' => $this->input->post('nometer', true),
			'jeniskelamin' => $this->input->post('jeniskelamin', true),
			'lat' => $this->input->post('lat', true),
			'lng' => $this->input->post('lng', true),
		]);

		$this->session->set_flashdata('success', 'Pelanggan berhasil diperbarui!');
		redirect('panel/pelanggan');
	}

	public function pelangganhapus($id)
	{
		$this->db->where('id', $id)->delete('pelanggan');
		$this->session->set_flashdata('success', 'Pelanggan berhasil dihapus!');
		redirect('panel/pelanggan');
	}

	// petugas
	public function petugas()
	{
		$data['petugas'] = $this->db->where('role', 'Petugas')->get('users')->result_object();

		$this->load->view('panel/petugas', $data);
	}

	public function petugassimpan()
	{
		$this->db->insert('users', [
			'nama' => $this->input->post('nama', true),
			'email' => $this->input->post('email', true),
			'status' => $this->input->post('status', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'role' => 'Petugas'
		]);

		$this->session->set_flashdata('success', 'Petugas berhasil ditambahkan!');
		redirect('panel/petugas');
	}

	public function petugasedit($id)
	{
		$data['petugas'] = $this->db->get_where('users', ['id' => $id])->row();

		if (!$data['petugas']) {
			$this->session->set_flashdata('error', 'Data petugas tidak ditemukan!');
			redirect('panel/petugas');
		}

		$this->load->view('panel/petugasedit', $data);
	}

	public function petugasupdate($id)
	{
		$updateData = [
			'nama'   => $this->input->post('nama', true),
			'email'  => $this->input->post('email', true),
			'status' => $this->input->post('status', true),
		];

		if (!empty($this->input->post('password'))) {
			$updateData['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}

		$this->db->where('id', $id)->update('users', $updateData);

		$this->session->set_flashdata('success', 'Data petugas berhasil diperbarui!');
		redirect('panel/petugas');
	}

	public function petugashapus($id)
	{
		$this->db->where('id', $id)->delete('users');
		$this->session->set_flashdata('success', 'Petugas berhasil dihapus!');
		redirect('panel/petugas');
	}

	// tagihan
	public function riwayattagihan($id)
	{
		$tgl_awal  = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');
		$status    = $this->input->get('status');

		$this->db->select('tagihan.*, pelanggan.nama as nama_pelanggan, petugas.nama as nama_petugas');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id = tagihan.pelanggan_id', 'left');
		$this->db->join('users as petugas', 'petugas.id = tagihan.petugas_id', 'left');
		$this->db->where('pelanggan_id', $id);

		if ($tgl_awal && $tgl_akhir) {
			$this->db->where('DATE(tagihan.created_at) >=', $tgl_awal);
			$this->db->where('DATE(tagihan.created_at) <=', $tgl_akhir);
		}

		if ($status != "" && $status != "semua") {
			$this->db->where('tagihan.status', $status);
		}

		$data['tagihan'] = $this->db->get()->result_object();
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $id])->row();

		$this->load->view('panel/riwayattagihan', $data);
	}

	public function tagihan()
	{
		$tgl_awal  = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');
		$status    = $this->input->get('status');

		$this->db->select('tagihan.*, pelanggan.nama as nama_pelanggan, petugas.nama as nama_petugas');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id = tagihan.pelanggan_id', 'left');
		$this->db->join('users as petugas', 'petugas.id = tagihan.petugas_id', 'left');

		if ($tgl_awal && $tgl_akhir) {
			$this->db->where('DATE(tagihan.created_at) >=', $tgl_awal);
			$this->db->where('DATE(tagihan.created_at) <=', $tgl_akhir);
		}

		if ($status != "" && $status != "semua") {
			$this->db->where('tagihan.status', $status);
		}

		$data['tagihan'] = $this->db->get()->result_object();

		$this->load->view('panel/tagihan', $data);
	}

	public function tagihantambah()
	{
		$data['pelanggan'] = $this->db->get('pelanggan')->result_object();

		$data['petugas'] = $this->db->get_where('users', ['role' => 'Petugas'])->result_object();

		$this->load->view('panel/tagihantambah', $data);
	}

	public function tagihansimpan()
	{
		$pelanggan_id = $this->input->post('pelanggan_id', true);
		$meter_awal   = $this->input->post('jumlah_meter_awal', true);
		$meter_akhir  = $this->input->post('jumlah_meter_akhir', true);
		$periode      = $this->input->post('periode', true);
		$totalString  = $this->input->post('total', true);
		$status       = $this->input->post('status', true);

		$total = (int) filter_var($totalString, FILTER_SANITIZE_NUMBER_INT);

		$buktibayar = null;

		if ($status == "Menunggu Konfirmasi") {

			if (!empty($_FILES['buktibayar']['name'])) {

				$config['upload_path']   = './assets/uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['max_size']      = 2048;
				$config['encrypt_name']  = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('buktibayar')) {
					$buktibayar = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('error', "Upload gagal: " . $this->upload->display_errors());
					redirect('panel/tagihantambah');
				}
			} else {
				$this->session->set_flashdata('error', 'Bukti bayar wajib diupload jika status lunas');
				redirect('panel/tagihantambah');
			}
		}

		$data = [
			'pelanggan_id'        => $pelanggan_id,
			'petugas_id'          => $this->session->userdata('user')['id'],
			'jumlah_meter_awal'   => $meter_awal,
			'jumlah_meter_akhir'  => $meter_akhir,
			'periode'             => $periode,
			'total'               => $total,
			'status'              => $status,
			'buktibayar'          => $buktibayar,
			'created_at'          => date('Y-m-d H:i:s')
		];

		$this->db->insert('tagihan', $data);
		$tagihan_id = $this->db->insert_id();

		$admins = $this->db->where('role', 'Admin')->get('users')->result();

		$pelanggan = $this->db->where('id', $pelanggan_id)->get('pelanggan')->row();
		$petugas   = $this->session->userdata('user')['nama'];

		foreach ($admins as $a) {

			$notif = [
				'user_id' => $a->id,
				'judul'   => 'Tagihan Baru Ditambahkan',
				'pesan'   => 'Tagihan pelanggan ' . $pelanggan->nama . ' telah dibuat oleh ' . $petugas . '.',
				'link'    => base_url() . 'panel/tagihandetail/' . $tagihan_id,
				'status'  => 'Belum Dibaca',
			];

			$this->db->insert('notifikasi', $notif);
		}

		$this->session->set_flashdata('success', 'Tagihan berhasil ditambahkan');
		redirect('panel/tagihan');
	}


	public function tagihanedit($id)
	{
		$data['tagihan'] = $this->db->get_where('tagihan', ['id' => $id])->row();

		if (!$data['tagihan']) {
			redirect('panel/tagihan');
		}

		$data['pelanggan'] = $this->db->get('pelanggan')->result_object();

		$this->load->view('panel/tagihanedit', $data);
	}


	public function tagihanupdate()
	{
		$id = $this->input->post('id');

		$pelanggan_id = $this->input->post('pelanggan_id', true);
		$meter_awal   = $this->input->post('jumlah_meter_awal', true);
		$meter_akhir  = $this->input->post('jumlah_meter_akhir', true);
		$periode      = $this->input->post('periode', true);
		$status       = $this->input->post('status', true);
		$totalString  = $this->input->post('total', true);

		$total = (int) filter_var($totalString, FILTER_SANITIZE_NUMBER_INT);

		$tagihan = $this->db->get_where('tagihan', ['id' => $id])->row();

		$buktibayar = $tagihan->buktibayar;

		if ($status == "Menunggu Konfirmasi") {

			if (!empty($_FILES['buktibayar']['name'])) {

				$config['upload_path']   = './assets/uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['max_size']      = 2048;
				$config['encrypt_name']  = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('buktibayar')) {

					if (!empty($buktibayar) && file_exists('./assets/uploads/' . $buktibayar)) {
						unlink('./assets/uploads/' . $buktibayar);
					}

					$buktibayar = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('error', "Upload gagal: " . $this->upload->display_errors());
					redirect('panel/tagihanedit/' . $id);
				}
			}
		} else {

			$buktibayar = null;
		}

		$data = [
			'pelanggan_id'       => $pelanggan_id,
			'jumlah_meter_awal'  => $meter_awal,
			'jumlah_meter_akhir' => $meter_akhir,
			'periode'            => $periode,
			'total'              => $total,
			'status'             => $status,
			'buktibayar'         => $buktibayar,
		];

		$this->db->where('id', $id)->update('tagihan', $data);

		$this->session->set_flashdata('success', 'Tagihan berhasil diperbarui');
		redirect('panel/tagihan');
	}

	public function tagihandetail($id)
	{
		$data['tagihan'] = $this->db->get_where('tagihan', ['id' => $id])->row();
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $data['tagihan']->pelanggan_id])->row();
		$this->load->view('panel/tagihandetail', $data);
	}

	public function tagihanupdatestatus($id)
	{
		$status = $this->input->post('status', true);

		// Update status tagihan
		$this->db->where('id', $id);
		$this->db->update('tagihan', [
			'status' => $status
		]);

		// Ambil data tagihan setelah update
		$tagihan = $this->db->get_where('tagihan', ['id' => $id])->row();

		if ($tagihan) {
			// Ambil data petugas
			$petugas = $this->db->get_where('users', ['id' => $tagihan->petugas_id, 'role' => 'Petugas'])->row();

			if ($petugas) {
				// Siapkan notifikasi
				$notif = [
					'user_id' => $petugas->id,
					'judul' => 'Update Status Tagihan',
					'pesan' => "Status tagihan untuk pelanggan ID {$tagihan->pelanggan_id} telah diubah menjadi '{$status}'.",
					'link' => base_url('panel/tagihandetail/' . $tagihan->id),
					'status' => 'Belum Dibaca',
					'created_at' => date('Y-m-d H:i:s')
				];

				// Simpan notifikasi
				$this->db->insert('notifikasi', $notif);
			}
		}

		$this->session->set_flashdata('success', 'Status tagihan berhasil diperbarui dan petugas telah diberi notifikasi');
		redirect('panel/tagihandetail/' . $id);
	}


	public function tagihanhapus($id)
	{
		$tagihan = $this->db->get_where('tagihan', ['id' => $id])->row();

		if (!empty($tagihan->buktibayar) && file_exists('./assets/uploads/' . $tagihan->buktibayar)) {
			unlink('./assets/uploads/' . $tagihan->buktibayar);
		}

		$this->db->delete('tagihan', ['id' => $id]);

		$this->session->set_flashdata('success', 'Tagihan berhasil dihapus');
		redirect('panel/tagihan');
	}

	// inbox
	public function inbox()
	{
		$data['inbox'] = $this->db->get('inbox')->result_object();
		$this->load->view('panel/inbox', $data);
	}

	public function inboxdetail($id)
	{
		$data['inbox'] = $this->db->get_where('inbox', ['id' => $id])->row();
		if (!$data['inbox']) {
			show_404();
		}

		$this->load->view('panel/inboxdetail', $data);
	}

	public function inboxhapus($id)
	{
		$this->db->delete('inbox', ['id' => $id]);
		$this->session->set_flashdata('success', 'Pesan berhasil dihapus');
		redirect('panel/inbox');
	}

	// notifikasi
	public function notifikasi()
	{
		$this->db->where('user_id', $this->session->userdata('user')['id'])->update('notifikasi', [
			'status' => 'Dibaca'
		]);
		$data['notifikasi'] = $this->db->limit(10)->where('user_id', $this->session->userdata('user')['id'])->get('notifikasi')->result_object();
		$this->load->view('panel/notifikasi', $data);
	}

	// profile
	public function profile()
	{
		$data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('user')['id']])->row();
		$this->load->view('panel/profile', $data);
	}

	public function profileupdate()
	{
		// Ambil input dari form
		$nama     = $this->input->post('nama', true);
		$email    = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		// Siapkan data untuk update
		$data = [
			'nama'  => $nama,
			'email' => $email
		];

		// Jika password diisi, update password
		if (!empty($password)) {
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		}

		// Ambil ID user dari session
		$userId = $this->session->userdata('user')['id'];

		// Update database
		$this->db->where('id', $userId);
		$this->db->update('users', $data);

		// =============================
		// UPDATE SESSION AGAR NAVBAR IKUT BERUBAH
		// =============================

		// Ambil data terbaru dari database
		$updatedUser = $this->db->get_where('users', ['id' => $userId])->row_array();

		// Update session 'user' supaya navbar menampilkan nama terbaru
		$this->session->set_userdata('user', [
			'id'    => $updatedUser['id'],
			'nama'  => $updatedUser['nama'],
			'email' => $updatedUser['email'],
			'role'  => $updatedUser['role']   // jika ada kolom role
		]);

		// Notifikasi berhasil
		$this->session->set_flashdata('success', 'Profil berhasil diperbarui');

		redirect('panel/profile');
	}
}
