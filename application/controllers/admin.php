<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_user');
        $this->load->model('m_dom');
        $this->load->model('m_home');
        $this->load->model('m_map');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }
    
    public function login()
    {
        if(isset($_POST['username']))
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_checkUser');
            $this->form_validation->set_rules('passwork', 'Password', 'trim|required');
            $username = $this->input->post('username');
            $password = md5($this->input->post('passwork'));
            if(!$this->m_user->loginAdmin($username, $password))
            {
                $data = array(
                    "status" => false,
                    "message" => "Tài khoản hoặc mật khẩu không đúng"
                );
                print_r(json_encode($data));die;
            }else
            {
                $login['login'] = $this->m_user->findUserByUsername($username)[0];
                $this->session->set_userdata($login);
                $data = array(
                    "status" => true,
                    "message" => ""
                );
                print_r(json_encode($data));die;
            }
        }else{
            $this->load->view('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('login');
        redirect(base_url_ci . 'admin/');
    }
    
    public function callback_checkUser($username)
    {
        if (empty($this->m_user->findAdmin($username)))
        {
            $this->form_validation->set_message('username_check', ' không được rỗng');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function callback_checkPhone($phone)
    {
        if (!is_numeric($phone) || $phone < 1)
        {
            $this->form_validation->set_message('callback_checkPhone', ' Số điện thoại không hợp lệ');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function index()
    {
        $data['view'] = 'home';
        $data['countUser'] = $this->m_user->get_total();
        $data['countNews'] = $this->m_news->get_total();
        $this->load->view('admin/index', $data);
    }

    public function listUser()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_user->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['user'] = $this->m_user->searchUser($search, $limit_per_page, $start_index);
                $data['search'] = $search;
            } else {
                $data['user'] = $this->m_user->getuser($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'admin/listUser';
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
        $this->load->view('admin/listUser', $data);
    }

    public function listMap()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_map->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['map'] = $this->m_map->searchMap($search, $limit_per_page, $start_index);
                 $data['search'] = $search;
            } else {
                $data['map'] = $this->m_map->getMapLimit($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'admin/listMap';
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
                $data["links"] = $this->pagination->create_links();
            }
        }
        $this->load->view('admin/listMap', $data);
    }
    
    public function editUser($username)
    {
        if (isset($_POST['email'])) {
            if (empty($this->form_validation_editUser($username))) {
                $data = array(
                    "email" => $_POST['email'],
                    "name" => $_POST['name'],
                    "phone" => $_POST['phone'],
                    "address" => $_POST['address'],
                    "level" => $_POST['level']
                );
                $this->m_user->update($username, $data);
                $data = array(
                    "status" => true,
                    "link" => base_url_ci . 'admin/listUser',
                    "message" => "Cập nhật thành công"
                );
                print_r(json_encode($data));die;
            } else {
                $data = array(
                    "status" => false,
                    "message" => $this->form_validation_editUser()
                );
                print_r(json_encode($data));die;
            }
        }else{
            $data['user'] = $this->m_user->getUserByUsername($username);
            $this->load->view('admin/editUser', $data);
        }
    }

//     public function editUser()
//     {
//         if (isset($_POST['edit'])) {} else {
//             $data['view'] = 'editUser';
//             $this->load->view('admin/editUser', $data);
//         }
//     }

    public function deleteUser($id)
    {
        $this->m_user->delete($id);
        redirect(base_url_ci . 'admin/listUser');
    }

    public function listNews()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_news->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['listnews'] = $this->m_news->searchNews($search, $limit_per_page, $start_index);
                $data['search'] = $search;
            } else {
                $data['listnews'] = $this->m_news->getnews($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'admin/listNews';
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
                $data["links"] = $this->pagination->create_links();
            }
        }
        $this->load->view('admin/listNews', $data);
    }

    public function deleteNews($id)
    {
        $this->m_news->delete($id);
        redirect(base_url_ci . 'admin/listNews');
    }

    public function form_validation_editNews($id=null)
    {
        $dataError = array();
        $data = array(
            "id !=" => $id,
            "title" => $_POST['title']
        );
        if($this->m_news->checkTitleUpdate($data))
        {
            $dataError['title'] = "Tiêu đề đã tồn tại";
        }else{
            if(empty($_POST['title'])){
                $dataError['title'] = "Tiêu đề là không được trống";
            }
        }
        
        if(empty($_POST['summary'])){
            $dataError['summary'] = "Nội dung tóm tắt là không được trống";
        }
        
        if(empty($_POST['source'])){
            $dataError['source'] = "Nguồn là không được trống";
        }
        
        if(!is_numeric($_POST['status']) || $_POST['status'] < 0 || $_POST['status'] > 1){
            $dataError['status'] = "Trang thái không hợp lệ";
        }
        
        return $dataError;
    }

    public function form_validation_addMap()
    {
        $dataError = array();
        $findMap = array(
            "lat" => $_POST['lat'],
            "lng" => $_POST['lng']
        );
        if($this->m_map->findMap($findMap))
        {
            $dataError['lat'] = "Địa chỉ Lat đã tồn tại";
            $dataError['lng'] = "Địa chỉ Lng đã tồn tại";
        }else{
            if(empty($_POST['lat'])){
                $dataError['lat'] = "Địa chỉ Lat là không được trống";
            }else if(!is_numeric($_POST['lat']) || $_POST['lat'] < 1 ){
                $dataError['lat'] = "Địa chỉ Lat không hợp lệ";
            }
            
            if(empty($_POST['lng'])){
                $dataError['lng'] = "Địa chỉ Lng là không được trống";
             }else if(!is_numeric($_POST['lng']) || $_POST['lng'] < 1 ){
                $dataError['lng'] = "Địa chỉ Lng không hợp lệ";
            }
        }
        
        if(empty($_POST['name'])){
            $dataError['name'] = "Địa chỉ là không được trống";
        }else if ($this->m_map->findName($_POST['name'])) {
            $dataError['name'] = "Địa chỉ đã tồn tại";
        }
        
        if(!is_numeric($_POST['status']) || $_POST['status'] < 0 || $_POST['status'] > 1){
            $dataError['status'] = "Trang thái không hợp lệ";
        }
        
        return $dataError;
    }
    
    public function form_validation_editMap($id=null)
    {
        $dataError = array();
        $data1 = array(
            "id != " => $id,
            "lat" => $_POST['lat'],
            "lng" => $_POST['lng']
        );
        $data2 = array(
            "id != " => $id,
            "lat" => $_POST['name']
        );
        if($this->m_map->checkLatAndLngUpdate($data1))
        {
            $dataError['lat'] = "Địa chỉ Lat đã tồn tại";
            $dataError['lng'] = "Địa chỉ Lng đã tồn tại";
        }else{
            if(empty($_POST['lat'])){
                $dataError['lat'] = "Địa chỉ Lat là không được trống";
            }else if(!is_numeric($_POST['lat']) || $_POST['lat'] < 1 ){
                $dataError['lat'] = "Địa chỉ Lat không hợp lệ";
            }
    
            if(empty($_POST['lng'])){
                $dataError['lng'] = "Địa chỉ Lng là không được trống";
            }else if(!is_numeric($_POST['lng']) || $_POST['lng'] < 1 ){
                $dataError['lng'] = "Địa chỉ Lng không hợp lệ";
            }
        }
    
        if(empty($_POST['name'])){
            $dataError['name'] = "Địa chỉ là không được trống";
        }else if ($this->m_map->checkNameUpdate($data2)) {
            $dataError['name'] = "Địa chỉ đã tồn tại";
        }
    
        if(!is_numeric($_POST['status']) || $_POST['status'] < 0 || $_POST['status'] > 1){
            $dataError['status'] = "Trang thái không hợp lệ";
        }
    
        return $dataError;
    }
    
    public function form_validation_editUser($username = null)
    {
        
//         $this->form_validation->set_rules('email', 'Email', 'trim|required', array(
//             'required' => '%s không được để trống'
//         ));
//         $this->form_validation->set_rules('name', 'Họ và Tên', 'trim|required', array(
//             'required' => '%s không được để trống'
//         ));
//         $this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required|callback_checkPhone', array(
//             'required' => '%s không được để trống'
//         ));
//         $this->form_validation->set_rules('address', 'Địa chỉ', 'trim|required', array(
//             'required' => '%s không được để trống'
//         ));
//         return $this->form_validation->run();

        $dataError = array();
        
        if(!$this->m_user->findUsername($username)){
            $dataError['username'] = "Tài khoản không tồn tai";
        }
        
        if(empty($_POST['email'])){
            $dataError['email'] = "Email là không được trống";
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $dataError['email'] = "Vui lòng nhập địa chỉ email hơp lệ";
        }else if(!$this->m_user->checkEmail($username, $_POST['email'])){
            $dataError['email'] = "Email đã tồn tại";
        }
        
        if(empty($_POST['name'])){
            $dataError['name'] = "Họ và lên là không được trống";
        }
        
        if(empty($_POST['phone'])){
            $dataError['phone'] = "Số điện thoại là không được trống";
        }else if(!is_numeric($_POST['phone']) || $_POST['phone'] < 1 ){
            $dataError['phone'] = "Số điện thoại không hợp lệ";
        }
        
        if(empty($_POST['address'])){
            $dataError['address'] = "Địa chỉ là không được trống";
        }
        
        return $dataError;
    }

    public function editNews($id)
    {
        if (!is_numeric($id) || $id < 1 || ! $this->m_news->findID($id)) {
            redirect(base_url_ci . 'admin/listNews');
        }
        if (isset($_POST['title'])) {
            $dataError = $this->form_validation_editNews($id);
            if (empty($dataError)) {
                $data = array(
                    "title" => $_POST['title'],
                    "summary" => $_POST['summary'],
                    "source" => $_POST['source'],
                    "status" => $_POST['status']
                );
                $this->m_news->update($id, $data);
                $data = array(
                    "status" => true,
                    "link" => base_url_ci . 'admin/listNews',
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
            $data['news'] = $this->m_news->getViewByID($id);
            $this->load->view('admin/editNews', $data);
        }
    }

    public function addMap()
    {
        if (isset($_POST['lat'])) {
            $dataError = $this->form_validation_addMap();
            if (empty($dataError)) {
                $data = array(
                    "name" => $_POST['name'],
                    "lat" => $_POST['lat'],
                    "lng" => $_POST['lng'],
                    "status" => $_POST['status']
                );
                $this->m_map->insert($data);
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
            $this->load->view('admin/addMap');
        }
    }

    public function editMap($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_map->findID($id)) {
            redirect(base_url_ci . 'admin/listMap');
        }
        if (isset($_POST['name'])) {
            $dataError = $this->form_validation_editMap($id);
            if (empty($dataError)) {
                $data = array(
                    "name" => $_POST['name'],
                    "lat" => $_POST['lat'],
                    "lng" => $_POST['lng'],
                    "status" => $_POST['status']
                );
                $this->m_map->update($id, $data);
                $data = array(
                    "status" => true,
                    "link" => base_url_ci . 'admin/listNews',
                    "message" => "Cập nhật thành công"
                );
            } else {
                $data = array(
                    "status" => false,
                    "message" => $dataError
                );
                print_r(json_encode($data));die;
            }
        } else {
            $data['map'] = $this->m_map->getMapByID($id);
            $this->load->view('admin/editMap', $data);
        }
        
        $data = array(
            "status" => true,
            "link" => base_url_ci . 'admin/listNews',
            "message" => "Cập nhật thành công"
        );
    }

    public function insertDom()
    {
        if (isset($_POST['insert'])) {
            $mess = '<div class="alert alert-success">Thêm DOM thành công</div>';
            $data = array(
                "url" => $_POST['url'],
                "source" => htmlentities($_POST['source']),
                "pattern" => htmlentities($_POST['pattern']),
                "pattern_detail" => htmlentities($_POST['pattern_detail'])
            );
            $result = $this->m_dom->insert($data);
            if ($result == null)
                $mess = '<div class="alert alert-danger">Lỗi cơ sở dữ liệu</div>';
            $this->load->view('dom/insert', $mess);
        } else {
            $this->load->view('dom/insert');
        }
    }
    

    public function addDom()
    {
        if (isset($_POST['add'])) {
            if ($this->form_validation_editDom()) {
                $data = array(
                    "url" => $_POST['url'],
                    "source" => htmlentities($_POST['source']),
                    "pattern" => htmlentities($_POST['pattern']),
                    "pattern_detail" => htmlentities($_POST['pattern_detail'])
                );
                $sucess['sucess'] = $this->m_dom->insert($data);
                $this->load->view('dom/insert', $sucess);
            } else {
                $this->load->view('dom/inser');
            }
        } else {
            $this->load->view('dom/insert');
        }
    }

    public function deleteDom($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_dom->findID($id)) {
            redirect(base_url_ci . 'admin/listDom');
        }
        $this->m_dom->delete($id);
        redirect(base_url_ci . 'admin/listDom');
    }

    public function deleteMap($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_map->findID($id)) {
            redirect(base_url_ci . 'admin/listMap');
        }
        $this->m_map->delete($id);
        redirect(base_url_ci . 'admin/listMap');
    }

    public function listDom()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_dom->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['dom'] = $this->m_dom->searchDom($search, $limit_per_page, $start_index);
                $data['search'] = $search;
            } else {
                $data['dom'] = $this->m_dom->getDom($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'admin/listDom';
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
                $data["links"] = $this->pagination->create_links();
            }
        }
        $this->load->view('dom/list', $data);
    }

    public function form_validation_editDom()
    {
        $this->form_validation->set_rules('url', 'Địa chỉ Url', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('source', 'Source nguồn', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('pattern', 'Pattern', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('pattern_detail', 'Pattern Detail', 'required', array(
            'required' => '%s không được để trống'
        ));
        return $this->form_validation->run();
    }

    public function editDom($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_dom->findID($id)) {
            redirect(base_url_ci . 'admin/listDom', 'refresh');
        }
        if (isset($_POST['edit'])) {
            if ($this->form_validation_editDom()) {
                $data = array(
                    "url" => $_POST['url'],
                    "source" => htmlentities($_POST['source']),
                    "pattern" => htmlentities($_POST['pattern']),
                    "pattern_detail" => htmlentities($_POST['pattern_detail'])
                );
                $result = $this->m_dom->update($data, $id);
                redirect(base_url_ci . 'admin/listDom', 'refresh');
            } else {
                $this->load->view('dom/edit');
            }
        } else {
            $data['dom'] = $this->m_dom->getDomByID($id);
            $this->load->view('dom/edit', $data);
        }
    }
    
    public function countCamera()
    {
        if (isset($_POST['countCamera'])) {
            $countCamera = $_POST['countCamera'];
            if(is_numeric($countCamera) && $countCamera > 0){
                $data = array(
                    "count_camera" => $countCamera
                );
                $result = $this->m_home->updateCount($data);
                $data = array(
                    "status" => true,
                    "message" => "Cập nhật thành công số camera hot"
                );
                print_r(json_encode($data));die;
            }else{
                $data = array(
                    "status" => false,
                    "message" => "Số nhập không hợp lệ!"
                );
                print_r(json_encode($data));die;
            }
    
        }else{
            $data["countCamera"] = $this->m_home->getHome()["count_camera"];
            $this->load->view('countCamera/countCamera',$data);
        }
    }

    public function countNews()
    {
        if (isset($_POST['countNews'])) {
            $countNew = $_POST['countNews'];
            if(is_numeric($countNew) && $countNew > 0){
                $data = array(
                    "count_news" => $countNew
                );
                $result = $this->m_home->updateCount($data);
                $data = array(
                    "status" => true,
                    "message" => "Cập nhật thành công số bản tin hot"
                );
                print_r(json_encode($data));die;
            }else{
                $data = array(
                    "status" => false,
                    "message" => "Số nhập không hợp lệ!"
                );
                print_r(json_encode($data));die;
            }
            
        }else{
            $data["countNews"] = $this->m_home->getHome()["count_news"];
            $this->load->view('countNew/countNews',$data);
        }
    }

    public function countMap()
    {
        if (isset($_POST['countMap'])) {
            $countMap = $_POST['countMap'];
            if(is_numeric($countMap) && $countMap > 0){
                $data = array(
                    "count_map" => $countMap
                );
                $result = $this->m_home->updateCount($data);
                $data = array(
                    "status" => true,
                    "message" => "Cập nhật thành công số bản đồ hot"
                );
                print_r(json_encode($data));die;
            }else{
                $data = array(
                    "status" => false,
                    "message" => "Số nhập không hợp lệ!"
                );
                print_r(json_encode($data));die;
            }
        }
        else{
            $data["countMap"] = $this->m_home->getHome()["count_map"];
            $this->load->view('countMap/countMap', $data);
        }
    }
    
    // public function editNews($id)
    // {
    // if (isset($_POST ['edit'])) {
    // if ($this->form_validation_news()) {
    // $data = array (
    // 'title' => $_POST ['title'],
    // 'image' => $_POST ['image'],
    // 'summary' => $_POST ['summary'],
    // 'link_detail' => $_POST ['link_detail'],
    // 'status' => $_POST ['status']
    // );
    // $mess = "Edit thành công {$id}";
    // redirect(base_url_ci . 'admin/listNews');
    // } else {
    // return $this->load->view('admin/editNews');
    // }
    // } else {
    // $this->load->view('admin/editNews');
    // }
    // }
    public function form_validation_news()
    {
        $this->form_validation->set_rules('title', 'Title', 'required', array(
            'required' => 'Không được để trống'
        ));
        $this->form_validation->set_rules('image', 'Image', 'required', array(
            'required' => 'Không được để trống'
        ));
        $this->form_validation->set_rules('summary', 'Summary', 'required', array(
            'required' => 'Không được để trống'
        ));
        $this->form_validation->set_rules('link_detail', 'Link_detail', 'required', array(
            'required' => 'Không được để trống'
        ));
        $this->form_validation->set_rules('status', 'Status', 'required', array(
            'required' => 'Không được để trống'
        ));
        
        return $this->form_validation->run();
    }

    public function list_user()
    {
        $this->load->view('admin/listUser');
    }
}