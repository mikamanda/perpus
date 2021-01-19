<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('link');
		$this->db->order_by('id_link','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_link) {
		$this->db->select('*');
		$this->db->from('link');
		$this->db->where('id_link',$id_link);
		$this->db->order_by('id_link','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('link',$data);
	}

	//Edit
	public function edit($data) {
		$this->db->where('id_link',$data['id_link']);
		$this->db->update('link',$data);
	}

	//Delete
	public function delete($data) {
		$this->db->where('id_link',$data['id_link']);
		$this->db->delete('link',$data);
	}

}

/* End of file Link_model.php */
/* Location: ./application/models/Link_model.php */