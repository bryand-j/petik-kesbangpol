<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()

	{
		$this->load->helper('form');
		$data = array(
			'kab'=> $this->db->get('m_kabkota')->result(),
			'bidang'=>$this->db->get('m_btkangket')->result()
		);

		$this->load->view('service/data',$data);
	}

	function get_data_user()
    {
        $list = $this->User_model->get_datatables();
        $data = array();
        $tes =  $this->User_model->count_all();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->TGLANGKET." ".$field->NMWIL."- Kec. ".$field->NMKEC;
            $row[] = $field->NMBENTUK;
            $row[] = $field->NMANGKET;
            $row[] = $field->DESKRIPSI;
            $row[] = $field->STATUS;
            $row[] = $tes;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->User_model->count_all(),
            "recordsFiltered" => $this->User_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
