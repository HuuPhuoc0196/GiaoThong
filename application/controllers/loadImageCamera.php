<?php

class LoadImageCamera extends CI_Controller {

    public function index()
    {
        $src = "";
        if (isset($_POST['src']) && ! empty($_POST['src'])) {
            $src = $_POST['src'];
        }
        $data['src'] = $src;
        $this->load->view('loadImage/index',$data);
    }
}