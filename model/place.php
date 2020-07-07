<?php
require_once("db_connect.php");

function getPlaceInfos($place_name) {
  $db=dbConnect();
  $req = "SELECT * FROM place WHERE name=\"$place_name\"";
  $rep = $db->query($req);
  $infos=($rep->fetch(PDO::FETCH_ASSOC));
  return $infos;
}

function getPlaceBeers($place_name) {
  $db=dbConnect();
  $req = "SELECT t1.*, t2.* from `beer` t1
          LEFT JOIN `place_beer` t2 on t2.id_beer = t1.id_beer
          LEFT JOIN `place` t3 on t3.id_place = t2.id_place
          WHERE t3.name=\"$place_name\"";
  $rep = $db->query($req);
  $beers=($rep->fetchAll(PDO::FETCH_ASSOC));
  return $beers;
}
