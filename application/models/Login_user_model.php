<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {
	public function get_login_user(){
		return $this->db->where('username',$this->input->post('username'))
						->where('password',$this->input->post('password'))
						->get('pembeli');
	
	}
	public function tambah_user()
	{
		$object = array('nama_pembeli' => $this->input->post('nama_pembeli'),
		 				'alamat' => $this->input->post('alamat'),
		 				'no_telp' => $this->input->post('no_telp'),
		 				'username' => $this->input->post('username'),
		 				'password' => $this->input->post('password')
		 				);
		return $this->db->insert('pembeli', $object);
	}
	

}

/* End of file Login_user_model.php */
/* Location: ./application/models/Login_user_model.php */