<!DOCTYPE html>
<html>
<head>
 <?php include '../cssAndjs.php' ?>
  <title>
  Inicio  
  </title>
</head>
<body>
  <?php include '../header.php' ?>

<div class="app">
    <h2 id="withoutResults" hidden>No se ha encontrado ningún resultado</h2></br>
    <h2 id="tituloPeliculas" hidden>Peliculas</h2>
    <div id="listOfMovies">
</div>
<h2 id="tituloJuegos">Games</h2>
<div id="listOfGames">
  <?php include 'defaultGames.php' ?>
</div>  
<h2 id="tituloSeries" hidden>Series</h2>
<div id="listOfSeries">
</div>
  <?php include '../animation.php' ?>
</body>
</html>