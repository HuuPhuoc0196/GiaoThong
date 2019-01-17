
	<!--//banner-bottom-->
    <br>
    <br>
	<!-- footer start here --> 
	<div class="footer-agile jarallax">
		<div class="container">
			
			<div class="footer-btm-agileinfo">
				<div class="col-md-3 col-xs-3 footer-grid">
					<h3>Thành viên phát triển</h3>
					<ul>
						<li><a href="#"><i class="glyphicon glyphicon-menu-right"></i>Lê Hữu Phước</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-menu-right"></i>Nguyễn Thị Cẩm Tú</a></li>
					</ul>
				</div> 
				<div class="col-md-3 col-xs-3 footer-grid w3social">
					<h3>Các đường dẫn</h3> 
					<ul>
						<li><a href="index.html">Trang chủ</a></li>
						<li><a href="services.html">Tin tức</a></li> 
						<li><a href="projects.html">Bản đồ</a></li> 
						<li><a href="contact.html">Liên hệ</a></li> 
					</ul> 
				</div> 
				<div class="col-md-6 col-xs-6 footer-grid footer-review">
					<h3>Đăng nhập để phản hồi </h3>
					<a href="<?php echo base_url_ci;?>user/" class="btn btn-primary read-m">Đăng nhập ngay</a>
					<div class="copy-w3lsright"> 
						<p>Copyright &copy; 2018 &nbsp; <a href="Home.html">THÔNG TIN GIAO THÔNG</a></p>
					</div> 
				</div> 
				<div class="clearfix"> </div>
			</div>
			<div class="footer-top-agileinfo">  
				<div class="social-wthree-icons bnragile-icons">
					<div class="clearfix"> </div>
				</div>  
			</div>			
		</div>
	</div> 
	<!-- //footer end here --> 
    <!-- js -->  
    	<script src="<?php echo base_url_ci;?>public/js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- /flexisel -->
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script src="<?php echo base_url_ci;?>public/js/jquery.flexisel.js"></script>
	<!-- //flexisel -->
	<!-- flexSlider -->
	<script defer src="<?php echo base_url_ci;?>public/js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->

	<!-- simpleLightbox -->
	<script src="<?php echo base_url_ci;?>public/js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->
	<!-- /js files -->
	<link href='<?php echo base_url_ci;?>public/css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='<?php echo base_url_ci;?>public/css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='<?php echo base_url_ci;?>public/js/aos.js'></script>
	<script src="<?php echo base_url_ci;?>public/js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="<?php echo base_url_ci;?>public/js/move-top.js"></script>
	<script src="<?php echo base_url_ci;?>public/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!--// end-smoth-scrolling -->
    <script src="<?php echo base_url_ci;?>public/js/bootstrap3.0.js"></script>
	<script src="<?php echo base_url_ci;?>public/js/responsiveslides.min.js"></script>
		<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="<?php echo base_url_ci;?>public/js/move-top.js"></script>
			<script type="text/javascript" src="<?php echo base_url_ci;?>public/js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			</script>
	<!-- //start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
  
</body>
</html>