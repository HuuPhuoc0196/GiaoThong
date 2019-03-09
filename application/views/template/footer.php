<!--call-->
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

                            <li><a href="index.php" class="cols">Trang chủ</a></li>
                            <li><a href="map.php" class="cols">Bản đồ</a></li>
                            <li><a href="news_1.php" class="cols">Bản Tin</a></li>
                            <li><a href="camera.php" class="cols">Camera</a></li>
                            <li><a href="aboutus.php" class="cols">Giới Thiệu</a></li>
                            <li><a href="contact.php" class="cols">Liên Hệ</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4 footer-grid-left">
                        <h3>Liên Hệ</h3>
                        <form>
                            <input type="text" value="Họ và Tên"
                                onfocus="this.value= '';" onblur="if (this.value
                                == '') {this.value= 'Họ và tên';}" required="">
                            <input type="email" value="Email"
                                onfocus="this.value= '';" onblur="if (this.value
                                == '') {this.value= 'Email';}" required="">
                            <textarea onfocus="this.value= '';" onblur="if
                                (this.value == '') {this.value= 'Nội dung...';}"
                                required="">Nội dung...</textarea>
                            <input type="submit" value="Gửi">
                        </form>
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
                    
                </ul>
            </li>
        </ul>
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
         <!-- pop-up-box -->
         <script type="text/javascript" src="<?php echo base_url_ci;?>public/js/modernizr.custom.min.js"></script>
                    <link href="<?php echo base_url_ci;?>public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
                    <script src="<?php echo base_url_ci;?>public/js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <!--//pop-up-box -->
                    <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                    </script>
         <!-- requried-jsfiles-for owl -->
         <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo1").flexisel({
                        visibleItems: 3,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
                </script>
                <script type="text/javascript" src="<?php echo base_url_ci;?>public/js/jquery.flexisel.js"></script>
        <script src="<?php echo base_url_ci;?>public/js/mfb.js"></script>
        <script src="<?php echo base_url_ci;?>public/js/mfb.min.js"></script>
        <!-- for bootstrap working -->
        <script src="<?php echo base_url_ci;?>public/js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
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
    </script>
        <script src="<?php echo base_url_ci;?>public/js/SmoothScroll.min.js"></script>
        <script src="<?php echo base_url_ci;?>public/js/move-top.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
    </body>

</html>