<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli_model extends CI_Model {
	public function get_pembeli(){
		$data_pembeli=$this->db->get('pembeli')->result();
		return $data_pembeli;
	}
	public function insert_pembeli(){
		$data_pembeli = array('nama_pembeli' => $this->input->post('nama_pembeli'),
							  'alamat' => $this->input->post('alamat'),
							  'no_telp' => $this->input->post('no_telp'),
							  'username' => $this->input->post('username'),
							  'password' => $this->input->post('password') 
							  );
		$sql_masuk=$this->db->insert('pembeli',$data_pembeli);
		return $sql_masuk;
	}
	public function get_detail_pembeli($id_pembeli){
		return $this->db->where('id_pembeli',$id_pembeli)->get('pembeli')->row();
	}
	public function update_pembeli(){
		$data_up_pembeli = array('nama_pembeli' => $this->input->post('nama_pembeli'),
							  'alamat' => $this->input->post('alamat'),
							  'no_telp' => $this->input->post('no_telp'),
							  'username' => $this->input->post('username'),
							  'password' => $this->input->post('password') 
							  );
		return $this->db->where('id_pembeli',$this->input->post('id_pembeli'))->update('pembeli',$data_up_pembeli);
	}
	public function delete_pembeli($id_pembeli){
		return $this->db->where('id_pembeli',$id_pembeli)->delete('pembeli');
	}
	

}

/* End of file Pembeli_model.php */
/* Location: ./application/models/Pembeli_model.php */