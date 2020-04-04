<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilu extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        parent::__construct();
        $this->load->model('Pemilu_m');
    }

	public function index()
	{
		$kec = $this->db->get('m_kecamatan')->result();
		 $data = array();
     
        foreach ($kec as $field) {          
            $row = array();
             $row[] =$field->NMKEC;
            $row[] =$field->NMKEC;
           
 
            $data[] = $row;
        } 	
        $output = array(         
            "data" => $data,
        );     
        $data['title']	 = "PeranKo | Data Pemilu"; 
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$data['parpol'] = $this->db->get('m_parpol')->result();	
		$data['status'] = $this->db->get('m_status')->result();	
		$data['tahun'] = $this->db->get('m_tahun')->result();		
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/pemilu',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){		
			
	
		$kec = $this->input->post('kec');
		$pol = $this->input->post('pol');
		$tahun = $this->input->post('tahun');
		$suara = $this->input->post('suara');	
		$suaray = str_replace(".", "", $suara);
		
		 $data = array(
                'IDKEC' => $kec, 
                'IDTAHUN' => $tahun,              
                'IDPARTAI' => $pol,                
                'TOTALSUARA' =>$suaray,
                   
            );      
       		$cek = $this->db->query("SELECT * FROM tb_pemilu WHERE IDKEC = '$kec' AND IDTAHUN = '$tahun' AND IDPARTAI = '$pol'");
           if ($cek->num_rows() > 0) 
           {           		
		         echo('<script>
					  		swal.fire({position:"top-right",type:"warning",
							title:"Data Sudah Ada",
							showConfirmButton:!1,timer:2000})
						</script>');
           }
           else{
			     $input = $this->db->insert('tb_pemilu', $data);
				if ($input) {
					 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhail Disimpan",
							showConfirmButton:!1,timer:2000})
						</script>');
				}
				else {  
					echo('<script>
					  		swal.fire({position:"top-right",type:"warning",
							title:"Data Gagal Disimpan",
							showConfirmButton:!1,timer:2000})
						</script>');
						 }
		       
			}
		}
		public function delete(){
		$id = $this->input->post('id');		
		
		 $data = array(
                'IDTRXPEMILU' => $id, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('tb_pemilu');
		if ($del) {
			 echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil Dihapus",
					showConfirmButton:!1,timer:2000})
				</script>');
		}
		else {  
			echo('<script>
			  		swal.fire({position:"top-right",type:"warning",
					title:"Data Gagal Dihapus",
					showConfirmButton:!1,timer:2000})
				</script>');
				 }
       
	}
	public function view(){
		$konflik = $this->Pemilu_m->get_datatables();
        $data = array();     
        $no = $_POST['start'];
        foreach ($konflik as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NMKEC;
            $row[] = $field->NMPARPOL;
            $row[] = $field->NMTAHUN;
            $row[] = number_format($field->TOTALSUARA,0,',','.');                                 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pemilu_m->count_all(),
            "recordsFiltered" => $this->Pemilu_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	public function keckab(){
		$kab = $this->input->post('kab');
		$kec = $this->db->query("SELECT * FROM m_kecamatan WHERE IDKAB = '$kab'")->result();	
		echo('<option value=""> -- Pilih Kecamatan -- </option>');	
		foreach ($kec as $row) {
			echo('<option value='.$row->IDKEC.'>'.$row->NMKEC.'</option>');
		}


	}
	public function edit(){
		$id = $this->input->post('id');		
		$kec = $this->input->post('kec');
		$thn = $this->input->post('thn');
		$pol = $this->input->post('pol');
		$suara = $this->input->post('suara');	
		$suaray = str_replace(".", "", $suara);
		
		 $data = array(
                'IDKEC' => $kec, 
                'IDTAHUN' => $thn,              
                'IDPARTAI' => $pol, 
                'TOTALSUARA' => $suaray,                   
            );   

            $where = array(
            	'IDTRXPEMILU' => $id
            );

       $cek = $this->db->query("SELECT * FROM tb_pemilu WHERE IDKEC = '$kec' AND IDTAHUN = '$thn' AND IDPARTAI = '$pol' AND IDTRXPEMILU != '$id'");
       if ($cek->num_rows() > 0)
       {
       		echo('<script>
				  		swal.fire({position:"top-right",type:"warning",
						title:"Data Sudah ada",
						showConfirmButton:!1,timer:2000})
					</script>');
       } 
       else {  
	       $edit = $this->db->where($where);
	       $edit = $this->db->update('tb_pemilu', $data);
	       if ($edit) {
				 echo('<script>
				  		swal.fire({position:"top-right",type:"success",
						title:"Data Berhasil Diubah",
						showConfirmButton:!1,timer:2000})
					</script>');
			}
			else {  
				echo('<script>
				  		swal.fire({position:"top-right",type:"warning",
						title:"Data Gagal Diubah",
						showConfirmButton:!1,timer:2000})
					</script>');
					 }
		}
	}
}
