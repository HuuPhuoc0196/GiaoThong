
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Danh sách bản tin</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>admin/listNews" method="post">
							<div class="input-group">
								<input type="text" class="input-sm form-control" name="search"
									placeholder="Tìm kiếm" /> <span class="input-group-btn">
									<button class="btn btn-sm btn-info" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</form>
						
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5">
						<!-----Modal-New----->
						<div aria-hidden="true" aria-labelledby="myModalLabel"
							role="dialog" tabindex="-1" id="myModal-New" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button aria-hidden="true" data-dismiss="modal" class="close"
											type="button">Ă—</button>
										<h4 class="modal-title">
											<i class="fa fa-plus"></i> &nbsp; ThĂªm tĂ i khoáº£n
										</h4>
									</div>
									<div class="modal-body">


									</div>

								</div>
							</div>
						</div>
						<!-----//Modal-New----->
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped b-t b-light">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tiêu đề</th>
								<th>Tóm tắt</th>
								<th>Nguồn</th>
								<th>Trạng thái</th>
								<th style="width: 70px;">Chức năng</th>
							</tr>
						</thead>
						<tbody>
        <?php 
        if(isset($listnews)) {
        foreach ($listnews as $val) {?>
          <tr>
								<td><?php echo $val['id'];?></td>
								<td><?php echo $val['title'];?></td>
								<td><?php echo $val['summary'];?></td>
								<td><?php echo $val['source'];?></td>
								<td><?php echo ($val['status'] == 1)?"Hot":"Bình thường"?></td>
								<td><a href="<?php echo base_url_ci;?>admin/deleteNews/<?php echo $val['id'];?>" 
								onClick="return confirm('Bạn có muốn xóa không?')"><i
										class="fa fa-times text-danger"></i></a> &nbsp;
										<a href="<?php echo base_url_ci;?>admin/editNews/<?php echo $val['id'];?>" > <i
										class="fa fa-edit text-success text-active"></i></a></td>
							</tr>
          <?php }?>
        </tbody>
					</table>
				</div>
				<footer class="panel-footer">
					<div class="row">

						<?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } }?>
					</div>
				</footer>
			</div>
		</div>
	</section>