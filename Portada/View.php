<?php
require './TransferUser.php';
require './SAUser.php';

if(isset($_POST["registerUser"])){
		$tUsuario = new TransferUser();

	$tUsuario->setEmail($_POST["email"]);
	$tUsuario->setPassword($_POST["contrasena"]);
	$tUsuario->setNick($_POST["nick"]);
	if($_POST["newOffers"] == "on")
		$tUsuario->setNewOffers(TRUE);
	else	
	$tUsuario->setNewOffers(FALSE);
}

if(isset($_POST["registerUserNextStep"])){
	$tUsuario = new TransferUser();
	$tUsuario->setEmail($_POST["email"]);
	$tUsuario->setPassword($_POST["contrasena"]);
	$tUsuario->setNick($_POST["nick"]);
	if($_POST["newOffers"] == "on")
		$tUsuario->setNewOffers(TRUE);
	else	
		$tUsuario->setNewOffers(FALSE);

	$tUsuario->setImage($_POST["urlImgPerfil"]);


	if($tUsuario->getImage()=="")
		$tUsuario->setImage("http://www.cyclogen.com/wp-content/uploads/2014/07/perfil-anonimo-160x160.jpg");
	$tUsuario->setCity($_POST["city"]);
		$tUsuario->setCity($_POST["postalCode"]);

	registerUserSA($tUsuario);
	echo "usuario Registrado";
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
}
?>