<?php $data['data'] = 'Bản đồ';?>
<?php $data['map'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>

<div class="banner-bottom">
    <div class="container container_bg">
		
        <div id="result-map" class="sucess sucess-custom-map"></div>
        <!-- video-grids -->
        <div class="video-grids">
            <div class="col-md-8 video-grids-left">
			<div class="sim-button button12" data-toggle="modal" data-target="#myModal">Thông báo tuyến đường đặc biệt </div> 
                <div class="video-grids-left1" id="googleMap">
                </div>
            </div>
            <div class="col-md-4 video-grids-right">
                <input type="search" placeholder="Tìm kiếm ngay" id="search" ><br/>
                <div id="mapItem">
                </div>
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
					<h4 class="modal-title">Thông báo tuyến đường !</h4>
					</div>
					<div class="modal-body">
					<div class="sim-button button12" onClick="insertMap(1)">Tuyến đường kẹt xe </div> 
					<div class="sim-button button12" onClick="insertMap(2)">Tuyến đường bị hư hỏng </div> 
					<div class="sim-button button12" onClick="insertMap(3)">Tuyến đường đang xây dựng </div> 
					<div class="sim-button button12" onClick="insertMap(4)">Tuyến đường xảy ra tai nạn </div> 
					</div>
					<div class="modal-footer">
					<button type="button" class="btn-red" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
			
	</div>
</div>
<script>
var islat;
var islng;
var arrayMap = [];
var myCenter;
var mapCanvas =  document.getElementById("googleMap");
var map;

$(document).keyup(function (e) {
    if ($("#search").is(":focus") && (e.keyCode == 13)) {
    	searhMap();
    }
});

function clearOverlays() {
      for (var i = 0; i < arrayMap.length; i++ ) {
    	  arrayMap[i].setMap(null);
      }
      arrayMap.length = 0;
}

function searhMap(){
	clearOverlays();
	loadmap();
}

function loadMapItem() {
	var search = $("#search").val();
	$.ajax({
        url: "<?php echo base_url_ci;?>map/search",
        type: "post",
        data: {
            search : search
        },
		dataType: "json",
        success: function(response) {
            if(response["status"] == true)
            {
                var append = '<select id="selectBox" class="form-control" onchange="getMap()">';
                response['data'].forEach(function(element)
                {
                    append+='<option value="'+element['id']+'">'+element['name']+'</option>';
                });
                append+='</select>';
                $('#mapItem').html(append);
            }
        }
    });
}

function getMap()
{
	var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    $.ajax({
        url: "<?php echo base_url_ci;?>map/getMap",
        type: "post",
        data: {
            id : selectedValue
        },
		dataType: "json",
        success: function(response) {
        	if(response["status"] == true)
            {
        		lat = response["data"]["lat"];
        		lng = response["data"]["lng"];
         		map.setCenter(new google.maps.LatLng(lat, lng));
        	    
            }
        }
    });
}

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
		       	         $("#result-map").html(response["sucess"]["data"]);
	       	        	if(response['status'] == true){
	       	        		$('#myModal').modal('hide');
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

function insertMap(type){
	$("#result-map").html("");
	var geocoder = new google.maps.Geocoder;
	var latlng = {lat: islat, lng: islng};
	var type = type;
	geocodeLatLng(geocoder,latlng,type);
}
	
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
	$('#mapItem').html('');
	loadMapItem();
	islat = position.coords.latitude;
	islng = position.coords.longitude;
	myCenter = new google.maps.LatLng(islat,islng);
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
	var search = $("#search").val();
	$.ajax({
        url: "<?php echo base_url_ci;?>map/search",
        type: "post",
        data: {
            search : search
        },
		dataType: "json",
        success: function(response) {
            if(response['status'] == true){
                appendDataToMap(response);
            }else
            {
                showAlertError(response['data']);
            }
        }
    });
	var marker = new google.maps.Marker({
    		position:myCenter
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
			$('#result-map').innerHTML = "Trình duyệt không cho phép định vị";
			break;
		case error.POSITION_UNAVAILABLE:
			$('#result-map').innerHTML = "Không có thông tin";
			break;	
		case error.TIMEOUT:
			$('#result-map').innerHTML = "Hết thời gian";
			break;
		case error.UNKNOWN_ERROR:
			$('#result-map').innerHTML = "Lỗi chưa xác định";
			break;
	}
}

function appendDataToMap(response){
	response['data'].forEach(function(key) {
	    CentralPark = new google.maps.LatLng(key['lat'], key['lng']);
	    var type = key['type'];
	    addMarker(CentralPark,type);
	});
}

//Function for adding a marker to the page.
function addMarker(location,type) {
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
        };
    })(marker, infowindow));
    bounds.extend(marker.position);
}

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-M500zF9hEI3OoOPyK_dVHfWDyZcx5fI&callback=loadmap">
</script>
<?php $this->load->view('template/footer');?>