window.onload = function(){
	
	var geolocation = navigator.geolocation;
	geolocation.getCurrentPosition(showLocation);
	
	function showLocation( position ) {
		var lat = position.coords.latitude;
		var long = position.coords.longitude;
		var point = new google.maps.LatLng(lat, long);  
		new google.maps.Geocoder().geocode({'latLng': point}, function (res, status) {  
	        var zip = res[0].formatted_address.match(/,\s\w{2}\s(\d{5})/);  
	        $.ajax({
                type: 'POST',
                url: '../customers/updateLocation/' + zip[1],
             });  
		});
		return;
	};
};
