<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Danh sách camera</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>camera/listCamera" method="post">
							<div class="input-group">
								<input type="text" class="input-sm form-control" name="search"
								value="<?php if(isset($search)) echo $search?>"
									placeholder="Tìm kiếm" /> <span class="input-group-btn">
									<button class="btn btn-sm btn-info" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</form>
						<div class="input-group">
								<a href="<?php echo base_url_ci;?>camera/addCamera"><button class="btn btn-sm btn-info" type="submit">
										Thêm mới</button></a>
							</div>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-5">
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped b-t b-light">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Camera</th>
								<th>Source</th>
                                <th>Mô tả</th>
                                <th>Trạng thái camera</th>
								<th style="width: 70px;">Chức năng</th>
							</tr>
						</thead>
						<tbody>
        <?php if(isset($camera)){
        foreach ($camera as $val) {?>
          <tr>
								<th><?php echo $val['id'];?></th>
								<th><?php echo $val['name'];?></th>
                                <th><?php echo $val['src'];?></th>
                                <th><?php echo $val['des'];?></th>
                                <th><?php echo ($val['status']==1)?"Không khả dụng" : "Khả dụng"?></th>
								<td><a href="<?php echo base_url_ci;?>camera/deleteCamera/<?php echo $val['id'];?>" 
								onClick="return confirm('Bạn có muốn xóa không?')"><i
										class="fa fa-times text-danger"></i></a> &nbsp;
										<a href="<?php echo base_url_ci;?>camera/editCamera/<?php echo $val['id'];?>"> <i
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
