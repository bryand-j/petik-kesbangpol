<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$this->load->library('session');	
		$data['title']	 = "PeranKo | Data Tahun";
		$data['tahun'] = $this->db->get('m_tahun')->result();
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/tahun',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){
		$tahun = $this->input->post('tahun');		
		 $data = array(
                'NMTAHUN' => $tahun,               
               	                   
            );       
		 $input = $this->db->insert('m_tahun', $data);
		if ($input) {
			 $this->session->set_flashdata('message', '<script >
		     $(document).ready(function() {   
		     swal.fire({position:"top-right",
		                    type:"success",title:"Data Berhasil Disimpan",
		                    showConfirmButton:!1,timer:1500})         
		    });

		</script>');
		}
		else {  
			  $this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"danger",title:"Data Gagal Disimpan",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>
			');
				 }
		 redirect('Operator/tahun');
       
	}
		public function delete(){
		$tahun = $this->input->post('tahun');		
		
		 $data = array(
                'IDTAHUN' => $tahun,      
            );       
		$del = $this->db->where($data);
        $del = $this->db->delete('m_tahun');
		if ($del) {
			 $this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"success",title:"Data Berhasil Dihapus",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>');			
		}
		else {  
			 $this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"danger",title:"Data Gagal Dihapus",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>');	
				 }
        redirect('Operator/tahun');
	}
	public function edit(){
		$idtahun = $this->input->post('idtahun');
		$nmtahun = $this->input->post('nmtahun');
		
		 $data = array(
                'NMTAHUN' => $nmtahun,              
            ); 
           $where = array(
           		'IDTAHUN' => $idtahun
           );  

		 $edit = $this->db->where($where);
         $edit = $this->db->update('m_tahun', $data);
         if ($edit) {
			 $this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"success",title:"Data Berhasil Diubah",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>');			
		}
		else {  
			 $this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"danger",title:"Data Gagal Diubah",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>');	
				 }
        redirect('Operator/tahun');
	}	
}
