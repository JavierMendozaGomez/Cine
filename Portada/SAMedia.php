<?php
	require './DAOMedia.php';

	function addMovieSA($idUser, $idMedia){
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		addMovieDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function addSeriesSA($idUser, $idMedia){
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		addSeriesDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function addGameSA($idUser, $idMedia){
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		addGameDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function deleteMovieSA($idUser, $idMedia){
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		deleteMovieDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function deleteSeriesSA($idUser, $idMedia){	
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		deleteSeriesDAO($idUser,$idMedia,$conn);
		$conn->close();
		
	}

	function deleteGameSA($idUser, $idMedia){		
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		deleteGameDAO($idUser,$idMedia,$conn);
		$conn->close();
	}

	function existsMovieSA($idUser, $idMedia){
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		$ok = existsMovieDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}
	
	function existsSeriesSA($idUser, $idMedia){		
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		$ok = existsMovieDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}

	function existsGameSA($idUser, $idMedia){		
		$servername = "localhost:3306";
		$username = "root";
		$password = "1234";
		$db = "AW_DB";
		$conn = new mysqli($servername, $username, $password, $db);
		$ok = existsMovieDAO($idUser, $idMedia, $conn);
		$conn->close();
		return $ok;
	}
?>