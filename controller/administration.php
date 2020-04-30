<?php
require_once("model/admin.php");

function connectUser($user_name,$password_string) {
  $valid_credentials = checkUserCredentials($user_name,$password_string);
  if ($valid_credentials) {
    $password_hash=getUserHash($user_name);
    $session_hash=password_hash($user_name . $password_hash, PASSWORD_BCRYPT);
    $_SESSION["user_name"]=$user_name;
    $_SESSION["session_hash"]=$session_hash;
    $_SESSION["as_admin"]=true;
  }
  return $valid_credentials;
}

function checkUserCredentials($user_name,$password_string) {
  $password_hash=getUserHash($user_name);
  return password_verify($password_string,$password_hash);
}

function genPasswordHash($password_string) {
  $password_hash=password_hash($password_string,PASSWORD_BCRYPT);
  return $password_hash;
}

function checkUserSession() {
  if (!isset($_SESSION["user_name"]) || !isset($_SESSION["session_hash"])) {return false;}
  $user_name=$_SESSION["user_name"];
  $session_hash=$_SESSION["session_hash"];
  $password_hash=getUserHash($user_name);
  return password_verify($user_name . $password_hash,$session_hash);
}

function disconnectUser() {
  $_SESSION["user_name"]="";
  $_SESSION["session_hash"]="";
  return true;
}

function switchMode() {
  $_SESSION["as_admin"]=!$_SESSION["as_admin"];
  return true;
}
