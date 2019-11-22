<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan extends CI_Controller {

	public function masukan()
	{
		$data['konten']="v_masukan";
		$this->load->view('template', $data);
	}

}

/* End of file Tanggapan.php */
/* Location: ./application/controllers/Tanggapan.php */