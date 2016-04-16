<?php
class TransferUser{
	public $nick;
	public $email;
	public $contrasena;
	public $newOffers;
	public $img;
	public $city;
	public $postalCode;
	public $listaFacturas;

	function __construct(){
		$this->email = "";
		$this->contrasena = "";
		$this->nick = "";
		$this->newOffers = TRUE;
		$this->img="";
		$this->city="";
		$this->postalCode="";

	}
	public function getNick(){
		return $this->nick;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->contrasena;
	}

	public function getCountry(){
		return $this->country;
	}

	public function getImage(){
		return $this->img;
	}
	public function getNewOffers(){
		return $this->newOffers;
	}
	public function getCity(){
		return $this->city;
	}

	public function getPostalCode(){
		return $this->postalCode;
	}

	public function setNick($nick){
		$this->nick = $nick;
	}
	public function setEmail($email){
		$this->email = $email;
	}

	public function setPassword($contrasena){
		$this->contrasena = $contrasena;
	}
	public function setCountry($country){
		$this->country = $country;
	}
	public function setNewOffers($newOffers){
		$this->newOffers = $newOffers;
	}

	public function setCity($city){
		$this->city = $city;
	}
	public function setPostalCode($postalCode){
		$this->postalCode = $postalCode;
	}
	public function setImage($img){
		$this->img = $img;
	}
	public function imprime(){
		echo $this->email."</br>";
		echo $this->contrasena."</br>";
		echo $this->nick."</br>";
		echo $this->newOffers."</br>";
	}
}
?>