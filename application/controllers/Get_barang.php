<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Get_barang_model','gt_bar');
	}

	public function index()
	{
		$dt_barang=$this->gt_bar->get_barang();
		echo json_encode($dt_barang);
	}
	public function cari($nama_barang='')
	{
		$dt_barang=$this->gt_bar->cari_get_barang($nama_barang);
		echo json_encode($dt_barang);
	}
	public function detail($id_barang)
	{
		$dt_barang=$this->gt_bar->get_detail($id_barang);
		echo json_encode($dt_barang);
	}

}

/* End of file Get_barang.php */
/* Location: ./application/controllers/Get_barang.php */