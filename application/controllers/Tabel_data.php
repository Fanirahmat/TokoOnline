<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_data extends CI_Controller {

	public function tabel()
	{
		$data['konten']="v_tabel_data";
		$this->load->view('template', $data);		
	}

}

/* End of file Tabel_data.php */
/* Location: ./application/controllers/Tabel_data.php */