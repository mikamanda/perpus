<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load model
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

	// Halaman Utama
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title'		=>	'Data User ('.count($user).')',
						'user'		=>	$user,
						'isi'		=>	'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Halaman Tambah
	public function tambah() 
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
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

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Tambah User',
						'isi'		=>'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
							'keterangan'	=> $i->post('keterangan')

						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		//End masuk database
	}

	// Halaman Edit
	public function edit($id_user) {
		$user = $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Edit User: '.$user->nama,
						'user'		=> $user,
						'isi'		=>'admin/user/edit');
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
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database
	}

	// Delete
	public function delete($id_user) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_user'		=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */