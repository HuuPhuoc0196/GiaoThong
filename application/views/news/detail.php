<?php $data['data'] = 'Tin Tức Chi Tiết';?>
<?php $data['news'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>
<?php $this->load->view('template/share');?>

<!-- single -->
<div class="single">
		<div class="container container_bg">
			<div class="single-grid">
				<div class="col-md-8 blog-left">
					<div class="blog-left-grid">
						<div class="blog-leftl">
							<h4>Tháng 12 <span>31</span></h4>
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>10</a>
						</div>
						<div class="blog-leftr">
							<img src="<?php echo base_url_ci;?>public/images/25.jpg" alt=" " class="img-responsive" />
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
							nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
							reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
							pariatur</p>
							<ul>
								<li><a href="#"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Tài Khoản</a></li>
								
								<li><a href="#"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i>10 Bình Luận</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						
						<div class="response">
							<h4>Bình Luận </h4>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="<?php echo base_url_ci;?>public/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Admin</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>December 31, 2015</li>
										<li><a href="single.html">Trả lời</a></li>
									</ul>
									<div class="media response-info">
										<div class="media-left response-text-left">
											<a href="#">
												<img class="media-object" src="<?php echo base_url_ci;?>public/images/icon1.png" alt=""/>
											</a>
											<h5><a href="#">Admin</a></h5>
										</div>
										<div class="media-body response-text-right">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
											<ul>
												<li>December 31, 2015</li>
												<li><a href="single.html">Trả lời</a></li>
											</ul>		
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="<?php echo base_url_ci;?>public/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Admin</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>December 31, 2015</li>
										<li><a href="single.html">Trả lời</a></li>
									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
						<div class="coment-form">
							<h4>Gửi Bình Luận</h4>
							<form>
								<input type="text" value="Tên tài khoản " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tên';}" required="">
								<input type="email" value="Email ( bắt buộc)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email ( bắt buộc )*';}" required="">
								<input type="text" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
								<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung...';}" required="">Nội dung...</textarea>
								<input type="submit" value="Gửi Bình Luận" >
							</form>
						</div>
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
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/10.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#">Nguồn</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Tiêu đê.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/11.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#">Nguồn</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Tiêu đê.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/12.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange">general</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/10.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange1">business</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/12.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange2">world</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/12.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#">Politics</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/11.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange1">business</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/10.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange2">world</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/12.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="green">international</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="<?php echo base_url_ci;?>public/images/11.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="tab_list1">
                                        <ul>
                                            <li><a href="#" class="orange">general</a>
                                                <label>|</label></li>
                                            <li>31.12.2015</li>
                                        </ul>
                                        <p><a href="#">Nam libero
                                                tempore, cum soluta
                                                nobis.</a></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
					
					
                <?php $this->load->view('template/weather');?>
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
                
			</div>
		</div>
	</div>
<!-- //single -->

<?php $this->load->view('template/footer');?>

