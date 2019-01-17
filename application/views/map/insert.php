<!DOCTYPE html>
<html>
<body>
<p>Xem bản đồ vị trí hiện tại</p>
<button onclick="getLocation()">Định vị</button>
<p id="result"></p>
<div id="map"></div>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script>
	var x = document.getElementById("result");
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		} 
		else {
			x.innerHTML = "Trình duyệt không hỗ trợ Geolocation.";
		}
	}

	function showPosition(position) {
		
		lat = position.coords.latitude;
		long = position.coords.longitude;
		latlon = new google.maps.LatLng(lat, long)
		map = document.getElementById('map')
		map.style.height = '250px';
		map.style.width = '100%';
		var options = {
			center:latlon,zoom:14,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		}
		var mymap = new google.maps.Map(document.getElementById("map"), options);
		var marker = new google.maps.Marker({position:latlon,map:mymap,title:"Bạn đang ở đây!"});
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
</body>
</html>