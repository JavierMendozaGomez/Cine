<!DOCTYPE html>
<html>
<head>
 <?php include 'cssAndjs.php' ?>
	<title>
	Inicio	
	</title>
</head>
<body>
<?php include 'header.php' ?>

<div class="container-fluid">
 <div class="row">
   <div class=".col-xs-12 .col-md-8">

<div class="app">
  <h2 id="withoutResults" hidden>No se ha encontrado ningún resultado</h2></br>
  <h2 id="tituloPeliculas">Movies</h2>
  <div id="listOfMovies">
</div>
  <?php include 'defaultMovies.php' ?>
</div> 
  <?php include 'animation.php' ?>
</div>
</body>
</html>