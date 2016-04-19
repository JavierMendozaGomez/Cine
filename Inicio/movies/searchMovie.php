<?php
require './Transfer.php';
if(isset($_POST['action'])){
	switch ($_POST['action']) {
        case 'getMovies':{
		$json_array = file_get_contents("http://www.omdbapi.com/?s=".$_POST["pelicula"]."&y=&plot=short&r=json&type=movie");
		$arrayPeliculas = json_decode($json_array,true);
		$listaPeliculas = array();
		$contador = 0;
		 foreach($arrayPeliculas as $peliculas){
		 	if(is_array($peliculas))
			 foreach($peliculas as $pelicula) {	
		 			$tPelicula = new Transfer();
					$tPelicula->setTitle($pelicula['Title']);
					$tPelicula->setImdbId($pelicula['imdbID']);
					getInfoById($tPelicula->getImdbId(),$tPelicula);
					array_push($listaPeliculas,$tPelicula);

				}
			}
		echo json_encode($listaPeliculas);
    	
		};break;
		case'getMovieById':{

		}
	}
}
?>