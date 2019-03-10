<?php $data['data'] = 'Camera';?>
<?php $data['camera'] = 'class="act"';?>
<?php $this->load->view('template/header',$data);?>
<?php $this->load->view('template/share');?>

<div class="banner-bottom">
    <div class="container container_bg">

       
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
            <span id="result-map"></span>
                <div class="video-grids-left1" id="googleMap">
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                <form>
                    <input type="search" placeholder="Tìm kiếm camera">
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
        <a href="" class="cam">Hệ thống camera</a>
        <div class="video-grids">
            
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
           
        </div>
        <div class="video-grids">
            
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
           
        </div>
        <div class="video-grids">
            
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
            <div class="col-md-3 img_cam">
                <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" class="camera">
                <a href=""><i class="fa fa-video-camera"></i> <span>ádfghjk<span></a>
            </div>
           
        </div>
        <ul class="pagination modal-3">
                        <li><a href="#" class="prev1">Trang đầu</a></li>
                        <li><a href="#" class="prev">&laquo;</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#">5</a></li>
                        <li> <a href="#">6</a></li>
                        <li> <a href="#">7</a></li>
                        <li> <a href="#">8</a></li>
                        <li> <a href="#">9</a></li>
                        <li><a href="#" class="next">&raquo;</a></li>
                        <li><a href="#" class="prev1">Trang cuối</a></li>
                    </ul>
        
        
        

                   </div>

</div>
            
<?php $this->load->view('template/footer');?>