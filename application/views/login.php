
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Login</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	
	<link rel="icon" href="<?php echo base_url_ci;?>public/images/123-icon-mau.png" type="image/x-icon"/>
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/style_login.css" type="text/css" media="all" />
	<!-- Style-CSS -->

	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //web-fonts -->
	
		<style>
			.error{
				color: red;
			}
	   </style>
</head>
<?php if(isset($_SESSION['login']))
{
    redirect(base_url_ci . 'admin');
}?>
<body>
	<div class="video-w3l" data-vide-bg="<?php echo base_url_ci;?>public/video/1">
		<!-- title -->
		<h1>
			
			<span>Đ</span>ăng
			<span>N</span>hập</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<form action="<?php echo base_url_ci;?>admin/login" method="post">
				<div class="form-style-agile">
					<label>
						<i class="fa fa-user"></i>Tên tài khoản</label>
						<span class="error"><?php echo form_error('username'); ?></span>
					<input placeholder="Tên tài khoản" name="username" value="<?php echo set_value('username'); ?>" type="text" style="color:#090" required>
				</div>
				<div class="form-style-agile">
					<label>
						<i class="fa fa-unlock-alt"></i>Mật khẩu</label>
						<span class="error"><?php echo form_error('password'); ?></span>
					<input placeholder="Mật khẩu" name="password" type="password"  style="color:#090" required >
				</div>
				
					<?php if(isset($error_login)) echo "<span class='error'> {$error_login} </span>" ?>
				<!-- //switch -->
				<input type="submit" name="login" value="Đăng nhập">
			</form>
		</div>
		<!-- //content -->

		<!-- copyright -->
		<div class="footer">
			<p>Copyright &copy; 2018 THÔNG TIN GIAO THÔNG
			</p>
		</div>
		<!-- //copyright -->
	</div>

	
	<!-- Jquery -->
	<script src="<?php echo base_url_ci;?>public/js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->

	<!-- Video js -->
	<script src="<?php echo base_url_ci;?>public/js/jquery.vide.min.js"></script>
	<!-- //Video js -->

</body>

</html>