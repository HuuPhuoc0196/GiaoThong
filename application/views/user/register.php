<?php $this->load->view('template/header_register');?>
<?php $menu_class['register'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/content_register');?>
<?php $this->load->view('template/footer');?>