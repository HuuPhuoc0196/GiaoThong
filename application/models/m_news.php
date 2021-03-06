<?php

class M_news extends CI_Model
{
    private $table = "tblnews";
    private $tblDetail = "tbldetail";
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getview($limit, $start)
    {
        $result = $this->db->select('*')
            ->limit($limit, $start)
            ->get($this->table)
            ->result_array();
        return $result;
    }
    
    public function getnews($limit, $start)
    {
        $result = $this->db->select("$this->table.*, $this->tblDetail.time_post")
        ->where("$this->table.id = $this->tblDetail.id_news")
        ->from($this->tblDetail)
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

    public function getViewByID($id_news)
    {
        $result = $this->db->select('*')
            ->where('id', $id_news)
            ->get($this->table)
            ->row_array();
        return $result;
    }

    public function delete($id)
    {
        $news = $this->getViewByID($id);
        $file = "public/images/" . $news['image'];
        unlink($file);
        $this->db->where('id', $id)->delete($this->table);
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

    public function findTitle($title)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('title', $title);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkTitleUpdate($data){
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

    public function findTitleByID($id)
    {
        $this->db->select('title');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function getNewsHot($count)
    {
        $result = $this->db->select("$this->table.*, $this->tblDetail.time_post")
            ->where('status', '1')
            ->where("$this->table.id = $this->tblDetail.id_news")
            ->from($this->tblDetail)
            ->limit($count, 0)
            ->order_by('id desc')
            ->get($this->table)
            ->result_array();
        return $result;
    }

    public function getNewsList($count)
    {
        $result = $this->db->select("$this->table.*, $this->tblDetail.time_post")
            ->where('status', '0')
            ->where("$this->table.id = $this->tblDetail.id_news")
            ->from($this->tblDetail)
            ->limit($count, 0)
            ->order_by('id desc')
            ->get($this->table)
            ->result_array();
        return $result;
    }

    public function searchNews($search, $limit, $start)
    {
        $result = $this->db->select("$this->table.*, $this->tblDetail.time_post")
            ->where("$this->table.id = $this->tblDetail.id_news")
            ->from($this->tblDetail)
            ->like('title', $search, 'both', false)
            ->limit($limit, $start)
            ->order_by('id desc')
            ->get($this->table)
            ->result_array();
        return $result;
    }
    
    public function get_total_search($search)
    {
        $query = $this->db->like('title', $search, 'both', false)
            ->get($this->table);
        return $query->num_rows();
    }
}