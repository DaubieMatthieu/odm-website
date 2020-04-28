<?php
require_once("db_connect.php");
//TODO stocker données dans bdd
//table sans id, user_name sert de clé primaire

function getUserHash($user_name) {
  $db=dbConnect();
  $req = $db->prepare("SELECT password_hash FROM user WHERE user_name=:user_name");
  $req->bindValue(':user_name',$user_name, PDO::PARAM_STR);
  $req->execute();
  $rep=$req->fetch(PDO::FETCH_ASSOC);
  $req->closeCursor();
  return $rep["password_hash"];
}

function insertUser($user_name,$password_hash) {
  $db=dbConnect();
  $req = $db->prepare("INSERT INTO user(user_name,password_hash) VALUES (:user_name, :password_hash)");
  $req->bindValue(':user_name',$user_name, PDO::PARAM_STR);
  $req->bindValue(':password_hash',$password_hash, PDO::PARAM_STR);
  $req->execute();
  $req->closeCursor();
}
