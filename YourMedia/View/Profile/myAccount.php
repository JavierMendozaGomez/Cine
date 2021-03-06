
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My profile</title>
 	<?php include '../cssAndjs.php' ?>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="/YourMedia/css/SideBarStyle.css">

	<style type="text/css" media="screen">
		.table input{
			border: none;
		}
		
	</style>
	<script>
	$(document).ready(function(){
		<?php if(!isset($_SESSION)) 
    		{ 
		     session_start(); 
		     }?>
		if('<?php echo $_SESSION['newOffers'] ?>' == "1"){
			 $("#cellOffersYes").prop("checked", true);
			 $("#offersLabel").val("1"); 
			}
		else{
			 $("#cellOffersNo").prop("checked", true);
 			 $("#offersLabel").val("0"); 
			}

		$("#saveChanges").click(function(){
			if(!($("#thNick").hasClass("danger"))){
			$.ajax({
				url:'/YourMedia/View/Controller/ControllerUser.php',
				type:'post',
				data:{'action':'modifyUser','nick': $("#cellNick").val(), 'newOffers':$("#offersLabel").val(),
				'email':$("#cellEmail").val(), 'urlImg':$("#cellUrl").val(), 'city':$("#cellCity").val(),
				'country':$("#cellCountry").val(), 'password':$("#cellPassword").val()
				},
				success:function(result){
					window.location.reload();
				}
			});
			}
		});
		$("#cancelChanges").click(function(){
			window.location.reload();
		});
		$("#cellNick").blur(function(){
			if($("#cellNick").val() != "<?php echo $_SESSION["nick"] ?>")
			$.ajax({
				url:'/YourMedia/View/Controller/ControllerUser.php',
				type:'post',
				data:{'action':'nickValidation','nick':$(this).val() },
				success:function(result){
					if(result == "false"){
						$("#tdNick").removeClass('danger');
						$("#thNick").removeClass('danger');
						$("#tdNick").addClass('success');
						$("#thNick").addClass('success');
					}
					else{
						$("#tdNick").addClass('danger');
						$("#thNick").addClass('danger');
						$("#tdNick").removeClass('success');
						$("#thNick").removeClass('success');
					}
				}
			});
			else{
						$("#tdNick").removeClass('success');
						$("#thNick").removeClass('success');
						$("#tdNick").removeClass('danger');
						$("#thNick").removeClass('danger');
			}
		});

		$("#cellOffersYes").click(function(){
			$("#offersLabel").val("1");

		});

		$("#cellOffersNo").click(function(){
			$("#offersLabel").val("0");
		});

		$("#deleteUser").click(function(){
			$.ajax({
				url:'/YourMedia/View/Controller/ControllerUser.php',
				type:'post',
				data:{'action':'deleteUser' },
				success:function(result){
					$("#logout").click();
				}
			});

	   });	
		
		});



	 </script>
</head>
<body>
<?php include '../header.php' ?>
<div class="container-fluid">
	<div class="row">
	  <div class="col-xs-6 col-sm-4" >
		<ul class="sidebar">	      
	      <li class="sidebar-brand"><a href="">My Profile</a></li>
	      <li><a href="/YourMedia/View/Profile/myAccount.php">My account</a></li>
	      <li><a href="/YourMedia/View/Movies/myMovies.php">My movies</a></li>
	      <li><a href="/YourMedia/View/Games/myGames.php">My games</a></li>
	      <li><a href="/YourMedia/View/Series/mySeries.php">My series</a></li>
	      </ul>
	   </div>
    	<div class="col-xs-6 col-sm-4" style="background-color:white";>
    	<form action="View.php" action="modifyUser">
		<table class="table table-hover table-responsive">			
			<tbody>
				<tr>
				<th scope="row" id="thNick">Nick</th>
				<td id="tdNick"><input type="text" id="cellNick" value="<?php echo $_SESSION['nick'];?>"></td>
				</tr>

				<tr>
				<th scope="row">E-mail</th>
				<td><input type="email" id="cellEmail" value="<?php echo $_SESSION['email'];?>" disabled></td>
				</tr>
				
				<tr>
				<th scope="row">Password</th>
				<td><input type="password" id="cellPassword" value="<?php echo $_SESSION['myPassword'] ?>"></td>
				</tr>

				<tr>
				<th scope="row">URL profile image</th>
				<td><input type="text" id="cellUrl" value="<?php echo $_SESSION['urlImg'] ?>"></td>
				</tr>

				<tr>
				<th scope="row">Country</th>
				<td><input type="text" id="cellCountry" value="<?php echo $_SESSION['country'];?>"></td>
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
					<input id="offersLabel" hidden>
				</td>
				</tr>
			</tbody>
		</table>
		</form>
			<div align="center" display:inline>
				<button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
				<button type="button" class="btn btn-primary" id="cancelChanges">Cancel</button>
				<button type="button" class="btn btn-danger" id="deleteUser">Delete User</button>

			</div>
		</div>
   </div>
</div>

</body>
</html>
