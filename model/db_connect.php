<?php
function dbConnect() {
  //connecte à la bdd et renvoie l'objet PDO
  //TODO modifier les paramètres à la mise en ligne
  $db_username = 'root';
  $db_password = 'mysql';
  $db_name     = 'ordre_du_malt';
  $db_host     = 'localhost';
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_username, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
  return $db;
}
