<?php
	
	class Connection{
		
		private $serverName;
		private $username;
		private $password;
		private $db;


		function __construct(){
			$this->servername = "localhost:3306";
			$this->username = "root";
			$this->password = "";
			$this->db = "yourmedia";
		}

		function getServerName(){
			return $this->serverName;
		}

		function getUsername(){
			return $this->username;
		}

		function getPassword(){
			return $this->password;
		}

		function getDB(){
			return $this->db;
		}

	}
?>