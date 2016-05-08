<?php
    if(!isset($_SESSION)) 
    { 
     session_start(); 
     }
?> 
<script>
$(document).ready(function(){
  $("#logout").click(function(){
    window.location.href = "/YourMedia/View/logout.php";
    });
  });
 </script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/Yourmedia/View/index.php">
        <img id="logo" alt="Brand" src="http://www.abc.es/Media/201401/31/palomitas--644x442.jpg"></a> </div>
      
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">

        <li ><a href="/Yourmedia/View/index.php">In Theaters <span class="sr-only">(current)</span></a></li>
        <li ><a href="/Yourmedia/View/Games/games.php">Games</a></li>
        <li ><a href="/Yourmedia/View/Series/series.php">Series</a></li>
        <li><a href="/Yourmedia/View/Profile/myAccount.php">My Profile</a></li>
        
        <br><br>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" id="search" placeholder="Search"  autocomplete="off" list="listOfSearchs">
          <datalist id="listOfSearchs"></datalist>
        </div>
        <button type="button" class="btn btn-default" id="enviaDatos" name="enviaDatos">Submit</button>
        <button type="button" class="btn btn-default" id="advanceButton">Advance</button>
        <div id="advanceSearch" hidden>
                <br>
                <h3>Advance Search</h3>
                <br>
                <label >
                    <input type="radio" id="movieRadio" name="typeOfSearch" value="movie" /> Movies
                </label> 
                <label >
                    <input type="radio" id="gameRadio" name="typeOfSearch" value="game" /> Games
                </label> 
                <label >
                    <input type="radio" id="seriesRadio" name="typeOfSearch" value="series"/> Series
                </label> 
                <label >
                    <input type="radio" id="noneRadio" name="typeOfSearch" value="none" checked="checked"  /> I don't care 
                </label> 
                <input type="text" class="form-control" name="year" id="year" placeholder="Year"/>
        </div>
      </form>
       <div     style="display: inline-block;">
      <img src= "<?php echo $_SESSION['urlImg']; ?>" class="img-responsive img-circle smallAvatar"/>
       <button type="button" class="btn btn-default" id="logout" name="logout">Logout</button>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

