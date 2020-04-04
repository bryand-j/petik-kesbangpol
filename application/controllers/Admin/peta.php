<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {

	
	public function index()
	{
		$data['wilayah'] = $this->db->get('m_kecamatan')->result();
		$data['konflik'] = $this->db->get('m_btkangket')->result();
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$posts = $data['kab'];
		$json_data = json_encode($posts);
		file_put_contents('myfile.json', $json_data);	
		$data['kordinat'] = "-10.4904256,122.4295641";
		$data['zoom'] = 7.4;	
		$data['jml_kon_wil'] = 0;		
		// $this->load->view('h_peta', $data);		
		$this->load->view('peta', $data);

		// if (isset($_POST['submit'])) {
		// 	if($_POST['wilayah'] != "all"){
		// 		$wil = $_POST['wilayah'];
		// 		$konf = $_POST['konflik'];	

		// 		$data['kabus'] = $this->db->query("SELECT * FROM m_kabkota WHERE IDWIL = '$wil'")->row();
		// 		$data['konfs'] = $this->db->query("SELECT * FROM m_btkangket WHERE IDBENTUK = '$konf'")->row();
		// 		$data['kec'] =  $this->db->query("SELECT IDKEC, NMKEC, WARNAKEC, GJSONKEC, m_kabkota.WARNAK FROM m_kecamatan LEFT JOIN m_kabkota ON m_kecamatan.IDKAB = m_kabkota.IDWIL WHERE m_kecamatan.IDKAB = '$wil'")->result();

		// 		$dataW = $this->db->query("SELECT IDWIL, NMWIL, KORDKAB, ZOOMVK FROM m_kabkota  WHERE IDWIL = '$wil'")->row();
		// 		$dataJ = $this->db->query("SELECT COUNT(IDTRXANGKET) AS JML_KONFLIK FROM tr_angket WHERE IDKEC = '$wil' AND IDBENTUK = '$konf'")->row();
		// 		$data['wil'] =  $_POST['wilayah'];
		// 		$data['jml_kon_wil'] = $dataJ->JML_KONFLIK;
		// 		$data['kordinat'] = $dataW->KORDKAB;
		// 		$data['zoom'] = $dataW->ZOOMVK;		
		// 		$data['bentuk'] = $konf;

		// 		$this->load->view('h_peta', $data);	
		// 		$this->load->view('peta-wilayah', $data);
		// 	}
		// 	else if($_POST['wilayah'] == "all"){
		// 		$konf = $_POST['konflik'];
		// 		$data['konfs'] = $this->db->query("SELECT * FROM m_btkangket WHERE IDBENTUK = '$konf'")->row();
		// 		$data['kab'] = $this->db->get('m_kabkota')->result();											
		// 		$dataJ = $this->db->query("SELECT MAX(a.JMLKONFLIK) AS MAXM FROM (SELECT COUNT(IDTRXANGKET) AS JMLKONFLIK FROM tr_angket 
  //                                       LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC =tr_angket.IDKEC 
  //                                       LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB WHERE tr_angket.IDBENTUK = '$konf' GROUP BY m_kabkota.IDWIL)a ")->row();
		// 		if ( $dataJ->MAXM > 0) {
		// 			$data['max'] = $dataJ->MAXM;
		// 		}
		// 		else {
		// 			$data['max'] = 0;
		// 		}
		// 		$data['max'] = $dataJ->MAXM;
		// 		$data['kordinat'] = "-10.4904256,122.4295641";
		// 		$data['zoom'] = "7.4";		
		// 		$data['bentuk'] = $konf;				
		// 		$data['bentukid'] = $konf;
		// 		$this->load->view('h_peta', $data);	
		// 		$this->load->view('provinsi', $data);
		// 	}
		// }
		// else { 
		// $data['wilayah'] = $this->db->get('m_kecamatan')->result();
		// $data['konflik'] = $this->db->get('m_btkangket')->result();
		// $data['kab'] = $this->db->get('m_kabkota')->result();
		// $posts = $data['kab'];
		// $json_data = json_encode($posts);
		// file_put_contents('myfile.json', $json_data);
		
		// $data['kordinat'] = "-10.4904256,122.4295641";
		// $data['zoom'] = 7.4;	
		// $data['jml_kon_wil'] = 0;	
		// $this->load->view('peta', $data);
		// }
	}



	public function wilayah()
	{
		$data['wilayah'] = $this->db->get('m_kecamatan')->result();
		$data['konflik'] = $this->db->get('m_btkangket')->result();
		$data['kab'] = $this->db->get('m_kabkota')->result();		
		$data['kordinat'] = "-10.4904256,122.4295641";
		$data['zoom'] = 8.4;	
		$data['jml_kon_wil'] = 0;		
		
		if (isset($_POST['submit'])) {
			if($_POST['wilayah'] != "all"){				
				$wil = $_POST['wilayah'];
				$konf = $_POST['konflik'];

				$cek =  $this->db->query("SELECT * FROM m_kecamatan WHERE IDKAB = '$wil'");

				if ($cek->num_rows() == 0) {
					 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   					     	
					     	swal.fire({position:"center",
					                    type:"error",title:"Data Wilayah Tidak Ditemukan",
					                    showConfirmButton:!1,timer:8500})         
					    });

						</script>');
					redirect('peta');
				}
				else {
				$data['kabus'] = $this->db->query("SELECT * FROM m_kabkota WHERE IDWIL = '$wil'")->row();
				$data['konfs'] = $this->db->query("SELECT * FROM m_btkangket WHERE IDBENTUK = '$konf'")->row();
				$data['kec'] =  $this->db->query("SELECT IDKEC, NMKEC, WARNAKEC, GJSONKEC, m_kabkota.WARNAK FROM m_kecamatan LEFT JOIN m_kabkota ON m_kecamatan.IDKAB = m_kabkota.IDWIL WHERE m_kecamatan.IDKAB = '$wil'")->result();

				// $data['kab'] = $this->db->get('m_kabkota')->result();
				// $data['kab'] = $this->db->query("SELECT IDWIL, NMWIL, KORDKAB,WARNAK, FILEGJSON, m_kabkota.ZOOMVK FROM m_kabkota LEFT JOIN m_kecamatan ON m_kecamatan.IDKAB = m_kabkota.IDWIL WHERE m_kecamatan.IDKEC = '$wil'")->result();

				$dataW = $this->db->query("SELECT IDWIL, NMWIL, KORDKAB, ZOOMVK FROM m_kabkota  WHERE IDWIL = '$wil'")->row();
				$dataJ = $this->db->query("SELECT COUNT(IDTRXANGKET) AS JML_KONFLIK FROM tr_angket WHERE IDKEC = '$wil' AND IDBENTUK = '$konf'")->row();
				$data['wil'] =  $_POST['wilayah'];
				$data['jml_kon_wil'] = $dataJ->JML_KONFLIK;
				$data['kordinat'] = $dataW->KORDKAB;
				$data['zoom'] = 8;		
				$data['bentuk'] = $konf;
				$this->load->view('h_peta', $data);
				$this->load->view('peta-wilayah', $data);
				}
			}
			else if($_POST['wilayah'] == "all"){
				$konf = $_POST['konflik'];
				$data['konfs'] = $this->db->query("SELECT * FROM m_btkangket WHERE IDBENTUK = '$konf'")->row();
				$data['kab'] = $this->db->get('m_kabkota')->result();											
				$dataJ = $this->db->query("SELECT MAX(a.JMLKONFLIK) AS MAXM FROM (SELECT COUNT(IDTRXANGKET) AS JMLKONFLIK FROM tr_angket 
                                        LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC =tr_angket.IDKEC 
                                        LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB WHERE tr_angket.IDBENTUK = '$konf' GROUP BY m_kabkota.IDWIL)a ")->row();
				if ( $dataJ->MAXM > 0) {
					$data['max'] = $dataJ->MAXM;
				}
				else {
					$data['max'] = 0;
				}
				$data['max'] = $dataJ->MAXM;
				$data['kordinat'] = "-10.4904256,122.4295641";
				$data['zoom'] = "7.4";		
				$data['bentuk'] = $konf;				
				$data['bentukid'] = $konf;
				$this->load->view('h_peta', $data);
				$this->load->view('provinsi', $data);
			}
		}
		else { 
			$data['wilayah'] = $this->db->get('m_kecamatan')->result();
		$data['konflik'] = $this->db->get('m_btkangket')->result();
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$posts = $data['kab'];
		$json_data = json_encode($posts);
		file_put_contents('myfile.json', $json_data);
		
		$data['kordinat'] = "-10.4904256,122.4295641";
		$data['zoom'] = 7.5;	
		$data['jml_kon_wil'] = 0;
		
		$this->load->view('h_peta', $data);		
		$this->load->view('petaasa', $data);
		}
	}		
	
}
