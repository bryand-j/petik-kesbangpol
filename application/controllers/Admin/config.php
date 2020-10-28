<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$data['title']	 = "PeranKo | Pengaturan";
		$this->load->library('session');	
		$data['kab'] = $this->db->get('m_slide')->result();
		$data['kabupaten'] = $this->db->get('m_kabkota')->result();
		$data['slide1'] = $this->db->query("SELECT * from m_slide WHERE NOSLIDE != '1'")->result();
		$data['slide2'] = $this->db->query("SELECT * from m_slide WHERE NOSLIDE != '2'")->result();
		$data['slide3'] = $this->db->query("SELECT * from m_slide WHERE NOSLIDE != '3'")->result();
		$data['book'] = $this->db->get('manual_book')->row();
		$slide1 = $this->db->query("SELECT * from m_slide WHERE NOSLIDE = '1'")->row();
		$data['dslide1'] = $slide1;
		if (!empty($slide1->FILESLIDE)) {
			$data['gslide1'] = $slide1->FILESLIDE;
		}
		else {
			$data['gslide1'] = "default.jpg";
		}

		$slide2 = $this->db->query("SELECT * from m_slide WHERE NOSLIDE = '2'")->row();
		$data['dslide2'] = $slide2;
		if (!empty($slide2->FILESLIDE)) {
			$data['gslide2'] = $slide2->FILESLIDE;
		}
		else {
			$data['gslide2'] = "default.jpg";
		}

		$slide3 = $this->db->query("SELECT * from m_slide WHERE NOSLIDE = '3'")->row();
		$data['dslide3'] = $slide3;
		if (!empty($slide3->FILESLIDE)) {
			$data['gslide3'] = $slide3->FILESLIDE;
		}
		else {
			$data['gslide3'] = "default.jpg";
		}

		$data['user'] = $this->db->query("SELECT IDUSER,  NMUSER, USERNAME, PASSWORD, LEVEL, m_kabkota.NMWIL, EMAIL FROM tb_user LEFT JOIN m_kabkota ON m_kabkota.IDWIL =tb_user.LEVEL")->result();

		$this->load->view('Admin/include/head', $data);
		$this->load->view('Admin/include/header');
		$this->load->view('Admin/config',$data);
		$this->load->view('Admin/include/footer');
	}
		public function inputb(){
		$jdl = $this->input->post('jdl');
		$isi = $this->input->post('isi');			

		  $data = array(
                'NMBOOK' => $jdl, 
                'URLBOOK' => $isi,                                           
            );  
		  $cek = $this->db->query("SELECT * FROM manual_book");
		  if ( $cek->num_rows() > 0) {
		  	$input = $this->db->update('manual_book', $data);
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
		  	$input  = $this->db->insert('manual_book', $data);
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
		  
                	
                				 
		 redirect('config');				
       
	}
	public function input(){
		$jd = $this->input->post('jdslide');
		$isi = $this->input->post('isi');		
		$file = $_FILES["file"]["name"];

		  $data = array(
                'JDSLIDE' => $jd, 
                'ISISLIDE' => $isi,                            
                'FILESLIDE' => $file,
                 'STATUS' => "PASIF",
               	                   
            );  
		   $data1 = array(
               'JDSLIDE' => $jd, 
                'ISISLIDE' => $isi,                                           
                 'STATUS' => "PASIF",           
               	                   
            );  

	   if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './assets/slide/';  
                $config['allowed_types'] = 'jpg';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$input  = $this->db->insert('m_slide', $data);
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
                 	$input1  = $this->db->insert('m_slide', $data1);
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
           		$input1  = $this->db->insert('m_slide', $data1);
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
		 
		 redirect('config');				
       
	}
		public function delete(){
		$slide = $this->input->post('slide');		
		
		 $data = array(
                'IDSLIDE' => $slide, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('m_slide');
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
        redirect('config');
	}
	public function edit() {
		$idslide = $this->input->post('idslide');
		$jd = $this->input->post('jdslide');
		$isi = $this->input->post('isi');		
		$file = $_FILES["file"]["name"];

		  $data = array(
                'JDSLIDE' => $jd, 
                'ISISLIDE' => $isi,                            
                'FILESLIDE' => $file,
                 'STATUS' => "PASIF",
               	                   
            );  
		   $data1 = array(
               'JDSLIDE' => $jd, 
                'ISISLIDE' => $isi,                                           
                 'STATUS' => "PASIF",           
               	                   
            );   
           $where = array(
           		'IDSLIDE' => $idslide
           );  


          if(!empty($_FILES["file"]["name"]))  
           {  
               $config['upload_path'] = './assets/slide/';   
               $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$edit = $this->db->where($where);
         			$edit = $this->db->update('m_slide', $data);
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
         			$edit1 = $this->db->update('m_slide', $data1);
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
         		$edit1 = $this->db->update('m_slide', $data1);
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
             redirect('config');
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
	public function editS(){
		$ids = $this->input->post('ids');
		$nos = $this->input->post('nos');

		

		// $where =  array(
		// 	'IDSLIDE' => $ids
		// );

		$cek = $this->db->query("SELECT * FROM m_slide WHERE NOSLIDE = '$nos'");
		$cek1 = $this->db->query("SELECT * FROM m_slide WHERE NOSLIDE = '$nos'")->row();
		$idslE = $cek1->IDSLIDE;
		if ($cek->num_rows() > 0) {

			$data = array(
				'STATUS' => "AKTIF",
				'NOSLIDE' => $nos,
			);
				$where =  array(
				'IDSLIDE' => $ids
			);

			$edit = $this->db->where($where);
			$edit = $this->db->update('m_slide', $data);

			$data1 = array(
				'STATUS' => "PASIF",
				'NOSLIDE' => NULL,
			);
				$where1 =  array(
				'IDSLIDE' => $idslE
			);

			$edit = $this->db->where($where1);
			$edit = $this->db->update('m_slide', $data1);
				
		}
		else {
			$data = array(
				'STATUS' => "AKTIF",
				'NOSLIDE' => $nos,
			);
				$where =  array(
				'IDSLIDE' => $ids
			);


			$edit = $this->db->where($where);
			$edit = $this->db->update('m_slide', $data);
		}

		

		if ($edit) {
			 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"success",title:"Data  Berhasil Diubah",
					                    showConfirmButton:!1,timer:1500})         
					    });

						</script>');
                		
                	}
                	else {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"Data Gagal Diubah ",
					                    showConfirmButton:!1,timer:2500})         
					    });

					</script>');    
                	}	
            redirect('Admin/config');	
	}
	public function adduser(){
		$level="";
		$wil="";
		$lv = $this->input->post('level');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($lv =="Admin") {
			$level=$lv;
			$wil="";
		}
		else{
			$level="Operator";
			$wil=$lv;
		}

		$data = array (
			'LEVEL' => $level,
			'IDWIL'=>$wil,
			'NMUSER' => $nama,
			'USERNAME' => $username,
			'PASSWORD' => $password,
			'EMAIL' => $email,
		);

		$input = $this->db->insert('tb_user', $data);
		if ($input) {
			 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"success",title:"Data  Berhasil Diubah",
					                    showConfirmButton:!1,timer:1500})         
					    });

						</script>');
                		
                	}
                	else {
                		 $this->session->set_flashdata('message', '<script >
					     $(document).ready(function() {   
					     swal.fire({position:"top-right",
					                    type:"danger",title:"Data Gagal Diubah ",
					                    showConfirmButton:!1,timer:2500})         
					    });

					</script>');    
                	}	
            redirect('Admin/config');

	}
}
