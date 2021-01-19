<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
	}

	// Homepage
	public function index()
	{
		$data = array(	'title'		=>	'Dashboard',
						'isi'		=>	'anggota/dasbor/list');
		$this->load->view('anggota/layout/wrapper', $data, FALSE);
	}

	// Profile
	public function profile() {
		$id_anggota = $this->session->username('id_anggota');
		$anggota 	= $this->anggota_model->detail($id_anggota);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array(	'required'		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Update profile: '.$anggota->nama_anggota,
						'anggota'	=> $anggota,
						'isi'		=>'anggota/dasbor/profile');
		$this->load->view('anggota/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;

			//Jika input password lebih dari 6 karakter
			if(strlen($i->post('password')) > 6){
				$data = array(	'id_anggota'		=> $id_anggota,
								'status_anggota'	=> $i->post('status_anggota'),
								'nama_anggota'		=> $i->post('nama_anggota'),
								'username'			=> $i->post('username'),
								'password'			=> sha1($i->post('password')),
								'nim'				=> $i->post('nim'),
								'email'				=> $i->post('email'),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat')

							);
			}else{
				$data = array(	'id_anggota'		=> $id_anggota,
								'status_anggota'	=> $i->post('status_anggota'),
								'nama_anggota'		=> $i->post('nama_anggota'),
								'username'			=> $i->post('username'),
								'nim'				=> $i->post('nim'),
								'email'				=> $i->post('email'),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat')
							);
			}
			//End If
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile telah diupdate');
			redirect(base_url('anggota/dasbor/profile'),'refresh');
		}
		// End masuk database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/anggota/Dasbor.php */