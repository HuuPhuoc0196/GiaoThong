<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Sửa số lượng bản đồ</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
					 <?php if(isset($mess)) echo $mess;?>
						<form action="<?php echo base_url_ci;?>admin/countMap" method="post">
							<div class="input-group">
								<div class="form-group">
                                  <label for="count_news">Số bản tin: </label>
                                  <input type="text" class="form-control"  name="count_map" id="count_map" 
                                   value="<?php echo $countMap;?>" required>
                                </div>
							</div>
                                  <input class="btn btn-success" type="submit" value="Sửa đổi" name="countMap">
						</form>
					</div>
					</div>
			</div>
		</div>
	</section>

<?php $this->load->view('template/footer_admin');?>
