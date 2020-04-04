<?php
 
class Desa_m extends CI_Model {
 
    var $table = 'm_desakel'; //nama tabel dari database
    var $column_order = array(null,'m_desakel.NMDESA', 'm_kabkota.NMWIL','m_kecamatan.NMKEC'); //field yang ada di table user
    var $column_search = array('m_desakel.NMDESA','m_kecamatan.NMKEC','m_kabkota.NMWIL'); //field yang diizin untuk pencarian 
    var $order = array('NMDESA' => 'asc'); // default order
    
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        $this->db->select('IDDESA, NMDESA, m_desakel.IDKEC,GJSONDES, m_kecamatan.IDKEC, m_kecamatan.NMKEC, m_kabkota.NMWIL, m_kabkota.IDWIL');
        $this->db->from('m_desakel');
         $this->db->join('m_kecamatan', 'm_kecamatan.IDKEC = m_desakel.IDKEC', 'left'); 
         $this->db->join('m_kabkota', 'm_kabkota.IDWIL = m_kecamatan.IDKAB', 'left');       
        //add custom filter here
        if($this->input->post('kecamatan'))
        {
            $this->db->where('m_kecamatan.IDKEC', $this->input->post('kecamatan'));
        }
        $this->db->where('m_kabkota.IDWIL',$this->session->userdata('IDWIL'));
        

      
 
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