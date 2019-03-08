<!doctype html>
<html>
<head>
<meta charset="utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

var myVar = setInterval(showImgUrl, 5000);
function showImgUrl(){
  	$('.camera').each(function( index ) {
	  	var src = $(this).attr('src');
	  	var indexSearch = src.lastIndexOf("=black");
	  	src = src.substring(0,indexSearch + 6);
  		src = src + "&t=" + new Date().getTime();
  		$(this).attr("src",src);
  	});
 }
</script>
<title>Untitled Document</title>
</head>

<body>
	<img class="camera" src="http://giaothong.hochiminhcity.gov.vn:8007/Render/CameraHandler.ashx?id=5a824e465058170011f6eab4&bg=black&w=200&h=130&t=1550757865490">
	<img class="camera" src="http://giaothong.hochiminhcity.gov.vn:8007/Render/CameraHandler.ashx?id=5a824ee15058170011f6eab6&bg=black&w=200&h=130&t=1551285990466">
</body>
</html>