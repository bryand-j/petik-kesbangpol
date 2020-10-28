<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnalis_asing extends CI_Controller {

	public function index()
	{
		$this->load->library('session');	
		$data['title'] = "Berita | Data Berita";
		$this->load->view('admin/include/head',$data);
		$this->load->view('admin/include/header');
		$this->load->view('admin/Jurnalis_asing',$data);
		$this->load->view('admin/include/footer');
	}

}

/* End of file Jurnalis_asing.php */
/* Location: ./application/controllers/admin/Jurnalis_asing.php */