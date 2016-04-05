<?php
require './DAOUser.php';


function registerUserSA($TUser){
	$ok;
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	if((readUserByEmailDAO($TUser,$conn ) == null) &&(readUserByNickDAO($TUser,$conn ) == null)){	//Si el email y el nick no se han cogido antes
		 registerUserDAO($TUser, $conn);
		 $ok = TRUE;
		}
	else{
		$ok = FALSE;
	}
	$conn->close();
	return $ok;
}
/*Funcion que dada una entrada busca o bien por nick o por email los datos*/
function loginUser($TUser){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	$tUserDevuelto = readUserByEmailDAO($TUser,$conn );
	if($tUserDevuelto == null)	
		$tUserDevuelto = readUserByNickDAO($TUser,$conn );
	return $tUserDevuelto;
}

function readUserByEmailSA(){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	return readUserByEmailDAO($TUser,$conn);
}

function readUserByNickSA(){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	return readUserByNick($TUser,$conn);
}
function modifyUserSA($TUser){


}

function readByIDSA(){

}
function readUserSA( $user){

}
function readAllUsersSA(){

}
function deleteUserSA(){

}

?>