<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="<?php echo base_url_ci;?>admin" <?php if(isset($adminPage)){echo $adminPage;} ?>>
                        <i class="fa fa-dashboard"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($homePage)){echo $homePage;} ?>>
                        <i class="fa fa-home"></i>
                        <span>Quản lý trang chủ</span>
                    </a>
                    <ul class="sub">
						<li><a href="<?php echo base_url_ci;?>admin/countNews"><i class="fa fa-caret-right"></i> Số lượng bản tin hot</a></li>
						<li><a href="<?php echo base_url_ci;?>admin/countCamera"><i class="fa fa-caret-right"></i> Số lượng camera hot</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($newsPage)){echo $newsPage;} ?>>
                        <i class="fa fa-newspaper-o"></i>
                        <span>Quản lý tin tức</span>
                    </a>
                    <ul class="sub">
                    	<li><a href="<?php echo base_url_ci;?>admin/listNews"><i class="fa fa-caret-right"></i>Danh sách tin tức</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($mapPage)){echo $mapPage;} ?>>
                        <i class="fa fa-map-o"></i>
                        <span>Quản lý bản đồ</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url_ci;?>admin/listMap"><i class="fa fa-caret-right"></i>Danh sách bản đồ</a></li>
                       
						
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($userPage)){echo $userPage;} ?>>
                        <i class="fa fa-user-plus"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url_ci;?>admin/listUser" ><i class="fa fa-caret-right"></i>Danh sách tài khoản</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($domPage)){echo $domPage;} ?>>
                        <i class="fa fa-newspaper-o"></i>
                        <span>Quản lý mã nguồn tin tức</span>
                    </a>
                    <ul class="sub">
                    	<li><a href="<?php echo base_url_ci;?>admin/listDom"><i class="fa fa-caret-right"></i>Danh sách mã nguồn</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($cameraPage)){echo $cameraPage;} ?>>
                        <i class="fa fa-video-camera"></i>
                        <span>Quản lý camera</span>
                    </a>
                    <ul class="sub">
                    	<li><a href="<?php echo base_url_ci;?>camera/listCamera"><i class="fa fa-caret-right"></i>Danh sách camera</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="#" <?php if(isset($contactPage)){echo $contactPage;} ?>>
                        <i class="fa fa-envelope"></i>
                        <span>Quản lý phản hồi</span>
                    </a>
                    <ul class="sub">
                    	<li><a href="<?php echo base_url_ci;?>contact/listContact"><i class="fa fa-caret-right"></i>Danh sách phản hồi</a></li>
                    </ul>
                </li>
               
            </ul>            
           </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->