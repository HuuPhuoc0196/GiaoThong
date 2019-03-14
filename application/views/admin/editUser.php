<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>public/js/adminUser.js"></script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Cập nhật Thông tin người dùng</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>admin/editUser/<?php echo $user['username'];?>"
							method="post">
							<input type="text" id="username" value="<?php echo $user['username'];?>" style="display: none;">
							<div class="input-group">
								<span>Email</span> <br/>
								 <input type="email" name="email"
									value="<?php echo $user['email'];?>" placeholder="Email" id="email"
									style="width:500px;" required>
							</div>
							<div id="email-error"></div>
							<div class="input-group">
								<span>Họ và Tên</span> 
								 <input type="text" name="name"
									value="<?php echo $user['name'];?>" placeholder="Họ và tên" id="name"
									style="width:500px;" required>
							</div>
							<div id="name-error"></div>
							
							<div class="input-group">
								<span>Số điện thoại</span> 
								 <input type="number" name="phone"
									value="<?php echo $user['phone'];?>" placeholder="Số điện thoại" id="phone"
									style="width:500px;" required>
							</div>
							<div id="phone-error"></div>
							
								<div class="input-group">
								<span>Địa chỉ</span> 
								 <input type="text" name="address"
									value="<?php echo $user['address'];?>" placeholder="Địa chỉ" id="address"
									style="width:500px;" required>
							</div>
							<div id="address-error"></div>
							
							<div class="input-group">
								<span>Loại tài khoản</span><br/>
								<?php if($user['level'] == 1) {?>
								<input type="radio" name="level" value="1" checked="checked">
								Admin<br> <input type="radio" name="level" value="0"> Member<br>
  								<?php } else {?>
  								<input type="radio" name="level" value="1"> Admin<br> <input
									type="radio" name="level" value="0" checked="checked"> Member<br>
  								<?php }?>
							</div>
							
							<button class="btn btn-danger btn-block" type="button" name="update" onclick="AdminUser.update()">Sửa đổi</button>

						</form><br/>
						<a href="<?php echo base_url_ci;?>admin/listUser" ><button
								class="btn btn-sm btn-info btn-block mb-20" type="submit">Danh sách người dùng</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>