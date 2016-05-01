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
                          	$("#cellActors").val(data.Actors);
                          	$("#cellAwards").val(data.Awards);
                          	$("#poster").attr('src', data.Poster);
                          }
                });
	});
</script>
<div class="container-fluid">
	<div class="row " style="background-color: green">
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
				<th scope="row">ImdbRating</th>
				<td><input type="text" id="cellCountry" value="Spain"></td>
				</tr>				
			</tbody>
			</table>
			<div style="text-align: center">
				<button type="button" class="btn btn-primary" id="favouriteButton">Add to Favourites</button>
			</div>
		 </div>
		</div>
</div>
</html>
