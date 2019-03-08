<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>/public/js/countCamera.js"></script>

<!--main content start-->

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Số lượng camera</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>admin/countCamera" method="post">
							<div class="input-group">
								<div class="form-group">
                                  <label for="count_camera">Số camera: </label>
                                  <input type="text" class="form-control"  name="count_camera" id="count_camera" 
                                  value="<?php if(isset($countCamera)) echo $countCamera;?>" required>
                                </div>
                                <div id="countCamera-sucess"></div>
							</div>
                                  <input class="btn btn-success" type="button" value="Sửa đổi" name="countCamera" onclick="CountCamera.update()">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>
