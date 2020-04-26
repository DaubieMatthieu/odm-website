<?php
//TODO décider comment on renvoie les données, sous forme d'html comme ci-dessous ou array et faire la mise en forme dans le js ?
foreach ($data as $bier) {
  echo "<div class='bier'>";
  echo "<h1>".$bier["nom"]."</h1>";
  echo empty($bier["style"]) ? "" : "<p>".$bier["style"]."</p>";
  echo empty($bier["description"]) ? "" : "<p>".$bier["description"]."</p>";
  echo "</div>";
}
