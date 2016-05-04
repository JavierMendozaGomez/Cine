<?php
require '../../DAO/DAOUser.php';


function registerUserSA($TUser){
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

function readUserByEmailSA($TUser){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	$TUser = readUserByEmailDAO($TUser,$conn);
	$conn->close();
	return $TUser;
}

function readUserByNickSA($TUser){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	$TUser = readUserByNickDAO($TUser,$conn);
	$conn->close();
	return $TUser;
}
function modifyUserSA($TUser){
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	modifyUserDAO($TUser,$conn);
	$conn->close();
}

function deleteUserSA(){	
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	deleteUserDAO($id,$conn);
	$conn->close();
}

?>