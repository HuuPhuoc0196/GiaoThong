<!DOCTYPE HTML>
<html>
    <head>
        <title><?php if(isset($data)) echo $data; else echo "Trang chủ"?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url_ci;?>public/images/logo1.png" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       
        <!-- Custom Theme files -->
        <link href="<?php echo base_url_ci;?>public/css/bootstrap.css" rel="stylesheet" type="text/css"
            media="all" />
        <link href="<?php echo base_url_ci;?>public/css/style.css" rel="stylesheet" type="text/css" media="all"
            />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- js -->
        <script src="<?php echo base_url_ci;?>public/js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <link href="<?php echo base_url_ci;?>public/css/mfb.min.css" rel="stylesheet" type="text/css"
            media="all" />
            <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
		<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
     <!-- for bootstrap working -->
        <script src="<?php echo base_url_ci;?>public/js/bootstrap.js"></script>
        <!-- //for bootstrap working -->	
    	<script type="text/javascript">

        function showError(error) {
        	switch(error.code) {
        		case error.PERMISSION_DENIED:
        			showAlertError("Trình duyệt không cho phép định vị");
        			break;
        		case error.POSITION_UNAVAILABLE:
        			showAlertError("Không có thông tin");
        			break;	
        		case error.TIMEOUT:
        			showAlertError("Hết thời gian");
        			break;
        		case error.UNKNOWN_ERROR:
        			showAlertError("Lỗi chưa xác định");
        			break;
        	}
        }
        </script>
    </head>
    <body>
        <!-- banner -->
        <div class="banner1">
            <div class="banner-info1">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle
                                collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="logo">
                                <a class="navbar-brand" href="<?php echo base_url_ci;?>home"><span><img
                                            class="lg" src="<?php echo base_url_ci;?>public/images/logo.png"></span>
                                    Giao Thông</a>
                            </div>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil"
                            id="bs-example-navbar-collapse-1" style="padding-bottom: 0px;">
                            <ul class="nav navbar-nav"id="cl-effect-18">
                                <li <?php if(isset($home)) echo $home?>><a href="<?php echo base_url_ci;?>home"
                                        >Trang chủ</a></li>
                                <li <?php if(isset($map)) echo $map?>><a href="<?php echo base_url_ci;?>map">Bản đồ</a></li>
                                <li <?php if(isset($camera)) echo $camera?>><a href="<?php echo base_url_ci;?>camera">Camera</a></li>
                                <li <?php if(isset($news)) echo $news?>><a href="<?php echo base_url_ci;?>news">Tin Tức</a></li>
                                <li <?php if(isset($aboutus)) echo $aboutus?>><a href="<?php echo base_url_ci;?>aboutus">Giới Thiệu</a></li>
                                <li <?php if(isset($contact)) echo $contact?>><a href="<?php echo base_url_ci;?>contact">Liên Hệ</a></li>
                            	<li onClick="showMap()" title="Thông Báo Tuyến Đường Đặt Biệt" style="cursor: pointer;">
                            		<a>
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->

                    </nav>
                </div>
		</div>
	</div>
    
<!-- //banner -->


