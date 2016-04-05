<?php
require './DAOUser.php';


function registerUserSA($TUser){
	$ok;
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";
	$db = "AW_DB";
	$conn = new mysqli($servername, $username, $password, $db);
	if((readUserByEmailDAO($TUser,$conn ) == null) &&(readUserByNickDAO($TUser,$conn ) == null)){
		 registerUserDAO($TUser, $conn);
		 $ok = TRUE;
		}
	else{
		$ok = FALSE;
	}
	$conn->close();
	return $ok;
}
function loginUser($TUser){
	$tUserDevuelto = readUserByEmailDAO($TUser,$conn );
	if($tUserDevuelto == null)
		$tUserDevuelto = readUserByNickDAO($TUser,$conn );
	return $tUserDevuelto;
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