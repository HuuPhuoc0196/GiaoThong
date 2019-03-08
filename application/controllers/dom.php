<?php
class Dom extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dom');
    }
}