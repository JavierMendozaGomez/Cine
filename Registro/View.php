<?php
require './TransferUser.php';
require './SAUser.php';
if(isset($_POST["altaUsuario"])){
	$tUsuario = new TransferUser();
	$tUsuario->setEmail($_POST["email"]);
	$tUsuario->setPassword($_POST["contrasena"]);
	if(registerUserSA($tUsuario))
		echo "Usuario dada de alta";
	else
		echo "Ya existe un usuario con ese correo o nick";
}

if(isset($_POST["loginUser"])){
	$tUsuario = new TransferUser();
	$tUsuario->setEmail($_POST["emailorNick"]);
	$tUsuario->setNick($_POST["emailorNick"]);
	$tUsuario = loginUser($tUsuario);
	if($tUsuario != null){
		$tUsuario->imprime();
	}
	else{
		echo "No existe esa cuenta wn";
	}

?>