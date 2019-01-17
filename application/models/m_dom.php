<?php

class M_dom extends CI_Model
{
    private $table = "tbldom";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get()
	{
		$result = $this->db->select('*')->get($this->table)->result_array();
		return $result;
	}
	
    public function delete($id)
    {
        $this->db->where('id',$id)->delete($this->table);
    }
    
    public function insert($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
	
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    

    public function findID($id)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getDomByID($id)
    {
        $result = $this->db->select('*')
        ->where('id', $id)
        ->get($this->table)
        ->row_array();
        return $result;
    }
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
    public function getDom($limit, $start)
    {
        $result = $this->db->select('*')
        ->limit($limit, $start)
        ->get($this->table)
        ->result_array();
        return $result;
    }
    
    public function searchDom($search, $limit, $start)
    {
        $result = $this->db->select('*')
        ->like('source', $search)
        ->like('url', $search)
        ->limit($limit, $start)
        ->get($this->table)
        ->result_array();
        return $result;
    }
}