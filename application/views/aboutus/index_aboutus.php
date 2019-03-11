<?php $data['data'] = 'Giới Thiệu';?>
<?php $data['aboutus'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>
<?php $this->load->view('template/share');?>

<div class="banner-bottom">
    <div class="container container_bg">
        <section class="about about1 py-5" id="how">
        <div class="container py-md-3">
        <h2 class="heading text-center mb-sm-5 mb-4"> Những gì về " GIAO THÔNG " </h2>
            <div class="row about-grids">
                <div class="col-lg-6 about-left">
                    <img src="<?php echo base_url_ci;?>public/images/ket-xe.jpg" alt="" class="img-fluid"/>
                </div>
                <div class="col-lg-6 grid1 mt-lg-0 mt-4 pl-lg-5">
                    <h3 class="my-lg-4 mb-2">Tại sao " GIAO THÔNG " ra đời?</h3>
                    <p class="">&nbsp;&nbsp;&nbsp;Tai nạn giao thông và ùn tắc giao thông đường bộ là vấn đề bức xúc của toàn xã hội, ảnh hưởng 
                    đến sự phát triển kinh tế, văn hóa, xã hội và hình ảnh của đất nước Việt Nam với bạn bè quốc tế.
                    </p>
                    
                    <p class="">&nbsp;&nbsp;&nbsp;Tình hình giao thông hiện tại ở thành phố Hồ Chí minh hết sức đáng báo động. Hậu quả là thực trạng ùn tắc
                        xảy ra liên tục và nặng nề hơn là những vụ tai nạn giao thông thương tâm, gây thiệt hại về người và tài sản.
                    </p>
                    <p class="">&nbsp;&nbsp;&nbsp;Chính vì thế mà chúng tôi phát triển nên trang web GIAO THÔNG nhằm góp phần giảm thiểu ùn tắc và tai nạn giao thông.
                        TRang web sẽ tổng hợp các tin tức về chủ đề giao thông giúp người dùng biết được thông tin nhanh nhất. Bên cạnh đó là hệ thống camera trực quan 
                        và người dùng có thể tìm kiếm hay thông báo về các tuyến đường đặc biệt
                    </p>
                </div>
            </div>
        </div>
    </section>
   <!-- services -->
   <h3 class="my-lg-4 mb-2 se"> " GIAO THÔNG " mang đến </h3>
<section class="services py-5 bg-clr" id="services">
    
	<div class="container py-lg-5">
		
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				<div class="our-services-wrapper mb-md-0 mb-60">
					<div class="services-inner">
						<div class="our-services-icon">
							<span class="fa fa-map-marker" aria-hidden="true"></span>
						</div>
						<div class="our-services-text">
							<h4>Bản đồ</h4>
							<p>Người dùng có thể tìm kiếm và thông báo cho chúng tôi về các tuyến đường đặc biệt ở thành phố 
                                Hồ Chí Minh như:
                            </p>
                            <p> <i class="fa fa-road" aria-hidden="true"></i> &nbsp;&nbsp; Tuyến đường kẹt xe</p>
                            <p> <i class="fa fa-road" aria-hidden="true"></i> &nbsp;&nbsp;Tuyến đường bị hư hỏng</p>
                            <p> <i class="fa fa-road" aria-hidden="true"></i> &nbsp;&nbsp;Tuyến đường đang xây dựng</p>
                            <p> <i class="fa fa-road" aria-hidden="true"></i> &nbsp;&nbsp;Tuyến đường xảy ra tai nạn</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				<div class="our-services-wrapper mb-md-0 mb-60">
					<div class="services-inner">
						<div class="our-services-icon">
							<span class="fa fa-video-camera" aria-hidden="true"></span>
						</div>
						<div class="our-services-text">
							<h4>Camera</h4>
							<p>Hệ thống các camera tại khu vực thành phố Hồ Minh trên web site giúp người dùng có thể nhìn
                                thấy các tuyến đường đặc biệt một cách trực quan và sinh động hơn </p>
                            <p>Nhờ vậy mà người dùng có thể diều chỉnh lộ trình hợp lý mà không mất quá nhiều thồi gian và sức lực.</p>                           </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				<div class="our-services-wrapper mb-md-0 mb-60">
					<div class="services-inner">
						<div class="our-services-icon">
							<span class="fa fa-newspaper-o" aria-hidden="true"></span>
						</div>
						<div class="our-services-text">
							<h4>Tin Tức</h4>
                            <p>Trang web tổng hợp các tin tức về lĩnh vực giao thông nhờ đó người dùng nắm bắt được thông tin dễ dàng và nhanh nhất.</p>
                            <p>Tin tức được lấy từ các nguồn trang giao thông uy tính vì thế tính chính xác và đa dạng là điều tất yếu.</p>
                            <p>.</p>

						</div>
					</div>
				</div>
			</div>
			
		
	</div>
</section>
<!-- //services -->
    </div>
</div>

<?php $this->load->view('template/footer');?>