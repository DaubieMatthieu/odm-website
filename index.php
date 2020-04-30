<?php
session_start();
//page chargé automatiquement au lancement du site
//il sert ici de routeur, les demandes url d'accès à une page sont envoyées ici par le .htaccess
//le routeur charge les pages demandées manuelement, permet l'url rewriting et la gestion des erreurs plus simplement
//TODO modifier le .htaccess à la mise en ligne pour avoir le bon nom de domaine

try {
  //on récupère le nom de la page demandée
  $request_url = $_SERVER['REQUEST_URI'];
  //en local le nom de domaine est contenu dans le REQUEST_URL donc on le retire
  $request_url = str_replace("/odm-website/","",$request_url);

  //listes classées des pages accessibles du site
  $ajax_loaded_pages=array("place","administration");
  $dynamic_pages=array("guide","evenements","données","maintenance","erreur");
  $static_pages=array("accueil","brassage","charte_du_bon_buveur","connexion","contact","connexion");
  $admin_pages=array("maintenance","données");

  $request=decompressUrl($request_url);
  $dir=$request["dir"];
  $page=$request["page"];
  $parameters=$request["parameters"];
  $is_admin=$parameters["is_admin"];
  $as_admin=$parameters["as_admin"];
  $link_prefix=($is_admin)?"admin/":"";
  $title=str_replace('_', ' ', ucwords($page))  ;

  //le fichier chargé ci dessous va générer le contenu de la page
  require_once($dir."/".$page.".php");

  if (in_array($page,$ajax_loaded_pages)) {
    //si la page est chargée via ajax, on charge les fonctions demandées par AJAX
    loadAjaxContent();
  } else { //sinon on charge la page template qui va afficher le contenu généré précédemment
    //si la page est en cours de développement on affiche un message
    if(empty($content)) {$content='<div id="page-container">'.(($as_admin)?"Vous êtes administrateur":"Page en cours de développement").'</div>';}
    require_once("view/template.php");
  }

} catch(Exception $e) {
  //gestion de l'ensemble des erreurs du site
  //TODO permettre la visualisation en ligne (gestion)
  customLog($e);
  //redirige vers la page d'erreur avec le code d'erreur
  header("Location:".$link_prefix."erreur/".urlencode($e->getMessage()));
}

function decompressUrl($request_url) {
  //extrait les données de l'url et les stock dans une variable
  global $static_pages, $dynamic_pages, $ajax_loaded_pages,$admin_pages;
  $request_arr=array_unique(preg_split('{/}',urldecode($request_url)));
  //si l'url demandée est une ressource publique, on laisse le navigateur faire son travail et on sort de la fonction
  if (in_array("public",$request_arr)) {return;}

  initSession();
  $is_admin=checkAdmin();
  $as_admin= !(!$is_admin || !$_SESSION["as_admin"]);
  $admin_mode=in_array("admin",$request_arr); //l'utilisateur veut accéder au site en mode admin
  if ($admin_mode) {array_splice($request_arr,array_search("admin",$request_arr),1);} //retire "admin" de $request_arr

  $page=(empty($request_arr[0]) ? "accueil" : $request_arr[0]);
  $admin_page=in_array($page,$admin_pages); //la page demandée est réservée aux admins
  if ($admin_page && !$admin_mode) header("Location:admin/".$request_url);
  if (($admin_mode && !$is_admin) || ($admin_page && !$as_admin)) {$page="connexion";}

  $parameters=array_merge(
    preg_split('{-}',(isset($request_arr[1]) ? $request_arr[1] : ""),-1,PREG_SPLIT_NO_EMPTY),
    array("is_admin"=>$is_admin,"as_admin"=>$as_admin)
  );

  if (in_array($page,$dynamic_pages) || in_array($page,$ajax_loaded_pages)) {$dir="controller";} elseif (in_array($page,$static_pages)) {$dir="view";} else {throw new \Exception("File Not Found");}
  return array("dir"=>$dir,"page"=>$page,"parameters"=>$parameters);
}

function compressUrl($page,$parameters) {
  foreach ($parameters as $key => $value) {
    // code...
  }
  $url=$page."/";
}

function customLog($e) {
  //log les erreurs dans un fichier
  ini_set("log_errors", 1);
  ini_set("error_log", "tmp/php-error.log");
  error_log($e);
}

function initSession() {
  //initialise tous les indexes de $_SESSION
  $null_parameters = array("user_name","session_hash");
  foreach ($null_parameters as $name) {
    isset($_SESSION[$name]) or $_SESSION[$name]="";
  }
  isset($_SESSION["as_admin"]) or $_SESSION["as_admin"]=false;
}

function checkAdmin() {
  //détermine si l'utilisateur est administrateur
  initSession();
  require_once("controller/administration.php");
  return checkUserSession();
}

function loadAjaxContent() {
  //charge le contenu déstiné à AJAX
  if (isset($_POST["function"])) {
    try {
      $result=call_user_func_array($_POST["function"], ((isset($_POST["parameters"]))?$_POST["parameters"]:array()));
      switch ($_POST["data_type"]) {
        case 'html':
          echo $result;
          break;
        default:
          echo json_encode(array("success"=>true,"result"=>$result));
          break;
      }
    } catch (Exception $e) {echo json_encode(array("success"=>false));customLog($e);}
  }
}
