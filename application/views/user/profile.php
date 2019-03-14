<?php $data['data'] = 'Thông tin cá nhân';?>
<?php $this->load->view('template/header',$data);?>
<div class="login elite-app">
	<div class="container container_bg">
    <div class="tittle-agileinfo">
				<h3>Thông tin cá nhân</h3>
			</div>
	<div class="col-md-11.5 login-form-w3-agile2">

			 <form action="#" method="post">
                <div class="w3_form_body_grid">
				    <i  style="width: 16px;margin-right:15%;">Hình đại diện : </i>
                    <img src="<?php echo base_url_ci;?>public/images/hinh.jpg" style="width:120px; height:120px;">
                    <a class="click"href="#">Click vào đây để thay đổi avata của bạn</a>
				</div>
			 	
				<div class="w3_form_body_grid">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="width:16px;text-align: center;"></i>
					<input type="text" id="username" name="Username" placeholder="Họ và tên" required="">
				</div>
				
				<div class="w3_form_body_grid">
				<i class="fa fa-user-circle-o" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="text" id="username" name="" placeholder="Tên tài khoản" required="">
                </div>
                <div class="w3_form_body_grid">
				<i class="fa fa-lock" aria-hidden="true" style="width: 16px;text-align: center;"></i>
					<input type="password" id="password" name="Password" placeholder="Mật khẩu" required="">
                </div>
                <div class="w3_form_body_grid">
				<i class="fa fa-phone icon-custom" aria-hidden="true"></i>
					<input type="text" name="phone" id="phone" placeholder="Số điện thoại" required="">
				</div>
                <div class="w3_form_body_grid">
				<i class="fa fa-envelope icon-custom" aria-hidden="true"></i>
					<input type="email" name="email" id="email" placeholder="Địa chỉ Email" required="">
				</div>
                <div class="w3_form_body_grid w3_form_body_grid1">
				<i class="fa fa-map-marker icon-custom" aria-hidden="true"></i>
					<input type="text" name="address" id="address" placeholder="Địa chỉ của bạn" required="">
				</div>
				
				
				<input type="button" value="Cập Nhật Thông Tin" id="login" class="button-login-custom">
			</form>
			
		</div>
		
	</div>
</div>
    </div>
</div>
<?php $this->load->view('template/footer');?>