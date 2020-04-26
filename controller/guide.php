<?php
//récupérer données du guide dans la bdd avec le model
require("model/guide.php");
$styles=getStyles();
$placesByStyle=getPlacesByStyle($styles);
$colors=getColors($styles);
require("view/guide.php");

function getColors($styles) {
  //génère des couleurs automatiquement en fonction du nombre de styles à afficher
  //TODO mettre en place une charte couleur et trouver des couleurs fixes belles et pratiques (tester sur la carte)
  $colors=[];
  $nb=count($styles);
  for ($i = 0; $i < $nb; $i++) {
    $hue=$i*360/$nb+60;
    $color="hsl(".$hue.",100%,50%)";
    $colors[$styles[$i]]=$color;
  }
  return $colors;
}
