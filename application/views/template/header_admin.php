<!--Website THÔNG TIN GIAO THÔNG
-->
<!DOCTYPE html>
<head>
<title>Quản trị</title>
<link rel="icon" href="<?php echo base_url_ci;?>public/images/123-icon-mau.png" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo base_url_ci;?>public/css/style_Admin.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url_ci;?>public/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/font.css" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="<?php echo base_url_ci;?>public/js/jquery2.0.3.min.js"></script>
<script src="<?php echo base_url_ci;?>public/js/raphael-min.js"></script>
<script src="<?php echo base_url_ci;?>public/js/morris.js"></script>
<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
<?php if(!isset($_SESSION['login']))
{
    redirect(base_url_ci . 'admin/login');
}?>
<script>
	var base_url_ci = "<?php echo base_url_ci;?>";
</script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        GIAO THÔNG
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<?php if(isset($_SESSION['login'])){?>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo base_url_ci;?>public/images/iconNguoi.png">
                <span class="username"><?php echo $_SESSION['login']['name']?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-envelope"></i><?php echo $_SESSION['login']['email']?></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                <li><a href="<?php echo base_url_ci;?>admin/logout"><i class="fa fa-key"></i>Thoát</a></li>
            </ul>
        </li>

        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
<?php }?>
</header>
<!--header end-->
