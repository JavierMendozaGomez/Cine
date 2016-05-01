$(document).ready(function(){
    var timer;
    $("#search").keyup(function(){
     clearTimeout(timer);
     var ms = 400; 
     var urlLocalization = "http://www.omdbapi.com/?s="+getSearch()+"&y=&plot=short&r=json&type=movie";
     timer = setTimeout(function() {
       $.ajax({
            type: "get",
            url: urlLocalization,
                async: false,

            success: function(data) {              
              var dataList = $("#listOfSearchs");
              dataList.empty();
              for(var i = 0; (i < 10) &&( i < data.totalResults);i++){
                   var opt ="<option value ='" + data.Search[i].Title +"' style=\"background-image:url(http://ia.media-imdb.com/images/M/MV5BMTQ0MzI1NjYwOF5BMl5BanBnXkFtZTgwODU3NDU2MTE@._V1._CR93,97,1209,1861_SX89_AL_.jpg_V1_SX300.jpg);\"></option>";
                    dataList.append(opt);
                }
            }
          });
     }, ms);
     });
    
    $("#advanceButton").click(function(){
          if($("#advanceSearch").is(":visible")){
             $("#advanceButton").text("Advance");
             $("#advanceSearch").slideUp();}
          else{
             $("#advanceButton").text("Hidden");
             $("#advanceSearch").slideDown();}      
     });

    $("#enviaDatos").click(function() {
            if($('#noneRadio').is(':checked')) { 
                $("#listOfMovies").html(getHtml("movie"));
                $("#listOfSeries").html(getHtml("series"));
                $("#listOfGames").html(getHtml("game"));
            }
            else if($('#movieRadio').is(':checked')) { 
                $("#listOfMovies").html(getAdvanceHTML("movie"));
                $("#listOfSeries").html("");
                $("#listOfGames").html("");
            }
            else if($('#seriesRadio').is(':checked')) { 
                $("#listOfMovies").html("");
                $("#listOfSeries").html(getAdvanceHTML("series"));
                $("#listOfGames").html("");
            }
            else{
                $("#listOfMovies").html("");
                $("#listOfSeries").html("");
                $("#listOfGames").html(getAdvanceHTML("game"));
            }
            
            checkIfNotResults();
    });

    $('#search').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
          $("#enviaDatos").click();       
          return false;  
      }
    }); 

    $('#year').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
          $("#enviaDatos").click();       
          return false;  
     }        
    });

   
  });
  
function getHtml(typeOfSearch){
  url = "http://www.omdbapi.com/?s="+ getSearch()+"&y=&plot=short&r=json&type=" + typeOfSearch; /*El tipo de búsqueda, videojuego, pelicula,serie*/
  var html ="";
  var posterError;
  switch(typeOfSearch){
    case "game": posterError="http://vignette1.wikia.nocookie.net/donkeykong/images/4/43/Donkey_kong_pensativo.png/revision/latest?cb=20130606180457&path-prefix=es";break;
    case "movie": posterError="http://cdn4.areajugones.es/wp-content/uploads/2015/05/Batman-Arkham-Trofeo-Enigma.jpg";break;
    case "series": posterError="http://reactiongifs.me/wp-content/uploads/2014/10/tyrion-lannister-eyebrows-game-of-thrones.gif";break;
  }
            $.ajax({
                          type: "get",
                          url: url,
                          async:false,
                          success: function(data) {   
                                if(data.Response != "False"){
                                      html +=  "<section class=\"movies\">\r\n";
                                      var contador = 0;
                                    for(var i = 0; (i < 4) && (i < data.totalResults);i++){ 
                                       var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                                contador++;
                                                html+="<div class=\"movie\" title=\""+ data.Search[i].imdbID +"\">\r\n\
                                                  <img src=\""; 
                                                  if(data.Search[i].Poster == "N/A")
                                                      html+=posterError;
                                                  else
                                                      html+=data.Search[i].Poster;
                                                  html+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                                   <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                                   <div class=\"info\">\r\n\
                                                      <span class=\"length\">"+""+"<\/span>\r\n\
                                                      <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                                     <\/div>\r\n\
                                                     <div class=\"desc\" id=\""+ data.Search[i].imdbID +"\">\r\n\
                                                      "+ "" +" <\/div>\r\n\
                                                      <\/div>";
                                            }
                                        html +=  "<\/section>\r\n";
                                        if(data.totalResults > 4){
                                            html+=" <button type=\"button\" class=\"btn btn-info\">";
                                            switch(typeOfSearch){
                                              case "game": html+="More games";break;
                                              case "movie": html+="More movies";break;
                                              case "series": html+="More series";break;
                                            }
                                            html+="</button></br></br>";
                                          }
                                      return html;
                                      }
                                    }
                    
                          });
            return html;
}

function getAdvanceHTML(typeOfSearch){
  var page = 1;
  var url = "http://www.omdbapi.com/?s="+ getSearch()+"&y="+$("#year").val()+"&plot=short&r=json&type=" + typeOfSearch + "&page=" + page; /*El tipo de búsqueda, videojuego, pelicula,serie*/
  var html ="";
  var maxSize;
  var posterError;
  switch(typeOfSearch){
    case "game": posterError="http://vignette1.wikia.nocookie.net/donkeykong/images/4/43/Donkey_kong_pensativo.png/revision/latest?cb=20130606180457&path-prefix=es";break;
    case "movie": posterError="http://cdn4.areajugones.es/wp-content/uploads/2015/05/Batman-Arkham-Trofeo-Enigma.jpg";break;
    case "series": posterError="http://reactiongifs.me/wp-content/uploads/2014/10/tyrion-lannister-eyebrows-game-of-thrones.gif";break;
  }
            $.ajax({
                          type: "get",
                          url: url,
                          async:false,
                          success: function(data) {   
                                if(data.Response != "False"){
                                      if(page*10 <= data.totalResults)
                                          maxSize = 10;
                                      else
                                          maxSize = data.totalResults % 10; 
                                      html +=  "<section class=\"movies\">\r\n";
                                      var contador = 0;
                                    for(var i = 0; i < maxSize;i++){ 
                                       var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                                contador++;
                                                html+="<div class=\"movie\" title=\""+ data.Search[i].imdbID +"\">\r\n\
                                                  <img src=\""; 
                                                  if(data.Search[i].Poster == "N/A")
                                                      html+=posterError;
                                                  else
                                                      html+=data.Search[i].Poster;
                                                  html+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                                   <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                                   <div class=\"info\">\r\n\
                                                      <span class=\"length\">"+""+"<\/span>\r\n\
                                                      <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                                     <\/div>\r\n\
                                                     <div class=\"desc\" id=\""+ data.Search[i].imdbID +"\">\r\n\
                                                      "+ "" +" <\/div>\r\n\
                                                      <\/div>\r\n";
                                              if(contador == 4 || contador == 8){       /*Muestra 4 elementos por fila*/
                                                html+="<\/section>\r\n";
                                                html +=  "<section class=\"movies\">\r\n";
                                              }
                                            }
                                        html +=  "<\/section>\r\n";
                                        if(data.totalResults > 4){
                                            html+=" <button type=\"button\" class=\"btn btn-info\">";
                                            switch(typeOfSearch){
                                              case "game": html+="More games";break;
                                              case "movie": html+="More movies";break;
                                              case "series": html+="More series";break;
                                            }
                                            html+="</button></br></br>";
                                          }
                                      return html;
                                      }
                                    }
                    
                          });
            return html;
 } 
  function checkIfNotResults(){
      if ($('#listOfSeries').is(':empty') && $('#listOfGames').is(':empty') && $('#listOfMovies').is(':empty')){  
             $("#withoutResults").show();
             $("#tituloJuegos").hide();
             $("#tituloPeliculas").hide();            
             $("#tituloSeries").hide();
           }
      else{
             $("#withoutResults").hide();
          if ($('#listOfGames').is(':empty')){
                   $("#tituloJuegos").hide();
                  }
          else
                 $("#tituloJuegos").show();

          if ($('#listOfMovies').is(':empty'))
               $("#tituloPeliculas").hide();            
          else
             $("#tituloPeliculas").show();


          if ($('#listOfSeries').is(':empty'))
              $("#tituloSeries").hide();
          else
            $("#tituloSeries").show();           
       }
  }

   function getSearch(){
      var searchAux = document.getElementById("search").value;
      var search="",caracter;
      for( var i = 0; i < searchAux.length;i++){
            if(searchAux.charAt(i) == " ")
              search+="+";
            else
              search += searchAux.charAt(i);
      }

      return search.trim();
    }

