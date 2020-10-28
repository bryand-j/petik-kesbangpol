<?php 

defined('BASEPATH') OR exit('No direct script access allowed');







class Login_m extends CI_Model {


	public function validasi($username,$password)
	{
       
    	$this->db->where('USERNAME',$username);
    	$this->db->where('PASSWORD',$password);
    	$query=$this->db->get('tb_user');
    	if($query->num_rows()>0)
    	{
    		foreach ($query->result() as $row) {
    			
                   $data = array(
                    'USERNAME'=>$row->USERNAME,
                    'NMUSER'=>$row->NMUSER,
                    'IDUSER'=>$row->IDUSER,
                    'EMAIL' =>$row->EMAIL,                  
                    'LEVEL'=>$row->LEVEL,
                    'IDWIL'=>$row->IDWIL,
                    'type'=>0
                
    			 );
    		}
    		$this->session->set_userdata($data);
    		if ($this->session->userdata('LEVEL')=='Operator')
    		{
    		    redirect('Operator/Dashboard');
    		}
    		else if ($this->session->userdata('LEVEL')=='Admin')
    		{
    			redirect('Admin/dashboard');
    		}
    	}
        else{
            $this->session->set_flashdata('Gagal',"Username atau password salah Coba Lagi");
            redirect('login');
        }
    }
    	

	// public function kemamananAdmin()
	// {
	// 	$username=$this->session->userdata('username');
	// 	if(empty($username) or $this->session->userdata('lv')!='admin')
	// 	{
            
 //            $this->session->sess_destroy();
 //            redirect('login');
	// 	}

	// }




}
?>