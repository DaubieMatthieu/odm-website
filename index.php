<?php
//on récupère le nom de la page demandée
$request = $_SERVER['REQUEST_URI'];
$request = str_replace("/odm-website/","",$request);

try {
  switch ($request) {
    case '' :
      header("Location:home");
        break;
    default:
      //pages dynamiques -> controller
      if ($request=="guide" || $request=="evenements") {$file='controller/'.$request.'.php';}
      //pages statiques -> view
      else {$file='view/'.$request.'.php';}
      //on vérifie que le fichier existe
      if ( !file_exists($file) || !is_readable($file) ) {
        //si le fichier n'existe pas on lance l'erreur 404
        throw new \Exception("page inconnue", 1);
      }
      require($file);
      break;
  }

} catch(Exception $e) {
  //gestion de l'ensemble des erreurs du site
  $errorMessage = $e->getMessage();
  require('controller/error.php');
}
