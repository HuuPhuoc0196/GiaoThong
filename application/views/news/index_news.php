<?php $data['data'] = 'Tin Tức';?>
<?php $data['news'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>

<!-- breaking-news -->
<div class="breaking-news">
		<div class="container container_bg">
        <?php $this->load->view('template/move_text');?>
			<div class="breaking-news-grids">
				<div class="col-md-8 breaking-news-grid-left">
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
						<?php for($i = 0; $i < 2; $i++){
						    if(!isset($hotNews[$i])){
						        continue;
						    }
						?>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="baner-beaking" style="background: url(<?php echo base_url_ci;?>public/images/<?php echo $hotNews[$i]['image']?>) no-repeat 0px 0px; background-size:cover;">
										<a href="<?php echo base_url_ci;?>news/detail/<?php echo $hotNews[$i]['id'];?>">
										<p><?php echo $hotNews[$i]['title'];?></p></a>
									</div>
								</div>
							</article>
							<?php }?>
						</div>
					</div>
					<script src="<?php echo base_url_ci;?>public/js/jquery.wmuSlider.js"></script> 
					  <script>
						$('.example1').wmuSlider();         
					 </script> 
                
            </div>
				<div class="col-md-4 upcoming-events-right">
    				 <form class=".pt-10-custom" action="<?php echo base_url_ci;?>news/index" method="post">
                    	<span id="b2"><?php if(empty($hotNews)){echo "Không tìm thấy!";}?></span>
                        <input type="search" placeholder="Tìm kiếm bản tin" name="search" id="search"
                         value="<?php if(isset($search)) echo $search?>">
                        <button type="submit" id="btn-search" style="display: none;"></button>
                	</form>
                	<!-- Alert -->
                	
                	<!-- // Alert -->
                 <div class="clock-grids wow fadeInUp animated" data-wow-delay=".5s">
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
        </div>
			<div class="news">
            <div class="news-grids">
                <div class="col-md-8 news-grid-left">
                <?php if(count($hotNews) > 1){?>
                    <h3>Tin tức liên quan</h3>
                    <ul>
                    <?php for($i = 2; $i < count($hotNews); $i++){?>
                        <li>
                            <div class="news-grid-left1">
                                <img src="<?php echo base_url_ci;?>public/images/<?php echo $hotNews[$i]['image']?>" alt=" " class="img-responsive" />
                            </div>
                            <div class="news-grid-right1">
                                <h4><a href="<?php echo base_url_ci;?>news/detail/<?php echo $hotNews[$i]['id'];?>"><?php echo $hotNews[$i]['title'];?></a></h4>
                                <h5>Bởi: <i><?php echo $hotNews[$i]['source'];?></i> <label>|</label> <i><?php echo $hotNews[$i]['time_post'];?></i></h5>
                                <p><?php echo $hotNews[$i]['summary'];?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>
                    <ul class="pagination modal-3">
                        <?php if (isset($links)) { ?>
                            <?php echo $links ?>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-md-4 upcoming-events-right">
                	<h3>Bạn có biết ?</h3>
                 <div class="banner-bottom-video-grid-left">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Quy định về đèn
                                        vàng
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingOne" style="height: 0px;">
                                <div class="panel-body">
                                    Tại khoản 3 Điều 10, đèn giao thông được quy định bao gồm: Đèn xanh, Đèn đỏ và Đèn
                                    vàng. Trong đó, đèn xanh là được đi; đèn đỏ là cấm đi.
                                    <br>
                                    Đèn vàng là phải dừng lại trước vạch dừng, trừ trường hợp đã đi quá vạch dừng thì
                                    được đi tiếp; trong trường hợp tín hiệu vàng nhấp nháy là
                                    được đi nhưng phải giảm tốc độ, chú ý quan sát, nhường đường cho người đi bộ qua
                                    đường.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i> Vượt xe phải báo
                                        hiệu bằng đèn hoặc còi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo" style="height: 0px;">
                                <div class="panel-body">
                                    Điều 14 quy định, xe xin vượt phải có báo hiệu bằng đèn hoặc còi; trong đô thị và
                                    khu đông dân cư từ 22 giờ đến 5 giờ chỉ được báo hiệu xin vượt bằng đèn.
                                    <br>
                                    Khi vượt, các xe phải vượt về bên trái, trừ khi xe phía trước có tín hiệu rẽ trái
                                    hoặc đang rẽ trái; khi xe điện đang chạy giữa đường; khi xe chuyên
                                    dùng đang làm việc trên đường mà không thể vượt bên trái được.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i> Bảy nơi không được
                                        lùi xe
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingThree" style="height: auto;">
                                <div class="panel-body">
                                    Điều 16 quy định, không được lùi xe tại các địa điểm sau:<br>
                                    - Ở khu vực cấm dừng<br> - Trên phần đường dành cho người đi bộ qua đường
                                    <br> - Nơi đường bộ giao nhau <br> - Nơi đường bộ giao với đường sắt
                                    <br>- Nơi tầm nhìn bị che khuất <br>- Trong hầm đường bộ<br> - Đường cao tốc
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i> Dừng, đỗ xe không
                                        cách lề đường phố quá 0,25m
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingFour" style="height: 0px;">
                                <div class="panel-body">
                                    Nguyên tắc dừng, đỗ xe trên đường phố được quy định tại Điều 19 Luật Giao thông
                                    đường bộ như sau: Phải cho xe dừng, đỗ sát theo lề đường, hè phố phía bên phải theo
                                    chiều đi của mình;
                                    bánh xe gần nhất không được cách lề đường, hè phố quá 0,25m;
                                    trường hợp đường phố hẹp, phải dừng xe, đỗ xe ở vị trí cách xe ô tô đang đỗ bên kia
                                    đường tối thiểu 20m.
                                    <br>
                                    Không được dừng xe, đỗ xe trên đường xe điện, trên miệng cống thoát nước, miệng hầm
                                    của đường điện thoại,
                                    điện cao thế, chỗ dành riêng cho xe chữa cháy lấy nước.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Chỉ được “kẹp 3”
                                        trên xe máy trong 3 trường hợp
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingFive" style="height: 0px;">
                                <div class="panel-body">
                                    Người điều khiển xe máy chỉ được chở một người, trong 03 trường hợp sau thì được chở
                                    02 người: Chở người bệnh đi cấp cứu;
                                    Áp giải người có hành vi vi phạm pháp luật; Chở trẻ em dưới 14 tuổi.
                                    <Br>
                                    Khi ngồi trên xe máy không được sử dụng ô; mang, vác vật cồng kênh; đứng trên yên
                                    xe… - theo Điều 30.
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSix">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Người đủ 16 tuổi
                                        được đi xe máy
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingSix" style="height: 0px;">
                                <div class="panel-body">
                                    Điều 60 quy định về độ tuổi của người điều khiển xe máy, ô tô như sau:
                                    <br> - Người đủ 16 tuổi trở lên được lái xe máy dung tích xi-lanh dưới 50 cm3
                                    <br> - Người đủ 18 tuổi trở lên được lái xe máy dung tích xi-lanh từ 50 cm3 trở lên;
                                    xe ô tô tải
                                    có trọng tải dưới 3.500 kg; xe ô tô chở người đến 9 chỗ ngồi
                                    <br> - Người đủ 24 tuổi trở lên được lái xe ô tô chở người từ 10 đến 30 chỗ ngồi
                                    <br> - Người đủ 27 tuổi trở lên được lái xe ô tô chở người trên 30 chỗ ngồi
                                    <br> - Tuổi tối đa của người lái ô tô trên 30 chỗ ngồi là 50 tuổi đối với nữ và 55
                                    tuổi đối với nam.

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTen">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseTen" aria-expanded="false"
                                        aria-controls="collapseTen">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Cấm người đi bộ đi
                                        vào đường cao tốc
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTen" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTen">
                                <div class="panel-body">
                                    Điều 26 Luật giao thông đường bộ 2008 cấm người đi bộ, xe thô sơ, xe gắn máy, xe mô
                                    tô và máy kéo; xe máy chuyên dùng có tốc độ thiết kế nhỏ hơn 70km/h đi vào đường cao
                                    tốc
                                    , trừ người, phương tiện, thiết bị phục vụ việc quản lý, bảo trì đường cao tốc.
                                    <br>
                                    Với các phương tiện khác, khi đi vào đường cao tốc, người lái xe phải có tín hiệu
                                    xin vào và phải nhường đường cho xe đang chạy trên đường,
                                    khi thấy an toàn mới cho xe nhập vào dòng xe…
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingEight">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Tốc độ cho phép của
                                        các loại xe
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEight" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingEight">
                                <div class="panel-body">
                                    Theo khoản 1 Điều 12 Luật Giao thông đường bộ, người lái xe phải tuân thủ quy định
                                    về tốc độ xe chạy trên đường. Điều 6, Điều 7, Thông tư 91/2015/TT-BGTVT
                                    hướng dẫn cụ thể về quy định này như sau:
                                    <br> - Trong khu vực đông dân cư: tốc độ tối đa cho phép của các phương tiện (trừ xe
                                    máy chuyên dùng, xe gắn máy) là 60km/h nếu là đường đôi;
                                    50km/h nếu là đường hai chiều không có dải phân cách; đường một chiều có một làn.
                                    <br> - Ngoài khu vực đông dân cư: tốc độ tối đa cho phép của các phương tiện là
                                    90km/h nếu là ô tô con, ô tô đến 30 chỗ; 80km/h nếu là ô tô trên 30 chỗ nếu là đường
                                    đôi; nếu là đường
                                    dải phân cách giữa, đường một chiều có 1 làn xe cơ giới, tốc độ tương ứng của các
                                    loại xe là 80km/h và 70km/h
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingNine">
                                <h4 class="panel-title">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></i>Khoảng cách an toàn
                                        giữa các xe
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseNine" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingNine">
                                <div class="panel-body">
                                    Bên cạnh đảm bảo tốc độ cho phép, Luật Giao thông yêu cầu người lái xe phải giữ một
                                    khoảng cách an toàn đối với xe chạy liền trước xe của mình.
                                    Thông tư 91/2015/TT-BGTVT hướng dẫn về điều này như sau:
                                    <br> - Khi mặt đường khô ráo, nếu tốc độ chạy xe dưới 60km/h thì khoảng cách tối
                                    thiểu là 35m; nếu 80km/h thì khoảng cách là 55m
                                    , nếu 100km/h thì là 70m, 120km/h là 100m.
                                    <br> - Khi trời mưa, có sương mù, mặt đường trơn trượt, đường quanh co, đèo dốc…,
                                    người lái xe phải điều chỉnh khoảng cách theo biển báo trên đường.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                   
                    
                
                </div>
            </div>
        </div>
    </div>
<!-- //breaking-news -->
<script>
$(document).keyup(function (e) {
    if ($("#search").is(":focus") && (e.keyCode == 13)) {
    	$('#btn-search').click();
    }
});
</script>
<?php $this->load->view('template/footer');?>