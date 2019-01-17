<html>
<head>
	<title>Form Đăng ký User</title>
</head>
<body>
	<form action="<?php echo base_url_ci;?>user/updateProfile" method="post">
		<table>
			<tr>
				<td colspan="2">Cập nhật thông tin tài khoản: <?php echo $_SESSION['username'];?></td>
			</tr>	
			<tr>
				<td>Họ và tên:</td>
				<td><input type="text" id="name" name="name" value="<?php echo $_SESSION['user']['name'];?>"></td>
				<td><span class='text-denger'> <?php echo form_error('name'); ?> </span></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" id="email" name="email" value="<?php echo $_SESSION['user']['email'];?>"></td>
				<td><span class='text-denger'> <?php echo form_error('email'); ?> </span></td>
				<?php if(isset($error_email)) echo "<td><span class='text-denger'> {$error_email} </span></td>" ?>
			</tr>
			<tr>
				<td>Số điện thoại:</td>
				<td><input type="text" id="phone" name="phone" value="<?php echo $_SESSION['user']['phone'];?>"></td>
				<td><span class='text-denger'> <?php echo form_error('phone'); ?> </span></td>
			</tr>
			<tr>
				<td>Địa chỉ:</td>
				<td><input type="text" id="address" name="address" value="<?php echo $_SESSION['user']['address'];?>"></td>
				<td><span class='text-denger'> <?php echo form_error('address'); ?> </span></td>
			</tr>
			<tr>
				<td>Mật khẩu:</td>
				<td><input type="password" id="password" name="password"></td>
				<td><span class='text-denger'> <?php echo form_error('password'); ?> </span></td>
				<?php if(isset($error_password)) echo "<td><span class='text-denger'> {$error_password} </span></td>" ?>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update" value="Cập nhật"></td>
			</tr>
 
		</table>
		
	</form>
</body>
</html>