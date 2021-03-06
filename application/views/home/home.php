<?php $data['data'] = 'Trang chủ';?>
<?php $data['home'] = ' class="act"';?>
<?php $this->load->view('template/header_home',$data);?>
<script src="<?php echo base_url_ci;?>public/js/camera.js"></script>
<div id="top" class="callbacks_container">
    <ul class="rslides" id="slider3">
	<?php foreach ($hotNews as $val){?>
        <li>
            <div class="banner-info-slider">
                <ul>
                    <li><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
                    <?php
                    $source = $val['source'];
                    $source = str_replace("http://","",$source);
                    $source = str_replace("https://","",$source);
                    $source = str_replace("www.","",$source);
                    $source = str_replace(".com","",$source);
                    $source = str_replace(".vn","",$source);
                    echo $source;?>

                    </a></li>
                    <li><?php echo $val['time_post'];?></li>
                </ul>
                <h1><?php echo $val['title'];?></h1>
                 <?php 
                    $summary = $val['summary'];
                    $summary = preg_replace('/style=".*"/', "", $summary);
                 ?>
                <p><?php echo $summary;?>
                    <span></span></p>
                <div class="more">
                    <a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>" class="type-1">
                        <span> Xem ngay </span>
                        <span> Xem ngay </span>
                    </a>
                </div>
            </div>
        </li>
	<?php }?>
    </ul>
</div>
</div>
</div>
</div>
<!-- banner -->

<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container container_bg">

        <?php $this->load->view('template/move_text');?>
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
            <span id="result-map"></span>
                <div class="video-grids-left1" id="googleMap">
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                 <?php $this->load->view('template/weather');?> 
    </div> 
            </div>
            <div class="clearfix"> </div>
        
        <!-- //video-grids -->
        <a href="<?php echo base_url_ci;?>camera" class="cam">Hệ thống camera</a>
        <div class="video-grids">
            <?php foreach ($listCamera as $val){?>
            <?php 
                    $src = $val['src'];
                    $indexSearch = strripos($src, "=black");
                    $src = substr($src, 0, $indexSearch + 6);
                    $src = $src . "&t=" . strtotime(date("Y-m-d h:i:sa"));
            ?>
                <div class="col-md-3 img_cam">
                   <a href="<?php echo $src;?>" target="_blank"> <img src="<?php echo $src;?>" class="camera">
                  <i class="fa fa-play-circle"></i> <span><?php echo $val['name'];?><span></a>
                </div>
            <?php }?>
        </div>
        <div class="clearfix"> </div>
        <!-- news-and-events -->
        <div class="news">
            <div class="news-grids">
                <div class="col-md-8 news-grid-left">
                    <h3>Bản tin tổng hợp</h3>
                    <ul>
                    <?php foreach ($listNews as $val){?>
                        <li>
                            <div class="news-grid-left1">
                                <img src="<?php echo base_url_ci;?>public/images/<?php echo $val['image'];?>" alt="" class="img-responsive" />
                            </div>
                            <div class="news-grid-right1">
                                <h4><a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>"><?php echo $val['title'];?></a></h4>
                                <h5>Nguồn : <a href="<?php echo base_url_ci;?>news/detail/<?php echo $val['id'];?>">
                                <?php
                                    $source = $val['source'];
                                    $source = str_replace("http://","",$source);
                                    $source = str_replace("https://","",$source);
                                    $source = str_replace("www.","",$source);
                                    $source = str_replace(".com","",$source);
                                    $source = str_replace(".vn","",$source);
                                    echo $source;?>
                                </a>
                                    <label>|</label> <i><?php echo $val['time_post'];?></i></h5>
                                    <?php 
                                        $summary = $val['summary'];
                                        $summary = preg_replace('/style=".*"/', "", $summary);
                                    ?>
                                <p><?php echo $summary;?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </li>
                    <?php }?>
                    </ul>
                    <div class="more" style="margin-bottom:30px">
                        <a href="<?php echo base_url_ci;?>news" class="type-2">
                            <span > Xem thêm </span>

                        </a>
                    </div>
                </div>
                <div class="col-md-4 news-grid-right">
                    <div class="news-grid-rght1">
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <h4 style="color:#090; margin-left:20%;margin-bottom:30px">VỊ TRÍ CỦA CHÚNG TÔI</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5971263383844!2d106.63755031428747!3d10.8421112609438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752984a36a471d%3A0x5628f842d92e23dc!2zMjgvNEIgxJDGsOG7nW5nIFBoYW4gSHV5IMONY2gsIFBoxrDhu51uZyAxMiwgR8OyIFbhuqVwLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1552143678871" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="news-grid-rght1">
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <h4 style="color:#090; margin-left:20%;margin-bottom:30px; margin-top:20px;">THỜI TIẾT HÔM NAY</h4>
                            <div class="weather-left-info">
                                <div class="weather-left-top weather-right-top wow bounceInUp animated" data-wow-delay=".5s">
                                    <canvas id="partly-cloudy-day" width="75" height="75"></canvas>
                                    <h3>25°C</h3>
                                    <p>Sáng, Hôm nay</p>
                                </div>
                                <div class="weather-right-bottom">
                                    <div class="weather-right-bottom-left wow bounceInLeft animated" data-wow-delay=".5s">
                                        <canvas id="clear-night" width="60" height="60"></canvas>

                                        <h4>Tối, TP.HCM</h4>
                                    </div>
                                    <div class="weather-right-bottom-right wow bounceInRight animated" data-wow-delay=".5s">
                                        <h3>17°C</h3>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <!-- //news-and-events -->
                    </div>
                   
    </div>

<script>
var myVar = setInterval(Camera.showImageUrl, 5000);
var map;
var arrayMap = [];

function loadmap() {
	var geocoder = new google.maps.Geocoder;
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} 
	else {
		$('#result-map').innerHTML = "Trình duyệt không hỗ trợ Geolocation.";
	}
}

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} 
	else {
		$('#result-map').innerHTML = "Trình duyệt không hỗ trợ Geolocation.";
	}
}

function showPosition(position) {
	islat = position.coords.latitude;
	islng = position.coords.longitude;
	var myCenter = new google.maps.LatLng(islat,islng);
	var mapCanvas =  document.getElementById("googleMap");
	var mapOptions = {center: myCenter, 
		zoom: 18,
		panControl: true,
	    zoomControl: true,
	    mapTypeControl: true,
	    scaleControl: true,
	    streetViewControl: true,
	    overviewMapControl: true,
	    rotateControl: true   
	};
	map = new google.maps.Map(mapCanvas, mapOptions);
	$.ajax({
        url: "<?php echo base_url_ci;?>map/search",
        type: "post",
        data: {
            search : ""
        },
		dataType: "json",
        success: function(response) {
            if(response['status'] == true){
                appendDataToMap(response);
            }
        }
    });
	var marker = new google.maps.Marker({
    		position:myCenter,
    		title: "Điểm của bạn",
		});
	marker.setMap(map);

	google.maps.event.addListener(marker,'click',function() {
	    var infowindow = new google.maps.InfoWindow({
	      content:"Điểm của bạn"
	    });
	  infowindow.open(map,marker);
	 });
}


function appendDataToMap(response){
	response['data'].forEach(function(key) {
	    CentralPark = new google.maps.LatLng(key['lat'], key['lng']);
	    var type = key['type'];
	    var keyMap = key['id'];
	    addMarker(CentralPark,type,keyMap);
	});
}


//Function for adding a marker to the page.
function addMarker(location,type,keyMap) {
	var icon = {
	        url: "<?php echo base_url_ci;?>public/images/iconMap"+ type +".png", // url
	        scaledSize: new google.maps.Size(48,48), // size
	    };
	var contentMap = "";
    switch(type){
   		case "1": contentMap = "Tuyến đường kẹt xe"; break;
   		case "2": contentMap = "Tuyến đường bị hư hỏng"; break;
   		case "3": contentMap = "Tuyến đường đang xây dựng"; break;
   		case "4": contentMap = "Tuyến đường xảy ra tai nạn"; break;
    }
    marker = new google.maps.Marker({
        position: location,
        icon: icon,
        map: map,
        content: contentMap
    });

    arrayMap.push(marker);
	
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', (function (marker, infowindow) {
        return function () {
            infowindow.setContent(this.content);
            infowindow.open(map, this);
            showInfoMap(keyMap);
        };
    })(marker, infowindow));
    bounds.extend(marker.position);
}

window.onload = function() {
	  loadmap();
	};
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-M500zF9hEI3OoOPyK_dVHfWDyZcx5fI&callback=loadmap">
</script>

<?php $this->load->view('template/footer');?>