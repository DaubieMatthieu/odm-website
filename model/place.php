<?php

require_once("db_connect.php");
$db=dbConnect();

function getPlaceInfos($nom) {
  global $db;
  $req = "SELECT * FROM lieu WHERE nom=\"$nom\"";
  $rep = $db->query($req);
  $infos=($rep->fetch(PDO::FETCH_ASSOC));
  return $infos;
}

function getPlaceBiers($nom) {
  global $db;
  $req = "SELECT DISTINCT i1.* FROM `biere` i1 INNER JOIN `lieu_biere` i2 ON i1.id_biere IN (SELECT DISTINCT i2.id_biere FROM `lieu_biere` i2 INNER JOIN `lieu` i3 ON i2.id_lieu IN (SELECT i3.id_lieu FROM `lieu` i3 WHERE nom=\"$nom\"))";
  $rep = $db->query($req);
  $biers=($rep->fetchAll(PDO::FETCH_ASSOC));
  return $biers;
}
