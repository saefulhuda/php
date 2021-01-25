<!DOCTYPE html>
<html>
<head>
	<title>Auto load location</title>
	<?php include 'call_vendor.php'; ?>
</head>
<body>
	<p id="demo"></p>
</body>
<script>
	$(document).ready(function(){
		$("#demo").text("")
		getLocation();
	})

	var x = document.getElementById("demo");

		function getLocation() 
		{
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}

		function showPosition(position) {
			x.innerHTML = "Latitude : " + position.coords.latitude + 
			"<br>Longitude : " + position.coords.longitude;
		}
</script>
</html>
