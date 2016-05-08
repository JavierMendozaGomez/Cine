<!DOCTYPE html>
<html>
<head>
 <?php include 'cssAndjs.php' ?>
  <title>
  Inicio  
  </title>
  <script>
  </script>
</head>
<body>
<?php include 'header.php' ?>
</body>
<style>
	textarea:disabled{
		background-color: transparent;
		border-color: transparent;
	}
	input:disabled{
		background-color: transparent;
		border-color: transparent;
	}
	textarea { resize: vertical; }


</style>	
</style>
<script>

		function textAreaAdjust(o) {
		    o.style.height = "1px";
		    o.style.height = (25+o.scrollHeight)+"px";
		}
	$(document).ready(function(){
		var url = "http://www.omdbapi.com/?i=<?php echo $_GET["id"]; ?>&plot=full&r=json";
		$.ajax({
                          type: "get",
                          url: url,
                          async:false,
                          success: function(data) {   
                          	$("#cellTitle").val(data.Title);
                          	$("#cellYear").val(data.Year);
                          	$("#cellRated").val(data.Rated);
                          	$("#cellReleased").val(data.Released);
                          	$("#cellDuration").val(data.Runtime);
                          	$("#cellGenre").val(data.Genre);
                          	$("#cellDirector").val(data.Director);
                          	$("#cellWriter").val(data.Writer);
                          	$("#cellType").val(data.Type);
                          	$("#cellActors").val(data.Actors);
                          	$("#cellAwards").val(data.Awards);
                          	$("#cellRating").val(data.imdbRating)
                          	var posterError;
						    switch(data.Type){
						      case "game": posterError="http://vignette1.wikia.nocookie.net/donkeykong/images/4/43/Donkey_kong_pensativo.png/revision/latest?cb=20130606180457&path-prefix=es";break;
						      case "movie": posterError="http://cdn4.areajugones.es/wp-content/uploads/2015/05/Batman-Arkham-Trofeo-Enigma.jpg";break;
						      case "series": posterError="http://reactiongifs.me/wp-content/uploads/2014/10/tyrion-lannister-eyebrows-game-of-thrones.gif";break;
						    }
                          	if(data.Poster == "N/A"){
                          	 	$("#poster").attr('src', posterError);
                          	}
                          	else
                          	$("#poster").attr('src', data.Poster);

                          	$.ajax({
									type: "get",
									url:'/YourMedia/View/Controller/ControllerMedia.php',
									data: {'action':'exists','typeOfMedia': data.Type , 'idUser': '<?php echo $_SESSION["email"] ?>', 'idMedia': '<?php echo $_GET["id"] ?>'},
									success: function(result) {
										if(result == "false"){
											$("#favouriteButton").text("Add to Favourites");
											$("#favouriteButton").removeClass("btn-danger");
											$("#favouriteButton").addClass("btn-success");
										}
										else{
											$("#favouriteButton").text("Delete from favourites");
											$("#favouriteButton").removeClass("btn-success");
											$("#favouriteButton").addClass("btn-danger");
										}
									}
					          });
                          }
                });

		$("#favouriteButton").click(function(){
			/*Si el usuario no tiene esa pelicula/juego/serie añadido a favoritos*/
			if($( "#favouriteButton" ).hasClass( "btn-success" )){
					$.ajax({
									type: "get",
									url:'/YourMedia/View/Controller/ControllerMedia.php',
									data: {'action':'add','typeOfMedia': $("#cellType").val() , 'idUser': '<?php echo $_SESSION["email"] ?>', 'idMedia': '<?php echo $_GET["id"] ?>'},
									success: function(result) {
									$("#favouriteButton").removeClass("btn-success");
									$("#favouriteButton").addClass("btn-danger");
									$("#favouriteButton").text("Delete from favourites");

									}
					          });
				}
			else{
				$.ajax({

									type: "get",
									url:'/YourMedia/View/Controller/ControllerMedia.php',
									data: {'action':'delete','typeOfMedia': $("#cellType").val() , 'idUser': '<?php echo $_SESSION["email"] ?>', 'idMedia': '<?php echo $_GET["id"] ?>'},
									success: function(result) {
									$("#favouriteButton").removeClass("btn-danger");
									$("#favouriteButton").addClass("btn-success");
									$("#favouriteButton").text("Add to Favourites");
									}
					          });
			}
		});

	});
</script>
<div class="container-fluid">
	<div class="row " style="background-color: #164A5D">
 		<div class="col-md-6" >
 		  <div class ="media">
			<img id="poster" src="http://ia.media-imdb.com/images/M/MV5BMjQ0MTgyNjAxMV5BMl5BanBnXkFtZTgwNjUzMDkyODE@._V1_SX300.jpg" alt="" class="poster">		 
		  </div>
		 </div>
		 <div class="col-md-6">
		 	
		 	<table class="table  table-responsive media-info" style="background-color: white">			
			<tbody>
				<tr>
				<th scope="row">Title</th>
				<td><textarea  row=1 cols="50" id="cellTitle" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>

				<tr>
				<th scope="row">Year</th>
				<td><input type="email" id="cellYear"  disabled></td>
				</tr>
				
				<tr>
				<th scope="row">Rated</th>
				<td><input type="input" id="cellRated"  disabled></td>
				</tr>

				<tr>
				<th scope="row">Released</th>
				<td><input type="text" id="cellReleased"  disabled></td>
				</tr>

				<tr>
				<th scope="row">Duration</th>
				<td><input type="text" id="cellDuration"  disabled></td>
				</tr>

				<tr>
				<th scope="row">Genre</th>
				<td><textarea  row=1 cols="50" id="cellGenre" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>
				<tr>

				<tr>
				<th scope="row">Director</th>				
				<td><textarea  row=5 cols="50" id="cellDirector" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>

				<tr>
				<th scope="row">Writer</th>				
				<td><textarea  rows=4 cols="50" id="cellWriter" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>
				

				<tr>
				<th scope="row">Type</th>
				<td><input type="text" id="cellType"  disabled></td>
				</tr>

				<tr>
				<th scope="row">Actors</th>
				<td><textarea  cols="50" id="cellActors" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>
				

				<tr>
				<th scope="row">Awards</th>
				<td><textarea  cols="50" id="cellAwards" disabled onchange="textAreaAdjust(this)">
				</textarea></td>
				</tr>

				<tr>
				<th scope="row">Rating</th>
				<td><input type="text" id="cellRating" p  disabled></td>
				</tr>

			</tbody>
			</table>
			<div style="text-align: center">
				<button type="button" class="btn" id="favouriteButton">Add to Favourites</button>
			</div>
		 </div>
		</div>
</div>
</html>
