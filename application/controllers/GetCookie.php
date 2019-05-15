<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCookie extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_map');
        $this->load->model('m_home');
        $this->load->model('m_camera');
    }
    
    public function index()
    {
        $this->load->view('getCookie/getCookie');
    }
}
