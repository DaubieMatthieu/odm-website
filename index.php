<?php
$request = $_SERVER['REQUEST_URI'];
$request = str_replace("/odm-website/","",$request);

try {
  switch ($request) {
    case '' :
      header("Location:home");
        break;
    default:
      $file='view/'.$request.'.php';
      if ( !file_exists($file) || !is_readable($file) ) {
        throw new \Exception("page inconnue", 1);
      }
      require($file);
      break;
  }

} catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/error.php');
}
