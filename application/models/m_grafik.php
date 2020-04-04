<?php
 
class M_grafik extends CI_Model {



	
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ambildata()
    {
    	$tahun="2020";
    	$wilayah="";

    	$this->db->select("m_btkangket.NMBENTUK,COUNT(tr_angket.IDTRXANGKET) AS Jumlah ");
    	$this->db->from("tr_angket,m_btkangket,m_kecamatan");
    	$this->db->where("tr_angket.IDKEC=m_kecamatan.IDKEC AND tr_angket.IDBENTUK=m_btkangket.IDBENTUK");

    	if($this->input->post('wilayah'))
        {
            $wilayah= $this->input->post('wilayah');
        }
        if($this->input->post('tahun'))
        {
        	$tahun=$this->input->post('tahun');
        }
        $this->db->like('m_kecamatan.IDKAB',$wilayah);
        $this->db->like('tr_angket.TGLANGKET',$tahun);
        $this->db->group_by('tr_angket.IDBENTUK');
        $all=$this->db->get('');
        return $all->result();

    }

    public function ambildata1()
    {
    	$tahun="2020";
    	$bidang="";

    	$this->db->select("COUNT(tr_angket.IDTRXANGKET) AS jumlah ,m_kabkota.NMWIL as wilayah");
    	$this->db->from("tr_angket,m_kabkota,m_kecamatan");
    	$this->db->where("tr_angket.IDKEC=m_kecamatan.IDKEC AND m_kecamatan.IDKAB=m_kabkota.IDWIL");

    	if($this->input->post('bidang'))
        {
            $bidang= $this->input->post('bidang');
        }
        if($this->input->post('tahun'))
        {
        	$tahun=$this->input->post('tahun');
        }
        $this->db->like('tr_angket.IDBENTUK',$bidang);
        $this->db->like('tr_angket.TGLANGKET',$tahun);
        $this->db->group_by('m_kabkota.IDWIL');
        $all=$this->db->get('');
        return $all->result();

    }
}