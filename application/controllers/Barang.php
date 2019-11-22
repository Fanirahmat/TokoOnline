<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
 	{
 		parent::__construct();
 		if ($this->session->userdata('login')!=true) {
 			redirect(base_url('index.php/login'),'refresh');
 		}
 	}
 	

	public function index()
	{
		$data['konten']="v_barang";
		$this->load->model('Kategori_model');
		$data['data_kategori']=$this->Kategori_model->get_kategori();
		$this->load->model('Barang_model');
		$data['data_barang']=$this->Barang_model->get_barang();
		$this->load->view('template', $data);
	}
	public function simpan_barang(){
		$this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required',
			array('required' => 'nama barang harus diisi' ));
		$this->form_validation->set_rules('gambar', 'Gambar', 'trim|required',
			array('required' => 'Gambar belum diisi' ));
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required',
			array('required' => 'jumlah harga harus diisi' ));
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required',
			array('required' => 'jumlah stok harus diisi' ));
		$this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required',
			array('required' => 'ID kategori harus diisi' ));

		if ($this->form_validation->run() == TRUE) 
		{
			$this->load->model('Barang_model','bar');
			$masuk=$this->bar->insert_barang();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menyimpan');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'gagal menyimpan');
			}
			redirect(base_url('index.php/barang'),'refresh');
		} 
		else 
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/barang'),'refresh');
		}
	}
	public function get_detail_barang($id_barang)
	{
		$this->load->model('Barang_model');
		$data_detail=$this->Barang_model->detail_barang($id_barang);
		echo json_encode($data_detail);
	}
	public function update_barang()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required',
			array('required' => 'nama barang belum diganti' ));
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required',
			array('required' => 'jumlah harga belum diganti' ));
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required',
			array('required' => 'jumlah stok belum diganti' ));
		$this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required',
			array('required' => 'ID kategori belum diganti' ));

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('pesan',validation_errors());
			redirect(base_url('index.php/barang'),'refresh');
		} 
		else 
		{
			$this->load->model('Barang_model');
			$proses_update=$this->Barang_model->update_barang();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/barang'),'refresh');

		}
	}
	public function hapus_barang($id_barang){
		$this->load->model('Barang_model');
		$proses_delete=$this->Barang_model->hapus_barang($id_barang);
		if ($proses_delete == TRUE) {
			$this->session->set_flashdata('pesan', 'berhasil hapus');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'gagal hapus');
		}
		redirect(base_url('index.php/barang'),'refresh');
	}

	

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */