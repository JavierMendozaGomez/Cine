$(document).ready(function(){
    var timer;
    //$("#enviaDatos").click();
     /*var urlMovie = "http://www.omdbapi.com/?s="+ "Harry+Potter"+"&y=&plot=short&r=json&type=movie";
                         var html = "";
          $.ajax({
            type: "get",
            url: urlMovie,
            success: function(data) {   
                  if(data.Response != "False"){
                        html +=  "<section class=\"movies\">\r\n";
                        var contador = 0;
                      for(var i = 0; i < 4;i++){ 
                         var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                  contador++;
                                  html+="<div class=\"movie\">\r\n\
                                    <img src=\""; 
                                    if(data.Search[i].Poster == "N/A")
                                        html+="http://cdn4.areajugones.es/wp-content/uploads/2015/05/Batman-Arkham-Trofeo-Enigma.jpg";
                                    else
                                        html+=data.Search[i].Poster;
                                    html+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                     <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                     <div class=\"info\">\r\n\
                                        <span class=\"length\">"+""+"<\/span>\r\n\
                                        <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                       <\/div>\r\n\
                                       <div class=\"desc\">\r\n\
                                        "+ "dataById.Plot" +" <\/div>\r\n\
                                        <\/div>";
                              }
                          if(contador == 4){
                                html +=  "<\/section>\r\n";
                                html +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }
                        $("#listOfMovies").html(html.substring(0,html.length - 21));
                      }
                    
              });

       var urlGame = "http://www.omdbapi.com/?s="+ "Harry+Potter" +"&y=&plot=short&r=json&type=game";
       var htmlGame = "";
       $.ajax({
            type: "get",
            url: urlGame,
            success: function(data) {   
                  if(data.Response != "False"){
                        htmlGame +=  "<section class=\"movies\">\r\n";
                        var contador = 0;
                      for(var i = 0; i < 4;i++){ 
                         var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                  contador++;
                                  htmlGame+="<div class=\"movie\">\r\n\
                                    <img src=\""; 
                                    if(data.Search[i].Poster == "N/A")
                                        htmlGame+="http://vignette1.wikia.nocookie.net/donkeykong/images/4/43/Donkey_kong_pensativo.png/revision/latest?cb=20130606180457&path-prefix=es";
                                    else
                                        htmlGame+=data.Search[i].Poster;
                                    htmlGame+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                     <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                     <div class=\"info\">\r\n\
                                        <span class=\"length\">"+""+"<\/span>\r\n\
                                        <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                       <\/div>\r\n\
                                       <div class=\"desc\">\r\n\
                                        "+ "dataById.Plot" +" <\/div>\r\n\
                                        <\/div>";
                              }
                          if(contador == 4){
                                htmlGame +=  "<\/section>\r\n";
                                htmlGame +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }
                        $("#listOfGames").html(htmlGame.substring(0,htmlGame.length - 21));
                      }
                    
              });

       var urlSeries = "http://www.omdbapi.com/?s="+ "Harry+Potter" +"&y=&plot=short&r=json&type=series";
       var htmlSeries = "";
       $.ajax({
            type: "get",
            url: urlSeries,
            success: function(data) {   
                  if(data.Response != "False"){
                        htmlSeries +=  "<section class=\"movies\">\r\n";
                        var contador = 0;
                      for(var i = 0; i < 4;i++){ 
                         var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                  contador++;
                                  htmlSeries+="<div class=\"movie\">\r\n\
                                    <img src=\""; 
                                    if(data.Search[i].Poster == "N/A")
                                        htmlSeries+="http://reactiongifs.me/wp-content/uploads/2014/10/tyrion-lannister-eyebrows-game-of-thrones.gif";
                                    else
                                        htmlSeries+=data.Search[i].Poster;
                                    htmlSeries+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                     <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                     <div class=\"info\">\r\n\
                                        <span class=\"length\">"+""+"<\/span>\r\n\
                                        <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                       <\/div>\r\n\
                                       <div class=\"desc\">\r\n\
                                        "+ "dataById.Plot" +" <\/div>\r\n\
                                        <\/div>";
                              }
                          if(contador == 4){
                                htmlSeries +=  "<\/section>\r\n";
                                htmlSeries +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }
                        $("#listOfSeries").html(htmlSeries.substring(0,htmlSeries.length - 21));
                      }
                    
              });*/
   $("#search").keyup(function(){
    clearTimeout(timer);
    var ms = 400; 
   var urlLocalization = "http://www.omdbapi.com/?s="+getSearch()+"&y=&plot=short&r=json&type=movie";
    timer = setTimeout(function() {
       $.ajax({
            type: "get",
            url: urlLocalization,
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


    $("#enviaDatos").click(function() {
     
         var urlMovie = "http://www.omdbapi.com/?s="+ getSearch()+"&y=&plot=short&r=json&type=movie";
                         var html = "";
          $.ajax({
            type: "get",
            url: urlMovie,
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
                                        html+="http://cdn4.areajugones.es/wp-content/uploads/2015/05/Batman-Arkham-Trofeo-Enigma.jpg";
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
                          if(contador == 4){
                                html +=  "<\/section>\r\n";
                                html +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }

                        $("#listOfMovies").html(html.substring(0,html.length - 21));
                      }
                    
              });

       var urlGame = "http://www.omdbapi.com/?s="+ getSearch() +"&y=&plot=short&r=json&type=game";
       var htmlGame = "";
       $.ajax({
            type: "get",
            url: urlGame,
            success: function(data) {   
                  if(data.Response != "False"){
                        htmlGame +=  "<section class=\"movies\">\r\n";
                        var contador = 0;
                      for(var i = 0; (i < 4) && (i < data.totalResults);i++){ 
                         var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                  contador++;
                                  htmlGame+="<div class=\"movie\" title=\""+ data.Search[i].imdbID +"\">\r\n\
                                    <img src=\""; 
                                    if(data.Search[i].Poster == "N/A")
                                        htmlGame+="http://vignette1.wikia.nocookie.net/donkeykong/images/4/43/Donkey_kong_pensativo.png/revision/latest?cb=20130606180457&path-prefix=es";
                                    else
                                        htmlGame+=data.Search[i].Poster;
                                    htmlGame+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                     <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                     <div class=\"info\">\r\n\
                                        <span class=\"length\">"+""+"<\/span>\r\n\
                                        <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                       <\/div>\r\n\
                                       <div class=\"desc\" id=\""+ data.Search[i].imdbID +"\">\r\n\
                                        "+ "dataById.Plot" +" <\/div>\r\n\
                                        <\/div>";
                              }
                          if(contador == 4){
                                htmlGame +=  "<\/section>\r\n";
                                htmlGame +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }
                        $("#listOfGames").html(htmlGame.substring(0,htmlGame.length - 21));
                      }
                    
              });

       var urlSeries = "http://www.omdbapi.com/?s="+ getSearch() +"&y=&plot=short&r=json&type=series";
       var htmlSeries = "";
       $.ajax({
            type: "get",
            url: urlSeries,
            success: function(data) {   
                  if(data.Response != "False"){
                        htmlSeries +=  "<section class=\"movies\">\r\n";
                        var contador = 0;
                      for(var i = 0;(i < 4) && (i < data.totalResults);i++){ 
                         var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                                  contador++;
                                  htmlSeries+="<div class=\"movie\" title=\""+ data.Search[i].imdbID +"\">\r\n\
                                    <img src=\""; 
                                    if(data.Search[i].Poster == "N/A")
                                        htmlSeries+="http://reactiongifs.me/wp-content/uploads/2014/10/tyrion-lannister-eyebrows-game-of-thrones.gif";
                                    else
                                        htmlSeries+=data.Search[i].Poster;
                                    htmlSeries+="\" alt=\"\" class=\"poster\"\/>\r\n\
                                     <div class=\"title\">"+data.Search[i].Title+"<\/div>\r\n\
                                     <div class=\"info\">\r\n\
                                        <span class=\"length\">"+""+"<\/span>\r\n\
                                        <span class=\"year\">"+data.Search[i].Year+ "<\/span>\r\n\
                                       <\/div>\r\n\
                                       <div class=\"desc\" id=\""+ data.Search[i].imdbID +"\">\r\n\
                                        "+ "dataById.Plot" +" <\/div>\r\n\
                                        <\/div>";
                              }
                          if(contador == 4){
                                htmlSeries +=  "<\/section>\r\n";
                                htmlSeries +=  "<section class=\"movies\">\r\n";
                                contador = 0;
                           }
                        }
                        $("#listOfSeries").html(htmlSeries.substring(0,htmlSeries.length - 21));
                      }
                    
              });

            if($("#listOfMovies").is(":empty")) 
                $("#listOfMovies").css("display", "none");
            else
                $("#listOfMovies").css("display", "block");
            if($("#listOfGames").is(":empty"))
                  $("#listOfGames").css("display", "none");
            else
                  $("#listOfGames").css("display", "block");
            if($('#listOfSeries').is(':empty'))
                $("#listOfSeries").css("display", "none");
            else
                $("#listOfSeries").css("display", "block");
                });      
    });
    $('#search').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
          $("#enviaDatos").click();       
          return false;  
      }
    });   

  }); 

