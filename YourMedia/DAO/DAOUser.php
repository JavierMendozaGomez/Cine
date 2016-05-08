<?php
function readByName(){

	return false;
}
function registerUserDAO($TUser, $conn){
	
	$sql = "INSERT INTO USER(email,contrasena,nick,newOffers,image,city,country) VALUES ('".$TUser->getEmail()."', '".$TUser->getPassword()."', '".$TUser->getNick()."', ";
	if($TUser->getNewOffers() === TRUE){
		$sql= $sql.$TUser->getNewOffers();
		}
	else{
		$sql = $sql."0";
	}

	$sql = $sql.", '".$TUser->getImage()."', '".$TUser->getCity()."', '".$TUser->getCountry()."')";
	if($conn->query($sql) === TRUE){
		return TRUE;
	}
	else{
		return FALSE;
	}
}
function readByIDDAO(){

}
function readUserByEmailDAO( $tUser,$conn){
	try{
	$sql = "SELECT * FROM USER WHERE email = '".$tUser->getEmail() ."' FOR update";
	$resultado = $conn->query($sql);
  	$num_filas = $resultado->num_rows;
  	$fila = $resultado->fetch_array(MYSQLI_NUM);
	$resultado->close();
	if($num_filas == 0){
		return null;
	}
	else{
		$tUser = new TransferUser();
		$tUser->setEmail($fila[0]);
		$tUser->setPassword($fila[1]);
		$tUser->setNick($fila[2]);
		$tUser->setNewOffers($fila[3]);
		$tUser->setImage($fila[4]);
		$tUser->setCity($fila[5]);
		$tUser->setCountry($fila[6]);
		return $tUser;
	}
	}
	catch(Exception $e){
	}

}

function readUserByNickDAO( $tUser,$conn){
	try{
	$sql = "SELECT * FROM USER WHERE nick = '".$tUser->getNick() ."' FOR update";
	$resultado = $conn->query($sql);
  	$num_filas = $resultado->num_rows;
  	$fila = $resultado->fetch_array(MYSQLI_NUM);
	$resultado->close();
	if($num_filas == 0){
		return null;
	}
	else{
		
		$tUser = new TransferUser();
		$tUser->setEmail($fila[0]);
		$tUser->setPassword($fila[1]);
		$tUser->setNick($fila[2]);
		$tUser->setNewOffers($fila[3]);
		$tUser->setImage($fila[4]);
		$tUser->setCity($fila[5]);
		$tUser->setCountry($fila[6]);
		return $tUser;
	}
	}
	catch(Exception $e){
		
	}

}

function readAllUsersDAO($conn){
	$arrayUsers = array();
 	$sql = "SELECT * FROM USER ";
		if ($conn->multi_query($sql)) {
		    do {
		        if ($resultado = $conn->use_result()) {
		            while ($fila = $resultado->fetch_row()) {
		            	$tUser = new TransferUser($fila[1],$fila[2],$fila[3],$fila[4]);
		            	array_push($arrayUsers,$tUser);
		            }
		            $resultado->close();
		        }
		    } while ($conn->next_result());
		}

	for($i = 0; $i< count($arrayUsers);$i++){
		$arrayUsers[i]->imprime();
	}

}


function deleteUserDAO($TUser, $conn){
 	$sql = "DELETE FROM USER WHERE email='".$TUser->getEmail()."';";
 	$sql .= " DELETE FROM MOVIE WHERE idUser='".$TUser->getEmail()."';";
 	$sql .= " DELETE FROM GAME WHERE idUser='".$TUser->getEmail()."';";
 	$sql .= " DELETE FROM SERIES WHERE idUser='".$TUser->getEmail()."';";
 	echo $sql;
 	if ($conn->multi_query($sql)){
 		echo "true";
 	}
 	else{
 		echo "false";
 	}

}
function modifyUserDAO($TUser, $conn){
	$arrayUsers = array();
 	$sql = "UPDATE USER SET nick = '".$TUser->getNick()."', contrasena='".$TUser->getPassword()."' , newOffers=".$TUser->getNewOffers().
			", image ='".$TUser->getImage()."', city='".$TUser->getCity()."', country='".$TUser->getCountry()."'".
			" WHERE email='".$TUser->getEmail()."'";
	echo $sql;
	if($conn->query($sql) === TRUE){
		echo "true";
	}
	else{
		echo "false";;
	}
}

?>