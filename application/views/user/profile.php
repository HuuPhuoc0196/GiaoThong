<?php $data['data'] = 'Thông tin cá nhân';?>
<?php $this->load->view('template/header',$data);?>
<script src="<?php echo base_url_ci;?>public/js/user.js"></script>
<?php if(!isset($_SESSION['user']))
{
    redirect(base_url_ci . 'user/login');
}?>
<div class="login elite-app">
	<div class="container container_bg">
    <div class="tittle-agileinfo">
				<h3>Thông tin cá nhân</h3>
			</div>
	<div class="col-md-11.5 login-form-w3-agile2">
			 <form action="#" method="post">
			 	<div id="sucess-update-profile"></div>
                <div class="w3_form_body_grid">
				    <i  style="width: 16px;margin-right:15%;">Hình đại diện : </i>
                    <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" style="width:120px; height:120px;">
                    <a class="click"href="#">Click vào đây để thay đổi avata của bạn</a>
				</div>
				<div id=""></div>
			 	
				<div class="w3_form_body_grid">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="text" id="username_profile" name="username_profile" placeholder="Tên tài khoản" required="" disabled="disabled">
                </div>
                <div id="username_profile-error"></div>
                <div class="w3_form_body_grid">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="width:16px;text-align: center;"></i>
					<input type="text" id="name_profile" name="name_profile" placeholder="Họ và tên" required="">
				</div>
				<div id="name_profile-error"></div>
                <div class="w3_form_body_grid">
				<i class="fa fa-phone icon-custom" aria-hidden="true"></i>
					<input type="text" name="phone_profile" id="phone_profile" placeholder="Số điện thoại" required="">
				</div>
				<div id="phone_profile-error"></div>
                <div class="w3_form_body_grid">
				<i class="fa fa-envelope icon-custom" aria-hidden="true"></i>
					<input type="email" name="email_profile" id="email_profile" placeholder="Địa chỉ Email" required="">
				</div>
				<div id="email_profile-error"></div>
                <div class="w3_form_body_grid w3_form_body_grid1">
				<i class="fa fa-map-marker icon-custom" aria-hidden="true"></i>
					<input type="text" name="address_profile" id="address_profile" placeholder="Địa chỉ của bạn" required="">
				</div>
				<div id="address_profile-error"></div>
				<div class="w3_form_body_grid">
				<i class="fa fa-lock" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="password" id="password_profile" name="password_profile" placeholder="Mật khẩu" required="">
                </div>
                <div id="password_profile-error"></div>
				
				<input type="button" onclick="User.updateProfile()" value="Cập Nhật Thông Tin" id="update-profile" class="button-login-custom">
			</form>
			
		</div>
		
	</div>
</div>
    </div>
</div>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
		User.showProfile('<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['username'];}?>');
	</script>
<?php $this->load->view('template/footer');?>