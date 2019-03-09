<div class="move-text">
    <div class="breaking_news">
        <h2>Tin tức tổng hợp</h2>
    </div>
    <div class="marquee">
    <?php foreach ($hotNews as $val){?>
        <div class="marquee1"><a class="breaking" href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
        <?php echo $val['title'];?></a></div>
     <?php }?>          
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <script type="text/javascript" src="<?php echo base_url_ci;?>public/js/jquery.marquee.js"></script>
    <script>
    $('.marquee').marquee({
        pauseOnHover: true
    });
    //@ sourceURL=pen.js
    </script>
</div>