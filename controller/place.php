<?php
//fichier appelé via AJAX dans le guide
//renvoie les données demandées sous forme d'html

try {
  //vérifie que les paramètres de requêtes sont valides
  if (isset($_POST['placeName'])) {
    $placeName=$_POST['placeName'];
  } else {throw new \Exception("erreur POST['placeName']", 1);}

  if (isset($_POST['req'])) {
    $req=$_POST['req'];
  } else {throw new \Exception("erreur POST['req']", 1);}

  require("../model/place.php");

  switch ($req) {
    //selon les données demandées, appelle la bonne fonction du model pour récupérer les données de la bdd et les affiche via le bon fichier
    case 'infos':
      $data=getPlaceInfos($placeName);
      require("../view/place_infos.php");
      break;

    case 'biers':
      $data=getPlaceBiers($placeName);
      require("../view/place_biers.php");
      break;

    default:
      throw new \Exception("requête lieu inconnu", 1);
      break;
  }
} catch(Exception $e) {
  //log les erreurs dans un fichier
  ini_set("log_errors", 1);
  ini_set("error_log", "../tmp/php-error.log");
  error_log($e);
}
