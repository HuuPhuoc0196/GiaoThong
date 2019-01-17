<?php $this->load->view('template/header_admin');?>
<?php $this->load->view('template/menu_admin');?>

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
							<div class="input-group">
								<span>Url:</span> <br /> <input type="text" name="url"
									value="<?php echo (isset($dom['url']))?$dom['url']:set_value('url');?>"
									placeholder="Địa chỉ Url" style="width: 500px;" required>
							</div>
							<span class="loi"> <?php echo form_error("url"); ?></span>
							<div class="input-group">
								<span>Source Nguồn:</span> <br /> <input type="text" name="source"
									value="<?php echo (isset($dom['source']))?$dom['source']:set_value('source');?>"
									placeholder="Source Nguồn" style="width: 500px;" required>
							</div>
							<span class="loi"><?php echo form_error("source"); ?></span>
							<div class="input-group">
								<span>Pattern:</span><br /> <input type="text" name="pattern"
									value="<?php echo (isset($dom['pattern']))?$dom['pattern']:set_value('pattern');?>"
									placeholder="Pattern" style="width: 500px;" required>
							</div>
							<span class="loi"><?php echo form_error("pattern"); ?> </span>
							<div class="input-group">
								<span>Pattern Detail:</span><br /> <input type="text" name="pattern_detail"
									value="<?php echo (isset($dom['pattern_detail']))?$dom['pattern_detail']:set_value('pattern_detail');?>"
									placeholder="Pattern Detail" style="width: 500px;" required>
							</div>
							<span class="loi"><?php echo form_error("pattern"); ?> </span>
							
							<button class="btn btn-danger btn-block" type="submit"
								name="update">Sửa đổi</button>

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
