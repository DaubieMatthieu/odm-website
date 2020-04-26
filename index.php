<?php
//page chargé automatiquement au lancement du site
//il sert ici de routeur, les demandes url d'accès à une page sont envoyées ici par le .htaccess
//le routeur charge les pages demandées manuelement, permet l'url rewriting et la gestion des erreurs plus simplement
//TODO modifier le .htaccess à la mise en ligne pour avoir le bon nom de domaine


//on récupère le nom de la page demandée
$request = $_SERVER['REQUEST_URI'];
//en local le nom de domaine est contenu dans le REQUEST_URL
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
  //gestion de l'ensemble des erreurs du site (exceptés les fichiers chargés avec AJAX)
  //log les erreurs dans un fichier TODO permettre la visualisation en ligne
  ini_set("log_errors", 1);
  ini_set("error_log", "../tmp/php-error.log");
  error_log($e);
  //affiche une page d'erreur
  //TODO créer un controller qui log les erreurs et affiche ou non une page d'erreur selon l'erreur
  $errorMessage = $e->getMessage();
  require('controller/error.php');
}
