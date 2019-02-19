<?php $this->load->view('template/header_map');?>
<?php $menu_class['map'] = ' class="active"';?>
<?php $this->load->view('template/menu',$menu_class);?>
<?php $this->load->view('template/content_map');?>
<script type="text/javascript">
var x = document.getElementById("result");
function geocodeLatLng(geocoder,latlng,type) {
	  geocoder.geocode({'location': latlng}, function(results, status) {
	    if (status === 'OK'){
	      if (results[0] && (islat != null && islng != null)) {
	       		$.ajax({
	       	        url: "<?php echo base_url_ci;?>map/insert",
	       	        type: "post",
	       	        data: {
	       	            lat : islat, 
	       	            lng : islng,
	       	            name : results[0].formatted_address,
	       	            type: type
	       	        },
	       			dataType: "json",
	       	        success: function(response) {
	       	        	x.innerHTML = response["sucess"]["data"];
	       	        	if(response['status'] == true){
	       	        		loadmap();	
	       	        	}
	       	        }
	       		});
	      } else {
	        window.alert('Không tìm thấy');
	      }
	    } else {
	      window.alert('Lấy thông tin không thành công: ' + status);
	    }
	  });
	}
function loadmap() {
	var geocoder = new google.maps.Geocoder;
	$("#insertMap").click(function() {
 		var latlng = {lat: islat, lng: islng};
 		var type = $('#thongtin').children(":selected").attr("id");
 		geocodeLatLng(geocoder,latlng,type);
	});
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} 
	else {
		x.innerHTML = "Trình duyệt không hỗ trợ Geolocation.";
//		islat = "<?php //if(isset($map)) echo $map['lat']; else echo "10.837210"?>";
//		islng = "<?php // if(isset($map)) echo $map['lng']; else echo "106.635468"?>";
// 		var myCenter = new google.maps.LatLng(islat,islng);
// 		var mapCanvas =  document.getElementById("googleMap");
// 		var mapOptions = {center: myCenter, 
// 			zoom: 18,
// 			panControl: true,
// 		    zoomControl: true,
// 		    mapTypeControl: true,
// 		    scaleControl: true,
// 		    streetViewControl: true,
// 		    overviewMapControl: true,
// 		    rotateControl: true   
// 		};
// 		var map = new google.maps.Map(mapCanvas, mapOptions);
// 		var marker = new google.maps.Marker({position:myCenter});
// 		marker.setMap(map);

// 		google.maps.event.addListener(marker,'click',function() {
// 		    var infowindow = new google.maps.InfoWindow({
// 		      content:"Điểm kẹt xe!"
// 		    });
// 		  infowindow.open(map,marker);
// 		 });
	}
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
// }


// google map dịa chỉ hiện tại

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} 
	else {
		x.innerHTML = "Trình duyệt không hỗ trợ Geolocation.";
	}
}

function appendDataToMap(response,map){
	response['data'].forEach(function(key) {
	    CentralPark = new google.maps.LatLng(key['lat'], key['lng']);
	    var type = key['type'];
	    addMarker(CentralPark,map,type);
	});
}

//Function for adding a marker to the page.
function addMarker(location,map,type) {
	var icon = {
	        url: "<?php echo base_url_ci;?>public/images/iconMap"+ type +".png", // url
	        scaledSize: new google.maps.Size(32,32), // size
	    };
    marker = new google.maps.Marker({
        position: location,
        icon: icon,
        map: map
    });
    google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content:"Điểm kẹt xe!"
        });
    infowindow.open(map,marker);
    });
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
	var map = new google.maps.Map(mapCanvas, mapOptions);
	$.ajax({
        url: "<?php echo base_url_ci;?>map/search",
        type: "post",
        data: {
            search : ""
        },
		dataType: "json",
        success: function(response) {
            if(response['status'] == true){
                appendDataToMap(response,map);
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

function showError(error) {
	switch(error.code) {
		case error.PERMISSION_DENIED:
			x.innerHTML = "Trình duyệt không cho phép định vị";
			break;
		case error.POSITION_UNAVAILABLE:
			x.innerHTML = "Không có thông tin";
			break;	
		case error.TIMEOUT:
			x.innerHTML = "Hết thời gian";
			break;
		case error.UNKNOWN_ERROR:
			x.innerHTML = "Lỗi chưa xác định";
			break;
	}
}

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-M500zF9hEI3OoOPyK_dVHfWDyZcx5fI&callback=loadmap">
</script>

<?php $this->load->view('template/footer');?>