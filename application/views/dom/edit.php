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
						<form
							action="<?php echo base_url_ci;?>admin/editDom/<?php if(isset($dom['id'])) echo $dom['id'];?>"
							method="post">
							<input type="text" id="idDom" value="<?php echo $dom['id'];?>" style="display: none;">
							<div class="input-group">
								<span>Url:</span> <br /> <input type="text" name="url" id="url"
									value="<?php echo $dom['url'];?>"
									placeholder="Địa chỉ Url" style="width: 500px;" required>
							</div>
							<div id="url-error"></div>
							<div class="input-group">
								<span>Source Nguồn:</span> <br /> <input type="text" name="source" id="source"
									value="<?php echo htmlentities($dom['source']);?>"
									placeholder="Source Nguồn" style="width: 500px;" required>
							</div>
							<div id="source-error"></div>
							<div class="input-group">
								<span>Pattern:</span><br /> <input type="text" name="pattern" id="pattern"
									value="<?php echo htmlentities($dom['pattern']);?>"
									placeholder="Pattern" style="width: 500px;" required>
							</div>
							<div id="pattern-error"></div>
								<div class="input-group">
								<span>Pattern:</span><br /> <input type="text" name="pattern_content" id="pattern_content"
									value="<?php echo htmlentities($dom['pattern_content']);?>"
									placeholder="Pattern content" style="width: 500px;" required>
							</div>
							<div id="pattern_content-error"></div>
							<div class="input-group">
								<span>Pattern Detail:</span><br /> <input type="text" name="pattern_detail"
									id="pattern_detail" value="<?php echo htmlentities($dom['pattern_detail']);?>"
									placeholder="Pattern Detail" style="width: 500px;" required>
							</div>
							<div id="pattern_detail-error"></div>
							
							<button class="btn btn-danger btn-block" type="button" onclick="Dom.update()"
								name="update">Sửa đổi</button>

						</form>
						<br /> <a href="<?php echo base_url_ci;?>admin/listDom"><button
								class="btn btn-sm btn-info btn-block mb-20" type="submit">Danh sách
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
