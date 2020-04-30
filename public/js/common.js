$(document).ready(function(){
  $(".navigation").on("click",function() {
    scrollToAnchor($(this).attr("anchortarget"));
  });
});

function scrollToAnchor(id){
    $('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

function ajax(page, data, callback = function(){}, dataType='json', sameHandler=false) {
  data["data_type"]=dataType;
  if (sameHandler) {errorHandler=callback;} else {errorHandler=ajaxError;}
  $.ajax({
    type: "POST", //request type,
    url:page,
    dataType: dataType,
    data: data,
    success:callback,
    error:errorHandler
  });
}

function ajaxError(result) {
  console.log("error");
  console.log(result);
}
