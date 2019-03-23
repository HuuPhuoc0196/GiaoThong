<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>/public/js/countNew.js"></script>

<!--main content start-->

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Sửa số lượng bản tin</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>admin/countNews" method="post">
							<div class="input-group">
								<div class="form-group">
                                  <label for="count_news">Số bản tin: </label>
                                  <input type="text" class="form-control"  name="count_news" id="count_news" 
                                  value="<?php if(isset($countNews)) echo $countNews;?>" required>
                                </div>
                                <div id="countNew-sucess"></div>
							</div>
                                  <input class="btn btn-success mb-20" type="button" value="Cập nhật" name="countNews" onclick="CountNew.update()">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>
