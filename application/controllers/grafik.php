<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {




	 public function __construct()
    {
        parent::__construct();
        $this->load->model('m_grafik');
    }
 

	public function index()

	{
		$data = array('berita' =>$this->db->query("SELECT kec.NMKEC,kab.NMWIL,ang.TGLANGKET,ang.NMANGKET FROM m_kabkota kab, m_kecamatan kec,tr_angket ang WHERE kec.IDKEC=ang.IDKEC AND kec.IDKAB=kab.IDWIL LIMIT 3")->result(),
			'hasil'=>$this->m_grafik->ambildata(),
			'kab'=> $this->db->get('m_kabkota')->result(),
			'bidang'=>$this->db->get('m_btkangket')->result()


		);
	
		$this->load->view('service/grafik',$data);
	}
	public function get_data(){
		$hasil=$this->m_grafik->ambildata();
		$bentuk=array();
		$jumlah=array();
		foreach ($hasil as $data) {
			$bentuk[]=$data->NMBENTUK;
			$jumlah[]=(float) $data->Jumlah;
		}
		$output = array(
            "bentuk" => $bentuk,
            "jumlah" => $jumlah,
        );

        echo json_encode($output);

	}
	public function get_data1()
	{
		$hasil=$this->m_grafik->ambildata1();
		$wilayah=array();
		$jumlah=array();
		foreach ($hasil as $data) {
			$wilayah[]=$data->wilayah;
			$jumlah[]=(float) $data->jumlah;
		}
		$output = array(
            "wilayah" => $wilayah,
            "jumlah" => $jumlah,
        );

        echo json_encode($output);
	}
}
