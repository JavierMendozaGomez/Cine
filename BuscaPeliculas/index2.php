<?php
$pelicula ="star+wars";
$json_array = file_get_contents("http://www.omdbapi.com/?s=".$pelicula."&y=&plot=short&r=json&type=movie");
$arrayPeliculas = json_decode($json_array,true);

	 foreach($arrayPeliculas as $peliculas){
	 	if(is_array($peliculas))
		 foreach($peliculas as $pelicula) {	
				echo $pelicula['Title'].'<br/>';
				echo $pelicula['Year'].'<br/>';
			}
		}
	
 ?>