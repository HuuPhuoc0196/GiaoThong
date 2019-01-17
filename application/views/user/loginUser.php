
<?php $this->load->view('template/header_login_user');?>
<?php $menu_class['home'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/content_login_user');?>
<?php $this->load->view('template/footer');?>