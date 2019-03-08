
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
	<script src="<?php echo base_url_ci;?>public/js/adminLogin.js"></script>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
	</script>

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
					<input placeholder="Tên tài khoản" id="username" name="username" type="text" style="color:#090" required>
				</div>
				<div class="form-style-agile">
					<label>
						<i class="fa fa-unlock-alt"></i>Mật khẩu</label>
					<input placeholder="Mật khẩu" id="password" name="password" type="password"  style="color:#090" required >
				</div>
				
					<div id="login-error"></div>
				<!-- //switch -->
				<input type="button" id="login" name="login" value="Đăng nhập" class="custom-button-login sub-main-w3" onclick="AdminLogin.login()">
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

<script>

document.onkeyup = function (event) {
	  if (event.which == 13 || event.keyCode == 13) {
		  $('#login').click();
	  }
};
</script>

</body>

</html>