<?php
class News extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_newsDetail');
        $this->load->library('pagination');
    }
    
    public function index_news()
    {
        $this->load->view('news/index_news');
    }
    public function getNewsAll()
    {
        $result["result"] = $this->m_news->getnews();
        $this->load->view('news/view',$result);
    }
    
    public function index()
    {
        // init params
        $result = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_news->get_total();
        if ($total_records > 0)
        {
            // get current page records
            $result["result"] = $this->m_news->getview($limit_per_page, $start_index);
            $config['base_url'] = base_url_ci . 'news/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
        
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['first_tag_close'] = '</button>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['last_tag_close'] = '</button>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['next_tag_close'] = '</button>';
        
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['prev_tag_close'] = '</button>';
        
            $config['cur_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['cur_tag_close'] = '</button>';
        
            $config['num_tag_open'] = '<button type="button" class="btn btn-success">';
            $config['num_tag_close'] = '</button>';
        
            $this->pagination->initialize($config);
             
            // build paging links
            $result["links"] = $this->pagination->create_links();
        }
        $this->load->view('news/view',$result);
    }
    
     public function detail($id_news)
     {
         $result['result_detail'] = $this->m_newsDetail->getViewByID($id_news);
         $result['result_news'] = $this->m_news->getViewByID($id_news);
         $this->load->view('news/detail',$result);
     }
    
    public function insert(){
        $result['news'] = $this->m_news->getload();
    }
    public function delete(){
        $id = 263;
        $this->m_news->delete($id);
    }
    
    public function findID()
    {
        $id = 263;
        $result = $this->m_news->findID($id);
    }
    
    public function findTitle()
    {
        $title = htmlentities($title,ENT_QUOTES, "UTF-8");
        $result = $this->m_news->findTitle($title);
        if($result) echo 'co';
        else echo 'khong';
    }
    
    public function findTitleByID()
    {
        $id = 265;
        $result = $this->m_news->findTitleByID($id);
        
    }
    
    public function update()
    {
        $data = $data = array(
           'title' => htmlentities('My title',ENT_QUOTES, "UTF-8")
          );
        $id = 265;
        $this->m_news->update($id,$data);
    }
}