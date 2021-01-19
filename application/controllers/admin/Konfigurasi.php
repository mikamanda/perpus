<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		// Halaman ini hanya boleh diakses oleh admin, jika bukan admin dialihkan
		if($this->session->userdata('akses_level') != "Admin") {
			$this->session->set_flashdata('sukses', 'Oops.. Hak akses Anda bukan Admin.');
			redirect(base_url('login'),'refresh');
		}
		// End proteksi
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules('namaweb','Nama website','required',
			array(	'required'	=> 'Nama kampus harus diisi'));

		if($this->form_validation->run() === FALSE) {
		// END VALIDASI

		$data = array(	'title'			=> 'Konfigurasi website: '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
							'id_user'		=> $this->session->userdata('id_user'),
							'namaweb'		=> $i->post('namaweb'),
							'tagline'		=> $i->post('tagline'),
							'deskripsi'		=> $i->post('deskripsi'),
							'keywords'		=> $i->post('keywords'),
							'email'			=> $i->post('email'),
							'website'		=> $i->post('website'),
							'facebook'		=> $i->post('facebook'),
							'twitter'		=> $i->post('twitter'),
							'instagram'		=> $i->post('instagram'),
							'map'			=> $i->post('map'),
							'metatext'		=> $i->post('metatext'),
							'telepon'		=> $i->post('telepon'),
							'alamat'		=> $i->post('alamat'),
							'max_hari_peminjaman'	=> $i->post('max_hari_peminjaman'),
							'max_jumlah_peminjaman'	=> $i->post('max_jumlah_peminjaman'),
							'denda_perhari'			=> $i->post('denda_perhari')
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data konfigurasi telah diupdate');
			redirect(base_url('admin/konfigurasi'),'refresh');
		}
		// End masuk database
	}


	// Konfigurasi logo
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules('id_konfigurasi','ID Konfigurasi','required',
			array(	'required'	=> 'ID Konfigurasi harus diisi'));

		if($this->form_validation->run()) {
			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('logo')) {
		// END VALIDASI

		$data = array(	'title'			=> 'Konfigurasi logo website: '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/logo'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{

			// UPLOAD
			$upload_data        		= array('uploads' =>$this->upload->data());
			// Image Editor
			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
			$config['new_image']     	= './assets/upload/image/thumbs/';
			$config['create_thumb']   	= TRUE;
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['thumb_marker']   	= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			// Hapus logo lama
			if($konfigurasi->logo != "") {
				unlink('./assets/upload/image/'.$konfigurasi->logo);
				unlink('./assets/upload/image/thumbs/'.$konfigurasi->logo);
			}
			// End hapus logo lama

			$i = $this->input;
			$data = array(	'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
							'id_user'		=> $this->session->userdata('id_user'),
							'logo'			=> $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Logo konfigurasi telah diupdate');
			redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Konfigurasi logo website: '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/logo'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	} 

	// Konfigurasi icon
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules('id_konfigurasi','ID Konfigurasi','required',
			array(	'required'	=> 'ID Konfigurasi harus diisi'));

		if($this->form_validation->run()) {
			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('icon')) {
		// END VALIDASI

		$data = array(	'title'			=> 'Konfigurasi icon website: '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/icon'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{

			// UPLOAD
			$upload_data        		= array('uploads' =>$this->upload->data());
			// Image Editor
			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
			$config['new_image']     	= './assets/upload/image/thumbs/';
			$config['create_thumb']   	= TRUE;
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['thumb_marker']   	= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			// Hapus icon lama
			if($konfigurasi->icon != "") {
				unlink('./assets/upload/image/'.$konfigurasi->icon);
				unlink('./assets/upload/image/thumbs/'.$konfigurasi->icon);
			}
			// End hapus icon lama

			$i = $this->input;
			$data = array(	'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
							'id_user'		=> $this->session->userdata('id_user'),
							'icon'			=> $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Icon konfigurasi telah diupdate');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Konfigurasi icon website: '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/icon'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	} 

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */