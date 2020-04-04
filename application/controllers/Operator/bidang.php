<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

	function __construct(){
        parent::__construct();
     
    }

	public function index()
	{	
		$this->load->library('session');	
		$data['title']	= "PeranKo | Bidang Konflik";
		$data['bidang'] = $this->db->get('m_btkangket')->result();
		$this->load->view('Operator/include/head',$data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/bidang-konflik',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){
		$bidang = $this->input->post('bidang');
		$deskripsi = $this->input->post('deskripsi');
		$warna = $this->input->post('warna');
		
		
		 $data = array(
                'NMBENTUK' => $bidang, 
                'WARNABNTK' => $warna,
                 'DESKRIPSI' => $deskripsi,
               	                   
            );       
		 $input = $this->db->insert('m_btkangket', $data);
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
		 redirect('Operator/bidang');
       
	}
		public function delete(){
		$bidang = $this->input->post('bidang');		
		
		 $data = array(
                'IDBENTUK' => $bidang, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('m_btkangket');
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
        redirect('Operator/bidang');
	}
	public function edit(){
		$idbentuk = $this->input->post('idbentuk');
		$bidang = $this->input->post('bidang');
		$deskripsi = $this->input->post('deskripsi');
		$warna = $this->input->post('warna');
		
		
		 $data = array(
                'NMBENTUK' => $bidang, 
                'WARNABNTK' => $warna,
                'DESKRIPSI' => $deskripsi,
               	                   
            ); 
           $where = array(
           		'IDBENTUK' => $idbentuk
           );  

		 $edit = $this->db->where($where);
         $edit = $this->db->update('m_btkangket', $data);
         redirect('Operator/bidang');
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
