<!DOCTYPE html>
<html>
<head>
  <?php include 'cssAndjs.php' ?>
  <title>
  Inicio  
  </title>
  <?php include 'header.php' ?>
  <script>
  $(document).ready(function(){
  	var title = "<?php echo $_GET["title"]; ?>";
    var year = "<?php echo $_GET["year"];?>";
  	<?php switch ($_GET["advanceSearch"]) {
  		case 'none':
  			echo" $(\"#listOfMovies\").html(getHtml(\"movie\",title));
                $(\"#listOfSeries\").html(getHtml(\"series\",title));
                $(\"#listOfGames\").html(getHtml(\"game\",title));			
  				";
  				break;
  		case 'movie':
  			echo " 
                $(\"#listOfMovies\").html(getAdvanceHTML(\"movie\",title,year));
                $(\"#listOfSeries\").html(\"\");
                $(\"#listOfGames\").html(\"\");";
                break;
        case 'series':
  			echo " 
                $(\"#listOfMovies\").html(\"\");
                $(\"#listOfSeries\").html(getAdvanceHTML(\"series\",title,year));
                $(\"#listOfGames\").html(\"\");";
                break;
        case 'game':
        	echo " 
                $(\"#listOfMovies\").html(\"\");
                $(\"#listOfSeries\").html(\"\");
                $(\"#listOfGames\").html(getAdvanceHTML(\"game\",title,year));";
                break;
  		default:
  			break;
  		} 
	     echo "checkIfNotResults();";

  	?>
	});
	</script>
</head>
<body>

<div class="app">
    <h2 id="withoutResults" hidden>No se ha encontrado ningún resultado</h2></br>
    <h2 id="tituloPeliculas" hidden>Peliculas</h2>
	    <div id="listOfMovies">
	    </div>
	<h2 id="tituloJuegos" hidden>Juegos</h2>
		<div id="listOfGames">
		</div>
	<h2 id="tituloSeries" hidden>Series</h2>
		<div id="listOfSeries">
		</div>

  <?php include 'animation.php'?>
</body>
</html>