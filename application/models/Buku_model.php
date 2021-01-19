<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listingnew($id_buku){

		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku', $id_buku);
		$query = $this->db->get();
		return $query->row();
	}

	public function ubahstokbuku($id_buku,$databuku){
		$this->db->where('id_buku',$id_buku);
		$this->db->update('buku',$databuku);
	}

	//Listing
	public function listing() {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listingCetak($id) {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		$this->db->where('jenis.id_jenis',$id);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Buku
	public function buku() {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.status_buku','Publish');
		$this->db->order_by('id_buku','DESC');
		// Batasi dengan limit
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	// Buku baru
	public function baru() {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.status_buku','Publish');
		$this->db->order_by('id_buku','DESC');
		// Batasi dengan limit
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Cari buku 
	public function cari($keywords) {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.status_buku','Publish');
		// LIKE
		$this->db->like('buku.judul_buku',$keywords);
		$this->db->order_by('id_buku','DESC');
		// Batasi dengan limit
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function carijenis($keywords) {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.id_jenis',$keywords);
		$this->db->order_by('id_buku','DESC');
		// Batasi dengan limit
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function caribahasa($keywords) {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.id_bahasa',$keywords);
		$this->db->order_by('id_buku','DESC');
		// Batasi dengan limit
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Detail buku 
	public function read($id_buku) {
		$this->db->select('buku.*,
							jenis.nama_jenis, 
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');
		// JOIN 4 TABEL (buku, jenis, user, bahasa)
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');
		// END JOIN
		// WHERE HANYA YG PUBLISH YG TAMPIL UNTUK UMUM
		$this->db->where('buku.status_buku','Publish');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Detail
	public function detail($id_buku) {
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Login
	public function login($bukuname, $password) {
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where(array(	'bukuname' => $bukuname,
								'password' => sha1($password)));
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('buku',$data);
	}

	//Edit
	public function edit($data) {
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->update('buku',$data);
	}

	//Delete
	public function delete($data) {
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->delete('buku',$data);
	}


}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */
