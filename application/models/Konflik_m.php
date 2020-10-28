<?php
 
class Konflik_m extends CI_Model {
 
    var $table = 'tr_angket'; //nama tabel dari database
    var $column_order = array(null, 'tr_angket.IDTRXANGKET','m_kecamatan.NMKEC','m_kabkota.NMWIL'); //field yang ada di table user
    var $column_search = array('m_kabkota.NMWIL','m_kecamatan.NMKEC','tr_angket.NMANGKET'); //field yang diizin untuk pencarian 
    var $order = array('IDTRXANGKET' => 'asc'); // default order
    
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        $this->db->select('IDTRXANGKET,tr_angket.DESKRIPSI,m_kabkota.NMWIL, NMANGKET,STATUS, m_status.NMSTATUS, TGLANGKET, tr_angket.IDKEC,m_kabkota.NMWIL,m_kabkota.IDWIL, NMKEC, tr_angket.IDBENTUK, NMBENTUK, tr_angket.IDDESA, m_desakel.NMDESA');
        $this->db->from('tr_angket');
        $this->db->join('m_btkangket', 'm_btkangket.IDBENTUK = tr_angket.IDBENTUK', 'left'); 
        $this->db->join('m_kecamatan', 'm_kecamatan.IDKEC = tr_angket.IDKEC', 'left');
        $this->db->join('m_desakel', 'm_desakel.IDDESA = tr_angket.IDDESA', 'left');  
         $this->db->join('m_kabkota', 'm_kecamatan.IDKAB = m_kabkota.IDWIL', 'left');  
        $this->db->join('m_status', 'm_status.IDSTATUS = tr_angket.STATUS', 'left');
        $this->db->where('m_btkangket.type', $this->session->userdata('type'));
        //add custom filter here
        if($this->input->post('wilayah'))
        {
            $this->db->like('m_kabkota.NMWIL', $this->input->post('wilayah'));
        }
         if($this->input->post('bidang'))
        {
            $this->db->like('m_btkangket.NMBENTUK', $this->input->post('bidang'));
        }
        if($this->input->post('tahun'))
        {
            $this->db->like('tr_angket.TGLANGKET', $this->input->post('tahun'));
        }
        
        
      
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
         
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function input($data, $table){
            $this->db->insert($table,$data); 
    }
 
}