$(document).ready(function(){
  $(".navigation").on("click",function() {
    scrollToAnchor($(this).attr("anchortarget"));
  });
});

function scrollToAnchor(id){
    $('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}
