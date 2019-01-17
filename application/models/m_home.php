<?php

class M_home extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getHome()
    {
        $result = $this->db->select('*')
        ->get('tblhome')
        ->result_array()[0];
        return $result;
    }
    
    public function updateCount($data)
    {
        $this->db->where('id', "1");
        $this->db->update('tblhome', $data);
    }
}