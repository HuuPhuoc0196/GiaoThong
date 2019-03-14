<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_camera');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
            // init params
            $result = array();
            $limit_per_page = 10;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
            $start_index = $start_index * $limit_per_page;
            $total_records = $this->m_camera->get_total();
            if ($total_records > 0)
            {
                // get current page records
                if (isset($_POST['search']) && ! empty($_POST['search'])) {
                    $search = $_POST['search'];
                    $result['camera'] = $this->m_camera->searchCamera($search, $limit_per_page, $start_index);
                    $result['search'] = $search;
                    $total_records = $this->m_camera->get_total_search($search);
                } else {
                    $result["camera"] = $this->m_camera->getCameraList($limit_per_page, $start_index);
                }
                $config['base_url'] = base_url_ci . 'camera/index';
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
            $this->load->view('camera/index_camera',$result);
    }
    
    public function deleteCamera($id)
    {
        $this->m_camera->delete($id);
        redirect(base_url_ci . 'admin/listCamera');
    }
    
    public function addCamera()
    {
        if (isset($_POST['name'])) {
            $dataError = $this->form_validation_addCamera();
            if (empty($dataError)) {
               $data = array(
                    "name" => $_POST['name'],
                    "src" => $_POST['src'],
                    "des" => $_POST['des'],
                    "status" => $_POST['status']
                );
                $this->m_camera->insert($data);
                $data = array(
                    "status" => true,
                    "message" => "Thêm mới thành công"
                );
                print_r(json_encode($data));die;
    
            } else {
                $data = array(
                    "status" => false,
                    "message" => $dataError
                );
                print_r(json_encode($data));die;
            }
        } else {
            $data['cameraPage'] = "class='active'";
            $this->load->view('admin/addCamera',$data);
        }
    }
    
    public function editCamera($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_camera->findID($id)) {
            redirect(base_url_ci . 'admin/listCamera');
        }
        if (isset($_POST['name'])) {
            $dataError = $this->form_validation_editCamera($id);
            if (empty($dataError)) {
                $data = array(
                    "name" => $_POST['name'],
                    "src" => $_POST['src'],
                    "des" => $_POST['des'],
                    "status" => $_POST['status']
                );
                $this->m_camera->update($id, $data);
                $data = array(
                    "status" => true,
                    "link" => base_url_ci . 'camera/listCamera',
                    "message" => "Cập nhật thành công"
                );
                print_r(json_encode($data));die;
            } else {
                 $data = array(
                    "status" => false,
                    "message" => $dataError
                );
                print_r(json_encode($data));die;
            }
        } else {
            $data['camera'] = $this->m_camera->getCameraByID($id);
            $data['status'] = true;
            $data['cameraPage'] = "class='active'";
            $this->load->view('admin/editCamera', $data);
        }
    }
    
    public function form_validation_addCamera()
    {
        $dataError = array();
        
        if($this->m_camera->checkName($_POST['name']))
        {
            $dataError['name'] = "Tên camera đã tồn tại";
        }else{
            if(empty($_POST['name'])){
                $dataError['name'] = "Tên camera là không được trống";
            }
        }
    
        if($this->m_camera->checkSource($_POST['src']))
        {
            $dataError['src'] = "Nguồn đã tồn tại";
        }else{
            if(empty($_POST['src'])){
                $dataError['src'] = "Nguồn là không được trống";
            }
        }
    
        if(empty($_POST['des'])){
            $dataError['des'] = "Mô tả là không được trống";
        }
    
        if(!is_numeric($_POST['status']) || $_POST['status'] < 0 || $_POST['status'] > 1){
            $dataError['status'] = "Trang thái không hợp lệ";
        }
    
        return $dataError;
    }
    
    public function form_validation_editCamera($id=null)
    {
        $dataError = array();
        $data1 = array(
            "id !=" => $id,
            "name" => $_POST['name']
        );
        
        $data2 = array(
            "id !=" => $id,
            "src" => $_POST['src']
        );
        
        if($this->m_camera->checkNameUpdate($data1))
        {
            $dataError['name'] = "Tên camera đã tồn tại";
        }else{
            if(empty($_POST['name'])){
                $dataError['name'] = "Tên camera là không được trống";
            }
        }
        
        if($this->m_camera->checkSourceUpdate($data2))
        {
            $dataError['src'] = "Nguồn đã tồn tại";
        }else{
            if(empty($_POST['src'])){
                $dataError['src'] = "Nguồn là không được trống";
            }
        }
        
        if(empty($_POST['des'])){
            $dataError['des'] = "Mô tả là không được trống";
        }
        
        if(!is_numeric($_POST['status']) || $_POST['status'] < 0 || $_POST['status'] > 1){
            $dataError['status'] = "Trang thái không hợp lệ";
        }
        
        return $dataError;
    }
    
    public function listCamera()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_camera->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['camera'] = $this->m_camera->searchCamera($search, $limit_per_page, $start_index);
                $data['search'] = $search;
            } else {
                $data['camera'] = $this->m_camera->getCamera($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'camera/listcamera';
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
                $data["links"] = $this->pagination->create_links();
                $data['cameraPage'] = "class='active'";
            }
        }
        $this->load->view('admin/listCamera', $data);
    }
}
