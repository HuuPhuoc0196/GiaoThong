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
}