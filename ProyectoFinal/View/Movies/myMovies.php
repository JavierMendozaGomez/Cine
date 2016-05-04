<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My profile</title>
 <?php include 'cssAndjs.php' ?>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="css/SideBarStyle.css">

	<style type="text/css" media="screen">
		.table input{
			border: none;
		}
	</style>
  <script>

    
  $(document).ready(function(){
    $.ajax({
      url: '../Portada/controllerMedia.php',
      data: {action:'getMovies','idUser': '<?php echo $_SESSION["email"] ?>' },
      success: function(result) { 
      var parsed = JSON.parse(result);   
      var contador = 0;
      var html="<section class=\"movies\">\r\n";
      for(var i = 0; i < parsed.length;i++){
            contador++;
            html += getMediaByID(parsed[i],'movie');
            if(contador == 2){
             html +=  "<\/section>\r\n";
             html +="<section class=\"movies\">\r\n";
             contador = 0;
             }
            }
          html +=  "<\/section>\r\n";
          if(html == "<section class=\"movies\">\r\n"+"<\/section>\r\n")
            $("#withoutResults").show();
          else
            $("#listOfMedia").html(html);
       }
      
    });
  });
  </script>
</head>
<body>
<?php include 'header.php' ?>
<div class="container-fluid">
	<div class="row">
	  <div class="col-xs-6 col-sm-4">
		<ul class="sidebar">      
        <li class="sidebar-brand"><a href="">My Profile</a></li>
        <li><a href="myAccount.php">My account</a></li>
        <li><a href="myMovies.php">My movies</a></li>
        <li><a href="myGames.php">My games</a></li>
        <li><a href="mySeries.php">My series</a></li>
	      </ul>
	   </div>
		 <div class="col-xs-6 ">
			 <div class="app">
      <h2 id="withoutResults" hidden="">No se ha añadido ninguna pelicula</h2><br>
      <h2 id="tituloPeliculas" hidden> Mis Peliculas</h2>
      <div id="listOfMedia">
      </div>    
        <?php include 'animation.php' ?>
      </div>

</body>
</html>