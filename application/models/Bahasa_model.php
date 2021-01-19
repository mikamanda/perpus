<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getBahasa(){
		$this->db->select('*');
		$this->db->from('bahasa');
		$this->db->order_by('id_bahasa','ASC');
		$query = $this->db->get();
		return $query->result();	
	}

	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('bahasa');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_bahasa) {
		$this->db->select('*');
		$this->db->from('bahasa');
		$this->db->where('id_bahasa',$id_bahasa);
		$this->db->order_by('id_bahasa','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('bahasa',$data);
	}

	//Edit
	public function edit($data) {
		$this->db->where('id_bahasa',$data['id_bahasa']);
		$this->db->update('bahasa',$data);
	}

	//Delete
	public function delete($data) {
		$this->db->where('id_bahasa',$data['id_bahasa']);
		$this->db->delete('bahasa',$data);
	}

}

/* End of file Bahasa_model.php */
/* Location: ./application/models/Bahasa_model.php */
