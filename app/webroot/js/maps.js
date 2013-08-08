var map;

function initialize() {
	
  var styles =[
    {
      "elementType": "geometry.stroke",
      "stylers": [
        { "visibility": "off" }
      ]
    },{
      "elementType": "geometry.fill",
      "stylers": [
        { "hue": "#ff6e00" }
      ]
    },{
      "elementType": "labels.text.stroke",
      "stylers": [
        { "visibility": "off" }
      ]
    },{
    }
  ];
  
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});


  var mapOptions = {
    zoom: 6,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    }
  };
  map = new google.maps.Map(document.getElementById('mapCanvas'),
      mapOptions);
  
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
      

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

/* gecoder
var address = 'London, UK';
  var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
   });
   */