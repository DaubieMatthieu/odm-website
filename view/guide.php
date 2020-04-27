<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="public/css/guide.css" />
    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
    //traduit les données de la bdd du format php au format js pour que guide.js puisse les utiliser
    var styles = <?=json_encode($styles)?>;
    var colors = <?=json_encode($colors)?>;
    var placesByStyle = <?=json_encode($placesByStyle)?>;
    </script>
    <script defer type="text/javascript" src="public/js/guide.js"></script>
		<script src="https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.js"></script>
		<link href="https://api.mapbox.com/mapbox-gl-js/v1.7.0/mapbox-gl.css" rel="stylesheet" />
  </head>

  <body>
    <?php require("header.php");?>
    <div id="page-container">
      <div id="map">
        <div id="map-container"></div>
        <div id="map-controllers"></div>
      </div>
      <div id="place">
        <div id="place-infos"></div>
        <div id="place-biers"></div>
      </div>
    </div>
  </body>

</html>
