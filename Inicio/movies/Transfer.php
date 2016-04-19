<?php
class Transfer{
	public $title;
	public $year;
	public $rated;
	public $released;
	public $runTime;
	public $genre;
	public $director;
	public $writer;
	public $actors;
	public $plot;
	public $language;
	public $country;
	public $awards;
	public $poster;
	public $metascore;
	public $imdbRating;
	public $imdbVotes;
	public $imdbId;
	public $type;
	public $response;

	function __construct(){
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getYear(){
		return $this->year;
	}

	public function setYear($year){
		$this->year = $year;
	}

	public function getRated(){
		return $this->rated;
	}

	public function setRated($rated){
		$this->rated = $rated;
	}

	public function getReleased(){
		return $this->released;
	}

	public function setReleased($released){
		$this->released = $released;
	}

	public function getRunTime(){
		return $this->runTime;
	}

	public function setRunTime($runTime){
		$this->runTime = $runTime;
	}

	public function getGenre(){
		return $this->genre;
	}

	public function setGenre($genre){
		$this->genre = $genre;
	}

	public function getDirector(){
		return $this->director;
	}

	public function setDirector($director){
		$this->director = $director;
	}

	public function getWriter(){
		return $this->writer;
	}

	public function setWriter($writer){
		$this->writer = $writer;
	}

	public function getActors(){
		return $this->actors;
	}

	public function setActors($actors){
		$this->actors = $actors;
	}

	public function getPlot(){
		return $this->plot;
	}

	public function setPlot($plot){
		$this->plot = $plot;
	}

	public function getLanguage(){
		return $this->language;
	}

	public function setLanguage($language){
		$this->language = $language;
	}

	public function getCountry(){
		return $this->country;
	}

	public function setCountry($country){
		$this->country = $country;
	}

	public function getAwards(){
		return $this->awards;
	}

	public function setAwards($awards){
		$this->awards = $awards;
	}

	public function getPoster(){
		return $this->poster;
	}

	public function setPoster($poster){
		$this->poster = $poster;
	}

	public function getMetascore(){
		return $this->metascore;
	}

	public function setMetascore($metascore){
		$this->metascore = $metascore;
	}

	public function getImdbRating(){
		return $this->imdbRating;
	}

	public function setImdbRating($imdbRating){
		$this->imdbRating = $imdbRating;
	}

	public function getImdbVotes(){
		return $this->imdbVotes;
	}

	public function setImdbVotes($imdbVotes){
		$this->imdbVotes = $imdbVotes;
	}

	public function getImdbId(){
		return $this->imdbId;
	}

	public function setImdbId($imdbId){
		$this->imdbId = $imdbId;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getResponse(){
		return $this->response;
	}

	public function setResponse($response){
		$this->response = $response;
	}
}

function getInfoById($imdbID,$transfer){
	$json_array = file_get_contents("http://www.omdbapi.com/?i=".$imdbID."&plot=short&r=json");
	$transferAux = json_decode($json_array,true);
	$transfer->setTitle($transferAux['Title']);
	$transfer->setYear($transferAux['Year']);
	$transfer->setRated($transferAux['Rated']);
	$transfer->setReleased($transferAux['Released']);
	$transfer->setRunTime($transferAux['Runtime']);
	$transfer->setGenre($transferAux['Genre']);
	$transfer->setDirector($transferAux['Director']);
	$transfer->setWriter($transferAux['Writer']);
	$transfer->setActors($transferAux['Actors']);
	$transfer->setPlot($transferAux['Plot']);
	$transfer->setLanguage($transferAux['Language']);
	$transfer->setCountry($transferAux['Country']);
	$transfer->setAwards($transferAux['Awards']);
	$transfer->setPoster($transferAux['Poster']);
	$transfer->setMetascore($transferAux['Metascore']);
	$transfer->setImdbRating($transferAux['imdbRating']);
	$transfer->setImdbVotes($transferAux['imdbVotes']);
	$transfer->setType($transferAux['Type']);
	$transfer->setResponse($transferAux['Response']);
}
?>