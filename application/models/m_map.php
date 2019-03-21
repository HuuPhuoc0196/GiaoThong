<?php

class M_map extends CI_Model
{
    private $table = "map";
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $result = $this->db->select('*')
            ->order_by('id desc')
            ->get($this->table)
            ->result_array();
        return $result;
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
    
    public function findName($name)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('name', $name);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMapLimit($limit, $start)
    {
        $result = $this->db->select('*')
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

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->table);
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function getlist()
    {
        $result = $this->db->get($this->table);
        return $result->result_array();
    }

    public function getMapByID($id)
    {
        $result = $this->db->select('*')
            ->where('id', $id)
            ->get($this->table)
            ->row_array();
        return $result;
    }
    public function getMapHot($count)
    {
        $result = $this->db->select('*')
            ->where('status', '1')
            ->limit($count, 0)
            ->order_by('id desc')
            ->get($this->table)
            ->result_array();
        return $result;
    }

    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('name', $search, 'both', false);
        $this->db->order_by("id", "DESC");
        $result = $this->db->get($this->table)->result_array();
        return $result;
    }

    public function getMap($id)
    {
        $this->db->select('*');
        $this->db->where(array(
            "id" => $id
        ));
        $result = $this->db->get($this->table)->result_array();
        return $result;
    }
    
    public function searchMap($search, $limit, $start)
    {
        $result = $this->db->select('*')
        ->like('name', $search, 'both', false)
        ->limit($limit, $start)
        ->order_by('name')
        ->get($this->table)
        ->result_array();
        return $result;
    }
    public function findMap($data)
    {
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
    
    public function checkLatAndLngUpdate($data){
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
}