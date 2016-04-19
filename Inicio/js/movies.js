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
            success: function(data) {              
              var dataList = $("#listOfSearchs");
              dataList.empty();
              for(var i = 0; i < data.Search.length;i++){
                   var opt ="<option value ='" + data.Search[i].Title +"' style=\"background-image:url(http://ia.media-imdb.com/images/M/MV5BMTQ0MzI1NjYwOF5BMl5BanBnXkFtZTgwODU3NDU2MTE@._V1._CR93,97,1209,1861_SX89_AL_.jpg_V1_SX300.jpg);\"></option>";
                    dataList.append(opt);
                }
            }
          });
    }, ms);
  });
    $("#enviaDatos").click(function(){
         var urlLocalization = "http://www.omdbapi.com/?s="+getSearch()+"&y=&plot=short&r=json&type=movie";
       $.ajax({
            type: "get",
            url: urlLocalization,
            success: function(data) {   
                var aplica = "";
                for(var i = 0; i < data.Search.length;i++){      
                  if(i % 3 == 0)
                    aplica +=  "<section class=\"movies\">";
                  var urlId = "http://www.omdbapi.com/?i="+ data.Search[i].imdbID +"&plot=full&r=json";
                  $.ajax({
                        type: "get",
                        url: urlId,
                        success: function(dataById) {  
                          aplica+="que";
                            aplica+="<div class=\"movie\">\
                              <img src=\""+dataById.Poster+"\" alt=\"\" class=\"poster\" \/>\
                               <div class=\"title\">"+dataById.Title+"<\/div>\
                               <div class=\"info\">\
                                  <span class=\"length\">"+dataById.Runtime+"<\/span>\
                                  <\/div>\
                                 <div class=\"desc\">\
                                  "+dataById.Plot+" <\/div>\
                                  <\/div>";
                        }
                      });
                if(i % 3 == 0)
                    aplica +=  "<\/section>";
                  }
                  //$("#miApp").html(aplica);
                  alert(aplica);
                }
              });
          });
    });



