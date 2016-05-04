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
      if(getSearch() != ""){
            if($('#noneRadio').is(':checked')) {
            location.href ="search.php?title="+getSearch()+"&advanceSearch=none"; 
            }
            else if($('#movieRadio').is(':checked')) { 
                location.href ="search.php?title="+getSearch()+"&advanceSearch=movie"; 

            }
            else if($('#seriesRadio').is(':checked')) { 
                location.href ="search.php?title="+getSearch()+"&advanceSearch=series"; 
            }
            else{
                location.href ="search.php?title="+getSearch()+"&advanceSearch=game"; 
            }
                      }
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

function showMoreInfo(){
  var id = $("#mediaId").html();
  location.href = "media.php?id="+id;
}