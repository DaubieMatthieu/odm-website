<?php

require_once("db_connect.php");

function getTables() {
  $db=dbConnect();
  $req = "SHOW tables";
  $rep=$db->query($req);
  $tables=$rep->fetchAll(PDO::FETCH_COLUMN);
  return $tables;
}

function getTableValues($table_name) {
  $db=dbConnect();
  $req = "SELECT * from ".$table_name;
  $rep=$db->query($req);
  $table_values=$rep->fetchAll(PDO::FETCH_ASSOC);
  return $table_values;
}

function getTableColumns($table_name) {
  $db=dbConnect();
  $req = "SHOW columns from ".$table_name;
  $rep=$db->query($req);
  $table_columns=$rep->fetchAll(PDO::FETCH_COLUMN);
  return $table_columns;
}
