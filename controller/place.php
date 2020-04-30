<?php
//fichier appelé via AJAX dans le guide
//renvoie les données demandées sous forme d'html

require_once("model/place.php");

function loadPlaceBiers($place_name) {
  $biers=getPlaceBiers($place_name);
  $content="";
  foreach ($biers as $bier) {
    $bier_name=$bier["name"];
    $bier_style=empty($bier["style"]) ? "" : $bier["style"];
    $bier_description=empty($bier["description"]) ? "" : $bier["description"];
    $content.= <<<EOD
    <div class='bier'>
      <h1>$bier_name</h1>
      <p>$bier_style</p>
      <p>$bier_description</p>
    </div>
EOD;
  }
  return $content;
}

function loadPlaceInfos($place_name) {
  $infos=getPlaceInfos($place_name);
  $type=$infos["type"];
  $name=$infos["name"];
  $description=empty($infos["description"])?"":$infos["description"];
  $address=empty($infos["address"])?"":$infos["address"];
  $website=empty($infos["website"])?"":$infos["website"];
  $content= <<<EOD
  <h1>$type $name</h1>
  <p>$description</p>
  <p>$address</p>
  <p>$website</p>
EOD;
  return $content;
}
