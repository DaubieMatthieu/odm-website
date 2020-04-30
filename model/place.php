<?php
require_once("db_connect.php");

function getPlaceInfos($placeName) {
  $db=dbConnect();
  $req = "SELECT * FROM place WHERE name=\"$placeName\"";
  $rep = $db->query($req);
  $infos=($rep->fetch(PDO::FETCH_ASSOC));
  return $infos;
}

function getPlaceBiers($placeName) {
  $db=dbConnect();
  $req = "SELECT DISTINCT i1.* FROM `bier` i1 INNER JOIN `place_bier` i2 ON i1.id_bier IN (SELECT DISTINCT i2.id_bier FROM `place_bier` i2 INNER JOIN `place` i3 ON i2.id_place IN (SELECT i3.id_place FROM `place` i3 WHERE name=\"$placeName\"))";
  $rep = $db->query($req);
  $biers=($rep->fetchAll(PDO::FETCH_ASSOC));
  return $biers;
}
