<?php
require './TransferPelicula.php';
if(isset($_POST['action'])){
	switch ($_POST['action']) {
        case 'getMovies':{
		$json_array = file_get_contents("http://www.omdbapi.com/?s=".$_POST["pelicula"]."&y=&plot=short&r=json&type=movie");
		//echo json_encode($json_array);
		$arrayPeliculas = json_decode($json_array,true);
		$listaPeliculas = array();
		$contador = 0;
		 foreach($arrayPeliculas as $peliculas){
		 	if(is_array($peliculas))
			 foreach($peliculas as $pelicula) {	
		 			$tPelicula = new TransferPelicula();
					$tPelicula->setTitle($pelicula['Title']);
					$tPelicula->setImage($pelicula['Poster']);
					array_push($listaPeliculas,$tPelicula);
					$contador++;
				}
			}
		echo json_encode($listaPeliculas);
    	
	}
}
}
?>