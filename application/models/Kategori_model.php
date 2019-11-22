<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function get_kategori()
	{
		$data_kategori= $this->db->get('kategori')->result();
		return $data_kategori;
	}
	public function insert_kategori(){
		$data_kategori=array('nama_kategori' => $this->input->post('nama_kategori') );
		$sql_masuk= $this->db->insert('kategori',$data_kategori);
		return $sql_masuk;
	}

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */