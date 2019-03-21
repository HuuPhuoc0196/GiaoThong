<?php

class M_Camera extends CI_Model
{
	private $table = "tblcamera";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getCamera()
	{
	    $result = $this->db->select('*')->order_by('id desc')->get($this->table)->result_array();
	    return $result;
	}
	
	public function getCameraList($limit, $start)
	{
	    $result = $this->db->select("*")
	    ->where('status', '0')
	    ->limit($limit, $start)
	    ->order_by('id desc')
	    ->get($this->table)
	    ->result_array();
	    return $result;
	}

	public function get_total()
	{
	    return $this->db->count_all($this->table);
	}
	
	public function get_total_search($search)
	{
	    $query = $this->db->like('des', $search, 'both', false)->get($this->table);
	    return $query->num_rows();
	}
	
	public function getCameraHome($count)
    {
        $result = $this->db->select("*")
            ->where('status', '0')
            ->limit($count, 0)
            ->order_by('id desc')
            ->get($this->table)
			->result_array();
        return $result;
    }
	
	public function checkNameUpdate($data){
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where($data);
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function checkSourceUpdate($data){
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where($data);
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function checkSource($src){
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where("src", $src);
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function insert($data)
	{
	    $this->db->insert($this->table, $data);
	    return $this->db->insert_id();
	}
	
	public function checkName($name){
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where("name", $name);
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
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
	

	public function getCameraByID($id)
	{
	    $result = $this->db->select('*')
	    ->where('id', $id)
	    ->get($this->table)
	    ->row_array();
	    return $result;
	}
	
	public function update($id, $data)
	{
	    $this->db->where('id', $id);
	    $this->db->update($this->table, $data);
	}
	
	public function delete($id)
	{
	    $this->db->delete($this->table, array('id' => $id));
	}
	
	public function searchCamera($search, $limit, $start)
	{
	    $result = $this->db->select('*')
	    ->like('des', $search, 'both', false)
	    ->or_like('name', $search, 'both', false)
	    ->limit($limit, $start)
	    ->order_by('id desc')
	    ->where('status','0')
	    ->get($this->table)
	    ->result_array();
	    return $result;
	}
	
}