<!--Website THÔNG TIN GIAO THÔNG-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tin tức</title>
<link rel="icon" href="<?php echo base_url_ci;?>public/images/123-icon-mau.png" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="<?php echo base_url_ci;?>public/css/bootstrap3.0.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/style_DA_Home.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url_ci;?>public/css/style_DA_News.css" type="text/css" media="all" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- font -->
<!--// css -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url_ci;?>public/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url_ci;?>public/js/bootstrap3.0.js"></script>
</head>
<body>
<div class="header-w3layoutstop" >
		<div class="container">  
			<div class="search-grid">
					<form action="#" method="post">
						<input type="text" placeholder="Tìm kiếm" class="big-dog" name="Subscribe" required>
						<button class="btn2"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
			</div>
			<div class="hdr-w3right navbar-right">
				<?php if(!isset($_SESSION['user'])){?><p><span class="fa fa-user-circle-o"></span><a href="<?php echo base_url_ci;?>user/" style="color: #fff; font-size:18px">&nbsp;Đăng nhập</a> </p> 
				<?php }else{?>
				<div class="dropdown">
                <p class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user-circle-o"></span>
                <a href="" style="color: #fff; font-size:18px">&nbsp;<?php echo $_SESSION['user']['username']?></a> 
                    <p>
                    
                    <ul class="dropdown-menu">
                         <li><a href="#"><i class="fa fa-user"></i> &nbsp; <?php echo $_SESSION['user']['name']?></a></li>
                        <li><a href="#"><i class=" fa fa-envelope"></i> &nbsp; <?php echo $_SESSION['user']['email']?></a></li>
                        <li><a href="<?php echo base_url_ci;?>user/logout"><i class="fa fa-key"></i>&nbsp; Thoát</a></li>
                    </ul>
                 </div> 
        		<?php }?>
			</div>
        		
			
			
		</div>
	</div>