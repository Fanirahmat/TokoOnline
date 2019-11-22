<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	public function apps()
	{
		$data['konten']="v_aplikasi";
		$this->load->view('template', $data);		
	}

}

/* End of file Aplikasi.php */
/* Location: ./application/controllers/Aplikasi.php */