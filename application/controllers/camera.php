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
        $this->load->view('camera/index');
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
            $this->load->view('admin/addCamera');
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
    
                $config['num_tag_open'] = '<button type="button" clas
                    s="btn btn-success">';
                $config['num_tag_close'] = '</button>';
    
                $this->pagination->initialize($config);
    
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }
        }
        $this->load->view('admin/listCamera', $data);
    }
}