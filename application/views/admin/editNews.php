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
						<form action="<?php echo base_url_ci;?>admin/editNews/<?php echo $news['id'];?>"
							method="post">
							<div class="input-group">
								<span>Tiêu đề</span> 
								<textarea name="title" cols="40" rows="5" required><?php echo $news['title'];?></textarea>
								
							</div>
							<span class="loi"> </span>
							<div class="input-group">
								<span>Nội dung tóm tắt</span>
								<textarea name="summary" cols="40" rows="5" required><?php echo $news['summary'];?></textarea>
							</div>
							<span class="loi"></span>
							<div class="input-group">
								<span>Source nguồn</span> <input type="text" name="source"
									placeholder="Source nguồn"
									value="<?php echo $news['source'];?>" required style="width:300px;">
							</div>
							<span class="loi"> </span>
							<div class="input-group">
								<span>Trạng thái</span><br/>
								<?php if($news['status'] == 1) {?>
								<input type="radio" name="status" value="1" checked="checked"> Hot<br>
  								<input type="radio" name="status" value="0"> Bình thường<br>
  								<?php } else {?>
  								<input type="radio" name="status" value="1"> Hot<br>
  								<input type="radio" name="status" value="0" checked="checked"> Bình thường<br>
  								<?php }?>
							</div>
							
							<button class="btn btn-danger btn-block" type="submit" name="update">Sửa đổi</button>

						</form><br/>
						<a href="<?php echo base_url_ci;?>admin/listNews" ><button
								class="btn btn-sm btn-info btn-block" type="submit">Danh sách bản tin</button></a>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('template/footer_admin');?>