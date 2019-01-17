<?php $this->load->view('template/header');?>
<?php $menu_class['home'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('container');?>
<?php $this->load->view('template/footer');?>