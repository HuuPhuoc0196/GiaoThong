<!--Content-->
<div class="signupform">
	<h1>Đăng ký tài khoản</h1>
	<div class="content">

		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Chào bạn!</h3>
					<p>THÔNG TIN GIAO THÔNG là trang website tổng hợp các tin tức về
						tình hình giao thông trong cả nước.</p>
					<p>Vì thế, bạn hãy đăng ký và phản hồi cho chúng tôi biết về ý kiến
						của bạn khi trải nghiệm website</p>

				</div>
			</div>
			<div class="w3_info">
				<h2>Thông tin tài khoản</h2>
				<form action="<?php echo base_url_ci;?>user/register" method="post">
					<div class="input-group">
						<span><i class="fa fa-user" aria-hidden="true"></i></span> <input
							type="text" placeholder="Họ và tên đệm" name="username"
							value="<?php echo set_value('username'); ?>" required>

					</div>
					<span class="loi"> <?php echo form_error('username'); ?>  </span>
					<div class="input-group">
						<span><i class="fa fa-user" aria-hidden="true"></i></span> <input
							type="text" placeholder="Tên" name="name" 
							value="<?php echo set_value('name'); ?>" required>

					</div>
					<span class="loi"> <?php echo form_error('name'); ?> </span>
					<div class="input-group">
						<span><i class="fa fa-envelope" aria-hidden="true"></i></span> <input
							type="email" placeholder="Email" name="email" 
							value="<?php echo set_value('email'); ?>" required>

					</div>
					<span class="loi"> <?php echo form_error('email'); ?> </span>
					
					<div class="input-group">
						<span><i class="fa fa-envelope" aria-hidden="true"></i></span> <input
							type="text" placeholder="Phone" name="phone"
							value="<?php echo set_value('phone'); ?>" required>

					</div>
					<span class="loi"> <?php echo form_error('phone'); ?> </span>
					<div class="input-group">
						<span><i class="fa fa-envelope" aria-hidden="true"></i></span> <input
							type="text" placeholder="Địa chỉ" name="address"
							value="<?php echo set_value('address'); ?>" required>

					</div>
					<span class="loi"> <?php echo form_error('address'); ?> </span>
					<div class="input-group">
						<span><i class="fa fa-lock" aria-hidden="true"></i></span> <input
							type="Password" placeholder="Password" name="password" required>

					</div>
					<span class="loi"> <?php echo form_error('password'); ?> </span>
					<div class="input-group">
						<span><i class="fa fa-lock" aria-hidden="true"></i></span> <input
							type="Password" placeholder="Nhập lại Password"
							name="confirm_password" required>

					</div>
					<span class="loi"> <?php echo form_error('confirm_password'); ?> </span>
					<br> <input type="checkbox" value="remember-me" />
					<h4>Gửi tôi lần cập nhật mới nhất</h4>
					<button class="btn btn-danger btn-block" type="submit"
						name="register">Tạo tài khoản</button>
				</form>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</div>
<!--/Content-->