$(document).ready(function() {
  $(".btn").click(function() {
    getQuote();
  });

  function getQuote() {
    $.ajax({
      url: "https://andruxnet-random-famous-quotes.p.mashape.com/cat=movies",
      type: "Post",
      data: {},
      datatype: 'json',
      success: function(data) {
        var quoteText = JSON.parse(data);
        var quoteTag = $(".quote-text");
        var movieTag = $(".movie");
        var tweetTag = $(".tweet");

        console.log(data);
        // work around for bug in API. It sometimes delivers quotes from the famous catergory. Check if quote is from the correct Movies category
        if (quoteText.category === "Movies") {
          quoteTag.fadeOut("slow", function() {
            quoteTag.text('"' + quoteText.quote + '"').fadeIn("slow");
          });
          movieTag.fadeOut("slow", function() {
            movieTag.text("- " + quoteText.author).fadeIn("slow");
          });
          tweetTag.css("opacity", 1);
          tweetTag.fadeIn(3500);
        } else {
          getQuote();
        }
      },
      error: function(err) {
        alert(err);
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("X-Mashape-Authorization", "VeyXpOktQ4msh7cDFWQegB1gND0np1YHmmojsn0xKuqBTg6DAb");
      }
    });
  }

  $(".tweet").click(function() {
    // encode quote text for use in twitter web intent
    var quoteEncText = encodeURIComponent($(".quote-text").text());
    var movieEncText = encodeURIComponent($(".movie").text());
    // strip out spaces and dash in movie text for use as hashtag in twitter intent
    var hashTags = "moviequotes, " + $(".movie").text().replace(/[-\s\.]/g, "").toLowerCase();
    // tweet movie via twitter web intent
    var tweet = "https://twitter.com/intent/tweet?text=" + quoteEncText + " -" + movieEncText + "&hashtags=" + hashTags;

    $(this).attr("href", tweet);
  })
});