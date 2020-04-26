mapboxgl.accessToken = 'pk.eyJ1IjoicGFrbWUiLCJhIjoiY2s2bTYxamZiMDd2ajNsbHlvb2h1bmg4bCJ9.hxRkxb9EY3fJSweVyVrzGw';
var map = new mapboxgl.Map({
  //initialisation de la carte
	container: 'map-container',
	style: 'mapbox://styles/mapbox/streets-v11',
  zoom: 11.6,
  center: [2.335,48.859]
});

var layout= {
  //initialisationdu du style des points
	'visibility': 'visible',
	"icon-image": "beer-15",
	"text-field": "{title}",
	"text-optional": true,
	"text-offset": [0, 1],
	"text-allow-overlap": false,
	"icon-allow-overlap": true,
	'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
	'text-radial-offset': 0.5,
	'text-justify': 'auto'
}

map.on('load', function() {
  addLayers();
  addControllers()
});

function addLayers() {
  //génération et ajouts des Layers (mise en forme des données de notre bdd sur la map)
  //1 layer = 1 style
  for (var style in placesByStyle) {
    places=placesByStyle[style];
    //génération des features (points sur la carte) pour chaque layer
    features = [];
    places.forEach(place => {
      feature=
      {
        type: 'Feature',
        properties: {title:place["name"]},
        geometry: {
          type: "Point",
          coordinates: [place["longitude"],place["latitude"]]
        }
      };
      features.push(feature);
      console.log(feature);
    });
    //ajout des données sur la carte
    map.addLayer({
		    id: style,
				type: "symbol",
				source: {
					type: "geojson",
					data: {
						type: 'FeatureCollection',
						features: features
					}
				},
			  layout: layout
		});
	}
}

function addControllers() {
  //ajout des boutons de controle pour chaque style/layer
  for (var i = 0; i < styles.length; i++) {
  	var layerId = styles[i];

    //crée le controller
  	var mapController = document.createElement('div');
  	mapController.className = 'map-controller active';
  	mapController.textContent = layerId;

    //ajoute la couleur au controller et au layer associé sur la map
    $(mapController).css("background-color",colors[layerId]);
  	map.setPaintProperty(layerId, 'text-color',colors[layerId]);

  	mapController.onclick = clickOnController;
  	document.getElementById('map-controllers').appendChild(mapController);
  }
}

function clickOnController(e) {
  var clickedLayer = this.textContent;

  var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

  if (visibility === 'visible') {
    map.setLayoutProperty(clickedLayer, 'visibility', 'none');
    $(this).removeClass("active");
    $(this).css("background-color","lightgrey");
  } else {
    map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
    $(this).addClass("active");
    $(this).css("background-color",colors[clickedLayer]);
  }
}


map.on('click', function(e) {
  //détermine le nom du lieu pour en afficher les données
  var features = map.queryRenderedFeatures(e.point, {
    layers: styles
  });

  if (!features.length) {
    return;
  }
  var feature = features[0];
  loadPlace(feature.properties.title,"infos");
  loadPlace(feature.properties.title,"biers");
});

function loadPlace(placeName,req) {
  //récupère les données demandées (req) du lieu demandé (placeName) via AJAX et les affiche dans le bon div dans le html
  $.ajax({
    type: "POST",
    url: "controller/place.php",
    data: 'placeName=' + placeName + '&req=' + req,
    success: function(data) {
      $("#place-"+req).html(data);
    },
    error: function() {
      console.log("ajax call error when loading "+placeName+" "+req);
    },
    dataType: "html"
  });
}
