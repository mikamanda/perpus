<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
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

		$data = array(	'title'		=> 'Login Administrator');
		$this->load->view('admin/login_view', $data, FALSE);
		// Check username dan password compare dengan databas
		}else{
			$i 				= $this->input;
			$username 		= $i->post('username');
			$password 		= $i->post('password');
			// Check di database
			$check_login	= $this->user_model->login($username, $password);

			// Check data id_Akhir peminjaman
			$id_peminjaman	= $this->peminjaman_model->getLastIdPeminjaman();

			// Kalau ada record, maka create session dan redirect ke halaman dasbor
			if($check_login !== NULL) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama', $check_login->nama);
				$this->session->set_userdata('id_peminjaman', $id_peminjaman->id_peminjaman + 1);
				redirect(base_url('admin/dasbor'),'refresh');
			}else{
				// Kalau username password tidak cocok, error
				$this->session->set_flashdata('sukses', 'Username atau password tidak cocok');
				redirect(base_url('login'),'refresh');
			}
		}
		//End checking
	}

	// Logout
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		// $this->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
