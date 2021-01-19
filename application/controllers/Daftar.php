<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
	}

	// Halaman login
	public function index()
	{
		$data = array(	'title'		=> 'Daftar Member');
		$this->load->view('anggota/daftar', $data, FALSE);
	}

	// Halaman Tambah
	public function tambah() 
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array(	'required'		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));
		
		$valid->set_rules('username','Username','required|is_unique[user.username]',
			array(	'required'		=>'Username harus diisi',
					'is_unique'		=>'Username <strong>'.$this->input->post('username').
										'</strong> sudah ada. Buat username baru'));

		$valid->set_rules('password','Password','required|min_length[6]',
			array(	'required'		=>'Password harus diisi',
					'min_length'	=>'Password minimal 6 karakter'));

		$valid->set_rules('nim','Nim','required|is_unique[anggota.nim]',
			array(	'required'		=>'Nim harus diisi',
					'is_unique'		=>'Nim <strong>'.$this->input->post('nim').
										'</strong> sudah ada. Buat nim baru'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Daftar Member',
						'isi'		=>'anggota/daftar');
		$this->load->view('anggota/daftar', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'status_anggota'	=> $i->post('status_anggota'),
							'nama_anggota'		=> $i->post('nama_anggota'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'nim'				=> $i->post('nim'),
							'email'				=> $i->post('email'),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
							'tanggal'			=> date('Y-m-d')
							
						);
			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Anda Berhasil Mendaftar, Anda dapat login setelah akun anda diaktifkan oleh petugas');
			redirect(base_url('daftar'),'refresh');
		}
		//End masuk database
	}
}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */