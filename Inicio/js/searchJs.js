function getHtml(typeOfSearch,title){
  url = "http://www.omdbapi.com/?s="+ title+"&y=&plot=short&r=json&type=" + typeOfSearch; /*El tipo de búsqueda, videojuego, pelicula,serie*/
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

function getAdvanceHTML(typeOfSearch,title){
  var page = 1;
  var url = "http://www.omdbapi.com/?s="+ title +"&y="+$("#year").val()+"&plot=short&r=json&type=" + typeOfSearch + "&page=" + page; /*El tipo de búsqueda, videojuego, pelicula,serie*/
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