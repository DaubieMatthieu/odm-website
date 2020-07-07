<?php
//fichier appelé via AJAX dans le guide
//renvoie les données demandées sous forme d'html

require_once("model/place.php");

function loadPlaceBeers($place_name) {
  $beers=getPlaceBeers($place_name);
  $content="<div class='slider'>";
  foreach ($beers as $beer) {
    $content.="<div class='beer-container'><div class='beer'>";
    foreach ($beer as $feature => $value) {
      $content.=displayFeature($feature,$value);
    }
    $content.="</div></div>";
  }
  $content.="</div>";
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

function displayFeature($feature,$value) {
  if (substr($feature,0,2)=="id") {return "";}
  switch ($feature) {
    case 'price':
      $display="<div class='beer-feature beer-price'>".(empty($value)?"":$value."€")."</div>";
      break;
    case 'alcohol_level':
      $display="<div class='beer-feature beer-level'>".(empty($value)?"":$value."°")."</div>";
      break;
    case 'score':
      $display="<div class='beer-feature beer-score'>";
      if (!empty($value)) {
        for ($i=5; $i>0;  $i--) {
          if (2*$i-1>$value) {$display.='<i class="fas fa-star"></i>';}
          else if (2*$i-1==$value) {$display.='<i class="fas fa-star-half-alt"></i>';}
          else {$display.='<i class="far fa-star"></i>';}
        }
      }
      $display.="</div>";
      break;
    case 'happy_hour':
      $display="<div class='beer-feature beer-price-in-hh'>".(($value)?"(happy hour)":"")."</div>";
      break;
    default:
      $display="<div class='beer-feature beer-".$feature."'>".$value."</div>";
      break;
  }
  return $display;
}


/*

<i class="far fa-star"></i> empty
<i class="fas fa-star-half-alt"></i> half
 full
*/
