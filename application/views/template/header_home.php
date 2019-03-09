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
    </head>

    <body>
        <!-- banner -->
        <div class="banner">
            <div class="banner-info">
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
                                <a class="navbar-brand" href="index.php"><span><img
                                            class="lg" src="<?php echo base_url_ci;?>public/images/logo.png"></span>
                                    Giao Thông</a>
                            </div>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil"
                            id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav"id="cl-effect-18">
                                <li <?php if(isset($home)) echo $home?>><a href="index.php"
                                        >Trang chủ</a></li>
                                <li><a href="map.php">Bản đồ</a></li>
                                <li><a href="camera.php">Camera</a></li>

                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle"
                                        data-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true"
                                        aria-expanded="false">
                                        Bản Tin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="news_at.php">an toàn giao thông</a></li>
                                        <li><a href="news_xp.php">luật giao thông
                                                </a></li>
                                      
                                    </ul>
                                </li>
                                <li><a href="aboutus.php">Giới Thiệu</a></li>
                                <li><a href="contact.php">Liên Hệ</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->

                    </nav>
                    <!--banner-Slider-->
                    <script src="<?php echo base_url_ci;?>public/js/responsiveslides.min.js"></script>
                    <script>
                    // You can also use "$(window).load(function() {"
                    $(function() {
                        // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: true,
                            speed: 500,
                            namespace: "callbacks",
                            before: function() {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function() {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>