<?php

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_contact');
        $this->load->helper('email');
        $this->load->library('pagination');
    }
    
    public function index()
    {
        $this->load->view('contact/contact');
    }
    
    public function contact(){
        if(isset($_POST['name']))
        {
            $dataError = $this->valid_contact();
            if (!empty($dataError)) {
                $data = array(
                    "status" => false,
                    "message" => $dataError
                );
                print_r(json_encode($data));die;
            }
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dataInsert = array(
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "content" => $_POST['content'],
                'create_date' => date("y-m-d H:i:s")
            );
            $this->m_contact->insert($dataInsert);
            $this->sendEmail($dataInsert['email']);
            print_r(json_encode($data));die;
            
        }else {
            $this->load->view('contact/contact');
        }
    }
    
    public function valid_contact(){
        $dataError = array();
    
        if(empty($_POST['name'])){
            $dataError['name'] = "Họ và Tên là không được trống";
        }
         
        if(empty($_POST['email'])){
            $dataError['email'] = "Email là không được trống";
        }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
            $dataError['email'] = "Vui lòng nhập địa chỉ email hợp lệ!";
        }
        
        if(empty($_POST['content'])){
            $dataError['content'] = "Nội dung là không được trống";
        }
         
        return $dataError;
    }
    
    public function deleteContact($id)
    {
        $this->m_contact->delete($id);
        redirect(base_url_ci . 'contact/listContact');
    }
    
    public function listContact()
    {
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $start_index = $start_index * $limit_per_page;
        $total_records = $this->m_contact->get_total();
        if ($total_records > 0) {
            // get current page records
            if (isset($_POST['search']) && ! empty($_POST['search'])) {
                $search = $_POST['search'];
                $data['contact'] = $this->m_contact->searchContact($search, $limit_per_page, $start_index);
                $data['search'] = $search;
            } else {
                $data['contact'] = $this->m_contact->getContactList($limit_per_page, $start_index);
                $config['base_url'] = base_url_ci . 'contact/listContact';
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
                $data['contactPage'] = "class='active'";
            }
        }
        $this->load->view('admin/listContact', $data);
    }
    
    public function sendEmail($email){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hotrocanhbaogiaothong@gmail.com', // change it to yours
            'smtp_pass' => 'choancuc', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
            );
    
        $message = "Lời gớp ý của bạn đã được chúng tôi ghi nhận  
            <br/> Lời gớp ý của bạn là gớp phần hoàn thiện cho hệ thống
            <br/> Chúng tôi rất cảm ơn vì lời gớp ý của bạn";
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('hotrocanhbaogiaothong@gmail.com'); // change it to yours
        $this->email->to($email);// change it to yours
        $this->email->subject('Thông báo đã ghi nhận thông tin gớp ý');
        $this->email->message($message);
        if($this->email->send()){
            $data = array(
                "status" => true,
                "message" => "Lời gớp ý của bạn đã được chúng tôi ghi nhận"
            );
            print_r(json_encode($data));die;
        }else {
            show_error($this->email->print_debugger());
        }
    }
}