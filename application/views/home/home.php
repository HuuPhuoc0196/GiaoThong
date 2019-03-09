<?php $data['data'] = 'Trang chủ';?>
<?php $data['home'] = ' class="act"';?>
<?php $this->load->view('template/header_home',$data);?>
<script src="<?php echo base_url_ci;?>public/js/adminCamera.js"></script>
<div id="top" class="callbacks_container">
    <ul class="rslides" id="slider3">
	<?php foreach ($hotNews as $val){?>
        <li>
            <div class="banner-info-slider">
                <ul>
                    <li><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
                    <?php
                    $source = $val['source'];
                    $source = str_replace("http://","",$source);
                    $source = str_replace("www.","",$source);
                    $source = str_replace(".com","",$source);
                    $source = str_replace(".vn","",$source);
                    echo $source;?>

                    </a></li>
                    <li><?php echo $val['time_post'];?></li>
                </ul>
                <h1><?php echo $val['title'];?></h1>
                <p><?php echo $val['summary'];?>
                    <span></span></p>
                <div class="more">
                    <a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>" class="type-1">
                        <span> Xem ngay </span>
                        <span> Xem ngay </span>
                    </a>
                </div>
            </div>
        </li>
	<?php }?>
    </ul>
</div>
</div>
</div>
</div>
<!-- banner -->
<?php $this->load->view('template/share');?>
<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container container_bg">

        <?php $this->load->view('template/move_text');?>
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
                <div class="video-grids-left1">
                   
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                 <?php $this->load->view('template/weather');?>  
            </div>
            <div class="clearfix"> </div>
        
        <!-- //video-grids -->
        <a href="" class="cam">Hệ thống camera</a>
        <div class="video-grids">
            <?php foreach ($listCamera as $val){?>
                <div class="col-md-3 img_cam">
                    <img src="<?php echo $val['src'];?>" class="camera">
                  <a href=""><i class="fa fa-play-circle"></i> <span><?php echo $val['name'];?><span></a>
                </div>
            <?php }?>
        </div>
        <!-- news-and-events -->
        <div class="news">
            <div class="news-grids">
                <div class="col-md-8 news-grid-left">
                    <h3>Bản tin tổng hợp</h3>
                    <ul>
                    <?php foreach ($listNews as $val){?>
                        <li>
                            <div class="news-grid-left1">
                                <img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" alt="" class="img-responsive" />
                            </div>
                            <div class="news-grid-right1">
                                <h4><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php echo $val['title'];?></a></h4>
                                <h5>Nguồn : <a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
                                <?php
                                    $source = $val['source'];
                                    $source = str_replace("http://","",$source);
                                    $source = str_replace("www.","",$source);
                                    $source = str_replace(".com","",$source);
                                    $source = str_replace(".vn","",$source);
                                    echo $source;?>
                                </a>
                                    <label>|</label> <i><?php echo $val['time_post'];?></i></h5>
                                <p><?php echo $val['summary'];?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </li>
                    <?php }?>
                    </ul>
                    <div class="more" style="margin-bottom:30px">
                        <a href="single.html" class="type-2">
                            <span > Xem thêm </span>

                        </a>
                    </div>
                </div>
                <div class="col-md-4 news-grid-right">
                    <div class="news-grid-rght1">
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <h4 style="color:#090; margin-left:20%;margin-bottom:30px">VỊ TRÍ CỦA CHÚNG TÔI</h4>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26359652.109742895!2d-113.72446020222534!3d36.24602872499641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1450786850582"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="news-grid-rght1">
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <h4 style="color:#090; margin-left:20%;margin-bottom:30px; margin-top:20px;">THỜI TIẾT HÔM NAY</h4>
                            <div class="weather-left-info">
                                <div class="weather-left-top weather-right-top wow bounceInUp animated" data-wow-delay=".5s">
                                    <canvas id="partly-cloudy-day" width="75" height="75"></canvas>
                                    <h3>25°C</h3>
                                    <p>Sáng, Hôm nay</p>
                                </div>
                                <div class="weather-right-bottom">
                                    <div class="weather-right-bottom-left wow bounceInLeft animated" data-wow-delay=".5s">
                                        <canvas id="clear-night" width="60" height="60"></canvas>

                                        <h4>Tối, TP.HCM</h4>
                                    </div>
                                    <div class="weather-right-bottom-right wow bounceInRight animated" data-wow-delay=".5s">
                                        <h3>17°C</h3>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-grid-rght2">
                        <h3>THEO DÕI BẢN TIN CỦA CHÚNG TÔI</h3>
                        <p>Nhận tin tức và cập nhật mới nhất bằng cách
                            đăng ký nhận bản tin hàng ngày của chúng
                            tôi.</p>
                        <form>
                            <input type="text" value="Email của bạn ..." onfocus="this.value= '';" onblur="if
                                                        (this.value == '') {this.value= 'Email của bạn ...';}">
                            <input type="submit" value="Gửi">
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- //news-and-events -->
                    </div>
                   
    </div>

<script>

var myVar = setInterval(AdminCamera.showImageUrl, 5000);
</script>

<?php $this->load->view('template/footer');?>