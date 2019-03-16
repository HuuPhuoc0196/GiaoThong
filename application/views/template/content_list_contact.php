<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Danh sách phản hồi</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>contact/listContact" method="post">
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
								<th>Tên người phản hồi</th>
								<th>Email</th>
                                <th>Nội dung</th>
                                <th>Thời gian phản hồi</th>
								<th style="width: 70px;">Chức năng</th>
							</tr>
						</thead>
						<tbody>
        <?php if(isset($contact)){
        foreach ($contact as $val) {?>
          <tr>
								<th><?php echo $val['id'];?></th>
								<th><?php echo $val['name'];?></th>
                                <th><?php echo $val['email'];?></th>
                                <th><?php echo $val['content'];?></th>
                                <th><?php echo $val['create_date'];?></th>
								<td><a href="<?php echo base_url_ci;?>contact/deleteContact/<?php echo $val['id'];?>" 
								onClick="return confirm('Bạn có muốn xóa không?')"><i
										class="fa fa-times text-danger"></i></a> &nbsp;
							</tr>
          <?php }}?>
        </tbody>
					</table>
				</div>
				<footer class="panel-footer">
					<ul class="pagination modal-3">
                        <?php if (isset($links)) { ?>
                            <?php echo $links ?>
                        <?php }?>
                    </ul>
				</footer>
			</div>
		</div>
	</section>
