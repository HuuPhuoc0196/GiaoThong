<!doctype html>
<html>
<head>
<meta charset="utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	setInterval(refreshIframe1, 40);
       function refreshIframe1() {
           $("#Frame1")[0].src = $("#Frame1")[0].src;
       }
</script>
<title>Untitled Document</title>
</head>

<body>
	<iframe id="Frame1" src="http://giaothong.hochiminhcity.gov.vn:8007/Render/CameraHandler.ashx?id=56de42f611f398ec0c481288&bg=black&h=200&w=300&t=1548125173899">
	</iframe>
</body>
</html>