<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>public/js/adminCamera.js"></script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Thêm mới Camera</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<h4 id="sucess"></h4>
						<form action="<?php echo base_url_ci;?>admin/addCamera" method="post">
							<div class="input-group">
								<span>Tên camera</span> <br /> <input type="text" name="name"
									value="" placeholder="Tên camera"
									id="name" style="width:500px;" required>
							</div>
							<div id="name-error"></div>
							<div class="input-group">
								<span>Source</span> <br /> <input type="text" name="src"
									value="" placeholder="Source"
									id="src" style="width:500px;" required>
							</div>
							<div id="src-error"></div>
							<div class="input-group">
								<span>Mô tả</span> <br /> <input type="text" name="des"
									value="" placeholder="Mô tả"
									id="des" style="width:500px;" required>
							</div>
							<div id="des-error"></div>
							<div class="input-group">
								<span>Trạng thái</span><br/>
								<input type="radio" name="status" value="0" checked="checked" id="rd1"> Khả dụng<br>
								<input type="radio" name="status" value="1" id="rd2">Không khả dụng<br> 
							</div>
							<div id="status-error"></div>
						</form><br/>
							<button class="btn btn-danger btn-block" type="button" 
							onclick="AdminCamera.add()" name="add">Thêm mới</button>
						</form>
						<br /> <a href="<?php echo base_url_ci;?>camera/listCamera"><button
								class="btn btn-sm btn-info btn-block" type="submit">Danh sách
								camera</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>