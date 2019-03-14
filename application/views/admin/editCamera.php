<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>public/js/adminCamera.js"></script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Sửa Thông tin Camera</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form
							action="<?php echo base_url_ci;?>camera/editCamera/<?php echo $camera['id'];?>"
							method="post">
							<input type="text" id="idCamera" value="<?php echo $camera['id'];?>" style="display: none;">
							<div class="input-group">
								<span>Tên camera</span> <br /> <input type="text" name="name"
									value="<?php echo $camera['name'];?>" placeholder="Tên camera"
									id="name" style="width:500px;" required>
							</div>
							<div id="name-error"></div>
							<div class="input-group">
								<span>Source</span> <br /> <input type="text" name="src"
									value="<?php echo $camera['src'];?>" placeholder="Source"
									id="src" style="width:500px;" required>
							</div>
							<div id="src-error"></div>
							<div class="input-group">
								<span>Mô tả</span> <br /> <input type="text" name="des"
									value="<?php echo $camera['des'];?>" placeholder="Mô tả"
									id="des" style="width:500px;" required>
							</div>
							<div id="des-error"></div>
							<div class="input-group">
								<span>Trạng thái</span><br/>
								<?php if(isset($camera['status'])&&$camera['status'] == 1) {?>
								<input type="radio" name="status" value="0"> Khả dụng<br>
								<input type="radio" name="status" value="1" checked="checked">Không khả dụng<br> 
  								<?php } else {?>
  								 <input type="radio" name="status" value="0" checked="checked"> Khả dụng<br>
  								<input type="radio" name="status" value="1"> Không khả dụng<br>
  								<?php }?>
							</div>
							<div id="status-error"></div>
							<button class="btn btn-danger btn-block" type="button"
								name="update" onclick="AdminCamera.update()">Sửa đổi</button>

						</form><br/>
						<a href="<?php echo base_url_ci;?>camera/listCamera" ><button
								class="btn btn-sm btn-info btn-block mb-20" type="submit">Danh sách camera</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>