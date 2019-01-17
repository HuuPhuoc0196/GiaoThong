<?php
$data['data'] = 'Tin tức';
$menu_class['news'] = ' class="active"';
$this->load->view('template/header', $data);
$this->load->view('template/menu',$menu_class);
?>
<section class="banner-bottom menu" id="menu">
	<div class="container">
		<h3 class="tittle">Tin tức giao thông</h3>
		




<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="menu-grids my-lg-4 my-md-2">
								<div class="row inner-menu mt-4">
								<?php foreach ($result as $val) {?>
									<div class="col-md-6 menu-grid-left aos-init aos-animate" data-aos="fade-down" style="height: 500px;">
										<div class="row mt-2">
											<div class="col-md-5 menu-img">
												<a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
												<img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" class="img-fluid rounded-circle" alt=""></a>
											</div>
											<div class="col-md-7 menu-img-info mt-4 mt-md-2">
												<h5><?php echo $val['title'];?></h5>
												<p class="sub-meta mt-2">

													<?php echo $val['source'];?> </p>
                                                    <p><?php echo $val['summary'];?></p>
											</div>
										</div>

									</div>
									<?php }?>
								</div>
							</div>
						</div>

					</div>
</section>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6 chuyen_trang">
		<?php if (isset($links)) { ?>
					<?php echo $links ?>
				<?php } ?> 
	</div>
	<div class="col-lg-3"></div>
		</div>
<?php
$this->load->view('template/footer');
?>
