<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$data['title']	 = "PeranKo | Wilayah Kabupaten";
		$this->load->library('session');	
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$this->load->view('Admin/include/head', $data);
		$this->load->view('Admin/include/header');
		$this->load->view('Admin/kabupaten',$data);
		$this->load->view('Admin/include/footer');
	}
	public function input(){
		$kab = $this->input->post('kab');
		$zoom = $this->input->post('zoom');
		$koor = $this->input->post('koor');
		$warna = $this->input->post('warna');
		    
		 $file = $_FILES["file"]["name"];
		  $data = array(
                'NMWIL' => $kab, 
                'KORDKAB' => $koor,              
                'ZOOMVK' => $zoom,
                'WARNAK' => $warna,
                'FILEGJSON' => $file,
               	                   
            );  
		   $data1 = array(
                'NMWIL' => $kab, 
                'KORDKAB' => $koor,              
                'ZOOMVK' => $zoom,
                'WARNAK' => $warna,             
               	                   
            );  

	   if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
                $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$input  = $this->db->insert('m_kabkota', $data);
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
                 	$input1  = $this->db->insert('m_kabkota', $data1);
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
           		$input1  = $this->db->insert('m_kabkota', $data1);
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
		 
		 redirect('Admin/kabupaten');				
       
	}
		public function delete(){
		$kab = $this->input->post('kab');		
		
		 $data = array(
                'IDWIL' => $kab, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('m_kabkota');
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
        redirect('Admin/kabupaten');
	}
	public function edit() {
		$idwil = $this->input->post('idwil');
		$kab = $this->input->post('kab');
		$zoom = $this->input->post('zoom');
		$koor = $this->input->post('koor');
		$warna = $this->input->post('warna');
		$file = $_FILES["file"]["name"];
		 $data = array(
                'NMWIL' => $kab, 
                'KORDKAB' => $koor,              
                'ZOOMVK' => $zoom,
                'WARNAK' => $warna,
                'FILEGJSON' => $file,
               	                   
            );  

           $data1 = array(
                'NMWIL' => $kab, 
                'KORDKAB' => $koor,              
                'ZOOMVK' => $zoom,
                'WARNAK' => $warna,                              	                   
            );   
           $where = array(
           		'IDWIL' => $idwil
           );  

		 // $edit = $this->db->where($where);
   //       $edit = $this->db->update('m_kabkota', $data);
   //       redirect('kabupaten');
           $tyype = ['goe']['json'];

          if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
               $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$edit = $this->db->where($where);
         			$edit = $this->db->update('m_kabkota', $data);
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
         			$edit1 = $this->db->update('m_kabkota', $data1);
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
         		$edit1 = $this->db->update('m_kabkota', $data1);
           		if ($edit1) {
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
             redirect('Admin/kabupaten');
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
