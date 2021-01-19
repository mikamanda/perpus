<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usulan_model');
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
		$usulan = $this->usulan_model->listing();

		$data = array(	'title'		=>	'Data Usulan ('.count($usulan).')',
						'usulan'		=>	$usulan,
						'isi'		=>	'admin/usulan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul','Judul','required|min_length[15]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 15 karakter'));

		$valid->set_rules('penulis','Penulis','required|min_length[6]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter'));

		$valid->set_rules('penerbit','Penerbit','required|min_length[10]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 10 karakter')); 

		$valid->set_rules('nama_pengusul','Nama pengusul','required|min_length[6]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter'));

		$valid->set_rules('email_pengusul','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s tidak valid')); 

		if($valid->run()===FALSE) {
			// End validasi
		

		$data = array(	'title'		=> 'Buat Usulan Baru',
						'isi'		=> 'admin/usulan/tambah'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'judul'				=> $i->post('judul'),
							'penulis'			=> $i->post('penulis'),
							'penerbit'			=> $i->post('penerbit'),
							'keterangan'		=> $i->post('keterangan'),
							'nama_pengusul'		=> $i->post('nama_pengusul'),
							'email_pengusul'	=> $i->post('email_pengusul'),
							'ip_address'		=> $this->input->ip_address(),
							'status_usulan'		=> $i->post('status_usulan'),
							'tanggal_usulan'	=> date('Y-m-d H:i:s'),
						);
			$this->usulan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terimakasih, Usulan Anda kami terima. Kami akan segera memproses usulan yang Anda kirim.');
			redirect(base_url('admin/usulan'),'refresh');
		}
		// End masuk database
	}

	// Edit
	public function edit($id_usulan)
	{
		$usulan = $this->usulan_model->detail($id_usulan);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul','Judul','required|min_length[15]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 15 karakter'));

		$valid->set_rules('penulis','Penulis','required|min_length[6]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter'));

		$valid->set_rules('penerbit','Penerbit','required|min_length[10]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 10 karakter')); 

		$valid->set_rules('nama_pengusul','Nama pengusul','required|min_length[6]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter'));

		$valid->set_rules('email_pengusul','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s tidak valid')); 

		if($valid->run()===FALSE) {
			// End validasi
		

		$data = array(	'title'		=> 'Edit Usulan',
						'usulan'	=> $usulan,
						'isi'		=> 'admin/usulan/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_usulan'			=> $id_usulan,
							'judul'				=> $i->post('judul'),
							'penulis'			=> $i->post('penulis'),
							'penerbit'			=> $i->post('penerbit'),
							'keterangan'		=> $i->post('keterangan'),
							'nama_pengusul'		=> $i->post('nama_pengusul'),
							'email_pengusul'	=> $i->post('email_pengusul'),
							'ip_address'		=> $this->input->ip_address(),
							'status_usulan'		=> $i->post('status_usulan'),
						);
			$this->usulan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data usulan telah diupdate');
			redirect(base_url('admin/usulan'),'refresh');
		}
		// End masuk database
	}

	// Delete
	public function delete($id_usulan) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_usulan'		=> $id_usulan);
		$this->usulan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/usulan'),'refresh');
	}

}

/* End of file Usulan.php */
/* Location: ./application/controllers/admin/Usulan.php */