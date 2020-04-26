<?php
require_once("db_connect.php");
$db=dbConnect();


function getStyles() {
  //récupère les styles les plus présents dans la bdd (8 au max)
  //TODO garder 8 styles max ? renvoyer tout et laisser la possibilité au js d'en afficher plus ou moins ? Compter les occurences de syle par nombre de bieres ou par nombre de lieux ?
  global $db;
  $req = "SELECT DISTINCT style, COUNT(`style`) AS `style_occurrence` FROM `biere` i1 INNER JOIN `lieu_biere` i2 ON i1.id_biere = i2.id_biere GROUP BY `style` ORDER BY `style_occurrence` DESC limit 8";
  $rep=$db->query($req);
  $styles=$rep->fetchAll(PDO::FETCH_COLUMN);
  return $styles;
}

function getPlacesByStyle($styles) {
  global $db;
  $lieux=array();
  foreach ($styles as $style) {
    $req2 = "SELECT DISTINCT i1.nom, i1.longitude, i1.latitude FROM `lieu` i1 INNER JOIN `lieu_biere` i2 ON i1.id_lieu IN (SELECT DISTINCT i2.id_lieu FROM `lieu_biere` i2 INNER JOIN `biere` i3 ON i2.id_biere IN (SELECT i3.id_biere FROM `biere` i3 WHERE style=\"$style\"))";
    $rep2 = $db->query($req2);
    $lieux[$style]=$rep2->fetchAll(PDO::FETCH_ASSOC);
  }
  return $lieux;
}
