<?php
class M_newsDetail extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getview(){
        $result = $this->db->select('*')->order_by('id desc')->get('tbldetail')->result_array();
        return $result;
    }
    
    public function getViewByID($id_news)
    {
        $result = $this->db->select('*')->where('id_news', $id_news)->get('tbldetail')->row_array();
        return $result;
    }
    
    public function delete($id)
    {
        $this->db->where('id',$id)->delete('tbldetail');
    }
    public function insert($data)
    {
        $this->db->insert('tbldetail',$data);
    }
    public function findID($id)
    {
        $this->db->select('id');
        $this->db->from('tbldetail');
        $this->db->where('id',$id);
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function update($id, $data)
    {
    	$this->db->where('id', $id);
    	$this->db->update('tbldetail', $data);
    }

}