<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginanggota extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('peminjaman_model');
	}

	// Halaman login
	public function index()
	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',
			array(	'required'		=> 'Username harus diisi'));

		$valid->set_rules('password','Password','required|min_length[6]',
			array(	'required'		=> 'Password harus diisi',
					'min_length'	=> 'Password minimal 6 karakter'));

		if($valid->run()=== FALSE) {
		// End validasi	

		$data = array(	'title'		=> 'Login Member');
		$this->load->view('anggota/login_view', $data, FALSE);
		// Check username dan password compare dengan databas
		}else{
			$i 				= $this->input;
			$username 		= $i->post('username');
			$password 		= $i->post('password');
			// Check di database
			$check_login	= $this->anggota_model->login($username, $password);

			// Check data id_Akhir peminjaman
			$id_peminjaman	= $this->peminjaman_model->getLastIdPeminjaman();

			// Kalau ada record, maka create session dan redirect ke halaman dasbor
			if($check_login !== NULL) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('status_anggota', $check_login->status_anggota);
				$this->session->set_userdata('id_anggota', $check_login->id_anggota);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama_anggota', $check_login->nama_anggota);
				$this->session->set_userdata('id_peminjaman', $id_peminjaman->id_peminjaman + 1);
				redirect(base_url('anggota/dasbor'),'refresh');
			}else{
				// Kalau username password tidak cocok, error
				$this->session->set_flashdata('sukses', 'Username atau password tidak cocok');
				redirect(base_url('loginanggota'),'refresh');
			}
		}
		//End checking
	}

	// Logout
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status_anggota');
		$this->session->unset_userdata('id_anggota');
		$this->session->unset_userdata('nama_anggota');
		// $this->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('loginanggota'),'refresh');
	}

}

/* End of file Loginanggota.php */
/* Location: ./application/controllers/Loginanggota.php */
