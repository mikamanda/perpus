<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// Halaman ini hanya boleh diakses oleh admin, jika bukan admin dialihkan
		if($this->session->userdata('akses_level') != "Admin") {
			$this->session->set_flashdata('sukses', 'Oops.. Hak akses Anda bukan Admin.');
			redirect(base_url('login'),'refresh');
		}
		// End proteksi
	}

	// Homepage
	public function index()
	{
		$data = array(	'title'		=>	'Halaman Dasbor',
						'isi'		=>	'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Profile
	public function profile() {
		$id_user = $this->session->userdata('id_user');
		$user 	 = $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Update profile: '.$user->nama,
						'user'		=> $user,
						'isi'		=>'admin/dasbor/profile');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;

			//Jika input password lebih dari 6 karakter
			if(strlen($i->post('password')) > 6){
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'password'		=> sha1($i->post('password')),
								'akses_level'	=> $i->post('akses_level'),
								'keterangan'	=> $i->post('keterangan')

							);
			}else{
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'akses_level'	=> $i->post('akses_level'),
								'keterangan'	=> $i->post('keterangan')

							);
			}
			//End If
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile telah diupdate');
			redirect(base_url('admin/dasbor/profile'),'refresh');
		}
		// End masuk database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */