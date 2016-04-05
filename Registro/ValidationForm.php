<?php
require './TransferUser.php';
require './SAUser.php';
if(isset($_POST['action'])){
	switch ($_POST['action']) {
        case 'emailValidation':
            emailValidation();
            break;
        case 'nickValidation':
            emailValidation();
            break;
    }
}

function emailValidation(){
	$tUsuario = new TransferUser();
	$tUsuario = readUserByEmailSA($tUsuario);
	if($tUsuario != null)
		echo "true"; 
	else{
		echo "false";
	}
}

function nickValidation(){
	$tUsuario = new TransferUser();
	$tUsuario = readUserByNickSA($tUsuario);
	if($tUsuario != null)
		echo "true";
	else
		echo "false";
	}
?>
