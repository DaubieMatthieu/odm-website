<?php
$styles = json_encode($styles);
$colors = json_encode($colors);
$placesByStyle = json_encode($placesByStyle);
$content= <<<EOD
  <head>
    <script>
    //traduit les données de la bdd du format php au format js pour que guide.js puisse les utiliser
    var styles = $styles;
    var colors = $colors;
    var placesByStyle = $placesByStyle;
    </script>
		<script src="https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js"></script>
		<link href="https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css" rel="stylesheet" />
  </head>

  <body>
    <?php require("header.php");?>
    <div id="page-container">
      <div id="map">
        <div id="map-container"></div>
        <div id="map-controller">
          <h3>Controleurs</h3>
          <div id="layer-controllers"></div>
          <div id="controllers-managers">
            <div class="controllers-manager" onclick="activateAllControllers();">Activer</div>
            <div class="controllers-manager" onclick="deactivateAllControllers();">Désactiver</div>
          </div>
        </div>
      </div>
      <div id="place">
        <div id="place-infos"></div>
        <div id="place-biers"></div>
      </div>
    </div>
  </body>
EOD;
?>
