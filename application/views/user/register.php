<?php $data['data'] = 'Đăng Nhập';?>
<?php $data['login_user'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>
<?php $this->load->view('template/share');?>

<div class="login elite-app">
	<div class="container container_bg">
	<div class="tittle-agileinfo">
				<h3>ĐĂNG KÝ NGAY</h3>
			</div>
	<div class="col-md-7 login-form-w3-agile">
			<form action="#" method="post">
				
				<div class="w3_form_body_grid">
				<i class="fa fa-user-circle" aria-hidden="true"></i>
					<input type="text" name="Name" placeholder="Họ và tên" required="">
                </div>
                <div class="w3_form_body_grid">
				<i class="fa fa-user-circle" aria-hidden="true"></i>
					<input type="text" name="Name" placeholder="Tên tài khoản" required="">
				</div>
				
				<div class="w3_form_body_grid">
				<i class="fa fa-envelope" aria-hidden="true"></i>
					<input type="email" name="Email" placeholder="Email" required="">
				</div>
				<div class="w3_form_body_grid w3_form_body_grid1">
				<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" name="Password" placeholder="Mật khẩu" required="">
                </div>
                <div class="w3_form_body_grid w3_form_body_grid1">
				<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" name="Password" placeholder="Nhập lại mật khẩu" required="">
				</div>
				<input type="submit" value="đăng ký">
			</form>
			<h4>Tiếp tục với</h4>
			<div class="social_icons agileinfo_social_asd">
				<!-- Facebook -->
				<a href="#" class="slide-social wthree_slide_social">
					<div class="button">5 Likes</div>
					<div class="facebook icon"> <i class="fa fa-facebook" aria-hidden="true"></i> </div>
					<div class="facebook slide">
						<p>Facebook</p>
					</div>
				</a>
				<!-- Twitter -->
				<a href="#" class="slide-social wthree_slide_social">
					<div class="button">8 Google+</div>
					<div class="twitter icon"> <i class="fa fa-google" aria-hidden="true"></i> </div>
					<div class="twitter slide">
						<p>Google+</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 login-right-info">
			<h3 class="subhead-agileits">Những gì về chúng tôi</h3>
			
			<ul>
				<li><i class="fa fa-check" aria-hidden="true"></i>Tiện lợi</li>
				<li><i class="fa fa-check" aria-hidden="true"></i>Chính xác</li>
				<li><i class="fa fa-check" aria-hidden="true"></i>Tổng hợp</li>
				<li><i class="fa fa-check" aria-hidden="true"></i>Đa dạng</li>
			</ul>
			<h5>Bạn chưa có tài khoản?<i class="fa fa-hand-o-down" aria-hidden="true"></i></h5>
			<div class="sim-button button12"><a href="<?php echo base_url_ci;?>user/login">Đăng nhập</a></div>
		</div>
		<div class="col-md-4 login-right-info right-info-find">
			<h3 class="subhead-agileits">Những gì chúng tôi có</h3>
			<ul>
				<li><i class="fa fa-ellipsis-v" aria-hidden="true"></i>Tin tức luôn được cập nhât thường xuyên</li>
				<li><i class="fa fa-ellipsis-v" aria-hidden="true"></i>Hệ thống camera toàn cảnh chính xác</li>
				<li><i class="fa fa-ellipsis-v" aria-hidden="true"></i>Bản đồ thể hiện vị trí kẹt xe</li>
			</ul>
		</div>
	</div>
</div>
<!--login-inner-->

<?php $this->load->view('template/footer');?>