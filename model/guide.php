<?php
require_once("db_connect.php");

function getStyles() {
  //récupère les styles les plus présents dans la bdd (8 au max)
  //TODO garder 8 styles max ? renvoyer tout et laisser la possibilité au js d'en afficher plus ou moins ? Compter les occurences de syle par nombre de beeres ou par nombre de lieux ?
  $db=dbConnect();
  $req = "SELECT DISTINCT style, COUNT(`style`) AS `style_occurrence` FROM `beer` i1
          INNER JOIN `place_beer` i2 ON i1.id_beer = i2.id_beer
          GROUP BY `style` ORDER BY `style_occurrence` DESC limit 8";
  $rep=$db->query($req);
  $styles=$rep->fetchAll(PDO::FETCH_COLUMN);
  return $styles;
}

function getPlacesByStyle($styles) {
  $db=dbConnect();
  $places=array();
  foreach ($styles as $style) {
    $req = "SELECT t1.* from `place` t1
            LEFT JOIN `place_beer` t2 on t2.id_place = t1.id_place
            LEFT JOIN `beer` t3 on t3.id_beer = t2.id_beer
            WHERE t3.style=\"$style\"";
    $rep = $db->query($req);
    $places[$style]=$rep->fetchAll(PDO::FETCH_ASSOC);
  }
  return $places;
}
