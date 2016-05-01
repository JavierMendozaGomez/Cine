
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
	      <li><a href="#">My games</a></li>
	      <li><a href="#">My series</a></li>
	      </ul>
	   </div>
		 <div class="col-xs-6 " style="background-color:white";>
			    <div class="app">
  <h2 id="withoutResults" hidden="">No se ha encontrado ningún resultado</h2><br>
  <h2 id="tituloPeliculas">Peliculas</h2>
  <div id="listOfMovies">
  
  <section class="movies">
    <div class="movie">
      <img src="http://ia.media-imdb.com/images/M/MV5BYmY1OWFjNWUtMTc3YS00ZTM3LTk0MDYtNzBhOTEwYzBmMTlmXkEyXkFqcGdeQXVyNjQ4NTMyMTg@._V1_SX300.jpg" alt="" class="poster">
      <div class="title">The Conjuring 2</div>
      <div class="info">
        <span class="length">117 min</span>
        <span class="year">2016</span>
      </div>
      <div class="desc">
        Lorraine and Ed Warren travel to north London to help a single mother raising four children alone in a house plagued by malicious spirits.      </div>
    </div>
    <div class="movie">
      <img src="http://ia.media-imdb.com/images/M/MV5BMjEzMjczOTIxMV5BMl5BanBnXkFtZTgwOTUwMjI3NzE@._V1_SX300.jpg" alt="" class="poster">
      <div class="title">10 Cloverfield Lane</div>
      <div class="info">
        <span class="length">103 min</span>
        <span class="year">2015</span>
      </div>
      <div class="desc">
            After getting in a car accident, a woman is held in a shelter with two men, who claim the outside world is affected by a widespread chemical attack.      </div>
    </div>
   
  </section>


  <section class="movies">
    <div class="movie">
      <img src="http://ia.media-imdb.com/images/M/MV5BOTMyMjEyNzIzMV5BMl5BanBnXkFtZTgwNzIyNjU0NzE@._V1_SX300.jpg" alt="" class="poster">
      <div class="title">Zootopia</div>
      <div class="info">
        <span class="length">108  min</span>
        <span class="year">2016</span>
      </div>
      <div class="desc">From the largest elephant to the smallest shrew, the city of Zootopia is a mammal metropolis where various animals live and thrive. When Judy Hopps becomes the first rabbit to join the police force, she quickly learns how tough it is to enforce the law. Determined to prove herself, Judy jumps at the opportunity to solve a mysterious case. Unfortunately, that means working with Nick Wilde, a wily fox who makes her job even harder.   </div>
    </div>
    <div class="movie">
      <img src="http://ia.media-imdb.com/images/M/MV5BNTA1MjMzNDM2M15BMl5BanBnXkFtZTgwNTg3NzQ1NzE@._V1_SX300.jpg" alt="" class="poster">
      <div class="title">My Big Fat Greek Wedding 2</div>
      <div class="info">
        <span class="length">103 min</span>
        <span class="year">2016</span>
      </div>
      <div class="desc">
            Still working in her parents' Greek restaurant, Toula Portokalos's daughter Paris is growing up. She is getting ready to graduate high school and Toula and Ian are experiencing marital issues. When Toula's parents find out they were never officially married, another wedding is in the works. Can this big, fat, Greek event help to bring the family together? </div>
    </div>
   
  </section>
</div>

<h2 id="tituloJuegos" hidden="">Juegos</h2>
<div id="listOfGames"><section class="movies">
</section></div>
<h2 id="tituloSeries" hidden="">Series</h2>
<div id="listOfSeries"><section class="movies">
</section></div>  <div class="detail" style="display: none;">
    <svg class="close">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use>
    </svg>
    <div class="movie">
      <img src="http://ia.media-imdb.com/images/M/MV5BMTYzMzM4NzI4Ml5BMl5BanBnXkFtZTgwODcxNDg1NjE@._V1_SX300.jpg" alt="" class="poster" style="top: 63px; left: 28px; width: 300px; height: 445px;">
      <div class="title">Doctor Strange</div>
      <div class="info">
        <span class="length">120 min</span>
        <span class="year">2016</span>
      </div>
      <div class="desc">
      After his career is destroyed, a brilliant but arrogant and conceited surgeon gets a new lease on life when a sorcerer takes him under his wing and trains him to defend the world against evil.
      </div>
    <button class="play">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 232.153 232.153" style="enable-background:new 0 0 232.153 232.153;" xml:space="preserve" width="10px" height="10px">
          <g id="Play">
            <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M203.791,99.628L49.307,2.294c-4.567-2.719-10.238-2.266-14.521-2.266   c-17.132,0-17.056,13.227-17.056,16.578v198.94c0,2.833-0.075,16.579,17.056,16.579c4.283,0,9.955,0.451,14.521-2.267   l154.483-97.333c12.68-7.545,10.489-16.449,10.489-16.449S216.471,107.172,203.791,99.628z" fill="#FFFFFF"></path>
          </g>
        </svg> Read More
      </button></div>
  </div>
</div>
		</div>
   </div>
</div>

</body>
</html>