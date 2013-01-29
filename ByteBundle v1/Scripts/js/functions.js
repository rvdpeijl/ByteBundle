$(document).ready(function() {

  // Tooltip Functions

  $(function(){
    $("#optionsWrapper").tipTip({defaultPosition: "right"});
  });

  $(function(){
    $(".inputName").tipTip({defaultPosition: "right", activation: "focus" });
  });

  $(function(){
    $(".inputBundle2").tipTip({defaultPosition: "right", activation: "focus" });
  });

  $(function(){
    $(".inputTags").tipTip({defaultPosition: "right", activation: "focus" });
  });

  $(function(){
    $(".commentBox").tipTip({defaultPosition: "right", activation: "focus" });
  });

  // Inputbox Functions

  $("select[name='bundle_name']").click(function() {
    $('input:text[name=new_bundle_name]').attr("disabled", true);
    $('input:radio[value=existingbundle]').prop('checked',true);
  });

  $('input:text[name=new_bundle_name]').click(function() {
    $("select[name='bundle_name']").attr("disabled", true);
    $('input:radio[value=newbundle]').prop('checked',true);
  });


  $('input:radio[value=existingbundle]').click(function() {
    $("select[name='bundle_name']").removeAttr("disabled"); 
    $('input:text[name=new_bundle_name]').attr("disabled", true);
  });

  $('input:radio[value=newbundle]').click(function() {
    $('input:text[name=new_bundle_name]').removeAttr("disabled"); 
    $("select[name='bundle_name']").attr("disabled", true);
  });

  // Optionsbar en Wrapper Functions

  $("#optionsBar").hide();
  $('#optionsWrapper').toggle(
    function() {
      setTimeout(function(){
        $('#optionsWrapper').removeClass("shrinked")
        $('#optionsWrapper').addClass("expanded")
        $('#optionsBar').slideToggle(300, function() {
          $(".settingsText").animate({opacity: 1}, 300);
        });
      });
    },
    function() {
      setTimeout(function(){
        $('#optionsWrapper').removeClass("expanded")
        $('#optionsWrapper').addClass("shrinked")
        $(".settingsText").animate({opacity: 0}, 300, function() {
          $('#optionsBar').slideToggle(300);
        });
      });
    });

  // Social Tooltip Functions

  $('.facebook').click(
    function() {
      $("#socialTooltipFB").animate({opacity: 1}, 300)
      $("#socialTooltipTW").animate({opacity: 0}, 300)
    });

  $('.twitter').click(
    function() {
      $("#socialTooltipTW").animate({opacity: 1}, 300)
      $("#socialTooltipFB").animate({opacity: 0}, 300)
    });

  $(document).click(function(e) {
    var target = e.target;

    if (!$(target).is('#social') && !$(target).is('#tooltipWrapper') && !$(target).parents().is('#social') && !$(target).parents().is('#tooltipWrapper')) {
      $("#socialTooltipTW").animate({opacity: 0}, 300)
      $("#socialTooltipFB").animate({opacity: 0}, 300)
    }
  });

  // Image Logo Link

  $('.imgLogo').click(
    function() {
      location.href = 'viewbundle.php';
    });

});