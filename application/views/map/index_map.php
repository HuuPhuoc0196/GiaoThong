<?php $this->load->view('template/header_map');?>
<?php $menu_class['map'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<script type="text/javascript">
function loadmap() {
	var lat = "<?php if(isset($map)) echo $map['lat']; else echo "10.837210"?>";
	var lng = "<?php if(isset($map)) echo $map['lng']; else echo "106.635468"?>";
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
   <div id="googleMap" style="width:100%;height:500px;"></div>
  <hr>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkMto13TJ9-5AU-HbmeeFTIPpeDjag8wc&callback=loadmap"></script>
<?php $this->load->view('template/footer');?>