<?php

require_once("model/données.php");

$tables=getTables();

if (isset($parameters[0])) {
  $table=$parameters[0];
  $table_columns=getTableColumns($table);
  $table_values=getTableValues($table);
}

require_once("view/données.php");
