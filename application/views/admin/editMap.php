<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Sửa Thông tin bản tin</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form
							action="<?php echo base_url_ci;?>admin/editMap/<?php if(isset($map['id'])) echo $map['id'];?>"
							method="post">
							<div class="input-group">
								<span>Địa chỉ</span> <br /> <input type="text" name="name"
									value="<?php echo (isset($map['name']))?$map['name']:set_value('name');?>" placeholder="Địa chỉ"
									style="width:500px;" required>
							</div>
							<span class="loi"> <?php echo form_error("name"); ?></span>
							<div class="input-group">
								<span>Lat</span> <br /> <input type="text" name="lat"
									value="<?php echo (isset($map['lat']))?$map['lat']:set_value('lat');?>" placeholder="Lat"
									style="width:500px;" required>
							</div>
							<span class="loi"><?php echo form_error("lat"); ?></span>
							<div class="input-group">
								<span>Lng</span><br /> <input type="text" name="lng"
									value="<?php echo (isset($map['lng']))?$map['lng']:set_value('lng');?>" placeholder="Lng"
									style="width:500px;" required>
							</div>
							<span class="loi"><?php echo form_error("lng"); ?> </span>
							<div class="input-group">
								<span>Trạng thái</span><br/>
								<?php if(isset($map['status'])&&$map['status'] == 1) {?>
								<input type="radio" name="status" value="1" checked="checked">
								Hot<br> <input type="radio" name="status" value="0"> Bình thường<br>
  								<?php } else {?>
  								<input type="radio" name="status" value="1"> Hot<br> <input
									type="radio" name="status" value="0" checked="checked"> Bình
								thường<br>
  								<?php }?>
							</div>

							<button class="btn btn-danger btn-block" type="submit"
								name="update">Sửa đổi</button>

						</form><br/>
						<a href="<?php echo base_url_ci;?>admin/listMap" ><button
								class="btn btn-sm btn-info btn-block" type="submit">Danh sách map</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>