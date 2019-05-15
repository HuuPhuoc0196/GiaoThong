<!DOCTYPE HTML>
<html>
    <head>
        <title>Lấy Cookie</title>
    	<script type="text/javascript">
            <?php 
                if(!isset($_COOKIE["callAPI"])){
                    setcookie("callAPI", "callAPI");
                     echo "window.open('http://giaothong.hochiminhcity.gov.vn/');";
                }
            ?>
        </script>
    </head>
    <body>
    	<h1>Service lấy Cookie cho Camera Giao Thông</h1>
    </body>
     </html>

