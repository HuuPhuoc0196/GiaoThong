<?php

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_contact');
        $this->load->helper('email');
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
            $data = array(
                "status" => true,
                "message" => "Chúng tôi đã ghi nhận thông tin từ bạn"
            );
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
}