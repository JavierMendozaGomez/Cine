<?php
$latitude;
$json_array = file_get_contents("http://nominatim.openstreetmap.org/reverse?format=json&lat=54.9824031826&lon=9.2833114795&zoom=18&addressdetails=1");
$arrayPeliculas = json_decode($json_array,true);

	 foreach($arrayPeliculas as $peliculas){
	 	if(is_array($peliculas))
		 foreach($peliculas as $pelicula) {	
				echo $pelicula['Title'].'<br/>';
				echo $pelicula['Year'].'<br/>';
			}
		}
?>