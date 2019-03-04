<!-- navigation -->
<div class="nav-links">	
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="index.html">
                	<img class="logo" src="<?php echo base_url_ci;?>public/images/logo_DA.png"/>
                </a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav link-effect">
					<li<?php if(isset($home)) echo $home?>><a href="<?php echo base_url_ci;?>home"><i class="fa fa-fw fa-home"></i>Trang chủ</a></li>
					<li<?php if(isset($news)) echo $news?>><a href="<?php echo base_url_ci;?>news"><i class="fa fa-fw fa-newspaper-o"></i>&nbsp;Tin tức</a></li>
					<li<?php if(isset($map)) echo $map?>><a href="<?php echo base_url_ci;?>map"><i class="fa fa-fw fa-map"></i>&nbsp;Bản đồ</a></li>
					<li<?php if(isset($video)) echo $camera?>><a href="<?php echo base_url_ci;?>camera"><i class="fa fa-fw fa-video-camera"></i>&nbsp;Camera giao thông</a></li>
					<li<?php if(isset($contact)) echo $contact?>><a href="<?php echo base_url_ci;?>contact"><i class="fa fa-fw fa-book"></i>&nbsp;Liên hệ</a></li>
                    <li<?php if(isset($register)) echo $register?>><a href="<?php echo base_url_ci;?>user/register"><i class="fa fa-fw fa-sign-in"></i>&nbsp; Đăng ký</a></li>
				</ul>
			</div>
		</div>
<!-- /navigation -->