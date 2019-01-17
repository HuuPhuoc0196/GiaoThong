<?php

class M_User extends CI_Model
{
	private $table = "tbluser";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getuser()
	{
		$result = $this->db->select('*')->order_by('name')->get($this->table)->result_array();
		return $result;
	}
	
	public function searchUser($search, $limit, $start)
	{
	    $result = $this->db->select('*')
	    ->like('name', $search)
	    ->like('email', $search)
	    ->limit($limit, $start)
	    ->order_by('name')
	    ->get($this->table)
	    ->result_array();
	    return $result;
	}
	
	public function get_total()
	{
	    return $this->db->count_all($this->table);
	}
	public function delete($id)
	{
	    $this->db->delete($this->table, array('id' => $id));
	}
	
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}
	
	public function findIDByUsername($username)
	{
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$query = $this->db->get();
		$row = $query->row();
		return $row->id;
	}
	
	public function findAdmin($username)
	{
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where(array(
	        'username' => $username,
	        'level' => "1"
	    ));
	    $query = $this->db->get();
	    $row = $query->row();
	    return $row->id;
	}
	
	public function findUsername($username)
	{
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where(array (
				'username' => $username 
		));
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function changePassword($username, $data)
	{
		$this->db->where('username', $username);
		$this->db->update($this->table, $data);
	}
	
	public function login($username, $password)
	{
	
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where(array (
	        'username' => $username,
	        'password' => $password
	    ));
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function loginAdmin($username, $password)
	{
	    $this->db->select('id');
	    $this->db->from($this->table);
	    $this->db->where(array (
	        'username' => $username,
	        'password' => $password,
	        'level' => "1"
	    ));
	    $result = $this->db->get();
	    if ($result->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	
	public function checkEmail($username, $email)
	{
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where(array (
				'username !=' => $username,
				'email' => $email
		));
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	public function update($username, $data)
	{
		$this->db->where('username', $username);
		$this->db->update($this->table, $data);
	}
	
	public function findlevel($username)
	{
		$result = $this->db->select('level')->where('username', $username)->get($this->table)->result_array();
		return $result;
	}
	
	public function findNameByUsername($username)
	{
		$result = $this->db->select('name')->where('username', $username)->get($this->table)->result_array();
		return $result;
	}
	
	public function findUserByUsername($username)
	{
		$result = $this->db->select('*')->where('username', $username)->get($this->table)->result_array();
		return $result;
	}
	
	public function getLevelByUsername($username)
	{
	    $result = $this->db->select('level')->where('username', $username)->get($this->table)->result_array();
	    return $result;
	}
    
	
}