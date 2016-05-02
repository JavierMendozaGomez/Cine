<?php
	require './SAMedia.php';
switch ($_GET["action"]) {
	case 'add':{
		switch ($_GET["typeOfMedia"]) {
			case 'movie':
				addMovieSA($_GET["idUser"],$_GET["idMedia"]);
				break;
			case 'series':
				addSeriesSA($_GET["idUser"],$_GET["idMedia"]);
				break;
			case 'game':
				addGameSA($_GET["idUser"],$_GET["idMedia"]);
				break;						
			default:
				break;
		}
	}
	case 'delete':{
		switch ($_GET["typeOfMedia"]) {
			case 'movie':
				deleteMovieSA($_GET["idUser"],$_GET["idMedia"]);
				break;
			case 'series':
				deleteSeriesSA($_GET["idUser"],$_GET["idMedia"]);
				break;
			case 'game':
				deleteGameSA($_GET["idUser"],$_GET["idMedia"]);
				break;						
			default:
				break;
		}
	}
	case 'exists':{
		switch ($_GET["typeOfMedia"]) {
			case 'movie':{
				 if(existsMovieSA($_GET["idUser"],$_GET["idMedia"]))
				 	echo "true";
				 else
				 	echo "false";
				}
				break;
			case 'series':{
				 if(existsSeriesSA($_GET["idUser"],$_GET["idMedia"]))
				 	echo "true";
				 else
				 	echo "false";
				}
				break;
			case 'game':{
				 if(existsGameSA($_GET["idUser"],$_GET["idMedia"]))
				 	echo "true";
				 else
				 	echo "false";
				}
				break;						
			default:
				break;
		}
	}
}
?>