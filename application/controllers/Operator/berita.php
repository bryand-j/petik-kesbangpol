<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {



	
	var $auth="01";
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( )
	{
		$this->load->library('session');	
		$data['title']	= "Berita | Data Berita";
		$data['bidang'] = $this->db->get('m_btkangket')->result();
		$data['berita'] = $this->db->query("SELECT tb_berita.*, tr_angket.NMANGKET,tb_user.NMUSER FROM tb_berita,tr_angket,tb_user,m_kecamatan,m_kabkota WHERE tr_angket.IDKEC=m_kecamatan.IDKEC AND m_kabkota.IDWIL=m_kecamatan.IDKAB AND m_kecamatan.IDKAB='".$this->session->userdata('IDWIL')."' AND tb_berita.IDKONFLIK=tr_angket.IDTRXANGKET AND tb_user.IDUSER=tb_berita.AUTHOR")->result();
		$this->load->view('Operator/include/head',$data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/berita/berita',$data);
		$this->load->view('Operator/include/footer');
	}

	public function inputform()
	{
		$this->load->library('session');	
		$data['title']	= "Berita | Input Berita";
		$data['konflik'] = $this->db->query("select tr_angket.* from tr_angket,m_kecamatan,m_kabkota where tr_angket.IDKEC=m_kecamatan.IDKEC AND m_kabkota.IDWIL=m_kecamatan.IDKAB AND m_kabkota.IDWIL='".$this->session->userdata('IDWIL')."'")->result();
		$data['bidang']= $this->db->get('m_btkangket')->result();
		$this->load->view('Operator/include/head',$data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/berita/form_berita',$data);
		$this->load->view('Operator/include/footer');

	}

	public function editform($id=NULL)
	{

		$this->load->library('session');
		$data['berita'] =$this->db->query("SELECT * FROM tb_berita WHERE IDKONFLIK='".$id."'")->row();	
		$data['title']	= "Berita | Edit Berita";
		$data['select'] = $this->db->query("SELECT * FROM tr_angket WHERE IDTRXANGKET='".$id."'")->row();
		$this->load->view('Operator/include/head',$data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/berita/editBerita',$data);
		$this->load->view('Operator/include/footer');
	}



	// Add a new item
	public function add()
	{
		$auth=$this->session->userdata('IDUSER');

		$data = array(

			'IDKONFLIK' =>$this->input->post('id'),
			'JUDUL' =>$this->input->post('judul'),
			'ISI' =>$this->input->post('isi'),
			'AUTHOR' =>$auth ,

		);
		$input=$this->db->insert('tb_berita', $data);
		
		if ($input) {
		$this->session->set_flashdata('message', '<script >
     		$(document).ready(function() {   
		     swal.fire({position:"top-right",
		                    type:"success",title:"Data Berhasil Disimpan",
		                    showConfirmButton:!1,timer:1500})         
		    });

			</script>');

		redirect('Operator/berita/index');

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
		 redirect('Operator/berita/index');


		



	}

	//Update one item
	public function update()
	{
		$auth=$this->session->userdata('IDUSER');

		$data = array(
			'IDKONFLIK' =>$this->input->post('id'),
			'JUDUL' =>$this->input->post('judul'),
			'ISI' =>$this->input->post('isi'),
			'AUTHOR' =>$auth 

		);
		$this->db->where('IDKONFLIK',$this->input->post('id'));
		$update=$this->db->update('tb_berita', $data);
		if ($update) {
		$this->session->set_flashdata('message', '<script >
     		$(document).ready(function() {   
		     swal.fire({position:"top-right",
		                    type:"success",title:"Data Berhasil Diedit",
		                    showConfirmButton:!1,timer:1500})         
		    });

			</script>');

		redirect('Operator/berita/index');

		}
		else {  
		$this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"danger",title:"Data Gagal Diedit",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>
			');
				 }
		 redirect('Operator/berita/index');

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->db->where('IDKONFLIK', $id);
		$delete=$this->db->delete('tb_berita');
		if ($delete) {
		$this->session->set_flashdata('message', '<script >
     		$(document).ready(function() {   
		     swal.fire({position:"top-right",
		                    type:"success",title:"Data Berhasil Dihapus",
		                    showConfirmButton:!1,timer:1500})         
		    });

			</script>');

		redirect('Operator/berita/index');

		}
		else {  
		$this->session->set_flashdata('message','<script >
			     $(document).ready(function() {     
			       swal.fire({position:"top-right",
			        type:"danger",title:"Data Gagal Dihapus",
			        showConfirmButton:!1,timer:1500})
			 
			    });
			</script>
			');
				 }
		 redirect('Operator/berita/index');
	}
	public function upload()
	{

		$id=$this->input->post('id');
		$img=$this->input->post('data');
		$data=array(
			"IMG"=>$img,	
		);
		$this->db->where('IDTRXANGKET', $id);
		$this->db->update('tr_angket', $data);
		echo $id;
		
	}
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */
