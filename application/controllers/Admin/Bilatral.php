
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilatral extends CI_Controller {

	public function index()
	{
		$this->load->library('session');	
		$data['title']	= "Berita | Data Berita";
		$this->load->view('admin/include/head',$data);
		$this->load->view('admin/include/header');
		$this->load->view('admin/Bilatral',$data);
		$this->load->view('admin/include/footer');
	}

}

/* End of file Bilatral.php */
/* Location: ./application/controllers/admin/Bilatral.php */


