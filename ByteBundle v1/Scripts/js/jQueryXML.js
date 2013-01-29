$(document).ready(function(){   

var id = $("[name='hiddenID']").val();

 function loadfail(){
  // alert("Error: Failed to read file!");
 }

 function parse(document){
  $(document).find("snippet").each(function(){

     var snipID = $(this).find('id').text();
     var snipName = $(this).find('snippetname').text();
     var snipBundle = $(this).find('bundlename').text();
     var snipTags = $(this).find('tags').text();
     var snipComment = $(this).find('comment').text();
     var snipCode = $(this).find('code').text();
     var snipDate = $(this).find('dateadded').text();

     $('#currentBundle').append(
      '<div id="bundleWrapper">'
    + '<ul class="viewBundle">'
    + '<li class = "snipID">' + snipID  + '</li>'
    + '<li class = "snipName">' + snipName  + '</li>'
    + '<li class = "snipBundle"><a href="bundlesummary.php?id=' + snipBundle + '">Bundle : ' + snipBundle  + '</a></li>'
    + '<li class = "snipTags">Tags: ' + snipTags  + '</li>'
    + '<li class = "snipComment">Comment: ' + snipComment  + '</li>'
    + '<li class = "snipDate">Date Added: ' + snipDate  + '</li>'
    + '</ul>'
    + '<div class = "snipCode" id="' + snipID + '">' + '<textarea id="code#' + snipID + '">' + snipCode + '</textarea>' + '</div>'
    //+ '<input type="submit" class="showButton" id="' + snipID + '" value="Show Code">'
    //+ '<div class="showButton" id="' + snipID + '"></div>'
    + '</div>'
   
    + '<script> var editor = CodeMirror.fromTextArea(document.getElementById("code#' + snipID + '"), { lineNumbers: true, gutter: true, lineWrapping: true, matchBrackets: true, mode: "css", indentUnit: 4, indentWithTabs: true, enterMode: "keep", tabMode: "shift", theme: "default" }); </script>'

     );

     $(".showButton").unbind();

     $('.showButton').toggle(
    function() {
      var target = $(this).attr("id")
      var button = $(this).attr("class")
      $(this).removeClass("shrinked")
      $(this).addClass("expanded")
      // alert(button)
      setTimeout(function(){
        $('.snipCode' + '#' + target).slideToggle(300, function() {
          $('.showButton.expanded').css('background-image', 'url("img/hideButton.png")');
        });
      });
    },
    function() {
      var target = $(this).attr("id")
      var button = $(this).attr("class")
      $(this).removeClass("expanded")
      $(this).addClass("shrinked")
      // alert(button)
      setTimeout(function(){
        $('.snipCode' + '#' + target).slideToggle(300, function() {
          $('.showButton.shrinked').css('background-image', 'url("img/showButton.png")');
        });
      });
    });

  });
 }  

  // var sessionID = "<?php echo ($_ENV['id']); ?>"

  var url = "users/" + id + "/addedlast.xml";  
  
 $.ajax({
  url: url,    // name of file with our data
  dataType: 'xml',    // type of file we will be reading
  success: parse,     // name of function to call when done reading file
  error: loadfail     // name of function to call when failed to read
 });

});