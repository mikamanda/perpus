<?php
// Proteksi halaman
if($this->session->userdata('username') == "" && $this->session->userdata('status_anggota')=="") {
	$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
	redirect(base_url('loginanggota'), 'refresh');
}
// Gabungan semua bagian layout
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');