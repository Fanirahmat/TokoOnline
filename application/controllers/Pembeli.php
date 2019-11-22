<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		if ($this->session->userdata('login')!=true) {
 			redirect(base_url('index.php/login'),'refresh');
 		}
 	}


	public function index()
	{
		$data['konten']="v_pembeli";
		$this->load->model('Pembeli_model');
		$data['data_pembeli']=$this->Pembeli_model->get_pembeli();
		$this->load->view('template', $data);
	}
	public function simpan_pembeli(){
		$this->form_validation->set_rules('nama_pembeli', 'nama pembeli', 'trim|required',
			   array('required' => 'Nama Pembeli harus diisi' ));
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',
			   array('required' => 'alamat harus diisi' ));
		$this->form_validation->set_rules('no_telp', 'no. telepon', 'trim|required',
			   array('required' => 'no telepon harus diisi' ));
		$this->form_validation->set_rules('username', 'username', 'trim|required',
			   array('required' => 'username harus diisi' ));
		$this->form_validation->set_rules('password', 'password', 'trim|required',
			   array('required' => 'password harus diisi' ));
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Pembeli_model','bar');
			$insert=$this->bar->insert_pembeli();
			if ($insert==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menyimpan');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'gagal menyimpan');
			}
			redirect(base_url('index.php/pembeli'),'refresh');
		
		}
		else
		{
			$this->session->set_flashdata('pesan',validation_errors());
			redirect(base_url('index.php/pembeli'),'refresh');
		}
	}
	public function get_detail_pembeli($id_pembeli){
		$this->load->model('Pembeli_model');
		$data_detail=$this->Pembeli_model->get_detail_pembeli($id_pembeli);
		echo json_encode($data_detail);
	}

	public function update_pembeli(){
		$this->form_validation->set_rules('nama_pembeli', 'nama pembeli', 'trim|required',
			   array('required' => 'Nama Pembeli belum diganti' ));
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',
			   array('required' => 'alamat harus diisi' ));
		$this->form_validation->set_rules('no_telp', 'no. telepon', 'trim|required',
			   array('required' => 'no telepon belum diganti' ));
		$this->form_validation->set_rules('username', 'username', 'trim|required',
			   array('required' => 'username belum diganti' ));
		$this->form_validation->set_rules('password', 'password', 'trim|required',
			   array('required' => 'password belum diganti' ));

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Pembeli_model');
			$update=$this->Pembeli_model->update_pembeli();
			if ($update==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menyimpan update');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'gagal menyimpan update');
			}
			redirect(base_url('index.php/pembeli'),'refresh');
		
		}
		else
		{
			$this->session->set_flashdata('pesan',validation_errors());
			redirect(base_url('index.php/pembeli'),'refresh');
		}
	}
	public function delete_pembeli($id_pembeli){
		$this->load->model('Pembeli_model');
		$proses_hapus=$this->Pembeli_model->delete_pembeli($id_pembeli);
		if ($proses_hapus == TRUE) {
			$this->session->set_flashdata('pesan', 'berhasil hapus');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'gagal hapus');
		}
		redirect(base_url('index.php/pembeli'),'refresh');
	}

}

/* End of file Pembeli.php */
/* Location: ./application/controllers/Pembeli.php */