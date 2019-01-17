<!--Content-->
<?php if(isset($_SESSION['user']))
{
    redirect(base_url_ci . 'home');
}?>
<style>
			.error{
				color: red;
			}
	   </style>
<div class="video-w3l" dir="ltr" >
		<!-- title -->
		<h1>
			
			<span>Đ</span>ăng
			<span>N</span>hập</h1>
		<!-- //title -->
		<div class="sub-main-w3">
			<form action="<?php echo base_url_ci;?>user/login" method="post">
				<div class="form-style-agile">
					<label>
						<i class="fa fa-user"></i>Tên tài khoản</label>
					<input placeholder="Tên tài khoản" name="username" type="text" style="color:#090"
                    value="<?php if(isset($_SESSION['infoUser'])) echo $_SESSION['infoUser']['username'];?>" required>
                    <p class="error"> <?php echo form_error('username'); ?></p>
				</div>
				<div class="form-style-agile">
					<label>
						<i class="fa fa-unlock-alt"></i>Mật khẩu</label>
					<input placeholder="Mật khẩu" name="password" type="password"  style="color:#090" 
					value="<?php if(isset($_SESSION['infoUser'])) echo $_SESSION['infoUser']['password'];?>" required>
                    <p class="error"><?php echo form_error('password'); ?></p>
				</div>
				<!-- switch -->
				<div class="checkout-w3l">
					<div class="demo5">
						<div class="switch demo3">
							<input type="checkbox">
							<label>
								<i></i>
							</label>
						</div>
					</div>
					<a href="#">Nhớ đăng nhập của bạn</a>
				</div>
				<!-- //switch -->
				<input type="submit" value="Đăng nhập" name="login">
				<p class="error"><?php if(isset($error_login)) echo $error_login ?></p>
                <div class="dk">Bạn chưa có tài khoản?<a href="<?php echo base_url_ci;?>user/register">Đăng ký</a></div>
			</form>
		</div>
     </div>
<!--/Content-->
	