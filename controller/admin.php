<?php
require("model/admin.php");

function connectUser($user_name,$password_string) {
  $valid_credentials = checkUserCredentials($user_name,$password_string);
  if ($valid_credentials) {
    $password_hash=getUserHash($user_name);
    $session_hash=password_hash($user_name . $password_hash, PASSWORD_BCRYPT);
    $credentials=array("user_name" => $user_name,"session_hash" => $session_hash);
    $_SESSION["credentials"]=$credentials;
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
  if (!isset($_SESSION["credentials"]["user_name"]) || !isset($_SESSION["credentials"]["session_hash"])) {return false;}
  //var_dump($_SESSION);
  $credentials=$_SESSION["credentials"];
  $user_name=$credentials["user_name"];
  $session_hash=$credentials["session_hash"];
  $password_hash=getUserHash($user_name);
  return password_verify($user_name . $password_hash,$session_hash);
}
