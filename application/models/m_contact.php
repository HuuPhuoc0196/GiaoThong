<?php

class M_contact extends CI_Model
{
    private $table = "tblcontact";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	
    public function insert($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    
    public function delete($id)
    {
        $this->db->delete($this->table, array('id' => $id));
    }
    
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
    
    public function get_total_search($search)
    {
        $query = $this->db->like('des', $search)->get($this->table);
        return $query->num_rows();
    }
    
    public function searchContact($search, $limit, $start)
    {
        $result = $this->db->select('*')
        ->like('content', $search)
        ->or_like('name', $search)
        ->limit($limit, $start)
        ->order_by('id desc')
        ->get($this->table)
        ->result_array();
        return $result;
    }
    
    public function getContactList($limit, $start)
    {
        $result = $this->db->select("*")
        ->limit($limit, $start)
        ->order_by('id desc')
        ->get($this->table)
        ->result_array();
        return $result;
    }
    
    
}