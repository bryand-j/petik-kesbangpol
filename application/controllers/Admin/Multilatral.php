<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multilatral extends CI_Controller {

	public function index()
	{
		$this->load->library('session');	
		$data['title']	= "Berita | Data Berita";
		$this->load->view('admin/include/head',$data);
		$this->load->view('admin/include/header');
		$this->load->view('admin/Multilatral',$data);
		$this->load->view('admin/include/footer');
	}

}

/* End of file Multilatral.php */
/* Location: ./application/controllers/admin/Multilatral.php */