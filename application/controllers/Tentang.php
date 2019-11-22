<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function about()
	{
		$data['konten']="v_tentang";
		$this->load->view('template', $data);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/Tentang.php */