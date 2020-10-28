<?php
defined('BASEPATH') OR exit('No direct script access allowed');





class ubahType extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
       
        
    }

    // List all your items
    public function index()
    {
       
    $type=$this->input->get('type');

    $this->session->set_userdata('type',$type);
       
       
    }
}