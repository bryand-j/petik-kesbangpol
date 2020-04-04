<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

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
        $this->load->model('Kecamatan_m');
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
        $data['title']   = "PeranKo | Wilayah Kecamatan";   
		$data['kab'] = $this->db->get('m_kabkota')->result();
		$this->load->view('Admin/include/head', $data);
		$this->load->view('Admin/include/header');
		$this->load->view('Admin/kecamatan',$data);
		$this->load->view('Admin/include/footer');
	}
	public function upload(){
		$kab = $this->input->post('kab');
		$kec = $this->input->post('kec');
		$koord = $this->input->post('kor');
		$geo = $_FILES["ingeokec"]["name"];
		
		 $datas = array(
                'IDKAB' => $kab, 
                'NMKEC' => $kec,              
                'KORDKEC' => $koord,
                'GJSONKEC' => $geo,
               	                   
            );   
		  $datas1 = array(
                'IDKAB' => $kab, 
                'NMKEC' => $kec,              
                'KORDKEC' => $koord,               
               	                   
            );   
		$cek = $this->input->post('ingeokec');

		if(!empty($_FILES["ingeokec"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
                $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('ingeokec'))  
                {  
                	$input1 = $this->db->insert('m_kecamatan', $datas1);
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
                else  
                {  

                     $data = $this->upload->data();
                    $input = $this->db->insert('m_kecamatan', $datas);
                	if ($input) {
                		echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil  Disimpan",
					showConfirmButton:!1,timer:2000})
					</script>');
                	}
                	else{
                		echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal  Disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>');
                	}             
                }  
           }  
           else{
           		$input1 = $this->db->insert('m_kecamatan', $datas1);
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
	public function input(){
		$kab = $this->input->post('kab');
		$kec = $this->input->post('kec');
		$koord = $this->input->post('koord');
		$geo = $this->input->post('in-geokec');
		
		 $data = array(
                'IDKAB' => $kab, 
                'NMKEC' => $kec,              
                'KORDKEC' => $koord,
                'GJSONKEC' => $geo,
               	                   
            );       
		 $input = $this->db->insert('m_kecamatan', $data);
		if ($input) {
			 echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhail Disimpan",
					showConfirmButton:!1,timer:2000})
				</script>');
		}
		else {  
			echo('<script>
			  		swal.fire({position:"top-right",type:"danger",
					title:"Data Gagal Disimpan",
					showConfirmButton:!1,timer:2000})
				</script>');
				 }
       
	}
		public function delete(){
		$kec = $this->input->post('kec');		
		
		 $data = array(
                'IDKEC' => $kec, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('m_kecamatan');
		if ($del) {
			 echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil  Dihapus",
					showConfirmButton:!1,timer:2000})
				</script>');
		}
		else {  
			echo('<script>
			  		swal.fire({position:"top-right",type:"danger",
					title:"Data Gagal Dihapus",
					showConfirmButton:!1,timer:2000})
				</script>');
				 }
       
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
	public function edit(){
		$ikec = $this->input->post('idkec');
		$kab = $this->input->post('ekab');
		$kec = $this->input->post('ekec');
		$koord = $this->input->post('ekor');
		$geo = $_FILES["egeo"]["name"];
		
		 $datas = array(
                'IDKAB' => $kab, 
                'NMKEC' => $kec,              
                'KORDKEC' => $koord,
                'GJSONKEC' => $geo,
               	                   
            );   
		  $datas1 = array(
                'IDKAB' => $kab, 
                'NMKEC' => $kec,              
                'KORDKEC' => $koord,               
               	                   
            );   
		$where = array(
					'IDKEC' => $ikec,
			);

		if(!empty($_FILES["egeo"]["name"]))  
           {  
                $config['upload_path'] = './geojson/';  
                $config['allowed_types'] = '*';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('egeo'))  
                {  
                	$edit1 = $this->db->where($where);
                	$edit1 = $this->db->update('m_kecamatan', $datas1);
                	if ($edit1) {
                		echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil  Dubah",
					showConfirmButton:!1,timer:2000})
					</script>');
                	}
                	else{
                		echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal  Diubah ",
							showConfirmButton:!1,timer:2000})
						</script>');
                	}
                     	 
				 
                }  
                else  
                {  

                     $data = $this->upload->data();
                    $edit = $this->db->where($where);
                	$edit = $this->db->update('m_kecamatan', $datas);
                	if ($edit) {
                		echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil  Disimpan",
					showConfirmButton:!1,timer:2000})
					</script>');
                	}
                	else{
                		echo('<script>
					  		swal.fire({position:"top-right",type:"success",
							title:"Data Gagal  Disimpan ",
							showConfirmButton:!1,timer:2000})
						</script>');
                	}             
                }  
           }  
           else{
           			$edit1 = $this->db->where($where);
                	$edit1 = $this->db->update('m_kecamatan', $datas1);
                	if ($edit1) {
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
}
