<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function index()
	{
		$this->load->view('home/home');
	}

	public function syaratketentuan()
	{
		$this->load->view('home/syaratketentuan');
	}

	public function fitur()
	{
		$this->load->view('home/fitur');
	}

	public function inboxsimpan()
	{
		$this->db->insert('inbox', [
			'nama' => $this->input->post('nama', true),
			'email' => $this->input->post('email', true),
			'pesan' => $this->input->post('pesan', true),
			'tanggal' => date('Y-m-d')
		]);

		$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
		redirect('/');
	}
}
