<?php

	function addMovieDAO($idUser,$idMedia, $conn){
	
	$sql = "INSERT INTO MOVIE(idUser,idMovie) VALUES ('".$idUser."', '".$idMedia."')";
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
		}
	}

	function addSeriesDAO($idUser,$idMedia, $conn){
	$sql = "INSERT INTO SERIES(idUser,idSeries) VALUES ('".$idUser."', '".$idMedia."')";
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
		}
	}
	

	function addGameDAO($idUser,$idMedia, $conn){
	$sql = "INSERT INTO GAME(idUser,idGame) VALUES ('".$idUser."', '".$idMedia."')";
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
		}
	}

	function deleteMovieDAO($idUser, $idMedia, $conn){
	$sql = "DELETE FROM MOVIE WHERE idUser='".$idUser."' AND idMovie='".$idMedia."'";	
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
	}

	}


	function deleteSeriesDAO($idUser, $idMedia, $conn){
	$sql = "DELETE FROM SERIES WHERE idUser='".$idUser."' AND idSeries='".$idMedia."'";	
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
	}

	}


	function deleteGameDAO($idUser, $idMedia, $conn){
	$sql = "DELETE FROM GAME WHERE idUser='".$idUser."' AND idGame='".$idMedia."'";	
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
		}
	}

	function existsMovieDAO($idUser, $idMedia, $conn){
	$sql = "SELECT count(*) FROM MOVIE where idUser='".$idUser."' AND idMovie='".$idMedia."';";	
	$resultado = $conn->query($sql);
  	$fila = $resultado->fetch_array(MYSQLI_NUM);
	$resultado->close();
		if($fila[0] == "0")
		  	return FALSE;
		else
		  	return TRUE;
	}

	function existsSeriesDAO($idUser, $idMedia, $conn){
	$sql = "SELECT count(*) FROM SERIES where idUser='".$idUser."' AND idSeries='".$idMedia."';";	
	$resultado = $conn->query($sql);
  	$fila = $resultado->fetch_array(MYSQLI_NUM);
	$resultado->close();
		if($fila[0] == "0")
		  	return FALSE;
		else
		  	return TRUE;
	}

	function existsGameDAO($idUser, $idMedia, $conn){
	$sql = "SELECT count(*) FROM GAME where idUser='".$idUser."' AND idGame='".$idMedia."';";	
	$resultado = $conn->query($sql);
  	$fila = $resultado->fetch_array(MYSQLI_NUM);
	$resultado->close();
		if($fila[0] == "0")
		  	return FALSE;
		else
		  	return TRUE;
	}

?>