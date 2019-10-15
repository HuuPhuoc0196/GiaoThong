<?php

class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('email');
		$this->load->library('upload');
	}
	
	public function index()
	{
		$this->load->view('user/login_user');
	}
	
	public function profile()
	{
		$this->load->view('user/profile');
	}
	
	public function login()
	{
	    if(isset($_POST['username']))
	    {
	     $dataError = $this->valid_login();
            if (!empty($dataError)) {
                $data = array(
                    "status" => false,
                    "message" => $dataError
                );
                print_r(json_encode($data));die;
            }
	        $username = $this->input->post('username');
	        $password = md5($this->input->post('password'));
	        if(!$this->m_user->login($username, $password))
	        {
	            $data = array(
                    "status" => false,
                    "message" => array(
                        "login" => "Tài khoản hoặc mật khẩu không hợp lệ!"
                    )
                );
                print_r(json_encode($data));die;
	        }else
	        {
	            $login['user'] = $this->m_user->findUserByUsername($username)[0];
	            $this->session->set_userdata($login);
	            $data = array(
	                "status" => true,
	                "message" => "",
	                "data" => base_url_ci . 'home/'
	            );
	            print_r(json_encode($data));die;
	        }
	    
	    }else {
	        $this->load->view('user/login_user');
	    }
	}
	
	public function valid_login(){
	    $dataError = array();
	   
	    if(empty($_POST['username'])){
	        $dataError['username'] = "Tài khoản là không được trống";
	    }
	    
	    if(empty($_POST['password'])){
	        $dataError['password'] = "Mật khẩu là không được trống";
	    }
	    
	    return $dataError;
	}
	
	public function callback_checkUser($username)
	{
	    if (empty($this->m_user->findIDByUsername($username)))
	    {
	        $this->form_validation->set_message('username_check', ' không được rỗng');
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	}
	
	public function register()
	{
		if (isset($_POST ['username'])) {
		    $dataError = $this->form_validation();
			if (empty($dataError)) {
				// ad user
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$data = array (
						'username' => $_POST ['username'],
						'password' => md5($_POST ['password']),
						'name' => $_POST ['name'],
						'email' => $_POST ['email'],
						'phone' => $_POST ['phone'],
						'address' => $_POST ['address'],
						'level' => 0,
						'create_date' => date("y-m-d H:i:s") 
				);
				$this->m_user->insert($data);
				$data = array(
	                "status" => true,
	                "message" => "Đăng ký thành công"
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
			$this->load->view('user/register');
		}
	}

	public function updateProfile()
	{
	    if (isset($_POST ['username'])) {
	        $username = $_POST ['username'];
	        $dataError = $this->form_validation_update();
	        if (empty($dataError)) {
	            // ad user
	            $data = array (
					'name' => $_POST ['name'],
					'email' => $_POST ['email'],
					'phone' => $_POST ['phone'],
					'address' => $_POST ['address']
    			);
	            if($_POST ['filename'] !== ""){
	                $urlImage = $_POST ['urlImage'];
	                file_put_contents('public/images/' . $_POST ['filename'], file_get_contents($urlImage));
	                $data["filename"] = $_POST ['filename'];
	            }
    			$this->m_user->update($username, $data);
	            $data = array(
	                "status" => true,
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
	    }
	}
	
	public function changePasswork()
	{
	    if (isset($_POST ['username'])) {
	        $username = $_POST ['username'];
	        $dataError = $this->form_validation_changePassword();
	        if (empty($dataError)) {
	            // ad user
	            $data = array (
					'password' => md5($_POST['newPassword'])
    			);
    			$this->m_user->update($username, $data);
	            $data = array(
	                "status" => true,
	                "message" => "Thay đổi mât khẩu thành công"
	            );
	            print_r(json_encode($data));die;
	        } else {
	            $data = array(
	                "status" => false,
	                "message" => $dataError
	            );
	            print_r(json_encode($data));die;
	        }
	    }
	}
	
	public function forgotPasswork()
	{
	    $email = $_POST['email'];
	    if (isset($email)) {
	        $dataError = $this->form_validation_forgot();
	        if (empty($dataError)) {
	            $newPassword = (new DateTime)->getTimestamp();
	            $username = $this->m_user->findUsernameByEmail($email);
	            $data = array (
	                'password' => md5($newPassword)
	            );
	            $this->m_user->update($username, $data);
	            $this->sendEmail($email,$newPassword);
	        } else {
	            $data = array(
	                "status" => false,
	                "message" => $dataError
	            );
	            print_r(json_encode($data));die;
	        }
	    }
	}
	
	public function showProfile(){
	    if (isset($_POST ['username'])) {
	        $username = $_POST ['username'];
	        $dataUser = $this->m_user->getUserByUsername($username);
	        $data = array(
	            "status" => true,
	            "data" => $dataUser
	        );
	        print_r(json_encode($data));die;
	    }
	}
	
	public function form_validation()
	{

	    $dataError = array();
	   
	    if($this->m_user->checkUsernameAdd($_POST['username'])){
	        $dataError['username'] = "Tên đăng nhập đã tồn tại";
	    }else if(empty($_POST['username'])){
	        $dataError['username'] = "Tên đăng nhập là không được trống";
	    }
	    
	    if($this->m_user->checkEmailAdd($_POST['email'])){
	        $dataError['email'] = "Địa chỉ email đã tồn tại";
	    }else if(empty($_POST['email'])){
	        $dataError['email'] = "Địa chỉ email là không được trống";
	    }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
            $dataError['email'] = "Vui lòng nhập địa chỉ email hợp lệ!";
        }

	    if($this->m_user->checkPhoneAdd($_POST['phone'])){
	        $dataError['phone'] = "Số điện thoại đã tồn tại";
	    }else if(empty($_POST['phone'])){
	        $dataError['phone'] = "Số điện thoại là không được trống";
	    }else if(!is_numeric($_POST['phone']) || $_POST['phone'] < 1 ){
            $dataError['phone'] = "Số điện thoại không hợp lệ";
        }
	    
	    if(empty($_POST['password'])){
	        $dataError['password'] = "Mật khẩu là không được trống";
	    }
	    
	    if(empty($_POST['re_password'])){
	        $dataError['re_password'] = "Vui lòng nhập lại mật khẩu";
	    }else if($_POST['re_password'] !== $_POST['password']){
	        $dataError['re_password'] = "Nhập lại mật khẩu không đúng";
	    }
	    
	    if(empty($_POST['name'])){
	        $dataError['name'] = "Họ và tên là không được trống";
	    }
	    
	    return $dataError;
	}
	
	
	public function form_validation_forgot()
	{
		$dataError = array();
		if(empty($_POST['email'])){
	        $dataError['email-reset'] = "Vui lòng nhập địa chỉ email hợp lệ!";
	    }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
	        $dataError['email-reset'] = "Địa chỉ email là không được trống";
	    }else  if(!$this->m_user->checkEmailAdd($_POST['email'])){
            $dataError['email-reset'] = "Địa chỉ email không tồn tại!";
        }
	    
	    return $dataError;
	}
	public function form_validation_update()
	{
		$dataError = array();

		if(!$this->m_user->findUsername($_POST['username'])){
		    $dataError['username_profile'] = "Tài khoản không tồn tại";
		}
		
		if(empty($_POST['password'])){
		    $dataError['password_profile'] = "Mật khẩu là không được trống";
		}else if(!$this->m_user->login($_POST['username'],md5($_POST['password']))){
	        $dataError['password_profile'] = "Mật khẩu không đúng";
	    }
	    
	    if(!$this->m_user->checkEmail($_POST['username'],$_POST['email'])){
	        $dataError['email_profile'] = "Địa chỉ email đã tồn tại";
	    }else if(empty($_POST['email'])){
	        $dataError['email_profile'] = "Địa chỉ email là không được trống";
	    }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
            $dataError['email_profile'] = "Vui lòng nhập địa chỉ email hợp lệ!";
        }

	    if(!$this->m_user->checkPhone($_POST['username'],$_POST['email'])){
	        $dataError['phone_profile'] = "Số điện thoại đã tồn tại";
	    }else if(empty($_POST['phone'])){
	        $dataError['phone_profile'] = "Số điện thoại là không được trống";
	    }else if(!is_numeric($_POST['phone']) || $_POST['phone'] < 1 ){
            $dataError['phone_profile'] = "Số điện thoại không hợp lệ";
        }
	    
	    if(empty($_POST['name'])){
	        $dataError['name_profile'] = "Họ và tên là không được trống";
	    }
	    
	    return $dataError;
	}
	
	public function form_validation_changePassword()
	{
	    $dataError = array();
	
	    if(!$this->m_user->findUsername($_POST['username'])){
	        $dataError['username_profile_change'] = "Tài khoản không tồn tại";
	    }
	
	    if(empty($_POST['password'])){
	        $dataError['password-old'] = "Mật khẩu là không được trống";
	    }else if(!$this->m_user->login($_POST['username'],md5($_POST['password']))){
	        $dataError['password-old'] = "Mật khẩu không đúng";
	    }
	    
	    if(empty($_POST['newPassword'])){
	        $dataError['password-new'] = "Mật khẩu mới là không được trống";
	    }
	    
	    if(empty($_POST['rePasswordNew'])){
	        $dataError['re-password-new'] = "Vui lòng nhập lại mật khẩu";
	    }else if($_POST['rePasswordNew'] !== $_POST['newPassword']){
	        $dataError['re-password-new'] = "Mật khẩu không khớp";
	    }
	     
	    return $dataError;
	}
	
	public function form_validation_changeUser()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[3]|max_length[50]|matches[new_password]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự',
				'matches' => 'Mật khẩu không trùng khớp' 
		));
		return $this->form_validation->run();
	}
	
	public function changePassword()
	{
		if (isset($_POST ['change'])) {
			if ($this->form_validation_changeUser()) {
				if ($this->m_user->login($username, $password)) {
					$data = array (
							'password' => $_POST ['new_password'] 
					);
					$this->m_user->changePassword($username, $data);
					redirect(base_url_ci . 'user/');
				} else {
					$update ['error_password'] = 'Mật khẩu không đúng';
					return $this->load->view('user/changePassword', $update);
				}
			} else {
				return $this->load->view('user/changePassword');
			}
		}
	}
	
	public function checkUser($username)
	{
		
		if (!$this->m_user->findUsername($username)) {
			$this->form_validation->set_message('checkUser', "{$username} không tồn tại");
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
// 	// khi có lỗi GUI: echo validation_error('<div class="alert alert-danger">,'</div>');
// 	public function login_validation()
// 	{
	
// 	}
	
	public function checklogin()
	{
		if ($this->session->userdata('username') != '') {
			return true;
		} else {
			return false;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url_ci . 'user/login');
	}
	public function loginUser()
	{
	    $this->load->view('user/loginUser');
	}
	
	public function sendEmail($email,$newPassword){
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

          $message = "Mật khẩu mới của bạn là: " . $newPassword;
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('hotrocanhbaogiaothong@gmail.com'); // change it to yours
          $this->email->to($email);// change it to yours
          $this->email->subject('Thông tin lấy lại mật khẩu');
          $this->email->message($message);
          if($this->email->send()){
             $data = array(
                 "status" => true,
                 "message" => "Thông tin lấy lại tài khoản của bạn đã được gửi về email. <br/> Vui lòng check email của bạn"
             );
            print_r(json_encode($data));die;
         }else {
            show_error($this->email->print_debugger());
         }
	}
	
}