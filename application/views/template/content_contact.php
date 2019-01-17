<!--Content-->
<div class="content">
<h1>Thông tin liên hệ</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="left-form-w3-agile">
			<h2>Thông tin phản hồi</h2>
			<form action="#" method="post">
			<div class="upper">
				<div class="form-sub-w3">
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
					<input type="text" name="Tên tài khoản" placeholder="Tên tài khoản" required />
				</div>
				<div class="form-sub-w3">
				<div class="icon-w3">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
					<input type="email" name="Email" placeholder="email@email.com" required />
				</div>
				<div class="form-sub-w3">
				<div class="icon-w3">
					<i class="fa fa-comment-o" aria-hidden="true"></i>
				</div>
					<textarea name="Nội dung" placeholder="Nội dung phản hồi..." required></textarea>
				</div>
			</div>
					<div class="submit-w3l">
					<input type="submit" value="">
					</div>
			</form>
		</div>
<!--//form-ends-here-->
		<div class="right-map-w3-agile">
		<h2>Địa chỉ liên hệ</h2>
		<script type="text/javascript">
function loadmap() {
	var lat = 10.8367688;
	var lng = 106.6346885;
	var myCenter = new google.maps.LatLng(lat,lng);
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
	var map = new google.maps.Map(mapCanvas, mapOptions);
	var marker = new google.maps.Marker({position:myCenter});
	marker.setMap(map);

	google.maps.event.addListener(marker,'click',function() {
	    var infowindow = new google.maps.InfoWindow({
	      content:"Điểm kẹt xe!"
	    });
	  infowindow.open(map,marker);
	 });
// 	google.maps.event.addListener(map, 'click', function(event) {
// 	    placeMarker(map, event.latLng);
// 	 });
}

// function placeMarker(map, location) {
//   var marker = new google.maps.Marker({
//     position: location,
//     map: map
//   });
//    var infowindow = new google.maps.InfoWindow({
//      content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
//    });
//    infowindow.open(map,marker);
//}

</script>
<div class="container text-center">    
  <h3><b>Bản đồ</b></h3>
   <div id="googleMap" style="width:370px;height:258px;"></div>
  <hr>
</div>
			
						<ul class="add">
								<li class="dot"> 297 Phan Huy Ích, Phường 14, Quận Gò Vấp, TP.HCM</li>
								<li class="mobile"> 0382834597</li>
								<li class="mes"> <a href="mailto:info@example.com">lehuuphuoc@gmail.com</a></li>
						</ul>
						
				
					<div class="clear"></div>
					
					
		</div>
<div class="clear"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkMto13TJ9-5AU-HbmeeFTIPpeDjag8wc&callback=loadmap"></script>
</div>
</div>
<!--/Content-->