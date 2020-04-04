<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parpol extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$data['title']	 = "PeranKo | Data Partai Politik";
		$this->load->library('session');	
		$data['parpol'] = $this->db->get('m_parpol')->result();
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/parpol',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){
		 $pol = $this->input->post('pol');	
		 $file = $_FILES["file"]["name"];
		  $data = array(
                'NMPARPOL' => $pol,                
                'LOGOPARPOL' => $file,
               	                   
            );  
		   $data1 = array(
                'NMPARPOL' => $pol, 
                 
            );  

	   if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './assets/gambar/';  
                $config['allowed_types'] = 'jpg|jpeg|png';   
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$input  = $this->db->insert('m_parpol', $data);
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
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"File Berhasil Upload tapi data Gagal Disimpan ",
					                    showConfirmButton:!1,timer:2500})         
					    });

					</script>');    
                	}				 
                                 
                }
                 else {
                 	$input1  = $this->db->insert('m_parpol', $data1);
                	if ($input1) {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"Data Berhasil Disimpan tapi File Gagal Diupload <br> File Harus berekstensi geojson",
						                    showConfirmButton:!1,timer:2500})         
						    });

						</script>'); 
                	} 
                	else  
	                {  
	                     $data = $this->upload->data();
	                      $this->session->set_flashdata('message','<script >
						     $(document).ready(function() {     
						       swal.fire({position:"top-right",
						        type:"danger",title:"Data Gagal Disimpan",
						        showConfirmButton:!1,timer:1500})
						 
						    });
						</script>
						');                   
	                }     	
                 
           } 
       	}
           else{
           		$input1  = $this->db->insert('m_parpol', $data1);
           		if ($input1) {
           			 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"success",title:"Data Berhasil Disimpan",
					                    showConfirmButton:!1,timer:1500})         
					    });

					</script>');
           		}
           		else{
		           			  $this->session->set_flashdata('message','<script >
					     $(document).ready(function() {     
					       swal.fire({position:"top-right",
					        type:"danger",title:"Data Gagal Disimpan",
					        showConfirmButton:!1,timer:1500})
					 
					    });
					</script>
					');
           		}
           } 
		 
		 redirect('Operator/parpol');				
       
	}
		public function delete(){
		$pol = $this->input->post('pol');		
		
		 $data = array(
                'IDPARPOL' => $pol, 
               
            );       
		$del = $this->db->where($data);
        $del = $this->db->delete('m_parpol');
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
        redirect('Operator/parpol');
	}
	public function edit() {		
		$idpol = $this->input->post('idpol');
		$pol = $this->input->post('pol');		
		$file = $_FILES["file"]["name"];
		 $data = array(
                'NMPARPOL' => $pol, 
                'LOGOPARPOL' => $file,                              
               	                   
            );  

           $data1 = array(
                'NMPARPOL' => $pol,                                              	                  
            );   
           $where = array(
           		'IDPARPOL' => $idpol
           );  

	

          if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './assets/gambar/';  
               $config['allowed_types'] = 'jpg|jpeg|png'; 
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$edit = $this->db->where($where);
         			$edit = $this->db->update('m_parpol', $data);
                	if ($edit) {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"success",title:"Data Berhasil Diubah",
					                    showConfirmButton:!1,timer:1500})         
					    });

						</script>');
                	}
                	else {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"File Berhasil Upload tapi data Gagal Diubah ",
					                    showConfirmButton:!1,timer:2500})         
					    });

					</script>');    
                	}				 
                                 
                }
                 else {
                 	$edit1 = $this->db->where($where);
         			$edit1 = $this->db->update('m_parpol', $data1);
                	if ($edit1) {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"Data Berhasil Disimpan tapi File Gagal Diupload <br> File Harus berekstensi geojson",
						                    showConfirmButton:!1,timer:2500})         
						    });

						</script>'); 
                	} 
                	else  
	                {  
	                     $data = $this->upload->data();
	                      $this->session->set_flashdata('message','<script >
						     $(document).ready(function() {     
						       swal.fire({position:"top-right",
						        type:"danger",title:"Data Gagal Disimpan",
						        showConfirmButton:!1,timer:1500})
						 
						    });
						</script>
						');                   
	                }     	
                 
           } 
       	}
           else{
           		$edit1 = $this->db->where($where);
         		$edit1 = $this->db->update('m_parpol', $data1);
           		if ($edit1) {
           			 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"success",title:"Data Berhasil Diubah",
					                    showConfirmButton:!1,timer:1500})         
					    });

					</script>');
           		}
           		else{
		           			  $this->session->set_flashdata('message','<script >
					     $(document).ready(function() {     
					       swal.fire({position:"top-right",
					        type:"danger",title:"Data Gagal Disimpan",
					        showConfirmButton:!1,timer:1500})
					 
					    });
					</script>
					');
           		}
           } 
         redirect('Operator/parpol');
	}
	public function view(){
		$list = $this->Kecamatan_m->get_datatables();
        $data = array();     
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NMWIL;
            $row[] = $field->NMKEC;
            $row[] = $field->KORDKEC;
            $row[] = $field->GJSONKEC;
            $row[] = " <div class='dropdown dropdown-inline'>
                            <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='flaticon-more-1'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item edit_btn' href='javascript:void(0)'  data-toggle='modal' data-id='".$field->IDKEC."' data-nm='".$field->NMKEC."' data-koor='".$field->KORDKEC."' data-geo='".$field->GJSONKEC."' data-idwil='".$field->IDWIL."'  data-nmwil='".$field->NMWIL."'><i class='la la-pencil-square  '></i> Edit</a>
                                <a class='dropdown-item delete_btn' href='javascript:void(0)' data-toggle='modal' data-id='".$field->IDKEC."' data-nm='".$field->NMKEC."' data-target='#delete'><i class='la la-trash-o  '></i> Hapus</a>
                            </div>
                        </div>";            
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kecamatan_m->count_all(),
            "recordsFiltered" => $this->Kecamatan_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
}
