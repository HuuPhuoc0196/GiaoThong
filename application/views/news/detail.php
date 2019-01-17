<?php
$title['title'] = 'Tin tức';
$this->load->view('template/header', $title);
$this->load->view('template/menu');
?>

<!--content-->
<div class="row content_detail">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 main_detail" >
    <?php echo $result_news['source'];?>
        <h1 class="title_detail"><?php echo $result_news['title'];?></h1>
        <p class="timepost_detail"><?php echo $result_detail['time_post'];?></p>
        <p class="content_main_detail" ><?php echo $result_detail['content_detail'];?></p>
        <p class="author_detail"><?php echo $result_detail['author'];?></p>
    </div>
    <div class="col-sm-2"></div>
</div>
<!--//content-->
    <?php
    
$this->load->view('template/footer');
?>
