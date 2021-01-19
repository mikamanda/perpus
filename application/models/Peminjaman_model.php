<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getPeminjaman($kondisi)
	{
		$this->db->select('peminjaman.*, 
					detail_peminjaman.*,
					buku.judul_buku,
					anggota.nama_anggota,
					anggota.nim');
		$this->db->from('peminjaman');
		// Join
		$this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('detail_peminjaman','detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->join('buku','buku.id_buku = detail_peminjaman.id_buku');
		// End join
		$this->db->where($kondisi);
		$this->db->order_by('peminjaman.id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listingnew(){
		// return $this->db->query("SELECT * FROM anggota")->result_array();
		$this->db->select('*');
		$this->db->from('anggota');

		$this->db->order_by('nama_anggota','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getLastIdPeminjaman(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->order_by('id_peminjaman', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	//Listing
	public function listing() {
		$this->db->select('peminjaman.*, 
					detail_peminjaman.*,
					buku.judul_buku,
					buku.kode_buku,
					buku.nomor_seri,
					buku.penerbit,
					anggota.nama_anggota');
		$this->db->from('peminjaman');
		// Join
		$this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('detail_peminjaman','detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->join('buku','buku.id_buku = detail_peminjaman.id_buku');
		// End join
		$this->db->order_by('peminjaman.id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing peminjaman anggota
	public function anggota($id_anggota) {
		$this->db->select('peminjaman.*, 
					detail_peminjaman.*,
					buku.judul_buku,
					buku.kode_buku,
					buku.nomor_seri,
					buku.penerbit,
					anggota.nama_anggota');
		$this->db->from('peminjaman');
		// Join
		$this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('detail_peminjaman','detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->join('buku','buku.id_buku = detail_peminjaman.id_buku');
		// End join
		$this->db->where('peminjaman.id_anggota',$id_anggota);
		$this->db->order_by('peminjaman.id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Limit peminjaman anggota
	public function limit_peminjaman_anggota($id_anggota) {
		$this->db->select('peminjaman.*, 
					detail_peminjaman.*,
					buku.judul_buku,
					buku.kode_buku,
					buku.nomor_seri,
					buku.penerbit,
					anggota.nama_anggota');
		$this->db->from('peminjaman');
		// Join
		$this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->join('buku','buku.id_buku = detail_peminjaman.id_buku');
		// End join
		$this->db->where('peminjaman.id_anggota',$id_anggota);
		$this->db->where('detail_peminjaman.status_kembali <> ', 'Sudah dikembalikan');
		$this->db->order_by('peminjaman.id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id) {
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->where('detail_peminjaman.id_detail_peminjaman',$id);
		$this->db->order_by('detail_peminjaman.id_detail_peminjaman','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Login
	public function login($username, $password) {
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where(array(	'username' => $username,
								'password' => sha1($password)));
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('peminjaman',$data);
	}

	//Edit
	public function editDetail($id, $data) {
		$this->db->where('id_detail_peminjaman',$id);
		$this->db->update('detail_peminjaman',$data);
	}

	//Delete
	public function delete($id) {
		$this->db->where('id_detail_peminjaman',$id);
		$this->db->delete('detail_peminjaman');
	}

	public function tambahDetail($data){
		$this ->db->insert('detail_peminjaman',$data);
	}

}

/* End of file Peminjaman_model.php */
/* Location: ./application/models/Peminjaman_model.php */
