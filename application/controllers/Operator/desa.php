<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

	function __construct(){
        parent::__construct();
         $this->load->model('Desa_m');
     
    }

	public function index()
	{	
		$data['title']	 = "PeranKo | Wilayah Desa";
		$this->load->library('session');	
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$data['kec'] = $this->db->get('m_kecamatan')->result();
					$data['desa'] = $this->db->query('SELECT IDDESA, NMDESA, m_desakel.IDKEC,GJSONDES, m_kecamatan.IDKEC, m_kecamatan.NMKEC, m_kabkota.NMWIL, m_kabkota.IDWIL FROM m_desakel 
			 LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC = m_desakel.IDKEC  
			 LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB')->result();

			if ( isset($_POST['fl-kec'])) {
						$kecz = $_POST['fl-kec'];

						if (!empty($kecz)) {
							$data['kec'] = $this->db->get('m_kecamatan')->result();
								$data['desa'] = $this->db->query("SELECT IDDESA, NMDESA, m_desakel.IDKEC,GJSONDES, m_kecamatan.IDKEC, m_kecamatan.NMKEC, m_kabkota.NMWIL, m_kabkota.IDWIL FROM m_desakel 
						 LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC = m_desakel.IDKEC  
						 LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB WHERE m_desakel.IDKEC = '$kecz'")->result();
						}
						else {
							$data['kec'] = $this->db->get('m_kecamatan')->result();
					$data['desa'] = $this->db->query('SELECT IDDESA, NMDESA, m_desakel.IDKEC,GJSONDES, m_kecamatan.IDKEC, m_kecamatan.NMKEC, m_kabkota.NMWIL, m_kabkota.IDWIL FROM m_desakel 
			 LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC = m_desakel.IDKEC  
			 LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB')->result();
						}

						
					}
		// $data['desa'] = $this->db->from('m_desakel');
		// $data['desa'] = $this->db->join('m_kecamatan' , 'm_kecamatan.IDKEC = m_desakel.IDKEC' , 'left');
		// $data['desa'] = $this->db->join('m_kabkota' , 'm_kabkota.IDWIL = m_kecamatan.IDKAB' , 'left');
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/desa',$data);
		$this->load->view('Operator/include/footer');
	}
		public function view(){
		$list = $this->Desa_m->get_datatables();
        $data = array();     
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;    
            $row[] = $field->NMDESA;        
            $row[] = $field->NMKEC;
            $row[] = $field->NMWIL;
            $row[] = $field->GJSONDES;
            $row[] = " <div class='dropdown dropdown-inline'>
                            <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='flaticon-more-1'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item edit_btn' href='javascript:void(0)'  data-toggle='modal' data-id='".$field->IDDESA."' data-nmdesa='".$field->NMDESA."'  data-geo='".$field->GJSONDES."' data-idwil='".$field->IDWIL."' data-nmwil='".$field->NMWIL."' data-idkec='".$field->IDKEC."'  data-nmkec='".$field->NMKEC."'><i class='la la-pencil-square  '></i> Edit</a>
                                <a class='dropdown-item delete_btn' href='javascript:void(0)' data-toggle='modal' data-id='".$field->IDDESA."' data-nm='".$field->NMDESA."' data-target='#delete'><i class='la la-trash-o  '></i> Hapus</a>
                            </div>
                        </div>";            
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Desa_m->count_all(),
            "recordsFiltered" => $this->Desa_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	public function input(){
		$desa = $this->input->post('desa');
		$kec = $this->input->post('kec');
		 $file = $_FILES["file"]["name"];

		  $data = array(
                'NMDESA' => $desa, 
                'IDKEC' => $kec,              
            );  
		   $data1 = array(
                'NMDESA' => $desa, 
                'IDKEC' => $kec,                 
                'GJSONDES' => $file,
            );  

	   if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
                $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$input  = $this->db->insert('m_desakel', $data1);
                	if ($input) {
                		echo('<script>
				  		swal.fire({position:"top-right",type:"success",
						title:"Data Berhasil  Disimpan",
						showConfirmButton:!1,timer:2000})
						</script>');
                		
                	}
                	else {
                		echo('<script>
				  		swal.fire({position:"top-right",type:"success",
						title:"Data Berhasil  Diinput tapi File gagal diupload",
						showConfirmButton:!1,timer:2000})
						</script>'); 
	                	}				 
                                 
                }
                 else {
                 	$input1  = $this->db->insert('m_desakel', $data);
                	if ($input1) {
                		echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil  Disimpan",
							showConfirmButton:!1,timer:2000})
							</script>');
		                	} 
                	else  
	                {  
	                     $data = $this->upload->data();
	                     echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal  Disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>');           
	                }     	
                 
           } 
       	}
           else{
           		$input1  = $this->db->insert('m_desakel', $data1);
           		if ($input1) {
                		echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil  Diinput tapi File gagal diupload",
					showConfirmButton:!1,timer:2000})
					</script>');
                	}
                	else{
                		echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal  Diinput ",
							showConfirmButton:!1,timer:2000})
						</script>');
                	}
           } 		 	
	}
		public function delete(){
		$desa = $this->input->post('desa');		
		
		 $data = array(
                'IDDESA' => $desa, 
               
            );       
		$del = $this->db->where($data);
        $del = $this->db->delete('m_desakel');
		if ($del) {
			 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil Dihapus ",
							showConfirmButton:!1,timer:2000})
						</script>'); 		
		}
		else {  
			  echo('<script>
					  		swal.fire({position:"top-right",type:"danger",
							title:"Data Gagal  Dihapus ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	
				 }       
	}
	public function edit() {
		$iddesa = $this->input->post('iddesa');
		$desa = $this->input->post('edesa');
		$kec = $this->input->post('ekec');		
		$file = $_FILES["file"]["name"];
		 $data = array(
                'NMDESA' => $desa, 
                'IDKEC' => $kec,                                        
                'GJSONDES' => $file,
               	                   
            );  

           $data1 = array(
                 'NMDESA' => $desa, 
                 'IDKEC' => $kec,                              	                   
            );   
           $where = array(
           		'IDDESA' => $iddesa
           );  


          if(!empty($_FILES["file"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
               $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                $upload = $this->upload->do_upload('file');
                
                if($upload )  
                {  
                	$edit = $this->db->where($where);
         			$edit = $this->db->update('m_desakel', $data);
                	if ($edit) {
                		 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil Diubah ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	
                	}
                	else {
                		 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil Diupload tapi data gagal diubah ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	  
                	}				 
                                 
                }
                 else {
                 	$edit1 = $this->db->where($where);
         			$edit1 = $this->db->update('m_desakel', $data1);
                	if ($edit1) {
                		 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil Disimpan tapi file gagal diupload ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	
                	} 
                	else  
	                {  
	                     $data = $this->upload->data();
	                      echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	           
	                }     	
                 
           } 
       	}
           else{
           		$edit1 = $this->db->where($where);
         		$edit1 = $this->db->update('m_desakel', $data1);
           		if ($edit1) {
           			 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Berhasil Disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	
           		}
           		else{
		           		 echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal Disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>'); 	
					
           		}
           }              
	}
}
