<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bahasa_model');
		// Halaman ini hanya boleh diakses oleh admin, jika bukan admin dialihkan
		if($this->session->userdata('akses_level') != "Admin") {
			$this->session->set_flashdata('sukses', 'Oops.. Hak akses Anda bukan Admin.');
			redirect(base_url('login'),'refresh');
		}
		// End proteksi
	}

	// Halaman Utama
	public function index() {
		$bahasa = $this->bahasa_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array(	'required'		=>'Nama bahasa buku harus diisi'));

		$valid->set_rules('kode_bahasa','Kode bahasa buku','required|is_unique[bahasa.kode_bahasa]',
			array(	'required'		=>'Kode bahasa harus diisi',
					'is_unique'		=>'Kode bahasa <strong>'.$this->input->post('kode_bahasa').
										'</strong> sudah ada. Buat kode bahasa buku baru'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Kelola Bahasa Buku',
						'bahasa'		=> $bahasa,
						'isi'		=>'admin/bahasa/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;
			$data = array(	'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa'	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')

						);
			$this->bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/bahasa'),'refresh');
		}
		//End masuk database
	}

	// Halaman Edit
	public function edit($id_bahasa) {
		$bahasa = $this->bahasa_model->detail($id_bahasa);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array(	'required'		=>'Nama bahasa buku harus diisi'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Edit Bahasa: '.$bahasa->nama_bahasa,
						'bahasa'		=> $bahasa,
						'isi'		=>'admin/bahasa/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;

			$data = array(	'id_bahasa'		=> $id_bahasa,
							'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa'	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
						);
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/bahasa'),'refresh');
		}
		// End masuk database
	}

	// Delete
	public function delete($id_bahasa) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_bahasa'		=> $id_bahasa);
		$this->bahasa_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bahasa'),'refresh');
	}

}

/* End of file Bahasa.php */
/* Location: ./application/controllers/admin/Bahasa.php */