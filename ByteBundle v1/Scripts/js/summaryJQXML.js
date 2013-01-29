$(document).ready(function(){   

var id = $("[name='hiddenID']").val();
var linkID = $("[name='hiddenLINK']").val();
var hiddenARRAY = $("[name='hiddenARRAY']").val();

var finalArray = hiddenARRAY.split(',');



 function loadfail(){
  if( !$.trim( $('#currentBundle').html() ).length ) {
          $('#currentBundle').append(
                '<p class="fonted dark"><i>This bundle contains no snippets!</i></p>'
            );
     }
 }

jQuery.each(finalArray, function(index, value) {

function parseFile( path ) {

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
    + '<div class = "snipCode" id="' + snipID + '">' + '<textarea id="code#' + snipID + '" disabled>' + snipCode + '</textarea>' + '</div>'
    //+ '<input type="submit" class="showButton" id="' + snipID + '" value="Show Code">'
    + '<a href="deletesnippet.php?name=' + snipName + '&bundle=' + snipBundle + '"><div class="deleteButton" id="' + snipID + '"></div></a>'
    + '<div class="showButton" id="' + snipID + '"></div>'
    + '</div>'
   
    + '<script> var editor = CodeMirror.fromTextArea(document.getElementById("code#' + snipID + '"), { lineNumbers: true, gutter: true, lineWrapping: true, matchBrackets: true, mode: "css", indentUnit: 4, indentWithTabs: true, enterMode: "keep", tabMode: "shift", theme: "default" }); </script>'

     );

     $(".showButton").unbind();

     $('.snipCode').hide();

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
          $('.deleteButton' + '#' + target).css('background-image', 'url("img/deleteButton_expanded.png")');
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

  // var url = "users/" + id + "/" + linkID + "/" + linkID + ".xml";  
  
 $.ajax({
  url: path,    // name of file with our data
  dataType: 'xml',    // type of file we will be reading
  success: parse,     // name of function to call when done reading file
  error: loadfail     // name of function to call when failed to read
 });

}

parseFile("users/" + id + "/" + linkID + "/" + value + ".xml");

});

});