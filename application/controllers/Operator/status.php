<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$this->load->library('session');	
		$data['status'] = $this->db->get('m_status')->result();
		$data['title']	 = "PeranKo | Status Konflik";
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/status-konflik',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){
		$status = $this->input->post('status');		
		 $data = array(
                'NMSTATUS' => $status,               
               	                   
            );       
		 $input = $this->db->insert('m_status', $data);
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
		 redirect('Operator/status');
       
	}
		public function delete(){
		$status = $this->input->post('status');		
		
		 $data = array(
                'IDSTATUS' => $status,      
            );       
		$del = $this->db->where($data);
        $del = $this->db->delete('m_status');
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
        redirect('Operator/status');
	}
	public function edit(){
		$idstatus = $this->input->post('idstatus');
		$nmstatus = $this->input->post('nmstatus');
		
		 $data = array(
                'NMSTATUS' => $nmstatus,              
            ); 
           $where = array(
           		'IDSTATUS' => $idstatus
           );  

		 $edit = $this->db->where($where);
         $edit = $this->db->update('m_status', $data);
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
        redirect('Operator/status');
	}	
}
