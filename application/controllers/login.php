<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		

	}

	// List all your items
	public function index($offset = 0)
	{
		$this->load->view('index');
		$this->load->model('login_m');
		// $this->login_m->masuk();
	}

	public function validasi()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model('login_m');
		$this->login_m->validasi($username,$password);
	}

	public function logout()
	{
		$this->session->set_userdata('username',FALSE);
		$this->session->sess_destroy();
		redirect('login');
	}

}
