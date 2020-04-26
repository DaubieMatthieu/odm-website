<?php
//TODO décider comment on renvoie les données, sous forme d'html comme ci-dessous ou array et faire la mise en forme dans le js ?
echo "<h1>".$data["type"]." ".$data["nom"]."</h1>";
echo empty($data["description"]) ? "" : "<p>".$data["description"]."</p>";
echo empty($data["adresse"]) ? "" : "<p>".$data["adresse"]."</p>";
echo empty($data["site"]) ? "" : "<p>".$data["site"]."</p>";
