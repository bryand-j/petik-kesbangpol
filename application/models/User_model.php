<?php
 
class User_model extends CI_Model {
 
    var $table = 'tr_angket'; //nama tabel dari database
    var $column_order = array(null, 'tr_angket.TGLANGKET','m_btkangket.NMBENTUK','tr_angket.STATUS'); //field yang ada di table user
    var $column_search = array('tr_angket.TGLANGKET','m_btkangket.NMBENTUK','m_kabkota.NMWIL'); //field yang diizin untuk pencarian 
    var $order = array('IDTRXANGKET' => 'asc'); // default order
    
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        
        $this->db->select('tr_angket.IDTRXANGKET,tr_angket.TGLANGKET,m_kabkota.NMWIL,m_kecamatan.NMKEC,m_btkangket.NMBENTUK,tr_angket.NMANGKET,tr_angket.DESKRIPSI,m_status.NMSTATUS');
        $this->db->from('tr_angket,m_kecamatan,m_kabkota,m_btkangket,m_status');
        $this->db->where('m_status.IDSTATUS=tr_angket.STATUS AND tr_angket.IDBENTUK=m_btkangket.IDBENTUK AND tr_angket.IDKEC=m_kecamatan.IDKEC AND m_kecamatan.IDKAB=m_kabkota.IDWIL');
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
 
}