<?php
class TransferPelicula{
	public $title;
	public $id;
	public $img;
	function __construct(){
	}

	public function setTitle($title){
		$this->title = $title;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setImage($img){
		$this->img = $img;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getId(){
		return $this->id;
	}

	public function getImage(){
		return $this->img;
	}

}
?>