<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('link_model');
		// Halaman ini hanya boleh diakses oleh admin, jika bukan admin dialihkan
		if($this->session->userdata('akses_level') != "Admin") {
			$this->session->set_flashdata('sukses', 'Oops.. Hak akses Anda bukan Admin.');
			redirect(base_url('login'),'refresh');
		}
		// End proteksi
	}

	// Halaman Utama
	public function index() {
		$link = $this->link_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
			array(	'required'		=>'Nama link buku harus diisi'));

		$valid->set_rules('url','Alamat Link','required|is_unique[link.url]',
			array(	'required'		=>'Alamat link harus diisi',
					'is_unique'		=>'Alamat link <strong>'.$this->input->post('url').
										'</strong> sudah ada. Buat alamat link buku baru'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Kelola Link',
						'link'		=> $link,
						'isi'		=>'admin/link/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;
			$data = array(	'nama_link'		=> $i->post('nama_link'),
							'url'			=> $i->post('url'),
							'target'		=> $i->post('target')
						);
			$this->link_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/link'),'refresh');
		}
		//End masuk database
	}

	// Halaman Edit
	public function edit($id_link) {
		$link = $this->link_model->detail($id_link);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
			array(	'required'		=>'Nama link buku harus diisi'));

		if($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>'Edit Link: '.$link->nama_link,
						'link'		=> $link,
						'isi'		=>'admin/link/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
		}else{
			$i = $this->input;

			$data = array(	'id_link'		=> $id_link,
							'nama_link'		=> $i->post('nama_link'),
							'url'			=> $i->post('url'),
							'target'		=> $i->post('target')
						);
			$this->link_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/link'),'refresh');
		}
		// End masuk database
	}

	// Delete
	public function delete($id_link) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_link'		=> $id_link);
		$this->link_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/link'),'refresh');
	}

}

/* End of file Link.php */
/* Location: ./application/controllers/admin/Link.php */