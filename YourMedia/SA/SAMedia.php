<?php
require '../../DAO/DAOMedia.php';
require '../../ConnectToDB.php';
		
		$connection = new Connection(); 
		$servername = $connection->getServerName();
		$username = $connection->getUserName();
		$password = $connection->getPassword();
		$db = $connection->getDB();


	function addMovieSA($idUser, $idMedia){		
		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		addMovieDAO($idUser,$idMedia,$conn);
		$conn->close();
		return TRUE;
	}

	function addSeriesSA($idUser, $idMedia){
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		addSeriesDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function addGameSA($idUser, $idMedia){
		
		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		addGameDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function deleteMovieSA($idUser, $idMedia){
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		deleteMovieDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function deleteSeriesSA($idUser, $idMedia){	
	

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		deleteSeriesDAO($idUser,$idMedia,$conn);
		$conn->close();
		
	}

	function deleteGameSA($idUser, $idMedia){		
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		deleteGameDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function existsMovieSA($idUser, $idMedia){
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$ok = existsMovieDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}
	
	function existsSeriesSA($idUser, $idMedia){		
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$ok = existsSeriesDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}

	function existsGameSA($idUser, $idMedia){		
		

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$ok = existsGameDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}

	function getMoviesSA($idUser){

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$listOfMovies =  getMoviesDAO($idUser, $conn);
		$conn->close();
		return $listOfMovies;
	}

	function getSeriesSA($idUser){

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$listOfSeries =  getSeriesDAO($idUser, $conn);
		$conn->close();
		return $listOfSeries;
	}

	function getGamesSA($idUser){

		$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
		$listOfGames =  getGamesDAO($idUser, $conn);
		$conn->close();
		return $listOfGames;
	}
?>