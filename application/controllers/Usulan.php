<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usulan_model');
	}	

	// List usulan terbaru
	public function index()
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
		

		$data = array(	'title'		=> 'Usulan Baru',
						'isi'		=> 'usulan/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
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
							'status_usulan'		=> 'Baru',
							'tanggal_usulan'	=> date('Y-m-d H:i:s'),

						);
			$this->usulan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terimakasih, Usulan Anda kami terima. Kami akan segera memproses usulan yang Anda kirim.');
			redirect(base_url('usulan'),'refresh');
		}
		// End masuk database
	}

}

/* End of file Usulan.php */
/* Location: ./application/controllers/Usulan.php */