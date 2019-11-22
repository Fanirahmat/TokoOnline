<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_barang_model extends CI_Model {

	public function get_barang()
	{
		return $this->db->get('barang')->result();
	}
	public function cari_get_barang($nama_barang)
	{
		return $this->db->like('nama_barang', $nama_barang)->get('Barang')->result();
	}
	public function get_detail($id_barang)
	{
		return $this->db->join('kategori','kategori.id_kategori=barang.id_kategori')
						->where('id_barang',$id_barang)
						->get('barang')->row();
	}
	public function buat_nota(){
		$data = array('id_pembeli' => $this->session->userdata('id_pembeli'),
						'tgl' =>date('Y-m-d') 
					);
		return $this->db->insert('nota', $data);
	}
	public function get_last_nota(){
		return $this->db->where('id_pembeli',$this->session->userdata('id_pembeli'))
						->order_by('id_nota','desc')
						->limit('1')
						->get('nota')->row();
	}
	public function update_bukti()
	{
		$data = array('bukti' => $this->upload->data('file_name'));
		return $this->db->where('id_nota', $this->input->post('id_nota'))->update('nota',$data);
	}
	public function update_total($id_nota)
	{
		$data = array('grandtotal' => $this->cart->total());
		return $this->db->where('id_nota', $id_nota)->update('nota',$data);
	}
}

/* End of file Get_barang_model.php */
/* Location: ./application/models/Get_barang_model.php */