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
                    <img id="profile"  style="width:120px; height:120px;">
                    <a class="click" href="#"><input type="file" onchange="User.uploadFile()"></a>
                    
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
                <div class="row">
                	<div class="col-md-6 mb-20">
					<input type="button" onclick="User.updateProfile()" value="Cập Nhật Thông Tin" id="update-profile" class="button-login-custom">
    				</div>
    				<div class="col-md-6 mb-20">
    					<input type="button" onclick="User.showChangePassword()" value="Thay đổi mật khẩu" id="change-password" class="button-login-custom">
    				</div>
                </div>
			</form>
			
		</div>
		
	</div>
</div>
    </div>
</div>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
		var profilename = "";
		User.showProfile('<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['username'];}?>');
	</script>


<div class="modal fade" id="changePasswordModel" role="dialog">
			<!--Modal-->
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
				
					<h4 class="modal-title">Thay đổi mật khẩu</h4>
					</div>
					<div class="modal-body login-form-w3-agile1">
					<div class="w3_form_body_grid">
    				<i class="fa fa-user-circle-o" aria-hidden="true" style="width: 16px;text-align: center;"></i>
    					<input type="text" id="username_profile_change" name="username_profile_change" placeholder="Tên tài khoản" required="" disabled="disabled">
                    </div>
					<div class="w3_form_body_grid w3_form_body_grid1">
						<i class="fa fa fa-lock icon-custom" aria-hidden="true"></i>
						<input type="password" name="password-old" id="password-old" placeholder="Nhập mật khẩu" required="">
					</div>
					<div id="password-old-error"></div>
					<div class="w3_form_body_grid w3_form_body_grid1">
						<i class="fa fa fa-lock icon-custom" aria-hidden="true"></i>
						<input type="password" name="password-new" id="password-new" placeholder="Nhập mật khẩu mới" required="">
					</div>
					<div id="password-new-error"></div>
					<div class="w3_form_body_grid w3_form_body_grid1">
						<i class="fa fa fa-lock icon-custom" aria-hidden="true"></i>
						<input type="password" name="re-password-new" id="re-password-new" placeholder="Nhập lại mật khẩu mới" required="">
					</div>
					<div id="re-password-new-error"></div>
					
					</div>
					<div class="modal-footer">
					<div class="sim-button button12" onclick="User.changePasswork()">Thay đổi mật khẩu</div> 
					</div>
				</div>
			</div>
		</div>



<?php $this->load->view('template/footer');?>