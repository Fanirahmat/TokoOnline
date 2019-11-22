<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends CI_Controller {

	public function index()
	{
		$data['konten']="v_dashboard_user";
		$this->load->view('template_user',$data);		
	}

}

/* End of file Dashboard_user.php */
/* Location: ./application/controllers/Dashboard_user.php */