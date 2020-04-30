$(document).ready(function(){
  var form = $("form"),
      formMessage = $('#form-message'),
      formInputs = $('.form-inputs > input'),
      userName = $('.form-inputs > input[name="odm_user_name"]'),
      passwordString = $('.form-inputs > input[name="odm_password_string"]');

  formInputs.each(function() {
    $(this).keyup(function() {
      if (checkInput(this,false)) {
        $(this).css({
          outlineColor : 'green',
          color : 'green'
        });
      } else {
        $(this).css({
          outlineColor : 'red',
          color : 'red'
        });
       }
    });
  });


  function checkInput(input,displayError) {
    name=$(input).attr("name");
    val=$(input).val();
    if (name=="odm_user_name" && val.length==0) {
      if (displayError) {printMessage("Vous devez entrer un nom d'utilisateur");}
      return false;
    }
    if (name=="odm_password_string" && val.length<6) {
      if (displayError) {printMessage("Le mot de passe doit contenir au moins 6 caractères");}
      return false;
    }
    return true;
  }

  form.on("submit", function(e){
    e.preventDefault();
    formValidate=true;
    formInputs.each(function() {
      if (!checkInput(this,true)) {formValidate=false;}
    });
    if (formValidate) {
      checkCredentials();
    }
  });

  function printMessage(message) {
    formMessage.css('display', 'block');
    formMessage.html(message);
  }

  function checkCredentials() {
    var data = {
      "function" : "connectUser",
      "parameters" : {user_name:userName.val(), password_string:passwordString.val()}
    };
    ajax("administration",data,function(result) {
      console.log(result);
      if (result) {
        location.reload();
      } else {
        printMessage("Identifiants incorrects");
      }
    });
  }

});
