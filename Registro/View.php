<?php
require './TransferUser.php';
require './SAUser.php';
if(isset($_POST["altaUsuario"])){
	$tUsuario = new TransferUser($_POST["email"], $_POST["contrasena"], $_POST["nick"], $_POST["newOffers"]);
	if(registerUserSA($tUsuario))
		echo "Usuario dada de alta";
	else
		echo "Ya existe un usuario con ese correo o nick";
}
if(isset($_POST["loginUser"])){
	$tUsuario = new TransferUser($_POST["emailorNick"]);
	$tUsuario = loginUser($tUsuario);
	if($tUsuario != null)
		$tUsuario->imprime();
	else
		echo "Ya existe un usuario con ese correo o nick";
}

?>