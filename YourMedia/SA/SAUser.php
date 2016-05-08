<?php
require '../../DAO/DAOUser.php';
require '../../ConnectToDB.php';
		
		$connection = new Connection(); 
		$servername = $connection->getServerName();
		$username = $connection->getUserName();
		$password = $connection->getPassword();
		$db = $connection->getDB();


function registerUserSA($TUser){
	

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
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

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	$tUserDevuelto = readUserByEmailDAO($TUser,$conn );
	if($tUserDevuelto == null)	
		$tUserDevuelto = readUserByNickDAO($TUser,$conn );
	return $tUserDevuelto;
}

function readUserByEmailSA($TUser){

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	$TUser = readUserByEmailDAO($TUser,$conn);
	$conn->close();
	return $TUser;
}

function readUserByNickSA($TUser){

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	$TUser = readUserByNickDAO($TUser,$conn);
	$conn->close();
	return $TUser;
}
function modifyUserSA($TUser){

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	modifyUserDAO($TUser,$conn);
	$conn->close();
}

function deleteUserSA($TUser){	
	

	$conn = new mysqli($GLOBALS["servername"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	deleteUserDAO($TUser,$conn);
	$conn->close();
}

?>