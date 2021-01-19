<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
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
		$berita = $this->berita_model->listing();

		$data = array(	'title'		=>	'Data Berita ('.count($berita).')',
						'berita'	=>	$berita,
						'isi'		=>	'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// Tambah
	public function tambah()
	{

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
			array(	'required'		=>'%s harus diisi'));

		$valid->set_rules('isi','Isi Berita','required',
			array(	'required'		=>'%s harus diisi'));


		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'		=>	'Tambah Berita',
						'error'		=> $this->upload->display_errors(),
						'isi'		=>	'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
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

			$i 			 	= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);

			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}}
		//End masuk database
		$data = array(	'title'		=>	'Tambah Berita',
						'isi'		=>	'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit File Buku
	public function edit($id_berita)
	{
		$berita 	= $this->berita_model->detail($id_berita);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
			array(	'required'		=>'%s harus diisi'));

		$valid->set_rules('isi','Isi Berita','required',
			array(	'required'		=>'%s harus diisi'));


		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'		=>	'Edit Berita: '.$berita->judul_berita,
						'berita'	=>	$berita,
						'error'		=> $this->upload->display_errors(),
						'isi'		=>	'admin/berita/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika ga ada error akan masuk ke database
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

			// Hapus gambar lama
			if($berita->gambar != "") {
				unlink('./assets/upload/image/'.$berita->gambar);
				unlink('./assets/upload/image/thumbs/'.$berita->gambar);
			}
			// End hapus gambar lama

			$i 			 	= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);

			$data = array(	'id_berita'			=> $id_berita,
							'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berita telah diedit');
			redirect(base_url('admin/berita'),'refresh');
		}}else{
			$i 			 	= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);

			$data = array(	'id_berita'			=> $id_berita,
							'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berita telah diedit');
			redirect(base_url('admin/berita'),'refresh');
		}}
		//End masuk database
		$data = array(	'title'		=>	'Edit Berita: '.$berita->judul_berita,
						'berita'	=>	$berita,
						'isi'		=>	'admin/berita/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_berita) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi

		// Delete gambar
		$berita = $this->berita_model->detail($id_berita);

		if($berita->gambar != "") {
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
		}
		// End delete gambar

		$data = array('id_berita'		=> $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Berita telah dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */