<?php $this->load->view('template/header_news');?>
<?php $menu_class['news'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/content_news');?>
<?php $this->load->view('template/footer');?>