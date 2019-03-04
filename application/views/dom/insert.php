<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>
<script src="<?php echo base_url_ci;?>public/js/dom.js"></script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Sửa Thông tin DOM</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<h4 class="sucess"></h4>
						<form action="<?php echo base_url_ci;?>admin/addDom" method="post">
							<div class="input-group">
								<span>Url:</span> <br /> <input type="text" name="url" id="url"
									value="" placeholder="Địa chỉ Url"
									style="width: 500px;" required>
							</div>
							<div id="url-error"></div>
							<div class="input-group">
								<span>Source Nguồn:</span> <br /> <input type="text"
									name="source" value="" id="source"
									placeholder="Source Nguồn" style="width: 500px;" required>
							</div>
							<div id="source-error"></div>
							<div class="input-group">
								<span>Pattern:</span><br /> <input type="text" name="pattern"
									value="" placeholder="Pattern" id="Pattern"
									style="width: 500px;" required>
							</div>
							<div id="pattern-error"></div>
							<div class="input-group">
								<span>Pattern Detail:</span><br /> <input type="text"
									name="pattern_detail"
									value="" id="pattern_detail"
									placeholder="Pattern Detail" style="width: 500px;" required>
							</div>
							<div id="pattern_detail-error"></div>

							<button class="btn btn-danger btn-block" type="button" name="add" onclick="Dom.add()">Thêm
								mới DOM</button>

						</form>
						<br /> <a href="<?php echo base_url_ci;?>admin/listDom"><button
								class="btn btn-sm btn-info btn-block" type="submit">Danh sách
								DOM</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
</section>
<?php $this->load->view('template/footer_admin');?>
