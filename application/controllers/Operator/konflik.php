<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konflik extends CI_Controller {

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
        $this->load->model('Konflik_m');
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
        $data['title']	 = "PeranKo | Data Konflik";     
		$data['kab'] = $this->db->query("select * FROM m_kabkota where IDWIL='".$this->session->userdata('IDWIL')."'")->result();
		$data['bidang'] = $this->db->get('m_btkangket')->result();	
		$data['status'] = $this->db->get('m_status')->result();		
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/data-konflik',$data);
		$this->load->view('Operator/include/footer');
	}
	public function input(){
		$judul = $this->input->post('judul');
		$kec = $this->input->post('kec');
		$desa = $this->input->post('desa');
		$detail = $this->input->post('detail');
		$bidang = $this->input->post('bidang');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		
		 $data = array(
                'IDKEC' => $kec, 
                'IDDESA' => $desa, 
                'IDBENTUK' => $bidang,              
                'NMANGKET' => $judul,
                'TGLANGKET' => $tanggal,
                'DESKRIPSI' =>$detail,
                'STATUS' =>$status,
               	                   
            );       
		 $input = $this->db->insert('tr_angket', $data);
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
		$kon = $this->input->post('kon');		
		
		 $data = array(
                'IDTRXANGKET' => $kon, 
               
            );       
		 $del = $this->db->where($data);
        $del = $this->db->delete('tr_angket');
		if ($del) {
			 echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil Dihapus",
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
	public function views(){
		$konflik = $this->Konflik_m->get_datatables();
        $data = array();     
        $no = $_POST['start'];
        foreach ($konflik as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NMANGKET;
            $row[] = $field->NMBENTUK;
            $row[] = $field->NMKEC;
            $row[] = $field->NMDESA;
            $row[] = $field->TGLANGKET;
            $row[] = $field->NMSTATUS;
            $row[] = " <div class='dropdown dropdown-inline'>
                            <button type='button' class='btn btn-success btn-elevate btn-elevate-air btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='flaticon-more-1'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item edit_btn' href='javascript:void(0)'  data-toggle='modal' data-id='".$field->IDTRXANGKET."' data-nm='".$field->NMANGKET."' data-idbn='".$field->IDBENTUK."' data-bn='".$field->NMBENTUK."'  data-idkab='".$field->IDWIL."' data-iddesa='".$field->IDDESA."' data-desa='".$field->NMDESA."' data-kab='".$field->NMWIL."'  data-idkec='".$field->IDKEC."' data-kec='".$field->NMKEC."' data-dt='".$field->DESKRIPSI."'  data-tgl='".$field->TGLANGKET."' data-idsts='".$field->STATUS."'  data-sts='".$field->NMSTATUS."'><i class='la la-pencil-square  '></i> Edit</a>
                                
                                <a class='dropdown-item delete_btn' href='javascript:void(0)' data-toggle='modal' data-id='".$field->IDTRXANGKET."' data-target='#delete'><i class='la la-trash-o  '></i> Hapus</a>
                                <a class='dropdown-item detail-btn' href='javascript:void(0)'  data-toggle='modal' data-id='".$field->IDTRXANGKET."' data-nm='".$field->NMANGKET."' data-idbn='".$field->IDBENTUK."' data-bn='".$field->NMBENTUK."'  data-idkab='".$field->IDWIL."' data-iddesa='".$field->IDDESA."' data-desa='".$field->NMDESA."' data-kab='".$field->NMWIL."'  data-idkec='".$field->IDKEC."' data-kec='".$field->NMKEC."' data-dt='".$field->DESKRIPSI."'  data-tgl='".$field->TGLANGKET."' data-idsts='".$field->STATUS."'  data-sts='".$field->NMSTATUS."'><i class='flaticon-file-1'></i> Detail</a>
                             
                            </div>
                        </div>";            
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Konflik_m->count_all(),
            "recordsFiltered" => $this->Konflik_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	public function keckab(){
		$kab = $this->input->post('kab');
		$kec = $this->db->query("SELECT * FROM m_kecamatan WHERE IDKAB = '$kab'")->result();	
		
		foreach ($kec as $row) {
			echo('<option value='.$row->IDKEC.'>'.$row->NMKEC.'</option>');
		}


	}
	public function deskec(){
		$kec = $this->input->post('kec');
		$des = $this->db->query("SELECT * FROM m_desakel WHERE IDKEC = '$kec'")->result();	
		echo('<option value=""> -- Pilih Desa/Kelurahan -- </option>');	
		foreach ($des as $row) {
			echo('<option value='.$row->IDDESA.'>'.$row->NMDESA.'</option>');
		}


	}
	public function edit(){
		$id = $this->input->post('sids');
		$judul = $this->input->post('judul');
		$kec = $this->input->post('kec');
		$desa = $this->input->post('desa');
		$detail = $this->input->post('detail');
		$bidang = $this->input->post('bidang');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		
		 $data = array(
                'IDKEC' => $kec, 
                'IDDESA' => $desa, 
                'IDBENTUK' => $bidang,              
                'NMANGKET' => $judul,
                'TGLANGKET' => $tanggal,
                'DESKRIPSI' =>$detail,
                'STATUS' =>$status,
               	                   
            );   

            $where = array(
            	'IDTRXANGKET' => $id
            );
       $edit = $this->db->where($where);
       $edit = $this->db->update('tr_angket', $data);
       if ($edit) {
			 echo('<script>
			  		swal.fire({position:"top-right",type:"success",
					title:"Data Berhasil Diubah",
					showConfirmButton:!1,timer:2000})
				</script>');
		}
		else {  
			echo('<script>
			  		swal.fire({position:"top-right",type:"danger",
					title:"Data Gagal Diubah",
					showConfirmButton:!1,timer:2000})
				</script>');
				 }
	}
}
