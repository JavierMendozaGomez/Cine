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
        case 'emailorNickValidation':
        	emailorNickValidation();
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
	$tUsuario->setEmail($_POST['emailOrNick']);
	$tUsuarioAux = readUserByNickSA($tUsuario);
	if($tUsuarioAux != null){
		echo json_encode($tUsuarioAux);
	}
	else{
		$tUsuario = readUserByEmailSA($tUsuario);
		if($tUsuario != null)
			echo json_encode($tUsuario);
		else
			echo "false";
		
		}
	}
function passwordValidation(){
	$tUsuario = new TransferUser();
	$tUsuario->setNick($_POST['emailOrNick']);
	$tUsuario->setEmail($_POST['emailOrNick']);
	$tUsuario = readUserByNickSA($tUsuario);
}
?>
