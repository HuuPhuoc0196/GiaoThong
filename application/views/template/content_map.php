<script>
var islat;
var islng;
var isname;

function searchMap() {
	var search = $("#search").val();
	$.ajax({
        url: "http://localhost/GiaoThong/map/search",
        type: "post",
        data: {
            search : search
        },
		dataType: "json",
        success: function(response) {
            if(response["status"] == true)
            {
                var append = '<select id="selectBox" onchange="getMap()">';
                response['data'].forEach(function(element)
                {
                    append+='<option value="'+element['id']+'">'+element['name']+'</option>';
                });
                append+='</select>';
                x.innerHTML = append;
            }else 
            {
            	x.innerHTML = response["data"];
            }
        }
    });
}

function getMap()
{
	var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    $.ajax({
        url: "http://localhost/GiaoThong/map/getMap",
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
            }
        }
    });
}
</script>

<!-- Modal -->
<div class="modal fade" id="addMap" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm thông tin vào Bản đồ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Chọn thông tin cần thêm</h2>
        <select id="thongtin" class="form-control">
        	<option id="1">Báo kẹt xe</option>
        	<option id="2">Đường hư</option>
        	<option id="3">Tai nạn giao thông</option>
        	<option id="4">Sửa đường</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="insertMap">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="content_map">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="#" method="post">
                <label class="btn3 btn btn-warning" data-toggle="modal" data-target="#addMap" title="Thêm thông tin vào bản đồ"><i class="fa fa-warning" aria-hidden="true"></i></label>
                <input  class="search_map" type="text" placeholder="Tìm kiếm điểm kẹt xe ..."  name="search" id="search">
                <label class="btn3 btn btn-warning" onclick="searchMap()" title="Search thông tin bản đồ"><i class="fa fa-search" aria-hidden="true"></i></label>
            </form>
        </div>
        <div class="col-sm-2" ></div>
    </div>
    <p id="result"></p>
    <div class="row ">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 map" id="googleMap">
            
        </div>
        <div class="col-sm-1" ></div>
    </div>
</div>

