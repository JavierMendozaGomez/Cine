<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$db = "AW_DB";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
$sql = "DROP DATABASE IF EXISTS ".$db.";"."
		CREATE DATABASE ".$db;
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
		echo "Conexion exitosa!"."</br>";
		if(mysqli_multi_query($conn, $sql)){
			$conn = new mysqli($servername, $username, $password, $db);
			$sql = 	"CREATE TABLE USER(
					ID INT(6) unsigned NOT NULL AUTO_INCREMENT,
				    email varchar(30) NOT NULL,
				    contrasena varchar(30) NOT NULL,
				    nick varchar(30) NOT NULL,
				    newOffers BIT,
				    PRIMARY KEY (email),
				    UNIQUE KEY(ID)
				    )ENGINE=INNODB
				   ";
			if($conn->query($sql) === TRUE)
				echo "datos cargados";
		}
	}
?>