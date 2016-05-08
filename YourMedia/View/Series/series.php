<!DOCTYPE html>
<html>
<head>
	<title>
	Inicio	
	</title>
 <?php include '../cssAndjs.php' ?>
</head>
<body>
<?php include '../header.php' ?>

<div class="app">
  <h2 id="withoutResults" hidden>No se ha encontrado ningún resultado</h2></br>
  <h2 id="tituloPeliculas" hidden>Movies</h2>
  <div id="listOfMovies">
   </div>

<h2 id="tituloJuegos" hidden>Games</h2>
<div id="listOfGames"><section class="movies">
</div>
<h2 id="tituloSeries">Series</h2>
<div id="listOfSeries">
  <?php include 'defaultSeries.php' ?>
</div>  
  <?php include '../animation.php' ?>
</body>
</html>