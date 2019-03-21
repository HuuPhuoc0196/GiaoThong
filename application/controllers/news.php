<?php
class News extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_newsDetail');
        $this->load->model('m_home');
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
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $result['hotNews'] = $this->m_news->searchNews($search, $limit_per_page, $start_index);
                $result['search'] = $search;
                $total_records = $this->m_news->get_total_search($search);
                if(empty($result['hotNews'])){
                    $total_records = $this->m_news->get_total();
                    $result["hotNews"] = $this->m_news->getnews($limit_per_page, $start_index);
                    $result["searchNull"] = "Không tìm thấy!";
                }
            } else {
                $result["hotNews"] = $this->m_news->getnews($limit_per_page, $start_index);
            }
            
            $config['base_url'] = base_url_ci . 'news/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
        
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['first_link'] = 'Trang đầu';
            $config['first_tag_open'] = '<li class="prev1">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Trang cuối';
            $config['last_tag_open'] = '<li class="prev1">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
        
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
        
            $config['cur_tag_open'] = '<li class="active-paginnation-custom"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
        
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
        
            $this->pagination->initialize($config);
             
            // build paging links
            $result["links"] = $this->pagination->create_links();
        }
        $this->load->view('news/index_news',$result);
    }
    
     public function detail($id_news)
     {
         $count_home = $this->m_home->getHome();
         $result['result_detail'] = $this->m_newsDetail->getViewByID($id_news);
         $result['result_news'] = $this->m_news->getViewByID($id_news);
         $result['hotNews'] = $this->m_news->getNewsHot($count_home["count_news"]);
         $result['listNews'] = $this->m_news->getNewsList($count_home["count_news"]);
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