<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">Danh sách người dùng</div>
				<div class="row w3-res-tb">
					<div class="col-sm-3 ">
						<form action="<?php echo base_url_ci;?>admin/listUser" method="post">
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
								<th>Username</th>
                                <th>Họ & Tên</th>
                                <th>Email</th>
                                <th>Số ĐT</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
								<th style="width: 70px;">Chức năng</th>
							</tr>
						</thead>
						<tbody>
        <?php if(isset($user)){
        foreach ($user as $val) {?>
          <tr>
								<th><?php echo $val['id'];?></th>
								<th><?php echo $val['username'];?></th>
                                <th><?php echo $val['name'];?></th>
                                <th><?php echo $val['email'];?></th>
                                <th><?php echo $val['phone'];?></th>
                                <th><?php echo $val['address'];?></th>
                                <th><?php echo ($val['level']==1)?"Admin" : "User";?></th>
                                <th><?php echo $val['create_date'];?></th>
								<td><a href="<?php echo base_url_ci;?>admin/deleteUser/<?php echo $val['id'];?>" 
								onClick="return confirm('Bạn có muốn xóa không?')"><i
										class="fa fa-times text-danger"></i></a> &nbsp;
										<a href="<?php echo base_url_ci;?>admin/editUser/<?php echo $val['username'];?>"> <i
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
