<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tk_asing extends CI_Controller {

	public function index()
	{

		$this->load->library('session');	
		$data['title']	= "Data | Tenaga Kerja Asing";
		$data['tb']	= $this->db->get('m_tkasing')->result();
		$this->load->view('admin/include/head',$data);
		$this->load->view('admin/include/header');
		$this->load->view('admin/Tk_asing',$data);
		
	}
	public function add()
	{
		$data=[
			"NMTKASING"=>$this->input->post("Nama"),
			"JENISKELAMIN"=>$this->input->post("jk"),
			"KEBANGSAAN"=>$this->input->post("Kebangsaan"),
			"SPONSOR"=>$this->input->post("Sponsor"),
			"ALAMAT"=>$this->input->post("Alamat")

		];
		$this->db->insert('m_tkasing', $data);
		$this->session->set_flashdata('success', 'Data Brhasil Di Tambah');
		redirect('Admin/Tk_asing','refresh');
	}
	public function getData()
	{
		$id=$this->input->get('id');
		$this->db->where('IDTKASING', $id);
		echo json_encode($this->db->get('m_tkasing')->row()); 
	}

	public function edit()
	{
		$id=$this->input->post("id");
		$data=[
			"NMTKASING"=>$this->input->post("Nama"),
			"JENISKELAMIN"=>$this->input->post("jk"),
			"KEBANGSAAN"=>$this->input->post("Kebangsaan"),
			"SPONSOR"=>$this->input->post("Sponsor"),
			"ALAMAT"=>$this->input->post("Alamat")

		];
		$this->db->where('IDTKASING', $id);
		$this->db->update('m_tkasing', $data);
		$this->session->set_flashdata('success', 'Data Brhasil Di Edit');
		redirect('Admin/Tk_asing','refresh');
	}
	public function delete($id='')
	{
		
		if ($id!='') {
			$this->db->where('IDTKASING', $id);
			$this->db->delete('m_tkasing');
			$this->session->set_flashdata('success', 'Data Brhasil Di Hapus');
		}else{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');

		}
		redirect('Admin/Tk_asing','refresh');

	}

}

/* End of file Tk_asing.php */
/* Location: ./application/controllers/admin/Tk_asing.php */