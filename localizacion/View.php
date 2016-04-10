<?php
if(isset($_POST["getLocation"])){}
	$json_array = file_get_contents("http://nominatim.openstreetmap.org/reverse?format=json&lat=".$_POST["latitude"]."&lon=".$_POST["longtude"]."&zoom=18&addressdetails=1");
}
?>