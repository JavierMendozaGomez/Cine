<?php
require '../../SA/TransferUser.php';
require '../../SA/SAUser.php';

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
        case 'passwordValidation':
        	passwordValidation();
        	  	break;
       	case 'modifyUser':
       		modifyUser();
       		break;
       	case 'deleteUser':
       		deleteUser();
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
/*Devuelve true si el usuario ya existe*/
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
	$tUsuarioAux = readUserByNickSA($tUsuario);
	$passChecked = $_POST['passwordLogin'];
	if($tUsuarioAux != null){
		if (strcmp($tUsuarioAux->getPassword(), $passChecked) !== 0) {
			echo "false";
		}
		else {
			session_start();
			$_SESSION['nick'] = $tUsuarioAux->getNick();
			$_SESSION['urlImg'] = $tUsuarioAux->getImage();
			$_SESSION['email'] = $tUsuarioAux->getEmail();
			$_SESSION['city'] = $tUsuarioAux->getCity();
			$_SESSION['newOffers'] = $tUsuarioAux->getNewOffers();
			$_SESSION['myPassword'] = $tUsuarioAux->getPassword();
			$_SESSION['country'] = $tUsuarioAux->getCountry();
			echo "true";
			 }
	}
	else{
		$tUsuario = readUserByEmailSA($tUsuario);
		if (strcmp($tUsuario->getPassword(), $passChecked) !== 0) {
			echo "false";
		}
		else{
			session_start();
			$_SESSION['nick'] = $tUsuario->getNick();
			$_SESSION['urlImg'] = $tUsuario->getImage();
			$_SESSION['email'] = $tUsuario->getEmail();
			$_SESSION['city'] = $tUsuario->getCity();
			$_SESSION['myPassword'] = $tUsuario->getPassword();
			$_SESSION['newOffers'] = $tUsuario->getNewOffers();
			$_SESSION['country'] = $tUsuario->getCountry();
			echo "true";
			}
		}
	}

	function modifyUser(){
		session_start();
			$_SESSION['nick'] = $_POST["nick"];
			$_SESSION['urlImg'] =  $_POST["urlImg"];
			$_SESSION['email'] =  $_POST["email"];
			$_SESSION['city'] =  $_POST["city"];			
			$_SESSION['myPassword'] =  $_POST["password"];
			$_SESSION['newOffers'] =  $_POST["newOffers"];
			$_SESSION['country'] =  $_POST["country"];
			$tUsuario = new TransferUser();
			$tUsuario->setEmail($_POST["email"]);
			$tUsuario->setPassword($_POST["password"]);
			$tUsuario->setNick($_POST["nick"]);
			$tUsuario->setNewOffers($_POST["newOffers"]);
			$tUsuario->setImage($_POST["urlImg"]); 
			$tUsuario->setCity($_POST["city"]);
			$tUsuario->setCountry($_POST["country"]);
			modifyUserSA($tUsuario);
		}

	function deleteUser(){
			session_start();
			$tUsuario = new TransferUser();
			$tUsuario->setEmail($_SESSION['email']);
			deleteUserSA($tUsuario);
	}
?>
