// ==========  START GOOGLE MAP ========== // 

    function initMap() {
			// MAP LOCATION-7.417356,109.2443453,
		var myLatLng = {lat: -7.417356, lng: 109.2443453};

		// STYLE MAP
		var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: myLatLng, 
            zoom: 17,
		    styles:
				[
					{
					"featureType": "poi.attraction",
					"stylers": [
						{
						"visibility": "off"
						}
					]
					},
					{
					"featureType": "poi.business",
					"stylers": [
						{
						"visibility": "off"
						}
					]
					},
					{
					"featureType": "poi.medical",
					"stylers": [
						{
						"visibility": "off"
						}
					]
					}
				]
				  
        });

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title:"Lokasi Kami"
		});	
	}

	

// ========== END GOOGLE MAP ========== //
