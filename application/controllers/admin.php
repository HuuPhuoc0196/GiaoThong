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
        if(isset($_POST['login']))
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_checkUser');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            if(!$this->m_user->loginAdmin($username, $password))
            {
                $data ['error_login'] = "Tài khoản hoặc mật khẩu không đúng";
                $this->load->view('login',$data);
            }else
            {
                $login['login'] = $this->m_user->findUserByUsername($username)[0];
                $this->session->set_userdata($login);
                redirect(base_url_ci . 'admin/');
            }
            
        }else {
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

    public function index()
    {
        $data['view'] = 'home';
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
        $this->load->view('admin/list_user', $data);
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

    public function editUser()
    {
        if (isset($_POST['edit'])) {} else {
            $data['view'] = 'editUser';
            $this->load->view('admin/index', $data);
        }
    }

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

    public function form_validation_editNews()
    {
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('summary', 'Nội dung tóm tắt', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('source', 'Source nguồn', 'required', array(
            'required' => '%s không được để trống'
        ));
        return $this->form_validation->run();
    }

    public function form_validation_editMap()
    {
        $this->form_validation->set_rules('name', 'Địa chỉ', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('lat', 'Lat', 'required', array(
            'required' => '%s không được để trống'
        ));
        $this->form_validation->set_rules('lng', 'Lng', 'required', array(
            'required' => '%s không được để trống'
        ));
        return $this->form_validation->run();
    }

    public function editNews($id)
    {
        if (! is_numeric($id) || $id < 1 || ! $this->m_news->findID($id)) {
            redirect(base_url_ci . 'admin/listNews');
        }
        if (isset($_POST['update'])) {
            if ($this->form_validation_editNews()) {
                $data = array(
                    "title" => $_POST['title'],
                    "summary" => $_POST['summary'],
                    "source" => $_POST['source'],
                    "status" => $_POST['status']
                );
                $this->m_news->update($id, $data);
                redirect(base_url_ci . 'admin/listNews');
            } else {
                $this->load->view('admin/editNews', $data);
            }
        } else {
            $data['news'] = $this->m_news->getViewByID($id);
            $this->load->view('admin/editNews', $data);
        }
    }

    public function addMap()
    {
        if (isset($_POST['add'])) {
            if ($this->form_validation_editMap()) {
                $findMap = array(
                    "lat" => $_POST['lat'],
                    "lng" => $_POST['lng']
                );
                $datafind = $this->m_map->findMap($findMap);
                if($datafind != null)
                {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $data = array(
                        "status" => "1",
                        'pushdate' => date("y-m-d H:i:s")
                    );
                    $this->m_map->update($datafind['id'], $data);
                    $sucess['sucess'] = $datafind['id'];
                    $this->load->view('admin/addMap', $sucess);
                }
                $data = array(
                    "name" => $_POST['name'],
                    "lat" => $_POST['lat'],
                    "lng" => $_POST['lng'],
                    "status" => $_POST['status']
                );
                $sucess['sucess'] = $this->m_map->insert($data);
                $this->load->view('admin/addMap', $sucess);
            } else {
                $this->load->view('admin/addMap');
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
        if (isset($_POST['update'])) {
            if ($this->form_validation_editMap()) {
                $data = array(
                    "name" => $_POST['name'],
                    "lat" => $_POST['lat'],
                    "lng" => $_POST['lng'],
                    "status" => $_POST['status']
                );
                $this->m_map->update($id, $data);
                redirect(base_url_ci . 'admin/listMap');
            } else {
                $this->load->view('admin/editMap');
            }
        } else {
            $data['map'] = $this->m_map->getMapByID($id);
            $this->load->view('admin/editMap', $data);
        }
    }

    public function insertDom()
    {
        if (isset($_POST['insert'])) {
            $mess = '<div class="alert alert-success">Thêm DOM thành công</div>';
            $data = array(
                "url" => $_POST['url'],
                "source" => $_POST['source'],
                "pattern" => $_POST['pattern'],
                "pattern_detail" => $_POST['pattern_detail']
            );
            $result = $this->m_dom->insert($data);
            if ($result == null)
                $mess = '<div class="alert alert-danger">Lỗi cơ sở dữ liệu</div>';
            $this->load->view('dom/insert', $mess);
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
                    "source" => $_POST['source'],
                    "pattern" => $_POST['pattern'],
                    "pattern_detail" => $_POST['pattern_detail']
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

    public function addDom()
    {
        if (isset($_POST['add'])) {
            if ($this->form_validation_editDom()) {
                $data = array(
                    "url" => $_POST['url'],
                    "source" => $_POST['source'],
                    "pattern" => $_POST['pattern'],
                    "pattern_detail" => $_POST['pattern_detail']
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

    public function countNews()
    {
        if (isset($_POST['countNews'])) {
            $data = array(
                "count_news" => $_POST['count_news']
            );
            $result = $this->m_home->updateCount($data);
        }
        $data["countNews"] = $this->m_home->getHome()["count_news"];
        $this->load->view('home/countNews', $data);
    }

    public function countMap()
    {
        if (isset($_POST['countMap'])) {
            $data = array(
                "count_map" => $_POST['count_map']
            );
            $result = $this->m_home->updateCount($data);
        }
        $data["countMap"] = $this->m_home->getHome()["count_map"];
        $this->load->view('map/countMap', $data);
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
        $this->load->view('admin/list_user');
    }
}