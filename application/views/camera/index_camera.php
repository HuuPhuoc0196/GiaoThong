<?php $data['data'] = 'Camera';?>
<?php $data['camera'] = 'class="act"';?>
<?php $this->load->view('template/header',$data);?>

<script src="<?php echo base_url_ci;?>public/js/camera.js"></script>
<div class="banner-bottom">
    <div class="container container_bg">

       
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
            <span id="result-map"></span>
                <div class="video-grids-left2">
                <?php if(!empty($camera)){?>
                <?php 
                    $src = $camera[0]['src'];
                    $indexSearch = strripos($src, "=black");
                    $src = substr($src, 0, $indexSearch + 6);
                    $src = $src . "&t=" . strtotime(date("Y-m-d h:i:sa"));
                ?>
                <a href="<?php echo $src;?>">
                	<img src="<?php echo $src;?>" class="w-100 h-550 mb-10 camera">
                 	<i class="fa fa-video-camera pl-20"></i> <span><?php echo $camera[0]['name'];?><span></a>
                <?php }?>
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                <form class=".pt-10-custom" action="<?php echo base_url_ci;?>camera/index" method="post">
                	<span><?php if(empty($camera)){echo "Không tìm thấy!";}?></span>
                    <input type="search" placeholder="Tìm kiếm camera" name="search"
                     value="<?php if(isset($search)) echo $search?>">
                    <button type="submit" id="search" style="display: none;"></button>
                </form>
                
            <div class="clock-grids wow fadeInUp animated" data-wow-delay=".5s">
                <div class="clock-heading">
                    <h3>Đồng Hồ</h3>
                </div>
                <div class="clock-left">
                    <div id="myclock"></div>
                </div>
                <div class="clock-bottom">
                    <div class="clock">
                        <div id="Date"></div>
                        <ul>
                            <li id="hours"> </li>
                            <li id="point">:</li>
                            <li id="min"> </li>
                            <li id="point">:</li>
                            <li id="sec"> </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="clearfix"> </div>
        
        <!-- //video-grids -->
        <div class="mt-30">
        	<a href="" class="cam">Hệ thống camera</a>
        </div>
            <?php for($i = 1; $i < count($camera); $i++){?>
            <?php 
                    $src = $camera[$i]['src'];
                    $indexSearch = strripos($src, "=black");
                    $src = substr($src, 0, $indexSearch + 6);
                    $src = $src . "&t=" . strtotime(date("Y-m-d h:i:sa"));
                ?>
                <?php if($i == 1 || $i == 4 || $i == 7){
                    echo '<div class="video-grids">';
                }?>
                
            <div class="col-md-4 img_cam">
            	<a href="<?php echo $src;?>">
               	 	<img src="<?php echo $src;?>" class="camera mb-10">
                	<i class="fa fa-video-camera"></i> <span><?php echo $camera[$i]['name'];?><span></a>
            </div>
            
        <?php if($i == 3 || $i == 6 || $i == 9 || $i == (count($camera) - 1)){
                    echo '</div>';
                }?>
       <?php }?>
        <ul class="pagination modal-3">
                        <?php if (isset($links)) { ?>
                            <?php echo $links ?>
                        <?php }?>
                    </ul>
        
        
        

                   </div>

</div>
<script>
var myVar = setInterval(Camera.showImageUrl, 5000);

document.onkeyup = function (event) {
	  if (event.which == 13 || event.keyCode == 13) {
		  $('#search').click();
	  }
};
</script>
<?php $this->load->view('template/footer');?>