<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	// Construct load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model');
		$this->load->model('buku_model');
		$this->load->model('anggota_model');
		$this->load->library('Pdf');
	}

	// Main page peminjaman
	public function index()
	{
		// $peminjaman = $this->peminjaman_model->listing();
		$peminjaman	= $this->peminjaman_model->listingnew();
		$limit 		= $this->peminjaman_model->limit_peminjaman_anggota();
		// var_dump($peminjaman);

		$data = array(	'title'			=> 'Pemesanan Buku',
						'peminjaman'	=> $peminjaman,
						'limit'			=> $limit,
						'isi'			=> 'anggota/peminjaman/tambah'
						);
		$this->load->view('anggota/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		$anggota = $this->anggota_model->listing();

		$data = array(	'title'			=> 'Peminjaman Buku',
						'anggota'		=> $anggota,
						'isi'			=> 'admin/peminjaman/list_anggota'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Add peminjaman
	public function add($id_anggota)
	{
		$anggota 		= $this->anggota_model->detail($id_anggota);
		$peminjaman 	= $this->peminjaman_model->anggota($id_anggota);
		$limit 			= $this->peminjaman_model->limit_peminjaman_anggota($id_anggota);
		$buku 			= $this->buku_model->listing();
		
		$konfigurasi	= $this->konfigurasi_model->listing();
		$id_peminjaman	= $this->peminjaman_model->getLastIdPeminjaman();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_buku','Pilih judul buku','required',
			array(	'required'	=> 'Pilih judul buku'));

		if($valid->run()=== FALSE) {
		// End validasi
		$data = array(	'title'			=> 'Pemesanan Buku',
						'anggota'		=> $anggota,
						'peminjaman'	=> $peminjaman,
						'buku'			=> $buku,
						'konfigurasi'	=> $konfigurasi,
						'limit'			=> $limit,
						'isi'			=> 'anggota/peminjaman/tambah'
						);
		$this->load->view('anggota/layout/wrapper', $data, FALSE);
		// Proses ke database
		}else{
			$i = $this->input;
			$data_peminjaman = array(	
				'id_peminjaman'		=> $this->session->userdata('id_peminjaman'),
				'id_user'			=> $this->session->userdata('id_user'),
				'id_anggota'		=> $id_anggota,
				'tanggal'			=> $i->post('tanggal')		
			);

			$data_detail_peminjaman = array(
				'id_peminjaman'		=> $this->session->userdata('id_peminjaman'),
				'id_buku'			=> $i->post('id_buku'),
				'status_kembali'	=> $i->post('status_kembali'),
				'tanggal_pinjam'	=> $i->post('tanggal_pinjam'),
				'tanggal_kembali'	=> $i->post('tanggal_kembali'),
				'keterangan'		=> $i->post('keterangan'),
			);

			$id_buku = $i->post('id_buku');
			$stok_buku = $this->buku_model->listingnew($id_buku);
			$stok = $stok_buku->jumlah_buku; 
			$databuku = array (
				'jumlah_buku'			=> $stok - 1
			);

			if($id_peminjaman->id_peminjaman != $this->session->userdata('id_peminjaman')){
				$this->peminjaman_model->tambah($data_peminjaman);
			}

			$this->peminjaman_model->tambahDetail($data_detail_peminjaman);
			$this->buku_model->ubahstokbuku($id_buku,$databuku);
			$this->session->set_flashdata('sukses', 'Buku Berhasil Dipesan');
			redirect(base_url('anggota/peminjaman/add/'.$id_anggota),'refresh');
		}
		// End proses ke database
	}

	// Edit peminjaman
	public function edit($id_peminjaman)
	{
		$peminjaman 	= $this->peminjaman_model->detail($id_peminjaman);
		$id_anggota		= $peminjaman->id_anggota;
		$anggota 		= $this->anggota_model->detail($id_anggota);
		$buku 			= $this->buku_model->listing();
		$konfigurasi	= $this->konfigurasi_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_buku','Pilih judul buku','required',
			array(	'required'	=> 'Pilih judul buku'));

		if($valid->run()=== FALSE) {
		// End validasi
		$data = array(	'title'			=> 'Edit Peminjaman Buku atas nama: '.$anggota->nama_anggota,
						'anggota'		=> $anggota,
						'peminjaman'	=> $peminjaman,
						'buku'			=> $buku,
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/peminjaman/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses ke database
		}else{
			$i = $this->input;
			$data = array(	'id_peminjaman'		=> $id_peminjaman,
							'id_user'			=> $this->session->userdata('id_user'),
							'id_buku'			=> $i->post('id_buku'),
							'id_anggota'		=> $id_anggota,
							'tanggal_pinjam'	=> $i->post('tanggal_pinjam'),
							'tanggal_kembali'	=> $i->post('tanggal_kembali'),
							'keterangan'		=> $i->post('keterangan'),
							'status_kembali'	=> $i->post('status_kembali')
						);
			$this->peminjaman_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data peminjaman telah diupdate');
			redirect(base_url('admin/peminjaman/add/'.$id_anggota),'refresh');
		}
		// End proses ke database
	}

	// Kembalian
	public function kembali($id_peminjaman)
	{
		$peminjaman 	= $this->peminjaman_model->detail($id_peminjaman);
		$id_anggota		= $peminjaman->id_anggota;
		$anggota 		= $this->anggota_model->detail($id_anggota);
		$buku 			= $this->buku_model->listing();
		$konfigurasi	= $this->konfigurasi_model->listing();

		$data = array(	'id_peminjaman'		=> $id_peminjaman,
						'id_user'			=> $this->session->userdata('id_user'),
						'status_kembali'	=> 'Sudah'
					);
		$id_buku = $peminjaman->id_buku;
		$stok_buku = $this->buku_model->listingnew($id_buku);
		$stok = $stok_buku->jumlah_buku; 
		$databuku = array (
			'jumlah_buku'			=> $stok + 1
		);

		$this->buku_model->ubahstokbuku($id_buku,$databuku);		
		$this->peminjaman_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data peminjaman telah diupdate');
		redirect(base_url('admin/peminjaman/add/'.$id_anggota),'refresh');
	}

	// Delete
	public function delete($id_peminjaman) {
		// Proteksi hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'), 'refresh');
		}
		// End proteksi
		$data = array('id_peminjaman'		=> $id_peminjaman);
		$this->peminjaman_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/peminjaman'),'refresh');
	}

	public function cetak()
	{
		$from_date 	= $this->input->post('from_date');
		$for_date 	= $this->input->post('for_date');

		// $data = $this->peminjaman_model->getPeminjaman();

		if($from_date !== '' && $for_date !==''){
			$filename	= "laporan-peminjaman-tanggal".$from_date."-".$for_date;
			$kondisi	= ['tanggal_pinjam >=' => $from_date, 'tanggal_pinjam <=' => $for_date];
			$data['pinjam'] 		= $this->peminjaman_model->getPeminjaman($kondisi);
		}elseif($from_date !== '' && $for_date ==''){
			$for_date	= date('yy-m-d');
			$filename	= "laporan-peminjaman-tanggal".$from_date."-".$for_date;
			$kondisi	= ['tanggal_pinjam >=' => $from_date, 'tanggal_pinjam <=' => $for_date];
			$data['pinjam'] 		= $this->peminjaman_model->getPeminjaman($kondisi);
		}elseif($from_date == '' && $for_date !==''){
			$from_date	= $for_date;
			$filename	= "laporan-peminjaman-tanggal".$from_date."-".$for_date;
			$kondisi	= ['tanggal_pinjam >=' => $from_date, 'tanggal_pinjam <=' => $for_date];
			$data['pinjam'] 		= $this->peminjaman_model->getPeminjaman($kondisi);
		}else{
			$filename	= "laporan-peminjaman";
			$kondisi	= [];
			$data['pinjam'] 		= $this->peminjaman_model->getPeminjaman($kondisi);
		}

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $filename."cetak".Date('dmYHis').".pdf";
		$this->pdf->load_view('admin/cetak/peminjaman', $data);
	}

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/admin/Peminjaman.php */
