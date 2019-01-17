<?php $this->load->view('template/header_contact');?>
<?php $menu_class['contact'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/content_contact');?>
<?php $this->load->view('template/footer');?>