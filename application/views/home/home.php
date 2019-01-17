<?php $data['data'] = 'Trang chủ';?>
<?php $this->load->view('template/header',$data);?>
<?php $menu_class['home'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/slider');?>



<!-- /banner-->
<!-- services -->
	<div class="services">
		<div class="container"> 
		<div class="ser-wthree">
			<div class="services-agileinfo">   
				<div class="col-sm-4 col-xs-6 services-w3grids">
					<div class="ser-agile">
						<div class="services-icon hvr-radial-in">
							<i class="fa fa-check-square-o" aria-hidden="true"></i>
						</div>
						<h4>Tổng hợp tin tức</h4>
						<p>THÔNG TIN GIAO THÔNG là website tổng hợp mọi tin tức về giao thông mới nhất 
                        trong cả nước. Tin tức sẽ trở nên đa dạng phong phú hơn. </p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 services-w3grids">
					<div class="ser-agile">
						<div class="services-icon hvr-radial-in">
							<i class="fa fa-check-square-o" aria-hidden="true"></i>
						</div>
						<h4>Nhận dạng kẹt xe</h4>
						<p>THÔNG TIN GIAO THÔNG sẽ liệt kê các danh sách các điểm kẹt xe trên bản đồ. Từ đó người sử dụng sẽ
                      nhận dạng được địa điểm chính xác hơn.</p>
					</div> 
				</div> 
				<div class="col-sm-4 col-xs-6 services-w3grids">
					<div class="ser-agile">
						<div class="services-icon hvr-radial-in">
							<i class="fa fa-check-square-o" aria-hidden="true"></i>
						</div>
						<h4>Thông tin chính xác </h4>
						<p>THÔNG TIN GIAO THÔNG đảm bảo các tin tức về giao thông là hoàn toàn chính xác. Vì đây là website tổng hợp tin tức từ các website
                        hàng đầu khác.</p>
					</div>
				</div>
				<div class="clearfix"> </div> 
			</div>
			</div>
		</div>
	</div>
	<!-- //services -->
	<br>
    <br>
    <br>
    <br>
    <br>
    <br>
	<!--/Menu-->
	<section class="banner-bottom menu" id="menu">
		<div class="container">
			<h3 class="tittle">Tin tức giao thông</h3>
			<div class="row inner-sec">
				<div class="tabs">
					<ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
							    aria-selected="true">Nổi bật nhất</a>
						</li>

					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="menu-grids my-lg-4 my-md-2">
								<div class="row inner-menu mt-4">
								<?php foreach ($hotNews as $val){?>
								<a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
									<div class="col-md-6 menu-grid-left" data-aos="fade-down" style="height: 500px;">
										<div class="row mt-2">
											<div class="col-md-5 menu-img">
												<img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" class="img-fluid rounded-circle" alt="">
											</div>
											<div class="col-md-7 menu-img-info mt-4 mt-md-2">
												<h5><?php echo $val['title'];?></h5>
												
												<p class="sub-meta mt-2">

													Nguồn </p>
                                                    <p><a style="color:#030"><?php echo $val['source'];?> </a></p>
													<p style ="text-size:16px;"><?php echo $val['summary'];?></p>
											</div>
										</div>
									
									</div>
									</a>
									<?php }?>
									

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--//Menu-->
	<!--/Gallry-->
<!-- 	<div class="trending-ads"> -->
<!-- 				<div class="container"> -->
				<!-- slider -->
<!-- 				<div class="trend-ads"> -->
<!-- 					<h2>Tin tức mới </h2> -->
<!-- 							<ul id="flexiselDemo3"> -->
<!-- 								<li> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300"src="<?php // echo base_url_ci;?>public/images/p1.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>There are many variations of passages</h5> -->
<!-- 											<span>1 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p2.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>Lorem Ipsum is simply dummy</h5> -->
<!-- 											<span>3 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p3.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>It is a long established fact that a reader</h5> -->
<!-- 											<span>8 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p4.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>passage of Lorem Ipsum you need to be</h5> -->
<!-- 											<span>19 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 								</li> -->
<!-- 								<li> -->
								
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p5.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>There are many variations of passages</h5> -->
<!-- 											<span>1 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p6.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>passage of Lorem Ipsum you need to be</h5> -->
<!-- 											<span>1 day ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p7.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>It is a long established fact that a reader</h5> -->
<!-- 											<span>9 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php // echo base_url_ci;?>public/images/p8.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>Lorem Ipsum is simply dummy</h5> -->
<!-- 											<span>3 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p9.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>Lorem Ipsum is simply dummy</h5> -->
<!-- 											<span>3 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p10.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>It is a long established fact that a reader</h5> -->
<!-- 											<span>9 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p11.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>passage of Lorem Ipsum you need to be</h5> -->
<!-- 											<span>1 day ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 									<div class="col-md-3 biseller-column"> -->
<!-- 										<a href="single.html"> -->
<!--											<img class="300*300" src="<?php //echo base_url_ci;?>public/images/p12.jpg"/>
<!-- 											<span class="price"> Mới</span> -->
<!-- 										</a>  -->
<!-- 										<div class="ad-info"> -->
<!-- 											<h5>There are many variations of passages</h5> -->
<!-- 											<span>1 hour ago</span> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 								</li> -->
<!-- 						</ul> -->
<!-- 					<script type="text/javascript"> -->
<!-- 						 $(window).load(function() {
<!-- 							$("#flexiselDemo3").flexisel({
<!-- 								visibleItems:1,
<!--  								animationSpeed: 1000,
<!-- 							autoPlay: true,
<!-- 							autoPlaySpeed: 5000,    		
<!-- 							pauseOnHover: true,
<!-- 								enableResponsiveBreakpoints: true,
<!-- 								responsiveBreakpoints: { 
<!-- 								portrait: { 
<!-- 										changePoint:480,
<!-- 									visibleItems:1
<!-- 									}, 
<!-- 									landscape: { 
<!-- 									changePoint:640,
<!-- 									visibleItems:1
<!--  									},
<!--  									tablet: { 
<!--  										changePoint:768,
<!--  										visibleItems:1
<!--  									}
<!--  								}
<!-- 							});
							
<!-- 						});
<!-- 					   </script>
<!--					   <script type="text/javascript" src="<?php //echo base_url_ci;?>public/js/jquery.flexisel.js"></script>
<!-- 					</div>    -->
<!-- 			</div> -->
			<!-- //slider -->				
<!-- 			</div> -->

    <!--/banner-bottom-->
<!-- 	<section class="banner-bottom"> -->
<!-- 		<div class="container"> -->
<!-- 			<h3 class="tittle">Bản đồ giao thông</h3> -->
<!-- 			<div class="row inner-sec"> -->
<!-- 				<div class="col-lg-6 about-img" data-aos="flip-right"> -->
<!-- 					<img src="<?php //echo base_url_ci;?>public/images/ab.jpg" class="img-fluid" alt="">
<!-- 				</div> -->
<!-- 				<div class="col-lg-6 about-info text-left" data-aos="flip-left" > -->
                
<!-- 					<h4 class="sub-hd mb-4">Nhận dạng các điểm kẹt xe một cách trực quan </h4> -->
<!--                     <br> -->
<!-- 					<p>Truy cập trang bản đồ của THÔNG TIN GIAO THÔNG và click chọn điểm kẹt xe trong danh sách các điểm kẹt xe. -->
<!--                     Vị trí kẹt xe mà bạn muốn tìm sẽ được hiển thị trên bản đồ nhanh chống. -->
<!--                      </p> -->
                     
<!-- 					<p class="sup-para mt-2">Ngoài ra bạn có thể truy cập google.map để tìm tuyến đường khác mà ít kẹt xe nhất.Điều này giúp bạn điều chỉnh  -->
<!--                     lộ trình đi hợp lý và tiện lợi hơn.       </p> -->
<!--                     <br> -->
<!-- 					<div class="view my-4"> -->
<!-- 						<a href="single.html" class="btn btn-primary read-m">Truy cập ngay</a> -->
<!-- 					</div> -->
<!--                     <br> -->
<!--                     </br> -->
                    
<!-- 					<img src="<?php // echo base_url_ci;?>public/images/banner3.jpg" class="img-fluid" alt="">
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 	</section> -->
	<!--//banner-bottom-->
	<!--/banner-bottom-->
	<section class="grid-info-section">
		<div class="container">
			<h3 class="tittle">Điểm kẹt xe</h3>
			<div class="row inner-sec">
				<ul id="flexiselDemo1">
					<?php foreach ($hotMap as $val) {?>
					<li><a href="<?php echo base_url_ci;?>map/index_map/<?php echo $val['id'];?>">
						<div class="blog-item text-center">
							<img src="<?php echo base_url_ci;?>public/images/img_ketxe.jpg" alt=" " class="img-fluid rounded-circle" />
							<div class="floods-text">
							<h3><?php echo $val['name'];?></h3>
							</div>
						</div>
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</section>
	


<?php $this->load->view('template/footer');?>