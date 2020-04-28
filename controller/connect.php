<?php
require("controller/admin.php");

if( isset($_POST['user_name']) && isset($_POST['password_string']) ) {
  if(connectUser($_POST['user_name'],$_POST['password_string'])) {
    echo "success";
  } else {
    echo "Invalid credentials";
  }
} else {echo "Erreur envoi post";}
?>
