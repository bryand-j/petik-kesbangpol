<?php
 
class Pemilu_m extends CI_Model {
 
    var $table = 'tb_pemilu'; //nama tabel dari database
    var $column_order = array(null, 'm_tahun.NMTAHUN','m_kecamatan.NMKEC,  m_parpol.NMPARPOL'); //field yang ada di table user
    var $column_search = array('m_kabkota.NMWIL','m_kecamatan.NMKEC','m_tahun.NMTAHUN',' m_parpol.NMPARPOL'); //field yang diizin untuk pencarian 
    var $order = array('IDTRXPEMILU' => 'asc'); // default order
    
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        $this->db->select('IDTRXPEMILU,m_kecamatan.NMKEC,m_kecamatan.IDKEC, m_parpol.NMPARPOL, m_parpol.IDPARPOL, m_tahun.NMTAHUN,m_tahun.IDTAHUN, TOTALSUARA ,m_kabkota.NMWIL,m_kabkota.IDWIL');
        $this->db->from('tb_pemilu');
        $this->db->join('m_parpol', 'm_parpol.IDPARPOL = tb_pemilu.IDPARTAI', 'left'); 
        $this->db->join('m_kecamatan', 'm_kecamatan.IDKEC = tb_pemilu.IDKEC', 'left');
        $this->db->join('m_kabkota', 'm_kecamatan.IDKAB = m_kabkota.IDWIL', 'left');    
         $this->db->join('m_tahun', 'm_tahun.IDTAHUN = tb_pemilu.IDTAHUN', 'left');          
        //add custom filter here
        if($this->input->post('wilayah'))
        {
            $this->db->like('m_kabkota.NMWIL', $this->input->post('wilayah'));
        }
         if($this->input->post('parpol'))
        {
            $this->db->like('m_parpol.NMPARPOL', $this->input->post('parpol'));
        }
         if($this->input->post('tahun'))
        {
            $this->db->like('m_tahun.NMTAHUN', $this->input->post('tahun'));
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