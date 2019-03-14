<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>public/js/adminMap.js"></script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Thêm mới bản đồ</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<h4 id="sucess"></h4>
						<form action="<?php echo base_url_ci;?>admin/addMap" method="post">
							<div class="input-group">
								<span>Địa chỉ</span> <br /> <input type="text" name="name"
									placeholder="Địa chỉ" id="name"
									style="width: 500px;" required>
							</div>
							<div id="name-error"></div>
							<div class="input-group">
								<span>Lat</span> <br /> <input type="text" name="lat"
									 placeholder="Lat" id="lat"
									style="width: 500px;" required>
							</div>
							<div id="lat-error"></div>
							<div class="input-group">
								<span>Lng</span><br /> <input type="text" name="lng"
									 placeholder="Lng" id="lng"
									style="width: 500px;" required>
							</div>
							<div id="lng-error"></div>
							<div class="input-group">
								<span>Trạng thái</span><br /> <input type="radio" name="status"
									id="rd1" value="1"> Hot<br> 
									<input type="radio" name="status" value="0"
									id="rd2" checked="checked"> Bình thường<br>
							</div>
							<div id="status-error"></div>
							<button class="btn btn-danger btn-block" type="button" 
							onclick="AdminMap.add()" name="add">Thêm mới</button>
						</form>
						<br /> <a href="<?php echo base_url_ci;?>admin/listMap"><button
								class="btn btn-sm btn-info btn-block mb-20" type="submit">Danh sách
								map</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>