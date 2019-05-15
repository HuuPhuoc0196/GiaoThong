<!--call-->
<script src="<?php echo base_url_ci;?>public/js/contact.js"></script>
<script src="<?php echo base_url_ci;?>public/js/user.js"></script>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
		 <?php if(isset($_SESSION['user'])) { ?>
		 	var username_update = "<?php echo $_SESSION['user']['username']?>";
		 <?php }?>
	</script>
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone
            visible-tablet" href="tel:0382834597">
            <div id="calltrap-ico"></div>
        </a>
        <!--//call-->
        <!-- footer -->

        <div class="footer">
            <div class="container">
                <div class="footer-grids">
                    <div class="col-md-4 footer-grid-left">
                        <img src="<?php echo base_url_ci;?>public/images/logo.png"
                            style="width:55px;height:40px;"><span class="ft">GIAO
                            THÔNG</span>

                        <ul>
							<li <?php if(isset($home)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>home" class="cols">Trang chủ</a></li>
                            <li <?php if(isset($map)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>map" class="cols">Bản đồ</a></li>
                            <li <?php if(isset($camera)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>camera" class="cols">Camera</a></li>
                            <li <?php if(isset($news)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>news "class="cols">Tin Tức</a></li>
                            <li <?php if(isset($aboutus)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>aboutus" class="cols">Giới Thiệu</a></li>
                            <li <?php if(isset($contact)) echo ' class="active"'?>><a href="<?php echo base_url_ci;?>contact" class="cols">Liên Hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-grid-left placeholder-custom-fooder">
                        <h3>Liên Hệ</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5971263383844!2d106.63755031428747!3d10.8421112609438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752984a36a471d%3A0x5628f842d92e23dc!2zMjgvNEIgxJDGsOG7nW5nIFBoYW4gSHV5IMONY2gsIFBoxrDhu51uZyAxMiwgR8OyIFbhuqVwLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1552143678871"
                         width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4 footer-grid-left">
                        <h3>Giới Thiệu</h3>
                        <p>Hiện nay vấn đề tai nạn giao thông và kẹt xe tại các trọng
                        điểm giao thông tại thành phố
                            Hồ Chí Minh được xem là vấn đề cáp bách.Vì thế mà chúng tôi ra đời - Giao thông

                            <span>Giao Thông chứa các tin tức giao thông quan trọng và nổi bật, 
                                bên cạnh đó trang web còn cho phép người dùng tìm kiếm các địa điểm kẹt xe trên bản đồ.
                                Ngoài ra trang web còn kết hợp với hệ thống các camera tại các trọng điểm
                                giúp người nhận diện dẽ dàng vị trí kẹt xe.
                                
                            </span>
                            <span>
                                Những gì về chúng tôi:
                            </span>
                            <i>Nguồn tin đa dạng -  Tổng hợp tin tức - Tìm kiếm dễ dàng - Trực quan sinh động</i></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-left">
                        <p>Copyright &copy 2019 <a>GIAO THÔNG</a>. All rights
                            reserved.</p>
                    </div>
                    
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //footer -->
        <ul id="menu" class="mfb-component--br mfb-zoomin"
            data-mfb-toggle="hover">
            <li class="mfb-component__wrap">
                <a href="#" class="mfb-component__button--main">
                    <i class="mfb-component__main-icon--resting">
                        GT
                    </i>
                    <i class="mfb-component__main-icon--active">
                            <i class="fa fa-car"></i>
                    </i>

                </a>
                <ul class="mfb-component__list">
                
                <?php if(isset($_SESSION['user'])) { ?>   
                	<li>
                        <a href="<?php echo base_url_ci;?>user/profile" data-mfb-label="Thông tin cá nhân"
                        class="mfb-component__button--child">
                            <i class="fa fa-address-card"style="padding-top:
                                20px;padding-left:20px;"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url_ci;?>user/logout" data-mfb-label="Đăng xuất"
                            class="mfb-component__button--child">
                            <i class="fa fa-sign-out"style="padding-top:
                            20px;padding-left:20px;"></i>
                        </a>
                    </li>
                    
                <?php } else {?>
                
                    <li <?php if(isset($register)) echo $register?>>
                        <a
                            href="<?php echo base_url_ci;?>user/register"
                             data-mfb-label="Đăng ký"
                            class="mfb-component__button--child">
                            <i class="fa fa-edit"style="padding-top:
                                20px;padding-left:20px;"></i>
                        </a>
                    </li>

                    <li <?php if(isset($login_user)) echo $login_user?>>
                        <a href="<?php echo base_url_ci;?>user/login" data-mfb-label="Đăng nhập"
                            class="mfb-component__button--child">
                            <i class="fa fa-unlock"style="padding-top:
                            20px;padding-left:20px;"></i>
                        </a>
                    </li>
                <?php }?>
                </ul>
            </li>
        </ul>
        
        <div class="modal fade" id="showMap" role="dialog">
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
		
		<div class="modal fade" id="myModalShowInfo" role="dialog">
			<!--Modal-->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title">Thông tin tuyến đường !</h4>
					</div>
					<div class="modal-body">
						<span>Tên Tuyến Đường : </span> <label id="nameInfo"></label><br/>
						<span>Loại Thông Báo : </span> <label id="typeInfo"></label><br/>
						<span>Thời Gian Thông Báo : </span> <label id="pushInfo"></label><br/>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn-red" onClick="deleteInfoMap()">Hủy Thông Báo</button>
					<button type="button" class="btn-red" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="video-grids-left1" id="googleMap1" style="display: none"></div>
          
        <!--Clock-->
            <!-- clock -->
            <script language="javascript" type="text/javascript" src="<?php echo base_url_ci;?>public/js/jquery.thooClock.js"></script>
                <script language="javascript">
                    var intVal, myclock;

                    $(window).resize(function() {
                        window.location.reload()
                    });

                    $(document).ready(function() {

                        var audioElement = new Audio("");

                        //clock plugin constructor
                        $('#myclock').thooClock({
                            size: $(document).height() / 1.4,
                            onAlarm: function() {
                                //all that happens onAlarm
                                $('#alarm1').show();
                                alarmBackground(0);
                                //audio element just for alarm sound
                                document.body.appendChild(audioElement);
                                var canPlayType = audioElement.canPlayType("audio/ogg");
                                if (canPlayType.match(/maybe|probably/i)) {
                                    audioElement.src = 'alarm.ogg';
                                } else {
                                    audioElement.src = 'alarm.mp3';
                                }
                                // erst abspielen wenn genug vom mp3 geladen wurde
                                audioElement.addEventListener('canplay', function() {
                                    audioElement.loop = true;
                                    audioElement.play();
                                }, false);
                            },
                            showNumerals: true,
                            brandText: 'THOOYORK',
                            brandText2: 'Germany',
                            onEverySecond: function() {
                                //callback that should be fired every second
                            },
                            //alarmTime:'15:10',
                            offAlarm: function() {
                                $('#alarm1').hide();
                                audioElement.pause();
                                clearTimeout(intVal);
                                $('body').css('background-color', '#FCFCFC');
                            }
                        });

                    });



                    $('#turnOffAlarm').click(function() {
                        $.fn.thooClock.clearAlarm();
                    });


                    $('#set').click(function() {
                        var inp = $('#altime').val();
                        $.fn.thooClock.setAlarm(inp);
                    });


                    function alarmBackground(y) {
                        var color;
                        if (y === 1) {
                            color = '#CC0000';
                            y = 0;
                        } else {
                            color = '#FCFCFC';
                            y += 1;
                        }
                        $('body').css('background-color', color);
                        intVal = setTimeout(function() {
                            alarmBackground(y);
                        }, 100);
                    }
                </script>

                <!-- //clock -->
                <!-- clock-bottom -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        // Create two variable with the names of the months and days in an array
                        var monthNames = ["Tháng 1 Năm ", "Tháng 2 Năm ", "Tháng 3 Năm ", "Tháng 4 Năm ", "Tháng 5 Năm ", "Tháng 6 Năm ", "Tháng 7 Năm ", "Tháng 8 Năm ", "Tháng 9 Năm ", "Tháng 10 Năm ", "Tháng 11 Năm ", "Tháng 12 Năm "];
                        var dayNames = ["Chủ nhật, Ngày ", "Thứ hai, Ngày ", "Thứ ba, Ngày ", "Thứ tư, Ngày ", "Thứ năm, Ngày ", "Thứ sáu, Ngày ", "Thứ bảy, Ngày "]

                        // Create a newDate() object
                        var newDate = new Date();
                        // Extract the current date from Date object
                        newDate.setDate(newDate.getDate());
                        // Output the day, date, month and year    
                        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

                        setInterval(function() {
                            // Create a newDate() object and extract the seconds of the current time on the visitor's
                            var seconds = new Date().getSeconds();
                            // Add a leading zero to seconds value
                            $("#sec").html((seconds < 10 ? "0" : "") + seconds);
                        }, 1000);

                        setInterval(function() {
                            // Create a newDate() object and extract the minutes of the current time on the visitor's
                            var minutes = new Date().getMinutes();
                            // Add a leading zero to the minutes value
                            $("#min").html((minutes < 10 ? "0" : "") + minutes);
                        }, 1000);

                        setInterval(function() {
                            // Create a newDate() object and extract the hours of the current time on the visitor's
                            var hours = new Date().getHours();
                            // Add a leading zero to the hours value
                            $("#hours").html((hours < 10 ? "0" : "") + hours);
                        }, 1000);

                    });
                </script>
                <!-- clock-bottom -->
                <!--skycons-icons-->
                <script src="<?php echo base_url_ci;?>public/js/skycons.js"></script>
                <!--//skycons-icons-->
                <script>
                    var icons = new Skycons({
                            "color": "#FFFFFF"
                        }),
                        list = [
                            "clear-day"
                        ],
                        i;

                    for (i = list.length; i--;)
                        icons.set(list[i], list[i]);

                    icons.play();
                </script>
                <script>
                    var icons = new Skycons({
                            "color": "#f5f5f5"
                        }),
                        list = [
                            "clear-night", "partly-cloudy-day",
                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                            "fog"
                        ],
                        i;

                    for (i = list.length; i--;)
                        icons.set(list[i], list[i]);

                    icons.play();
                </script>


        <!--Clock-->
        <script src="<?php echo base_url_ci;?>public/js/easyResponsiveTabs.js" type="text/javascript"></script>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion           
                                width: 'auto', //auto or any width like 600px
                                fit: true // 100% fit in a container
                            });
                        });
                        </script>
        <script src="<?php echo base_url_ci;?>public/js/mfb.js"></script>
        <script src="<?php echo base_url_ci;?>public/js/mfb.min.js"></script>
       
        <!-- smooth-scrolling-of-move-up -->
        <script>
        $(document).ready(function () {
            /*
         var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear' 
         };
         */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

        <?php 
            if(!isset($_COOKIE["callAPI"])){
                 echo "window.open('".base_url_ci . "getCookie" ."');";
            }
        ?>

		<?php if(isset($searchNull)){?>
			setTimeout(function(){ showAlertError('<?php echo $searchNull;?>'); }, 200)
		<?php }?>

		var idDeleteInfo = 0;

		function showInfoMap(id){
			idDeleteInfo = id;
			$.ajax({
			       url: "<?php echo base_url_ci;?>map/getMap",
			        type: "post",
			        data: {
			            id : id
			        },
					dataType: "json",
			        success: function(response) {
			        	if(response["status"] == true)
			            {
			        		var contentMap = "";
			        		switch(response["data"]["type"]){
		    	           		case "1": contentMap = "Tuyến đường kẹt xe"; break;
		    	           		case "2": contentMap = "Tuyến đường bị hư hỏng"; break;
		    	           		case "3": contentMap = "Tuyến đường đang xây dựng"; break;
		    	           		case "4": contentMap = "Tuyến đường xảy ra tai nạn"; break;
			            	}
			         		$('#nameInfo').html(response["data"]['name']);
			         		$('#typeInfo').html(contentMap);
			         		$('#pushInfo').html(response["data"]['pushdate']);
			         		$('#myModalShowInfo').modal('show');
			            }
			        }
			    });
		}

		function deleteInfoMap(){
			if(confirm("Bạn có muốn Hủy điểm báo này không ?")){
				$.ajax({
			        url: "<?php echo base_url_ci;?>map/deleteMap",
			        type: "post",
			        data: {
			            id : idDeleteInfo
			        },
					dataType: "json",
			        success: function(response) {
			        	if(response['status'] == true){
			        		$('#myModalShowInfo').modal('hide');
			        		showAlertSuccess(response["sucess"]["data"]);
			        		loadmap();	
			        	}else{
				        	showAlertError(response["sucess"]["data"]);
			        	}
			        }
				});
			}
		}
		
		function showMap(){
			$('#showMap').modal('show');
		}

		function insertMap(type){
			var geocoder = new google.maps.Geocoder;
			var latlng = {lat: islat, lng: islng};
			var type = type;
			geocodeLatLng(geocoder,latlng,type);
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
			       	        	if(response['status'] == true){
			       	        		$('#showMap').modal('hide');
			       	        		showAlertSuccess(response["sucess"]["data"]);
			       	        		loadmap();	
			       	        	}else{
				       	        	showAlertError(response["sucess"]["data"]);
			       	        	}
			       	        }
			       		});
			      } else {
			    	  showAlertError('Không tìm thấy');
			      }
			    } else {
			    	showAlertError('Lấy thông tin không thành công');
			    }
			  });
			}
		// Alert
        function showAlertError(message) {
            swal({
                title: message,
                type: "error"

            });
        };

        function showAlertSuccess(message) {
            swal({
                title: message,
                type: "success"
            });
        };

        
        
        function loadmap1() {
        	var geocoder = new google.maps.Geocoder;
        	if (navigator.geolocation) {
        		navigator.geolocation.getCurrentPosition(showPosition1, showError);
        	} 
        	else {
        		showAlertError("Trình duyệt không hỗ trợ Geolocation.");
        	}
        }

        function showPosition1(position) {
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
        	var mapCanvas1 =  document.getElementById("googleMap1");
        	var map = new google.maps.Map(mapCanvas1, mapOptions);
        }     
    </script>
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-M500zF9hEI3OoOPyK_dVHfWDyZcx5fI&callback=loadmap1">
</script>
        <script src="<?php echo base_url_ci;?>public/js/SmoothScroll.min.js"></script>
        <script src="<?php echo base_url_ci;?>public/js/move-top.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
    </body>

</html>