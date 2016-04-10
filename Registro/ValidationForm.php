<?php
require './TransferUser.php';
require './SAUser.php';
if(isset($_POST['action'])){
	switch ($_POST['action']) {
        case 'emailValidation':
            emailValidation();
            break;
        case 'nickValidation':
            nickValidation();
            break;
    }
}

function emailValidation(){
	$tUsuario = new TransferUser();
	$_elEmail = $_POST["email"];
	$tUsuario->setEmail($_elEmail);
	$tUsuario = readUserByEmailSA($tUsuario);
	if($tUsuario != null){
		echo "true"; 
	}
	else
		echo "false";
	
}

function nickValidation(){
	$tUsuario = new TransferUser();
	$tUsuario->setNick($_POST['nick']);
	$tUsuario = readUserByNickSA($tUsuario);
	if($tUsuario != null)
		echo "true";
	else
		echo "false";
	}

function emailorNickValidation(){
	$tUsuario = new TransferUser();
	$tUsuario->setNick($_POST['emailOrNick']);
	$tUsuario->setEmail(
	$tUsuario = readUserByNickSA($tUsuario);
	if($tUsuario != null){
		echo "true";
	}
	else{
		echo "false";
	}
}
?>
