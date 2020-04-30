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
  	var layerController = document.createElement('div');
  	layerController.className = 'layer-controller active';
  	layerController.textContent = layerId;

    //ajoute la couleur au controller et au layer associé sur la map
    $(layerController).css("background-color",colors[layerId]);
  	map.setPaintProperty(layerId, 'text-color',colors[layerId]);

  	layerController.onclick = switchController;
  	document.getElementById('layer-controllers').appendChild(layerController);
  }
	//$(".controllers-manager").on("click", $(this).attr("function"));
}

function switchController(e) {
  if ($(this).hasClass("active")) {
		deactivateController(this);
  } else {
		activateController(this);
  }
}

function deactivateController(e) {
  var clickedLayer = e.textContent;
	map.setLayoutProperty(clickedLayer, 'visibility', 'none');
	$(e).removeClass("active");
	$(e).css("background-color","lightgrey");
}

function activateController(e) {
  var clickedLayer = e.textContent;
	map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
	$(e).addClass("active");
	$(e).css("background-color",colors[clickedLayer]);
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

function loadPlace(placeName,request) {
  //récupère les données demandées (request) du lieu demandé (placeName) via AJAX et les affiche dans le bon div dans le html
	var data = {
		"function" : "loadPlace"+request,
		"parameters" : {place_name:placeName}
	};
	ajax("place",data,function(data) {
		$("#place-"+request).html(data);
	},"html");
}

function deactivateAllControllers() {
	activeControllers=$(".layer-controller.active");
	for (var i = 0; i < activeControllers.length; i++) {
		setTimeout(deactivateController, 100*(activeControllers.length-i), activeControllers[i]);
	}
}

function activateAllControllers() {
	i=0;
	$(".layer-controller:not(.active)").each(function() {
		setTimeout(activateController, 100*i, this);
		i++;
	});
}
