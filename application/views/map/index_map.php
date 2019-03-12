<?php $data['data'] = 'Bản đồ';?>
<?php $data['map'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>

<div class="banner-bottom">
    <div class="container container_bg">

       
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
			<div class="sim-button button12" data-toggle="modal" data-target="#myModal">Thông báo tuyến đường đặc biệt </div> 
            <span id="result-map"></span>
                <div class="video-grids-left1">
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                <form>
                    <input type="search" placeholder="Tìm kiếm ngay">
                </form>
                
            <div class="clock-grids wow fadeInUp animated" data-wow-delay=".5s">
                <div class="clock-heading">
                    <h3>Đồng Hồ</h3>
                </div>
                <div class="clock-left">
                    <div id="myclock"></div>
                </div>
                <div class="clock-bottom">
                    <div class="clock">
                        <div id="Date"></div>
                        <ul>
                            <li id="hours"> </li>
                            <li id="point">:</li>
                            <li id="min"> </li>
                            <li id="point">:</li>
                            <li id="sec"> </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
			<div class="clearfix"> </div>
		
		<div class="modal fade" id="myModal" role="dialog">
			<!--Modal-->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
				
					<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="sim-button button12" >Thông báo tuyến đường kẹt xe </div> 
					<div class="sim-button button12" >Thông báo tuyến đường bị hư hỏng </div> 
					<div class="sim-button button12" >Thông báo tuyến đường đang xây dựng </div> 
					<div class="sim-button button12" >Thông báo tuyến đường xảy ra tai nạn </div> 
					</div>
					<div class="modal-footer">
					<button type="button" class="btn-red" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
			
	</div>
</div>
<?php $this->load->view('template/footer');?>