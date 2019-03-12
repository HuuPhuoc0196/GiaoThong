
<?php $data['data'] = 'Đăng Nhập';?>
<?php $data['login_user'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>

<script src="<?php echo base_url_ci;?>public/js/user.js"></script>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
	</script>
	
	<?php if(isset($_SESSION['user']))
{
    redirect(base_url_ci . 'home');
}?>

<div class="login elite-app">
	<div class="container container_bg">
	<div class="tittle-agileinfo">
				<h3>ĐĂNG NHẬP</h3>
			</div>
	<div class="col-md-7 login-form-w3-agile">
			 <form action="#" method="post">
			 	<div id="login-error"></div>
				<div class="w3_form_body_grid">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="email" id="username" name="Email" placeholder="Tên tài khoản" required="">
				</div>
				<div id="username-error"></div>
				<div class="w3_form_body_grid">
				<i class="fa fa-lock" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="password" id="password" name="Password" placeholder="password" required="">
				</div>
				<div id="password-error"></div>
				<div class="agile_remember">
					
					<div class="agile_remember_right">
						<a href="#" data-toggle="modal" data-target="#myModal" >Bạn quên mật khẩu?</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<input type="button" value="Đăng nhập" id="login" class="button-login-custom" onclick="User.login()">
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
			<div class="sim-button button12"><a href="<?php echo base_url_ci;?>user/register">Đăng ký</a></div>
		</div>
	</div>
</div>

<script>

document.onkeyup = function (event) {
	  if (event.which == 13 || event.keyCode == 13) {
		  $('#login').click();
	  }
};
</script>

<div class="modal fade" id="myModal" role="dialog">
			<!--Modal-->
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
				
					<h4 class="modal-title">Quên mật khẩu</h4>
					</div>
					<div class="modal-body login-form-w3-agile1">
					<p>Bạn quên mật khẩu đăng nhập? Xin hãy nhập địa chỉ email đăng ký thành viên ở đây.
						Chúng tôi sẽ gửi mật khẩu mới cho bạn qua email!
					</p> 
					<br>
					<br>
					<div class="w3_form_body_grid">
						<i class="fa fa-envelope icon-custom" aria-hidden="true"></i>
							<input type="email" name="email" id="email" placeholder="Địa chỉ Email" required="">
					</div>
					<br>
					<br>
					
					</div>
					<div class="modal-footer">
					<div class="sim-button button12" >Gửi yêu cầu</div> 
					</div>
				</div>
			</div>
		</div>
<?php $this->load->view('template/footer');?> 