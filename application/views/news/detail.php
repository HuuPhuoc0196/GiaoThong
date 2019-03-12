<?php $data['data'] = 'Tin Tức Chi Tiết';?>
<?php $data['news'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>


<!-- single -->
<div class="single">
		<div class="container container_bg">
			<div class="single-grid">
				<div class="col-md-8 blog-left">
					<div class="blog-left-grid">
						<div class="blog-leftl">
							<h4>Tháng <?php echo date("m");?> <span><?php echo date("d")?></span></h4>
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>10</a>
						</div>
						<div class="blog-leftr hiden-table">
							  <?php echo $result_news['source'];?>
                                <h1 class="title_detail"><?php echo $result_news['title'];?></h1>
                                <p class="timepost_detail"><?php echo $result_detail['time_post'];?></p>
                                <p class="content_main_detail" ><?php echo $result_detail['content_detail'];?></p>
                                <p class="author_detail"><?php echo $result_detail['author'];?></p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 video-grids-right">
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block;
                                width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Tin
                                    tức nổi bật nhất</span></li>
                            <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>Tin
                                    tức được yêu thích </span></li>
                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                            <?php foreach ($hotNews as $val){?>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php
                                                $source = $val['source'];
                                                $source = str_replace("http://","",$source);
                                                $source = str_replace("https://","",$source);
                                                $source = str_replace("www.","",$source);
                                                $source = str_replace(".com","",$source);
                                                $source = str_replace(".vn","",$source);
                                                echo $source;?></a>
                                                <label>|</label></li>
                                            <li><?php echo $val['time_post'];?></li>
                                        </ul>
                                        <p><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php echo $val['title'];?></a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <?php }?>
                              
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                           <?php foreach ($listNews as $val){?>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php
                                                $source = $val['source'];
                                                $source = str_replace("http://","",$source);
                                                $source = str_replace("https://","",$source);
                                                $source = str_replace("www.","",$source);
                                                $source = str_replace(".com","",$source);
                                                $source = str_replace(".vn","",$source);
                                                echo $source;?></a>
                                                <label>|</label></li>
                                            <li><?php echo $val['time_post'];?></li>
                                        </ul>
                                        <p><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php echo $val['title'];?></a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                </div>
					
					
                <?php $this->load->view('template/weather');?>
                <div class="news-grid-rght1">
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <h4 style="color:#090; margin-left:20%;margin-bottom:30px; margin-top:20px;">THỜI TIẾT HÔM NAY</h4>
                            <div class="weather-left-info mb-10">
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
                
			</div>
		</div>
	</div>
<!-- //single -->

<?php $this->load->view('template/footer');?>

