<?php
//TODO décider comment on renvoie les données, sous forme d'html comme ci-dessous ou array et faire la mise en forme dans le js ?
echo "<h1>".$data["type"]." ".$data["name"]."</h1>";
echo empty($data["description"]) ? "" : "<p>".$data["description"]."</p>";
echo empty($data["address"]) ? "" : "<p>".$data["address"]."</p>";
echo empty($data["website"]) ? "" : "<p>".$data["website"]."</p>";
