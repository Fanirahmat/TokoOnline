<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		if ($this->session->userdata('login')!=true) {
 			redirect(base_url('index.php/login'),'refresh');
 		}
 	}


	public function index()
	{
		$data['konten']="v_kategori";
		$this->load->model('Kategori_model');
		$data['data_kategori']=$this->Kategori_model->get_kategori();
		$this->load->view('template', $data);
	}

	public function simpan_kategori(){
		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'trim|required',
			  array('required' => 'nama kategori harus diisi' ));

		if ($this->form_validation->run() == TRUE) 
		{
			$this->load->model('Kategori_model','kat');
			$masuk=$this->kat->insert_kategori();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menyimpan');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'gagal menyimpan');
			}
			redirect(base_url('index.php/kategori'),'refresh');
		} 
		else 
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/kategori'),'refresh');
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */