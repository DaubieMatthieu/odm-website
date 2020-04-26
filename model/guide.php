<?php
require_once("db_connect.php");
$db=dbConnect();


function getStyles() {
  //récupère les styles les plus présents dans la bdd (8 au max)
  //TODO garder 8 styles max ? renvoyer tout et laisser la possibilité au js d'en afficher plus ou moins ? Compter les occurences de syle par nombre de bieres ou par nombre de lieux ?
  global $db;
  $req = "SELECT DISTINCT style, COUNT(`style`) AS `style_occurrence` FROM `bier` i1 INNER JOIN `place_bier` i2 ON i1.id_bier = i2.id_bier GROUP BY `style` ORDER BY `style_occurrence` DESC limit 8";
  $rep=$db->query($req);
  $styles=$rep->fetchAll(PDO::FETCH_COLUMN);
  return $styles;
}

function getPlacesByStyle($styles) {
  global $db;
  $places=array();
  foreach ($styles as $style) {
    $req2 = "SELECT DISTINCT i1.name, i1.longitude, i1.latitude FROM `place` i1 INNER JOIN `place_bier` i2 ON i1.id_place IN (SELECT DISTINCT i2.id_place FROM `place_bier` i2 INNER JOIN `bier` i3 ON i2.id_bier IN (SELECT i3.id_bier FROM `bier` i3 WHERE style=\"$style\"))";
    $rep2 = $db->query($req2);
    $places[$style]=$rep2->fetchAll(PDO::FETCH_ASSOC);
  }
  return $places;
}
