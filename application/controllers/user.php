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
	}
	
	public function index()
	{
		$this->load->view('user/loginUser');
	}
	
	public function login()
	{
	    if(isset($_POST['login']))
	    {
	        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_checkUser');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
	        $username = $this->input->post('username');
	        $password = md5($this->input->post('password'));
	        if(!$this->m_user->login($username, $password))
	        {
	            $data ['error_login'] = "Tài khoản hoặc mật khẩu không đúng";
	            $this->load->view('user/loginUser',$data);
	        }else
	        {
	            $login['user'] = $this->m_user->findUserByUsername($username)[0];
	            $this->session->set_userdata($login);
	            redirect(base_url_ci . 'home/');
	        }
	    
	    }else {
	        $this->load->view('user/loginUser');
	    }
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
		if (isset($_POST ['register'])) {
			if ($this->form_validation()) {
				// ad user
				$username = $_POST ['username'];
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$data = array (
						'username' => $username,
						'password' => md5($_POST ['password']),
						'name' => $_POST ['name'],
						'email' => $_POST ['email'],
						'phone' => $_POST ['phone'],
						'address' => $_POST ['address'],
						'level' => 0,
						'create_date' => date("y-m-d H:i:s") 
				);
				$this->m_user->insert($data);
				$infoUser['infoUser'] = array (
						'username' => $username,
						'password' => $_POST ['password'] 
				);
				$this->session->set_userdata($infoUser);
				
				redirect(base_url_ci . 'user/login');
			} else {
				return $this->load->view('user/register');
			}
		} else {
			$this->load->view('user/register');
		}
	}
	
	public function updateProfile()
	{
		$data_user ['user'] = $this->m_user->findUserByUsername($_SESSION ['username']) [0];
		$this->session->set_userdata($data_user);
		if (isset($_POST ['update'])) {
			if ($this->form_validation_update()) {
				$username = $_SESSION ['username'];
				$password = md5($_POST ['password']);
				if ($this->m_user->checkEmail($username, $_POST ['email'])) {
					if ($this->m_user->login($username, $password)) {
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$data = array (
								'name' => $_POST ['name'],
								'email' => $_POST ['email'],
								'phone' => $_POST ['phone'],
								'address' => $_POST ['address'] 
						);
						$this->m_user->update($username, $data);
						redirect(base_url_ci . 'user/updateProfile');
					} else {
						$update ['error_password'] = 'Mật khẩu không đúng';
						return $this->load->view('user/updateProfile', $update);
					}
				} else {
					$update ['error_email'] = 'Email đã tồn tại';
					return $this->load->view('user/updateProfile', $update);
				}
			} else {
				return $this->load->view('user/updateProfile');
			}
		} else {
			$this->load->view('user/updateProfile');
		}
	}
	
	public function form_validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]|is_unique[tbluser.username]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'is_unique' => '%s đã tồn tại',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[3]|max_length[50]|matches[password]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự',
				'matches' => 'Mật khẩu không trùng khớp' 
		));
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|max_length[100]|valid_email|is_unique[tbluser.email]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 100 ký tự',
				'is_unique' => '%s đã tồn tại',
				'valid_email' => 'Email không hợp lệ' 
		));
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[3]|max_length[12]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 12 ký tự' 
		));
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[3]|max_length[100]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 100 ký tự' 
		));
		
		return $this->form_validation->run();
	}
	public function form_validation_update()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|max_length[100]|valid_email', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 100 ký tự',
				'is_unique' => '%s đã tồn tại',
				'valid_email' => 'Email không hợp lệ' 
		));
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 50 ký tự' 
		));
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[3]|max_length[12]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 12 ký tự' 
		));
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[3]|max_length[100]', array (
				'required' => 'Không được để trống',
				'min_length' => 'Chiều dài tối thiệu phải lớn hơn 3 ký tự',
				'max_length' => 'Chiều dài tối đa không được lớn hơn 100 ký tự' 
		));
		
		return $this->form_validation->run();
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
	
	// khi có lỗi GUI: echo validation_error('<div class="alert alert-danger">,'</div>');
	public function login_validation()
	{
	
	}
	
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
	
}