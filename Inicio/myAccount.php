
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
		<?php session_start() ?>
		if(<?php echo $_SESSION['newOffers'] ?> == "1"){
			 $("#cellOffersYes").prop("checked", true) 
			}
		else
			 $("#cellOffersYes").prop("checked", false) 


		$("#saveChanges").click(function(){

		});

		$("#cellNick").blur(function(){
			alert("blussssuur");
		});


	   });	



	 </script>
</head>
<body>
<?php include 'header.php' ?>
<div class="container-fluid">
	<div class="row">
	  <div class="col-xs-6 col-sm-4" >
		<ul class="sidebar">	      
	      <li class="sidebar-brand"><a href="">My Profile</a></li>
	      <li><a href="myAccount.php">My account</a></li>
	      <li><a href="myMovies.php">My movies</a></li>
	      <li><a href="myGames.php">My games</a></li>
	      <li><a href="mySeries.php">My series</a></li>
	      </ul>
	   </div>
    	<div class="col-xs-6 col-sm-4" style="background-color:white";>
    	<form action="View.php" action="modifyUser">
		<table class="table table-hover table-responsive">			
			<tbody>
				<tr>
				<th scope="row">Nick</th>
				<td><input type="text" id="cellNick" value="<?php echo $_SESSION['nick'];?>"></td>
				</tr>

				<tr>
				<th scope="row">E-mail</th>
				<td><input type="email" id="cellEmail" value="<?php echo $_SESSION['email'];?>" disabled></td>
				</tr>
				
				<tr>
				<th scope="row">Password</th>
				<td><input type="password" id="cellPassword" value="******"></td>
				</tr>

				<tr>
				<th scope="row">URL profile image</th>
				<td><input type="text" id="cellUrl" value="<?php echo $_SESSION['urlImg'];?>"></td>
				</tr>

				<tr>
				<th scope="row">Country</th>
				<td><input type="text" id="cellCountry" value="Spain"></td>
				</tr>

				<tr>
				<th scope="row">City</th>
				<td><input type="text" id="cellCity" value="<?php echo $_SESSION['city'];?>"></td>
				</tr>
				<tr>

				<th scope="row">New Offers?</th>
				<td>
					<div class="radio">
					  <label><input type="radio" id="cellOffersYes" name="optradio" >Yes</label>
					</div>
					<div class="radio">
					  <label><input type="radio" id="cellOffersNo" name="optradio">No</label>
					</div>
				</td>
				</tr>
			</tbody>
		</table>
		</form>
			<div align="center" display:inline>
				<button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
				<button type="button" class="btn btn-primary" id="cancelChanges">Cancel</button>
			</div>
		</div>
   </div>
</div>

</body>
</html>