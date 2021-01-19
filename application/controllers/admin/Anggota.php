<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->library('Pdf');
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
		$anggota = $this->anggota_model->listing();

		$data = array(	'title'		=>	'Data Anggota ('.count($anggota).')',
						'anggota'	=>	$anggota,
						'isi'		=>	'admin/anggota/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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

		$data = array(	'title'		=>'Tambah Anggota',
						'isi'		=>'admin/anggota/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/anggota'),'refresh');
		}
		//End masuk database
	}

	// Halaman Edit
	public function edit($id_anggota) {
		$anggota = $this->anggota_model->detail($id_anggota);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array(	'required'		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		$valid->set_rules('nim','Nim','required',
			array(	'required'		=>'Nim harus diisi'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Edit Anggota: '.$anggota->nama_anggota,
						'anggota'		=> $anggota,
						'isi'		=>'admin/anggota/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/anggota'),'refresh');
		}
		// End masuk database
	}

	// Aktifkan
	public function aktif($id_anggota)
	{
		$anggota 	= $this->anggota_model->detail($id_anggota);
		$data = array(	'id_anggota'		=> $id_anggota,
						'id_user'			=> $this->session->userdata('id_user'),
						'status_anggota'	=> 'Aktif'
					);
		$this->anggota_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/anggota'),'refresh');
	}

	// Delete
	public function delete($id_anggota) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_anggota'		=> $id_anggota);
		$this->anggota_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/anggota'),'refresh');
	}

	public function cetak($id_anggota)
	{
		$data['anggota'] = $this->anggota_model->detail($id_anggota);
		
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "kartu".$data['anggota']->nama_anggota.".pdf";
		$this->pdf->load_view('admin/cetak/anggota', $data);
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/admin/Anggota.php */
